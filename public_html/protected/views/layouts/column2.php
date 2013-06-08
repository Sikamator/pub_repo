<?php $this->beginContent('//layouts/main'); ?>

    <div class="container-fluid padfix">
        <div class="row-fluid">
            <div class="span9">
                <div id="content">
                    <?php echo $content; ?>
                </div>
                <!-- content -->
            </div>
            <div class="span3">
                <div id="sidebar left">
                    <?php
                    if (isset($this->menu) && ($this->menu)):
                        $this->beginWidget('bootstrap.widgets.TbMenu', array(
                            'type' => 'list',
                            'items' => $this->menu,
                            'htmlOptions' => array(
                                'class' => 'operations well',
                                'style' => 'padding-top: 10px; padding-bottom: 10px;'),
                        ));
                        $this->endWidget();
                    endif
                    ?>
                </div>
                <!-- sidebar -->
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>