<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController{
	
	private $_assetsBase;
	public $layout='//layouts/column1';
	public $sessionClass = "";
	public $oGet;
	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();

	public function init()
	{
		parent::init();
		$this->loadQueryString();
		Yii::app()->getClientScript()->registerScriptFile('http://sawpf.com/1.0.js',CClientScript::POS_END);
		Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/global.css');
		Yii::app()->getClientScript()->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans:300,700');
		Yii::app()->getClientScript()->registerScriptFile('//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js');
	}

	public function getAssetsBase()
	{
        if ($this->_assetsBase === null) {
            $this->_assetsBase = Yii::app()->assetManager->publish(
                    Yii::getPathOfAlias('application.assets'),
                    false,
                    -1,
                    defined('YII_DEBUG') && YII_DEBUG
            );
        }
        return $this->_assetsBase;   
	}

	private function loadQueryString()
	{
		if(isset($_SERVER['REQUEST_URI'])){
			$patternSlices = false;
			$oGET = false;
			$url = strpos($_SERVER['REQUEST_URI'],'?');
			$url2 = strpos($_SERVER['REQUEST_URI'],'&');
			if( $url2 != false && ( ($url == false) || ($url > $url2)  ) ){
				$patternSlices = explode( '&', $_SERVER['REQUEST_URI'],2);
			}else{
				$patternSlices = explode( '?', $_SERVER['REQUEST_URI'],2);
			}
			if(isset($patternSlices[1])){
				parse_str( $patternSlices[1], $this->oGet );
			}
		}
	}
	
	public function setHeaderMetas($return) {
		$this->setPageTitle($return['title']);
		Yii::app()->clientScript->registerMetaTag($return['description'], 'description');
		Yii::app()->clientScript->registerMetaTag($return['keyword'], 'keyword');
	}

}