<?php
/**
 * Sharrre class file.
 * @author Raffael Tancman <rtancman@gmail.com>
 * @copyright Copyright &copy; Raffael Tancman 2013
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version 1.0.0
 */

/**
 * Sharrre application component.
 */
class Sharrre extends CApplicationComponent
{
	
	public $coreCss = true;
	/**
	 * @var array plugin initial options (name=>options).
	 * Each array key-value pair represents the initial options for a single plugin class,
	 * with the array key being the plugin name, and array value being the initial options array.
	 * @since 0.9.8
	 */
	public $plugins = array();
	protected $_assetsUrl;

	/**
	 * Initializes the component.
	 */
	public function init()
	{
		if (Yii::getPathOfAlias('yii-sharrre') === false)
			Yii::setPathOfAlias('yii-sharrre', realpath(dirname(__FILE__).'/..'));

		if (Yii::app() instanceof CConsoleApplication)
			return;

		if ($this->coreCss !== false)
			$this->registerCoreCss();

		$this->registerJS();
        parent::init();
	}

	/**
	 * Registers the Sharrre CSS.
	 */
	public function registerCoreCss()
	{
		Yii::app()->clientScript->registerCssFile($this->getAssetsUrl().'/css/sharrre.css');
	}

	/**
	 * Registers the Sharrre JavaScript.
	 * @param int $position the position of the JavaScript code.
	 * @see CClientScript::registerScriptFile
	 */
	public function registerJS($position = CClientScript::POS_HEAD)
	{
		/** @var CClientScript $cs */
		$cs = Yii::app()->getClientScript();
		$cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.sharrre-1.3.4.js', $position);
	}

	/**
	 * Registers the Sharrre alert plugin.
	 * @param string $selector the CSS selector
	 * @param array $options the plugin options
	 */
	public function registerAlert($selector = null, $options = array())
	{
		$this->registerPlugin(self::PLUGIN_ALERT, $selector, $options);
	}
	
	/**
	 * Registers a Bootstrap JavaScript plugin.
	 * @param string $name the name of the plugin
	 * @param string $selector the CSS selector
	 * @param array $options the plugin options
	 * @param string $defaultSelector the default CSS selector
	 * @since 0.9.8
	 */
	protected function registerPlugin($name, $selector = null, $options = array(), $defaultSelector = null)
	{
		if (!isset($selector) && empty($options))
		{
			// Initialization from extension configuration.
			$config = isset($this->plugins[$name]) ? $this->plugins[$name] : array();
	
			if (isset($config['selector']))
				$selector = $config['selector'];
	
			if (isset($config['options']))
				$options = $config['options'];
	
			if (!isset($selector))
				$selector = $defaultSelector;
		}
	
		if (isset($selector))
		{
			$key = __CLASS__.'.'.md5($name.$selector.serialize($options).$defaultSelector);
			$options = !empty($options) ? CJavaScript::encode($options) : '';
			Yii::app()->clientScript->registerScript($key, "jQuery('{$selector}').{$name}({$options});");
		}
	}
	
	/**
	* Returns the URL to the published assets folder.
	* @return string the URL
	*/
	protected function getAssetsUrl()
	{
		if (isset($this->_assetsUrl))
			return $this->_assetsUrl;
		else
		{
			$assetsPath = Yii::getPathOfAlias('yii-sharrre.assets');
			$assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, YII_DEBUG);
			return $this->_assetsUrl = $assetsUrl;
		}
	}

    /**
     * Returns the extension version number.
     * @return string the version
     */
    public function getVersion()
    {
        return '1.0.0';
    }
}
