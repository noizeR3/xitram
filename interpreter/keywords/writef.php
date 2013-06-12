<?php
class writef implements keywords{
    private $error = NULL; //We will store errors here

    public function error(){ //This will be called when some error is found
        return $this->error;
    }

    public function syntax($string){
        if(empty($string)){
             $this->error .= "Syntax error. \"writef\" requires additional arguments.";
            return false;
        }
        return true;
    }
    public function run($string){
        private $arg1 = htmlentities($string[1]);
        unset($string[1]);
        $string = htmlentities(implode($string));
        file_put_contents($arg1,$string);
    }
} 
?>
