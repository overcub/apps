<?php
class WFooter extends CWidget 
{
	public $superbanner = true;
    public function run() 
    {
        $this->render(__CLASS__);
    }
}