<?php class parser {
	
	public $code = array(); //The Xintram readable code will be stored here
	
	public function parse($raw_code){ //This translates user-written code to more understandable commands
		/* Init */		
		$code = array(); //The Xintram readable code will be stored here		
		$line = 0; //On what line are we
		$argument = 0; //On what argument are we?
		$code_length = strlen($raw_code); //Length of the code	
		
		/* Special behavior */
		$space = false; //For better formatting, we will detect if space was already used
		$in_string = array( //Are we in string? (special behavior is needed for both cases)
				   "\"" => false, //Inside double-quoted string
				   "'" => false); //Inside single quoted string
	
		for($temp = 0; $temp < ($code_length - 1); $temp++){
			switch($raw_code[$temp]){
				case chr(32): //Space
				case chr(9): //tab
					if(!$space && ($temp != 0 || $temp != ($code_length - 1)) && (!$in_string["\""] && !$in_string["'"])){
						$argument += 1;
						$space = true;
					}
					else $this->builder($raw_code[$temp], $line, $argument);
				break;
				case "\"";
					if(!$in_string["\""] && !$in_string["'"]) $in_string["\""] = true;
					elseif($in_string["\""]) $in_string["\""] = false;
					else $this->builder($raw_code[$temp], $line, $argument);			
					$space = false;				
				break;
				case "'";
					if(!$in_string["\""] && !$in_string["'"]) $in_string["'"] = true;
					elseif($in_string["'"]) $in_string["'"] = false;
					else $this->builder($raw_code[$temp], $line, $argument);			
					$space = false;
				break;
				case ";";
					if(!$in_string["\""] && !$in_string["'"]) $line += 1;
					else $this->builder($raw_code[$temp], $line, $argument);
					$space = false;
				break;
				default:
					$this->builder($raw_code[$temp], $line, $argument);
					$space = false;				
			}		
		}
			
		return $this->code;	
	}
	
	private function builder($char, $line, $argument){
		if (empty($this->code[$line][$argument])) $this->code[$line][$argument] = $char;
		else  $this->code[$line][$argument] .= $char;
	}
	
} 
?>
