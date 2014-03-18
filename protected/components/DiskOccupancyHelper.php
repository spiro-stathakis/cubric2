<?php 

class DiskOccupancyHelper extends CComponent {

	/* Pass in a post code id and get a lat / lon array with coordinates */ 
	public static function getFileSpaceUsage($filespace_id){
		
		
		$dataReader = Yii::app()->db->createCommand()
			->select('do.user_id , do.filespace_id , do.occupancy,
				(do.occupancy / (1024 * 1024 * 1024)) as `usage`,  
				 u.username, u.uid_number, u.forename, u.surname, 
				 rf.name'
				)
			->from('disk_occupancy do')
			->join('user u' , 'u.id=do.user_id') 
			->join('ref_filespace rf' , 'rf.id=do.filespace_id')
			->where('do.filespace_id=:filespace_id', array(':filespace_id'=>$filespace_id))
			->order('do.occupancy')
			->queryAll(); 
			return $dataReader ;  
		
	} 
	
/* *************************************************************** */	
	public static function getUsers()
	{ 
		$dataReader = Yii::app()->db->createCommand()
		->select('u.username')
		->from('user u')
		->join('disk_occupancy do', 'do.user_id=u.id')
		->where('u.status_id=2 AND do.filespace_id=3')
		->order('do.occupancy DESC')
		->queryAll(); 
		
		return $dataReader; 
		
	} 
/* *************************************************************** */	

} //end class 
