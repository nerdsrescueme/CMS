<?php echo Form::open(array('action' => '#', 'class' => 'well')) ?>
<?php echo Form::hidden('command', 'source') ?>
	<div class="control-group">
		<div class="controls">
			<?php echo Form::textarea('source', null, array('class' => 'span6', 'rows' => 15)) ?>
		</div>
	</div>
<?php echo Form::close() ?>
