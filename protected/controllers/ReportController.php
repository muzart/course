<?php
/**
 * Created by PhpStorm.
 * User: Муза
 * Date: 11.05.15
 * Time: 21:47
 */

class ReportController extends CController{

    public $layout = "//layouts/column1";

    public function actionIndex(){
        $sql = 'SELECT DISTINCT T1.id AS MAIN_ID,T1.name AS Ism,T1.image AS Image, T1.inn AS INN,
                                T1.surname AS Familiya, T1.midname AS Sharif,
                                T4.name AS Region, T5.name AS Tashkilot,
                                T3.name AS title, T2.mark AS mark,CONCAT(T6.surname," ",T6.name) AS Teacher,
                                T3.begin_date AS begin_date, T3.end_date AS end_date,T7.sertificate_number AS Sertifikat
                FROM users T1
                INNER JOIN regions T4 ON T1.region_id=T4.id
                INNER JOIN organisations T5 ON T1.org_id=T5.id
                INNER JOIN marks T2 ON T1.id=T2.user_id
                INNER JOIN courses T3 ON T2.course_id=T3.id
                LEFT JOIN teachers T6 ON T3.teacher_id=T6.id
                LEFT JOIN sertificate T7 ON T1.id=T7.user_id';
//                INNER JOIN teachers T6 ON T3.teacher_id=T6.id';
        if(isset($_GET['filter'])){
            $form = $_GET['filter'];
            $surname = $form["surname"];
            $name = $form["name"];
            $course_id = $form["course"];
            $region_id = $form["region"];
            $begin_date = $form["begin_date"];
            $end_date = $form["end_date"];
            $org_id = $form["org"];
            $teacher_id = $form["teacher"];
            $reg = false; $org=false; $cour=false; $beg = false; $end = false; $nm=false; $srnm = false;
            if(trim($course_id) != "" or trim($region_id) != "" or trim($begin_date) != ""
                or trim($end_date) != "" or trim($org_id) != "" or trim($teacher_id) != ""
                or trim($name) != "" or trim($surname) != ""){
                $sql .= " WHERE ";
                if($region_id != ""){
                    $sql .= " T4.id=$region_id ";
                    $reg = true;
                }
                if($org_id != ""){
                    if($reg) $sql .= "AND";
                    $sql .= " T5.id=$org_id ";
                    $org = true;
                }
                if($course_id != ""){
                    if($reg or $org) $sql .= "AND";
                    $sql .= " T3.id=$course_id ";
                    $cour = true;
                }
                if($begin_date != ""){
                    if($reg or $org or $cour) $sql .= "AND";
                    $sql .= " T3.begin_date='$begin_date' ";
                    $beg = true;
                }
                if($end_date != ""){
                    if($reg or $org or $cour or $beg) $sql .= "AND";
                    $sql .= " T3.end_date='$end_date' ";
                    $end = true;
                }
                if($name != ""){
                    if($reg or $org or $cour or $beg or $end) $sql .= "AND";
                    $sql .= " T1.name LIKE '%$name%' ";
                    $nm = true;
                }
                if($surname != ""){
                    if($reg or $org or $cour or $beg or $end or $nm) $sql .= "AND";
                    $sql .= " T1.surname LIKE '%$surname%' ";
                    $srnm = true;
                }
                if($teacher_id != ""){
                    if($reg or $org or $cour or $beg or $end or $nm or $srnm) $sql .= "AND";
                    $sql .= " T6.id=$teacher_id ";
                }
            }

//            echo $sql; exit;
        }
        $rawData = Yii::app()->db->createCommand($sql); //or use ->queryAll(); in CArrayDataProvider
        $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar(); //the count


        $model = new CSqlDataProvider($rawData, array(
        //or $model=new CArrayDataProvider($rawData, array(... //using with querAll...
            'keyField' => 'MAIN_ID',
            'totalItemCount' => $count,

            //if the command above use PDO parameters
            //'params'=>array(
            //':param'=>$param,
            //),


            'sort' => array(
                'attributes' => array(
                    'MAIN_ID','title', 'Familiya','Ism','Sharif','Region','Tashkilot','INN',
                    'begin_date','end_date','mark','Sertifikat','Teacher'
                ),
                'defaultOrder' => array(
                    'MAIN_ID' => CSort::SORT_ASC, //default sort value
                ),
            ),
            'pagination' => false
        ));
        $organisations = array(''=>'')+Organisations::getAll();
        $regions = array(''=>'')+Regions::getAll();
        $courses = array(''=>'')+CHtml::listData(Courses::model()->findAll(),'id','name');
        $teachers = array(''=>'')+Teachers::getAll();
        $this->render('index',array(
            'model'=>$model,
            'organisations' => $organisations,
            'regions' => $regions,
            'courses' => $courses,
            'teachers' => $teachers,
        ));
    }
    public function actionReport(){
//        if(isset($_GET['filter'])){
//            $form = $_GET['filter'];
//            $surname = $form["surname"];
//            $name = $form["name"];
//            $course_id = $form["course"];
//            $region_id = $form["region"];
//            $begin_date = $form["begin_date"];
//            $end_date = $form["end_date"];
//            $org_id = $form["org"];
//            $teacher_id = $form["teacher"];
//
//            $criteria = new CDbCriteria;
//            $criteria->together = true;
//            $criteria->with = array('region','org','courses','mark');
//            $criteria->compare('t.surname',$surname,true);
//            $criteria->compare('t.name',$name,true);
//            $criteria->compare('t.region_id',$region_id);
//            $criteria->compare('t.org_id',$org_id);
//            $model = Users::model()->findAll($criteria);
//        }
//        $rawData = Yii::app()->db->createCommand($sql); //or use ->queryAll(); in CArrayDataProvider
//        $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar(); //the count
        $model=new Users('bigCriteria');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Users']))
            $model->attributes=$_GET['Users'];
        $organisations = array(''=>'')+Organisations::getAll();
        $regions = array(''=>'')+Regions::getAll();
        $courses = array(''=>'')+CHtml::listData(Courses::model()->findAll(),'id','name');
        $teachers = array(''=>'')+Teachers::getAll();
        $this->render('report',array(
            'model'=>$model,
            'organisations' => $organisations,
            'regions' => $regions,
            'courses' => $courses,
            'teachers' => $teachers,
        ));
    }

} 