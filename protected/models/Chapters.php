<?php

/**
 * This is the model class for table "chapters".
 *
 * The followings are the available columns in table 'chapters':
 * @property integer $ID
 * @property integer $course_id
 * @property string $title
 * @property string $description
 * @property string $createtimestamp
 *
 * The followings are the available model relations:
 * @property Courses $course
 * @property Sessions[] $sessions
 */
class Chapters extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Chapters the static model class
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
		return 'chapters';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>120),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, course_id, title, description, createtimestamp', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'sessions' => array(self::HAS_MANY, 'Sessions', 'chapter_id'),
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
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'course_id' => 'Course',
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
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('createtimestamp',$this->createtimestamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}