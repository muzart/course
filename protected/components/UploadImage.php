<?php

Yii::import('application.helpers.simpleImage.*');
class UploadImage {
	const IMAGE_MAX_WIDTH = 800;
	const IMAGE_MAX_HEIGHT = 600;
	public static function run($path, $model, $fieldName = 'image_file'){
		if(!file_exists($path)) {
			@mkdir($path, 0777);
		}

		if($model->$fieldName = CUploadedFile::getInstance($model,$fieldName)) {

			if(!$model->isNewRecord) {
				self::deleteImage($model->image);
			}

			$fileName =  $path.rand(1001, 9999).'_'.self::getEntityName($model).'.'.$model->$fieldName->extensionName;
			$fileName = strtolower($fileName);
			//$model->$fieldName->saveAs($fileName);

			$image = new SimpleImage();
			$image->load($model->$fieldName->tempName);
			if($image->getWidth() > self::IMAGE_MAX_WIDTH) $image->resizeToWidth(self::IMAGE_MAX_WIDTH);
			if($image->getHeight() > self::IMAGE_MAX_HEIGHT) $image->resizeToHeight(self::IMAGE_MAX_HEIGHT);
			$image->save($fileName);

			return '/'.$fileName;
		}
		return false;
	}

	public static function deleteImage($image){
		if(substr($image, 0, 1) == '/')
			$image = substr($image, 1);
		@unlink($image);
	}

	public static function getEntityName($model){
	 	return strtolower(get_class($model));
	}
} 