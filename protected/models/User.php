<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $gender_id
 * @property string $uid_number
 * @property string $gid_number
 * @property string $title_id
 * @property string $logon_type_id
 * @property string $forename
 * @property string $surname
 * @property string $known_as
 * @property string $id_man
 * @property string $hash
 * @property string $email
 * @property string $telephone
 * @property string $username
 * @property string $password
 * @property string $lang
 * @property string $dob
 * @property string $modified_flag
 * @property string $status_id
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property DiskOccupancy[] $diskOccupancies
 * @property ResearchGroups[] $researchGroups
 * @property RefStatus $status
 * @property RefLogontype $logonType
 */
class User extends XActiveRecord
{
	
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid_number, gid_number, create_time, create_user_id', 'required'),
			array('gender_id,  gid_number, title_id, logon_type_id, modified_flag, status_id, create_time, create_user_id, update_time, update_user_id', 'length', 'max'=>10),
			array('forename, surname, known_as, id_man, email, telephone, username, password', 'length', 'max'=>255),
			array('hash', 'length', 'max'=>40),
			array('uid_number', 'numerical', 'integerOnly'=>true),
			array('lang', 'length', 'max'=>8),
			array('dob', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, gender_id, uid_number, gid_number, title_id, logon_type_id, forename, surname, known_as, id_man, hash, email, telephone, username, password, lang, dob, modified_flag, status_id, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'diskOccupancies' => array(self::HAS_MANY, 'DiskOccupancy', 'user_id'),
			'researchGroups' => array(self::HAS_MANY, 'ResearchGroups', 'user_id'),
			'status' => array(self::BELONGS_TO, 'RefStatus', 'status_id'),
			'logonType' => array(self::BELONGS_TO, 'RefLogontype', 'logon_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'gender_id' => 'Gender',
			'uid_number' => 'Uid Number',
			'gid_number' => 'Gid Number',
			'title_id' => 'Title',
			'logon_type_id' => 'Logon Type',
			'forename' => 'Forename',
			'surname' => 'Surname',
			'known_as' => 'Known As',
			'id_man' => 'Id Man',
			'hash' => 'Hash',
			'email' => 'Email',
			'telephone' => 'Telephone',
			'username' => 'Username',
			'password' => 'Password',
			'lang' => 'Lang',
			'dob' => 'Dob',
			'modified_flag' => 'Modified Flag',
			'status_id' => 'Status',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
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
		$criteria->compare('gender_id',$this->gender_id,true);
		$criteria->compare('uid_number',$this->uid_number,true);
		$criteria->compare('gid_number',$this->gid_number,true);
		$criteria->compare('title_id',$this->title_id,true);
		$criteria->compare('logon_type_id',$this->logon_type_id,true);
		$criteria->compare('forename',$this->forename,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('known_as',$this->known_as,true);
		$criteria->compare('id_man',$this->id_man,true);
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('modified_flag',$this->modified_flag,true);
		$criteria->compare('status_id',$this->status_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
