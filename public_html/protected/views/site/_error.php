<?php
if ($flashes = Yii::app()->user->getFlashes()) {
	foreach ($flashes as $key => $message) {
		if ($key != 'counters') {
			$this->beginWidget('bootstrap.widgets.TbModal', array(
				'id' => $key,
				'options' => array(
					'show' => 'blind',
					'hide' => 'explode',
					'modal' => 'true',
					'title' => $message['title'],
					'autoOpen' => true,
				),
			));

			echo '<div class="modal-body">';
			printf('<span class="dialog">%s</span>', $message['content']);
			echo '</div>';

			$this->endWidget();
		}
	}
}
?>