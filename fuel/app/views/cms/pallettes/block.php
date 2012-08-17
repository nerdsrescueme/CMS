<?php echo Form::open(array('action' => '#', 'class' => 'well')) ?>
<?php echo Form::hidden('command', 'block') ?>
	<div class="control-group">
		<label for="form_block" class="control-label">Block</label>
		<div class="controls">
			<?php echo Form::select('block', 0, array(
				0 => 'Do not change',
				'blockquote' => 'Blockquote',
				'div' => 'Div',
				'h1' => 'h1',
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
				'p' => 'p',
				'pre' => 'pre',
			)) ?>
		</div>
	</div>
	<!--<div class="control-group">
		<label for="form_class" class="control-label">Class</label>
		<div class="controls">
			<?php echo Form::input('class') ?>
		</div>
	</div>-->
<?php echo Form::close() ?>
