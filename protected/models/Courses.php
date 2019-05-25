<?php

/**
 * This is the model class for table "courses".
 *
 * The followings are the available columns in table 'courses':
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property string $begin_date
 * @property string $end_date
 * @property integer $max_students
 * @property integer $teacher_id
 * @property integer $is_active
 */
class Courses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    const IMAGE_FOLDER = 'images/';
    public $image_file;
	public function tableName()
	{
		return 'courses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, begin_date, end_date, teacher_id, is_active', 'required'),
			array('max_students, teacher_id, is_active', 'numerical', 'integerOnly'=>true),
			array('name, image', 'length', 'max'=>100),
            array('image_file','file', 'types'=>'jpg, gif, png','allowEmpty' => true),
			array('begin_date, end_date', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, image, description, begin_date, end_date, max_students, teacher_id, is_active', 'safe', 'on'=>'search'),
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
            'teacher' => array(self::BELONGS_TO, "Teachers", "teacher_id"),
            'sertificates' => array(self::HAS_MANY, "Sertificate", "course_id"),
            'students' => array(self::MANY_MANY, 'Users','courses_users(course_id, user_id)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nomlanishi',
			'image' => 'Rasm',
			'description' => 'Tavsifi',
			'begin_date' => 'Boshlanish sanasi',
			'end_date' => 'Tugallanish sanasi',
			'max_students' => 'Studentlar soni',
			'teacher_id' => 'O\'qituvchi',
			'is_active' => 'Aktiv',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('begin_date',$this->begin_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('max_students',$this->max_students);
		$criteria->compare('teacher_id',$this->teacher_id);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Courses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeDelete()
    {
        UploadImage::deleteImage($this->image);
        return parent::beforeDelete();
    }

    public function beforeSave(){
        if(parent::beforeSave()){
            if(!$this->isNewRecord){
                $file = UploadImage::run(self::IMAGE_FOLDER, $this);
                if( $file ) {
                    $this->image = $file;
                }
            }
            else{
                $file = UploadImage::run(self::IMAGE_FOLDER, $this);
                if( $file ) {
                    $this->image = $file;
                }
            }
        }
        return true;
    }
}
