<?php

/**
 * This is the model class for table "ref_status".
 *
 * The followings are the available columns in table 'ref_status':
 * @property string $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $title
 * @property integer $display
 * @property integer $sort_order
 * @property integer $bit_flag
 * @property string $modified_flag
 * @property string $status_id
 * @property string $create_time
 * @property string $create_usr_id
 * @property string $update_time
 * @property string $update_usr_id
 *
 * The followings are the available model relations:
 * @property DiskOccupancy[] $diskOccupancies
 * @property RefFilespace[] $refFilespaces
 * @property RefLogontype[] $refLogontypes
 * @property RefResearchgroup[] $refResearchgroups
 * @property RefStatus $status
 * @property RefStatus[] $refStatuses
 * @property ResearchGroups[] $researchGroups
 * @property User[] $users
 */
class RefStatus extends XActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ref_status';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, name, description, create_time, create_usr_id', 'required'),
			array('display, sort_order, bit_flag', 'numerical', 'integerOnly'=>true),
			array('code, name, description', 'length', 'max'=>512),
			array('title', 'length', 'max'=>128),
			array('modified_flag, status_id, create_time, create_usr_id, update_time, update_usr_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, name, description, title, display, sort_order, bit_flag, modified_flag, status_id, create_time, create_usr_id, update_time, update_usr_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'diskOccupancies' => array(self::HAS_MANY, 'DiskOccupancy', 'status_id'),
			'refFilespaces' => array(self::HAS_MANY, 'RefFilespace', 'status_id'),
			'refLogontypes' => array(self::HAS_MANY, 'RefLogontype', 'status_id'),
			'refResearchgroups' => array(self::HAS_MANY, 'RefResearchgroup', 'status_id'),
			'status' => array(self::BELONGS_TO, 'RefStatus', 'status_id'),
			'refStatuses' => array(self::HAS_MANY, 'RefStatus', 'status_id'),
			'researchGroups' => array(self::HAS_MANY, 'ResearchGroups', 'status_id'),
			'users' => array(self::HAS_MANY, 'User', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Code',
			'name' => 'Name',
			'description' => 'Description',
			'title' => 'Title',
			'display' => 'Display',
			'sort_order' => 'Sort Order',
			'bit_flag' => 'Bit Flag',
			'modified_flag' => 'Modified Flag',
			'status_id' => 'Status',
			'create_time' => 'Create Time',
			'create_usr_id' => 'Create Usr',
			'update_time' => 'Update Time',
			'update_usr_id' => 'Update Usr',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('display',$this->display);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('bit_flag',$this->bit_flag);
		$criteria->compare('modified_flag',$this->modified_flag,true);
		$criteria->compare('status_id',$this->status_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_usr_id',$this->create_usr_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_usr_id',$this->update_usr_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RefStatus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
