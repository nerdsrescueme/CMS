<?php echo Form::open(array('action' => '#', 'class' => 'well')) ?>
<?php echo Form::hidden('command', 'video') ?>
	<div class="control-group">
		<label for="form_src" class="control-label">YouTube ID</label>
		<div class="controls">
			<?php echo Form::input('ytid') ?>
		</div>
	</div>
	<div class="control-group">
		<label for="form_alt" class="control-label">Width</label>
		<div class="controls">
			<?php echo Form::input('width') ?>
		</div>
	</div>
	<div class="control-group">
		<label for="form_class" class="control-label">Height</label>
		<div class="controls">
			<?php echo Form::input('height') ?>
		</div>
	</div>
<?php echo Form::close() ?>
