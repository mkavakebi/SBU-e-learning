<?php

/**
 * This is the model class for table "courses".
 *
 * The followings are the available columns in table 'courses':
 * @property integer $ID
 * @property string $title
 * @property string $description
 * @property string $createtimestamp
 *
 * The followings are the available model relations:
 * @property Chapters[] $chapters
 * @property RStudent[] $rStudents
 * @property RTeacher[] $rTeachers
 */
class Course extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'courses';
	}
	
	public function AmIStudent(){
		
	}
	
	public function getDescription($maxlen=20){
		if(strlen($this->description)<=$maxlen OR $maxlen<=0)
			return $this->description;
		else
			return mb_substr( $this->description,0,$maxlen,'utf-8').'...';
	}
	
	public function TeachersName(){
		$teac=$this->teachers;
		$p=array();
		foreach ($teac as $t)
			$p[]=$t->title;
		
		return implode(',',$p);
	}
	
	public function UserCount(){
		return count($this->students);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'length', 'max'=>120),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, title, description', 'safe', 'on'=>'search'),
		);
	}

	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord){
				$this->createtimestamp=new CDbExpression('NOW()');
			}
			return true;
		}
		else
			return false;
	}
	
	
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'chapters' => array(self::HAS_MANY, 'Chapters', 'course_id'),
			'teachers'=>array(self::MANY_MANY, 'User','r_teacher(course_id, user_id)'),
			'students'=>array(self::MANY_MANY, 'User','r_student(course_id, user_id)'),
				
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'createtimestamp' => 'Createtimestamp',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('createtimestamp',$this->createtimestamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}