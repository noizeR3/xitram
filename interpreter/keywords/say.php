<?php
class say implements keywords{
	private $error = NULL; //We will store errors here

	public function error(){ //This will be called when some error is found
		return $this->error;
	}

	public function syntax($string){ //Checking the syntax, we don't want any additionall commands
		if(empty($string)){
			 $this->error .= "The command 'say' requires additional commands";
			return false;
		}
		return true;
	}
	public function run($string){ //We are echoing anything found after the command
		echo $string;	
	}
} 
?>
