<?php

class OrganisationsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
                'actions'=>array('index','view','create','update','admin','delete','newuser'),
                'roles'=>array('administrator'),
            ),
            array('allow',
                'actions'=>array('getOrgs'),
                'users'=>array('*'),
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
        $courses = Courses::model()->findAll();
        $usersDataProvider=new CActiveDataProvider('Users', array(
            'criteria'=>array(
                'condition'=>'t.org_id = '.$id." AND t.role <> 'administrator'",
                'order'=>'surname DESC',
                'with'=>array('marks'),
            ),
            'countCriteria'=>array(
                'condition'=>'org_id = '.$id,
                // 'order' and 'with' clauses have no meaning for the count query
            ),
            'pagination'=>array(
                'pageSize'=>20,
            ),
        ));
        $this->render('view',array(
            'model'=>$this->loadModel($id),
            'courses'=>$courses,
            'dataProvider'=>$usersDataProvider
        ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Organisations;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Organisations']))
		{
			$model->attributes=$_POST['Organisations'];
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

		if(isset($_POST['Organisations']))
		{
			$model->attributes=$_POST['Organisations'];
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
		$dataProvider=new CActiveDataProvider('Organisations');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Organisations('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Organisations']))
			$model->attributes=$_GET['Organisations'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Organisations the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Organisations::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Organisations $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='organisations-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionGetOrgs(){
        $data=Organisations::model()->findAll('region_id=:region_id',
            array(':region_id'=>(int) $_POST["Users"]['region_id']));
        $data=CHtml::listData($data,'id','name');
        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option',
                array('value'=>$value),CHtml::encode($name),true);
        }
    }

    public function actionNewuser($org_id){
        $model = new Users;

        $organisation = Organisations::model()->findByPk(intval($org_id));
        if($organisation !== null)
            $model->region_id = $organisation->region->id;
        $model->org_id = intval($org_id);

        if(isset($_POST['Users']))
        {
            $model->attributes=$_POST['Users'];
            if($model->save())
                $this->redirect(array('view','id'=>$org_id));
        }

        $this->render('newuser',array(
            'model' => $model,
            'organisation'=>$organisation
        ));
    }
}
