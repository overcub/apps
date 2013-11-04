<?php
class WHeader extends CWidget {
 
    public $hash;
    public $superbanner = true;
    
    public function run() {
        $this->render(__CLASS__);
    }
}