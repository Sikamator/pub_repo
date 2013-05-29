<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body id="top" data-spy="scroll" data-target=".navbar">

<div class="container" id="page">
    <?php
    $menuItem = Yii::app()->getController()->id;
    if (isset($this->module)): $menuItem = $this->module->getName(); endif;

    $this->widget('bootstrap.widgets.TbNavbar', array(
        'type' => 'inverse',
        'fixed' => 'top',
        'collapse'=>true,
        //'fluid'=> true,
        'brand' => CHtml::encode(Yii::app()->name) . '&nbsp;<sup>&#946;</sup>',
        'brandUrl' => '/',
        'brandOptions' => array('id' => 'brand'),
        //'collapse' => true, // requires bootstrap-responsive.css

        'items' => array(

            array(
                'class' => 'bootstrap.widgets.TbMenu',
                //'htmlOptions' => array('class' => 'pull-right'),
                'encodeLabel'=>false,
                'items' => array(
                    array(
                        'label' => 'Пользователи',
                        'url' => array('/user'),
                        'visible' => Yii::app()->user->checkAccess('user'),

                    ),
                    array(
                        'label' => 'Права',
                        'url' => array('/rights'),
                        'visible' => Yii::app()->user->checkAccess('rights'),

                    ),
                    array(
                        'label' => 'Вход',
                        'url' => array('/user/login'),
                        'visible' => Yii::app()->user->isGuest,
                        'htmlOptions' => array('id' => "top_login_button")
                    ),
                ),
            ),
        ),
    )); ?>

    <?php
    $this->widget(
        'bootstrap.widgets.TbAlert', array(
        'htmlOptions' => array('id' => 'flash','class'=>'padfix'),
    ));
    ?>
    <?php
    Yii::app()->clientScript->registerScript(
        'myShowHideEffect',
        '$("#flash").slideDown("slow", function(){$("#flash").animate({opacity: 1.0}, 10000).fadeOut("slow");});',
        CClientScript::POS_READY
    );
    ?>

    <?php
    /*
     *     Yii::app()->clientScript->registerScript('form',
    '$("#flash").slideDown("slow", function(){$("#flash");'
    );
    */?>

    <?php //$this->renderPartial('//site/_error'); ?>
</div><!-- mainmenu -->
<?php if(isset($this->breadcrumbs)):?>
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
<?php endif?>

<?php echo $content; ?>

<div class="clear"></div>

<div id="footer">
    Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
    All Rights Reserved.<br/>
    <?php echo Yii::powered(); ?>
</div><!-- footer -->

</div><!-- page -->

</body>
</html>
