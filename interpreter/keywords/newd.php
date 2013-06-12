<?php
class newd implements keywords{
    private $error = NULL; //We will store errors here

    public function error(){ //This will be called when some error is found
        return $this->error;
    }

    public function syntax($string){
        if(empty($string)){
             $this->error .= "Too few arguments for 'newd'.";
            return false;
        }
        return true;
    }
    public function run($string){
        $string = implode($string);
        mkdir $string;
    }
} 
?>
