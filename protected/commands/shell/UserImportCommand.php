<?php 

/*
run with this command: 
protected/yiic shell protected/config/console.php 
*/ 
class UserImportCommand extends CConsoleCommand 
{
	
	/* *************************************************************** */
	public function init()
	{
		return parent::init(); 
	}
	/* *************************************************************** */
	
	public function getHelp()
	{
		return <<<EOD
USAGE 
	userimport 

DESCRIPTION 
	This command performs an initial import of users into the system.
	
AUTHOR 
	Spiro Stathakis - March 2014  
	
EOD;
	}
	/* *************************************************************** */
	
	
	public function run($args)
	{
		
		$fileName = $args[0];
		$arr = array(); 
		//$path = sprintf('/tmp/%s' , $fileName); 
		
		$fh  = fopen($fileName,"r");
		while(! feof($fh))
			$arr[] = fgets($fh);
		fclose($fh);
		if (count($arr) < 3)
			return ; 
		
		$user = new User; 
		$user->username = $arr[0];
		$user->uid_number = (int)$arr[1];
		$user->email = $arr[2];
		$user->forename = $arr[4];
		$user->surname  = $arr[5];
		$user->gid_number = 10073;
		
		if (! $user->save())
			print_r($user->getErrors()); 
		
		
		 
		
	
	}// end run()
	/* *************************************************************** */
} // end class 
