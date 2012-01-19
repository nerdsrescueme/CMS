<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Host', 'host'); ?>

			<div class="input">
				<?php echo Form::input('host', Input::post('host', isset($site) ? $site->host : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Theme', 'theme'); ?>

			<div class="input">
				<?php echo Form::input('theme', Input::post('theme', isset($site) ? $site->theme : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>