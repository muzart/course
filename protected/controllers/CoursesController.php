<?php

class CoursesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    public $defaultAction = 'admin';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','admin','delete','attend','setmarks','sertificate'),
				'roles'=>array('administrator'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $marks = Marks::model()->findAll("course_id=".$id);
        $marks = CHtml::listData($marks,'user_id','mark');
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'marks'=>$marks,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Courses;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Courses']))
		{
			$model->attributes=$_POST['Courses'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Courses']))
		{
			$model->attributes=$_POST['Courses'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Courses');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Courses('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Courses']))
			$model->attributes=$_GET['Courses'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Courses the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Courses::model()->with('students')->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Courses $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='courses-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionAttend(){
     if(Yii::app()->request->isPostRequest){
         $course_id = $_POST["course"];
         $org_id = $_POST["org"];
         $course = Courses::model()->findByPk($course_id);
         $org = Organisations::model()->with('workers')->findByPk($org_id);
         $users = $org->workers;
//         var_dump($_POST,$users);exit;
         $sql = "INSERT INTO courses_users(course_id, user_id) VALUES(:course_id,:user_id)";
         $connection = Yii::app()->db;
         $command = $connection->createCommand($sql);
         foreach($users as $user){
             $user_id = $user->id;
             $command->bindParam(":course_id",$course_id,PDO::PARAM_INT);
             $command->bindParam(":user_id",$user_id,PDO::PARAM_INT);
             $command->execute();
         }
         Yii::app()->user->setFlash('message','Tashkilot xodimlari tanlangan kursga qo\'shildi!');
         $this->redirect($_SERVER['HTTP_REFERER']);
     }
        else{
            throw new CHttpException(404,'Bunday sahifa mavjud emas!');
        }
//        $this->render('attend');
    }

    public function actionSetmarks($course){
        $course_id = intval($course);
        if(Yii::app()->request->isPostRequest){
            $marks = $_POST["marks"];
//            var_dump($marks);exit;
            foreach($marks as $mark){
                if($mark == "") continue;
                if(!is_numeric($mark) or $mark>100 or $mark<0){
                    throw new CHttpException(403,'Baholardan bir yoki bir nechtasi noto\'g\'ri kiritildi! Iltimos, tekshirib qaytadan kiriting!');
                }
            }
            foreach($marks as $user_id=>$mark){
                $marks = new Marks;
                $marks->user_id = $user_id;
                $marks->course_id = $course_id;
                $marks->mark = $mark;
                $marks->save();
            }
            $this->redirect(Yii::app()->createUrl('courses/view',array('id'=>$course_id)));
        }
        $course = $this->loadModel($course_id);
        $criteria = new CDbCriteria;
        $criteria->addCondition('course_id='.$course_id);
        $criteria->order = 'id';
        $markss = Marks::model()->findAll($criteria);
        $keys = CHtml::listData($markss,'id','user_id');
        $marked = CHtml::listData($markss,'user_id','mark');
        if($course !== null){
            $users = $course->students;
            $this->render('setmarks',array(
                'course'=>$course,
                'students'=>$users,
                'marked'=>$marked,
                'marked2'=>array(),
                'keys'=>$keys,
            ));
        }
        else{
            throw new CHttpException(403,'Bunday kurs mavjud emas!');
        }
    }

    public function actionSertificate($course){
        $course_id = intval($course);
        $course = $this->loadModel($course_id);

        $criteria = new CDbCriteria;
        $criteria->addCondition('course_id='.$course_id);
        $criteria->order = 'id';
        $markss = Marks::model()->findAll($criteria);

        $keys = CHtml::listData($markss,'id','user_id');
        $marked = CHtml::listData($markss,'user_id','mark');

        $users = $course->students;
        if(count($course->sertificates) != count($markss))
            foreach($users as $user){
                if(isset($marked[$user->id]) && $marked[$user->id]>=70){
                    $sert_number = 10761000 + $user->id;
                    $sertificate = new Sertificate();
                    $sertificate->sertificate_number = $sert_number;
                    $sertificate->user_id = $user->id;
                    $sertificate->course_id = $course_id;
                    $sertificate->given_date = date('d/m/Y',time());
                    $sertificate->save();
                }
            }
        $sertificates = Sertificate::model()->findAll($criteria);
        $sertificates = CHtml::listData($sertificates,'user_id','sertificate_number');
        $this->render('sertificate',array(
            'students'=>$users,
            'course'=>$course,
            'keys'=>$keys,
            'marked'=>$marked,
            'sertificates'=>$sertificates
        ));
    }
}