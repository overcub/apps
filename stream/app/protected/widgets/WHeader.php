<?php
class WHeader extends CWidget {
 
    public $hash;
    
    public function run() {
        $this->render(__CLASS__);
    }
}