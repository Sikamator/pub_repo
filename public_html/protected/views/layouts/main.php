<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="language" content="en"/>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css"/>

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
        'brand' => CHtml::encode(Yii::app()->name),
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
                        'label' => 'Вход',
                        'url' => array('/user/login'),
                        'visible' => Yii::app()->user->isGuest,
                        'htmlOptions' => array('id' => "top_login_button")
                    ),
                    array(
                        'label' => 'Регистрация',
                        'url' => array('/user/registration'),
                        'visible' => Yii::app()->user->isGuest,
                        'htmlOptions' => array('id' => "top_login_button")
                    ),
                    array(
                        'label' => 'Выход',
                        'url' => array('/user/logout'),
                        'visible' => Yii::app()->user->checkAccess('rights'),
                        'htmlOptions' => array('id' => "top_login_button")
                    ),
                ),
            ),
        ),
    )); ?>

    <?php
	$this->widget(
		'bootstrap.widgets.TbAlert', array(
		'htmlOptions' => array('id' => 'flash', 'class' => 'padfix'),
	));
	?>
	<?php
	Yii::app()->clientScript->registerScript(
		'myShowHideEffect',
		'$("#flash").slideDown("slow", function(){$("#flash").animate({opacity: 1.0}, 10000).fadeOut("slow");});',
		CClientScript::POS_READY
	);
	?>

	<?php $this->renderPartial('//site/_error'); ?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		&copy; <?php echo date('Y'); ?>
	</div>
	<!-- footer -->

</div>
<!-- page -->
</body>
</html>
