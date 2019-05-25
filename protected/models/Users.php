<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $midname
 * @property string $inn
 * @property integer $region_id
 * @property string $address
 * @property string $phone
 * @property string $image
 * @property integer $org_id
 * @property string $post
 * @property string $created
 * @property string $login
 * @property string $password
 * @property string $activ_hash
 * @property integer $is_active
 * @property string $role
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    const IMAGE_FOLDER = 'images/';
    public $image_file;
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, surname, inn, region_id, org_id, post', 'required'),
			array('region_id, org_id, is_active', 'numerical', 'integerOnly'=>true),
			array('name, surname, midname, phone, post, login, password, activ_hash', 'length', 'max'=>50),
			array('inn', 'length', 'max'=>9),
            array('image_file','file', 'types'=>'jpg, gif, png','allowEmpty' => true),
			array('address, image', 'length', 'max'=>100),
			array('created, role', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, surname, midname, inn, region_id, address, phone, image, org_id, post, created, login, password, activ_hash, is_active, role', 'safe', 'on'=>'search'),
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
		    'region'=>array(self::BELONGS_TO,'Regions','region_id'),
		    'org'=>array(self::BELONGS_TO,'Organisations','org_id'),
            'courses' => array(self::MANY_MANY, 'Courses','courses_users(user_id,course_id)'),
            'marks' => array(self::HAS_MANY, 'Marks', 'user_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Ism',
			'surname' => 'Familiya',
			'midname' => 'Sharif',
			'inn' => 'INN',
			'region_id' => 'Viloyat',
			'address' => 'Manzil',
			'phone' => 'Telefon',
			'image' => 'Rasm',
			'org_id' => 'Tashkilot',
			'post' => 'Lavozim',
			'created' => 'Yaratilgan vaqti',
			'login' => 'Login',
			'password' => 'Parol',
			'activ_hash' => 'Aktivatsiya xeshi',
			'is_active' => 'Aktiv',
			'role' => 'Rol',
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
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('midname',$this->midname,true);
		$criteria->compare('inn',$this->inn,true);
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('image',$this->image,true);
//        $criteria->with='org';
		$criteria->compare('org_id',$this->org_id);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('activ_hash',$this->activ_hash,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('role',$this->role,true);
        $criteria->addCondition("role <> 'administrator'");
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function bigCriteria(){
        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('surname',$this->surname,true);
        $criteria->compare('midname',$this->midname,true);
        $criteria->compare('inn',$this->inn,true);
        $criteria->compare('region_id',$this->region_id);
//        $criteria->compare('address',$this->address,true);
//        $criteria->compare('phone',$this->phone,true);
        $criteria->compare('image',$this->image,true);
        $criteria->with=array('org','region','courses','marks');
//        $criteria->compare('courses.name',$this->courses->name,true);
        $criteria->join .= ' LEFT JOIN regions AS rs ON t.region_id = rs.Id';
        $criteria->compare('org_id',$this->org_id);
        $criteria->compare('post',$this->post,true);
        $criteria->compare('created',$this->created,true);
        $criteria->addCondition("role <> 'administrator'");
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getFullName(){
        return $this->surname." ".$this->name." ".$this->midname;
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
        $this->created = time();
        $this->password = md5($this->password);
        return true;
    }
}
