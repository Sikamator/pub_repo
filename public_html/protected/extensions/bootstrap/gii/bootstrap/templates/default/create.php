<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Create',
);\n";
?>

$this->menu=array(
	array('label'=>'Список <?php echo $this->modelClass; ?>','url'=>array('index'), 'icon' => 'icon-th-list'),
	array('label'=>'Управление <?php echo $this->modelClass; ?>','url'=>array('admin'), 'icon' => 'icon-th'),
);
?>

<h1>Создание <?php echo $this->modelClass; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
