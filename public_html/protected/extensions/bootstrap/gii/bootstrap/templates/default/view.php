<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'Список <?php echo $this->modelClass; ?>','url'=>array('index'), 'icon' => 'icon-th-list'),
	array('label'=>'Создать <?php echo $this->modelClass; ?>','url'=>array('create'), 'icon' => 'plus'),
	array('label'=>'Обновить <?php echo $this->modelClass; ?>','url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>), 'icon' => 'icon-pencil'),
	array('label'=>'Удалить <?php echo $this->modelClass; ?>','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Вы точно хотите удалить этот элемент?'),'icon' => 'icon-remove'),
	array('label'=>'Управление <?php echo $this->modelClass; ?>','url'=>array('admin'), 'icon' => 'icon-th'),
);
?>

<h1>Просмотр <?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
