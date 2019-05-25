<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php if(!empty($this->menu)):?>
    <div class="col-lg-9 col-md-9 col-sm-12">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 last">
        <div id="sidebar" class="">
        <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Amallar',
                'htmlOptions'=>array('class'=>'text text-info')
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
        ?>
        </div><!-- sidebar -->
    </div>
<?php else:?>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
<?php endif;?>

<?php $this->endContent(); ?>