<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
<!--    <script type="text/javascript" src="/js/masonry.js"></script>-->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
</head>

<body>

<div class="container-fluid" id="page">
	<div class="row">
        <div class="col-sm-12">
		<?php $this->widget('application.widgets.Navbar')?>
        </div>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    <div class="row">
        <div class="col-sm-12">
        <?php echo $content; ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <div class="row">
        <div class="well well-lg text-center" id="footer">
            E-Hukumat &copy; <?php echo date('Y'); ?> TUIT UB.<br/>
            <?php echo Yii::powered(); ?>
        </div><!-- footer -->
    </div>
</div><!-- page -->

</body>
</html>
