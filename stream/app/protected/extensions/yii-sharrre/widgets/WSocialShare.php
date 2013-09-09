<?php

class WSocialShare extends CWidget
{
	public $elementId = "yii-sharrre-1";
	public $type;	
	public $size;
	public $dataUrl;
	public $dataText;
	public $socials = array(
		'facebook' => true,
		'googlePlus' => true,
		'twitter' => true,
		'digg' => true,
		'delicious' => true,
		'stumbleupon' => true,
		'linkedin' => true,
		'pinterest' => true
	);
	//http://sharrre.com/#documentation
	public $buttons = array(
		'facebook' => array('layout' => 'button_count'),
		'googlePlus' => array('size' => 'medium', 'annotation' => 'none'),
		'twitter' => array('count' => 'none'),
		'digg' => array('type' => 'DiggCompact'),
		'delicious' => array('size' => 'medium'),
		'stumbleupon' => array('layout' => '1'),
		'linkedin' => array('counter' => 'right'),
		'pinterest' => array('media' => "http://static.personare.com.br/img/navigation/head/favicon.png", 'description' => "Personare. Tudo sobre você e o seu jeito de ser.", 'layout' => 'horizontal')
	);
	public $enableHover = 'false';
	public $enableCounter = 'false';
	public $enableTracking = 'false';
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		$classes = array('yii-sharrre-container');

		if (!empty($classes))
		{
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class']))
				$this->htmlOptions['class'] .= ' '.$classes;
			else
				$this->htmlOptions['class'] = $classes;
		}

	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		$this->render(__CLASS__, array());
	}
}
