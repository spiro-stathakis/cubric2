<?php 

abstract class XActiveRecord extends CActiveRecord {

	public function init()
	{ 
		if ($this->isNewRecord)
		{ 
			$this->create_user_id = 1;
			$this->create_time = time();
			$this->status_id = 2; 
			
		}
		return parent::init(); 
		
	} 
} 

