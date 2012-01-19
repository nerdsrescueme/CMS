<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($page) ? $page->title : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Uri', 'uri'); ?>

			<div class="input">
				<?php echo Form::input('uri', Input::post('uri', isset($page) ? $page->url : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::textarea('description', Input::post('description', isset($page) ? $page->description : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Site id', 'site_id'); ?>

			<div class="input">
				<?php echo Form::input('site_id', Input::post('site_id', isset($page) ? $page->site_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Layout id', 'layout_id'); ?>

			<div class="input">
				<?php echo Form::input('layout_id', Input::post('layout_id', isset($page) ? $page->layout_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>