<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Identifier', 'identifier'); ?>
			<div class="input">
				<?php echo Form::input('identifier', Input::post('identifier', isset($link_group) ? $link_group->identifier : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>