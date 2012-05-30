<?php

class UserController extends Controller
{
	public $layout='//layouts/column2';
	
	public function actionIndex()
	{
		$courses_teach=User::CurrentUser()->courses_teach;
		$courses_student=User::CurrentUser()->courses_student;
		$this->render('index',array(
					'courses_teach'=>$courses_teach,
					'courses_student'=>$courses_student,
					));
	}

	public function actionRegister()
	{
		
		$user=new User;
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
			echo CActiveForm::validate($user);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['User']))
		{
			$user->attributes=$_POST['User'];
			$user->password=md5($_POST['User']['password']);
			// validate user input and redirect to the previous page if valid
			if($user->validate()){
				$user->save();
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		
		$this->render('register',array(
			'model'=>$user,
		));
	}

	public function filters()
	{
		return array(
				'accessControl',
		);
	}
	
	public function accessRules()
	{
		return array(
			array('deny',
					'actions'=>array('index'),
					'users'=>array('?'),
			),
		);
	}
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}*/
	/*
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}