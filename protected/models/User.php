<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $title
 * @property integer $state
 *
 * The followings are the available model relations:
 * @property RStudent[] $rStudents
 * @property RTeacher[] $rTeachers
 * @property TblScore[] $tblScores
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email,title', 'required'),
			array('email', 'email'),
			array('state', 'numerical', 'integerOnly'=>true),
			array('username, password, email', 'length', 'max'=>128),
			array('title', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email, title, state', 'safe', 'on'=>'search'),
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
			'rStudents' => array(self::HAS_MANY, 'RStudent', 'course_id'),
			'courses_teach'=>array(self::MANY_MANY, 'Course','r_teacher(user_id, course_id)'),
			'courses_student'=>array(self::MANY_MANY, 'Course','r_student(user_id, course_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'title' => 'Title',
			'state' => 'State',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('state',$this->state);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function isAdmin(){
		return ($this->superuser==1);
	}
	
	/**
	 * @return User 
	 */
	public static function CurrentUser(){
		return User::model()->findByAttributes(array('username'=>Yii::app()->user->ID));
	}
}