<?php
/**
 * Created by PhpStorm.
 * User: Муза
 * Date: 04.05.15
 * Time: 19:59
 */

class CoursesWidget extends CWidget{

    public $limit = 6;
    public function run(){
        $criteria = new CDbCriteria();
//        $criteria->order = "id DESC";
        $criteria->limit = $this->limit;
        $courses = Courses::model()->findAll($criteria);
        $this->render('courses',array(
            'courses' => $courses,
        ));
    }

} 