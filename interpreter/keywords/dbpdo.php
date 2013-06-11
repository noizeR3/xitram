<?php
/* 
	This is an example script, of how to use PDO with Xitram
	This code is not really usefull in real life, but it should give you an idea of what to do and how if you ever need something like this :)
*/

class dbpdo implements keywords{
	private $error = NULL; //We will store errors here
	private static $settings = array('host'=> null, 'dbname'=> null, 'user'=> null, 'pass'=>null); //Database settings
	private static $db;
	
	//help command variables
	public $description = "This is an example script, of how to use PDO with Xitram\n
	This code is not really usefull in real life, but it should give you an idea of what to do and how if you ever need something like this :)";
	public $usage = "dbpdo settings [host / dbname / user / pass] (value); - if any value isn't set, it will be null\n
			dbpdo connect; - connecting to database, settings must be used first\n
			dbpdo query (SQL query) - nothing is returned back\n
			dbpdo [show / showall] (SQL query) - writes back the result of query";
	public $author = "Chris 1llusion";


	public function error(){ //This will be called when some error is found
		return $this->error;
	}

	public function syntax($string){ //Checking the syntax, we don't want any additional commands		
		if(empty($string)){
			 $this->error .= "The command 'pdo' requires additional commands";
			return false;
		}
		return true;
	}
	public function run($string){ //We could check the syntax, but it is not really needed as the keyword will always print "Hello World"		


		switch($string[1]){
			case 'settings':
				$setting = empty($string[3]) ? NULL : $string[3];
				self::$settings[$string[2]] = $setting;
			break;
			case 'connect':
				self::$db = new PDO("mysql:host=".self::$settings["host"].";dbname=".self::$settings["dbname"], self::$settings["user"], self::$settings["pass"]);  
			break;
			case 'query':
				self::$db->query($string[2]);
			break;
			case 'show':
				$query = self::$db->query($string[2]);
				$result = $query->fetch(PDO::FETCH_ASSOC);
				
				foreach($result as $key=>$val){
					echo $key.' = '.$val.'<br/>';				
				}
			break;
			case 'showall':
				$query = self::$db->query($string[2]);
				$result = $query->fetchAll(PDO::FETCH_ASSOC);

				foreach($result as $key=>$val){
					echo $key.' = '.$val.'<br/>';				
				}			
			break;
			default:
				$this->error('Unknown argument.');
				die($this->error);		
		}
	}
}
?>
