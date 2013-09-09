<?php
 
/**
 * CAssetManager class file.
 *
 * @author Jason Hancock <jsnbyh@gmail.com>
 * @copyright Copyright &copy; 2013 Jason Hancock 
 * @license http://www.yiiframework.com/license/
 */
 
/**
 * The goal of the VersionAssetManager is to publish all assets under a version
 * numbered url. This assumes you're incrementing the version number every time
 * you release. For development, we want to emulate the CAssetManager and force
 * the asset publishes and use CRC hashes (like normal), however instead of using
 * the directory's mtime, we're using the current unix time. This means that every
 * pageview when in development mode is copying over all of the assets, so it's
 * expensive, but nothing is more frustrating that trying to solve cache busting
 * issues when you're writing code. In production mode, we use the file's path +
 * the current version number for the hash, so files should only get published
 * once.
 */
class VersionAssetManager extends CAssetManager {
    private $_basePath;
    private $_baseUrl;
    private $_published=array();
    protected $_time;
 
    public function publish($path,$hashByName=false,$level=-1,$forceCopy=false) {
        if(isset($this->_published[$path]))
            return $this->_published[$path];
        else if(($src=realpath($path))!==false) {
            if(is_file($src)) {
                $dir=$this->hash($hashByName 
                    ? basename($src)
                    : Yii::app()->params['version'] == 'Development'
                        ? dirname($src).$this->getTime()
                        : dirname($src).Yii::app()->params['version']
                );
                $fileName=basename($src);
                $dstDir=$this->getBasePath().DIRECTORY_SEPARATOR.$dir;
                $dstFile=$dstDir.DIRECTORY_SEPARATOR.$fileName;
 
                if($this->linkAssets) {
                    if(!is_file($dstFile)) {
                        if(!is_dir($dstDir)) {
                            mkdir($dstDir);
                            @chmod($dstDir, $this->newDirMode);
                        }
                        symlink($src,$dstFile);
                    }
                }
                else if(@filemtime($dstFile)<@filemtime($src)) {
                    if(!is_dir($dstDir)) {
                        mkdir($dstDir);
                        @chmod($dstDir, $this->newDirMode);
                    }
                    copy($src,$dstFile);
                    @chmod($dstFile, $this->newFileMode);
                }
 
                return $this->_published[$path]=$this->getBaseUrl()."/$dir/$fileName";
            } else if(is_dir($src)) {
 
                $dir=$this->hash($hashByName
                    ? basename($src) 
                    : Yii::app()->params['version'] == 'Development' 
                        ? $src.$this->getTime()
                        : $src.Yii::app()->params['version']
                );
                $dstDir=$this->getBasePath().DIRECTORY_SEPARATOR.$dir;
 
                if($this->linkAssets) {
                    if(!is_dir($dstDir))
                        symlink($src,$dstDir);
                }
                else if(!is_dir($dstDir) || $forceCopy) {
                    CFileHelper::copyDirectory($src,$dstDir,array(
                        'exclude'=>$this->excludeFiles,
                        'level'=>$level,
                        'newDirMode'=>$this->newDirMode,
                        'newFileMode'=>$this->newFileMode,
                    ));
                }
 
                return $this->_published[$path]=$this->getBaseUrl().'/'.$dir;
            }
        }
        throw new CException(Yii::t('yii','The asset "{asset}" to be published does not exist.',
            array('{asset}'=>$path)));
    }
 
    /**
     * Returns the published path of a file path.
     * This method does not perform any publishing. It merely tells you
     * if the file or directory is published, where it will go.
     * @param string $path directory or file path being published
     * @param boolean $hashByName whether the published directory should be named as the hashed basename.
     * If false, the name will be the hash taken from dirname of the path being published and path mtime.
     * Defaults to false. Set true if the path being published is shared among
     * different extensions.
     * @return string the published file path. False if the file or directory does not exist
     */
    public function getPublishedPath($path,$hashByName=false) {
        if(($path=realpath($path))!==false) {
            $base=$this->getBasePath().DIRECTORY_SEPARATOR;
            if(is_file($path)) {
                return $base . $this->hash($hashByName
                    ? basename($path) 
                    : Yii::app()->params['version'] == 'Development'
                        ? dirname($path).$this->getTime()
                        : dirname($path).Yii::app()->params['version']
                ) . DIRECTORY_SEPARATOR . basename($path);
            } else {
                return $base . $this->hash($hashByName
                    ? basename($path)
                    : Yii::app()->params['version'] == 'Development'
                        ? $path.$this->getTime()
                        : $path.Yii::app()->params['version']
                );
            }
        }
        else
            return false;
    }
 
    /**
     * Returns the URL of a published file path.
     * This method does not perform any publishing. It merely tells you
     * if the file path is published, what the URL will be to access it.
     * @param string $path directory or file path being published
     * @param boolean $hashByName whether the published directory should be named as the hashed basename.
     * If false, the name will be the hash taken from dirname of the path being published and path mtime.
     * Defaults to false. Set true if the path being published is shared among
     * different extensions.
     * @return string the published URL for the file or directory. False if the file or directory does not exist.
     */
    public function getPublishedUrl($path,$hashByName=false) {
        if(isset($this->_published[$path]))
            return $this->_published[$path];
        if(($path=realpath($path))!==false) {
            if(is_file($path)) {
                return $this->getBaseUrl().'/'.$this->hash($hashByName 
                    ? basename($path)
                    : Yii::app()->params['version'] == 'Development'
                        ? dirname($path).$this->getTime()
                        : dirname($path).Yii::app()->params['version']
                ).'/'.basename($path);
            } else {
                return $this->getBaseUrl().'/'.$this->hash($hashByName
                    ? basename($path)
                    : Yii::app()->params['version'] == 'Development'
                        ? $path.$this->getTime()
                        : $path.Yii::app()->params['version']
                );
            }
        }
        else
            return false;
    }
 
    /**
     * Protect against publishing multiple assets for a page view spanning multiple
     * seconds.
     */
    protected function getTime() {
        if(!isset($this->_time))
            $this->_time = time();
 
        return $this->_time;
    }
}