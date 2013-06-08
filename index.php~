<?php	/*
		This is an example file of how to run Xitram code.
		We will be simply writing out "Hello World" which by default is written out by the command "h"
		
		Each line has to end with a ;
	*/
	
	require_once "interpreter/main.class.php"; //Including the interpreter of the code

	$code = 'h;'; //The code to run

	$interpreter = new xitram; //Creating new interpreter class
	echo 'Syntax check output: ';
	echo $interpreter->syntax($code); //Checking for errors in code. 
	echo '<br/> Code output: ';
	$interpreter->execute($code); //Running the code.
?>
