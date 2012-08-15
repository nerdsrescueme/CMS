<?php echo Form::open(array('action' => '#', 'class' => 'well')) ?>
<?php echo Form::hidden('command', 'image') ?>
	<div class="control-group">
		<label for="form_src" class="control-label">Source</label>
		<div class="controls">
			<?php echo Form::input('src') ?>
		</div>
	</div>
	<div class="control-group">
		<label for="form_class" class="control-label">Class</label>
		<div class="controls">
			<?php echo Form::input('class') ?>
		</div>
	</div>
<?php echo Form::close() ?>
