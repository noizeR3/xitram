<?php

//Creating a new keyword "h" which will print out "Hello World"
class h implements keywords{
	private $error = NULL; //We will store errors here

	public function error(){ //This will be called when some error is found
		return $this->error;
	}

	public function syntax($string){ //Checking the syntax, we don't want any additionall commands
		if(!empty($string)){
			 $error .= "The command 'h' doesn't accept any additionall commands";
			return false;
		}
		return true;
	}
	public function run($string){ //We could check the syntax, but it is not really needed as the keyword will always print "Hello World"
		echo 'Hello world';	
	}
} 
?>
