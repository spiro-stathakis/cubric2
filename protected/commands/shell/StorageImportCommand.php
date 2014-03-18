<?php 

/*
run with this command: 
protected/yiic shell protected/config/console.php 
*/ 
class StorageImportCommand extends CConsoleCommand 
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
		$struct = array();  
		
		$filespace_id = 2; // home; 
		//$filespace_id = 3; // scratch; 
		
		//$path = sprintf('/tmp/%s' , $fileName); 
		
		$fh  = fopen($fileName,"r");
		while(! feof($fh))
		{
			$arr = split("\t" , fgets($fh));
			$struct[(int)$arr[0]] = (int)$arr[1];
		} 
		fclose($fh);
		foreach ($struct as $uid=>$usage)
		{ 
			$user = User::model()->find('uid_number=:uid_number' , array(':uid_number'=>$uid));
			if ($user !== null)
			{ 
				$disk =  DiskOccupancy::model()->find('user_id=:user_id AND filespace_id=:filespace_id', array(':user_id'=>$user->id , ':filespace_id'=>$filespace_id)); 
				if ($disk == null)
				{ 
					$disk = new DiskOccupancy;
					$disk->user_id = $user->id; 
					$disk->filespace_id = $filespace_id;
				} 
				
				
				$usage = (int) $usage; 
				
				$disk->occupancy = $usage; 
				if (! $disk->save())
					print_r($disk->getErrors());
				 
			} else 
				echo sprintf("UID %s not found in system\n", $uid ); 
		} 
		
		
		 
		 
		
		
		 
		
	
	}// end run()
	/* *************************************************************** */
} // end class 
