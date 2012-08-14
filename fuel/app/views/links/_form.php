<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Link group id', 'link_group_id'); ?>

			<div class="input">
				<?php echo Form::select('link_group_id', isset($link) ? $link->link_group_id : '', $groups) ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Parent id', 'parent_id'); ?>

			<div class="input">
				<?php echo Form::input('parent_id', Input::post('parent_id', isset($link) ? $link->parent_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($link) ? $link->title : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Subtitle', 'subtitle'); ?>

			<div class="input">
				<?php echo Form::input('subtitle', Input::post('subtitle', isset($link) ? $link->subtitle : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Url', 'url'); ?>

			<div class="input">
				<?php echo Form::input('url', Input::post('url', isset($link) ? $link->url : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Class', 'class'); ?>

			<div class="input">
				<?php echo Form::input('class', Input::post('class', isset($link) ? $link->class : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Target', 'target'); ?>

			<div class="input">
				<?php echo Form::select('target', isset($link) ? $link->target : '', Model_Link::get_targets()) ?>
			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>