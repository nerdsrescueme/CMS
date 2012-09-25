<?php echo Form::open(array('class' => 'form-horizontal')); ?>
<?php echo Form::hidden('site_id', Input::post('site_id', isset($page) ? $page->site_id : '1'), array('class' => 'span6')); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Title', 'title', array('class' => 'control-label')); ?> 
			<div class="controls">
				<?php echo Form::input('title', Input::post('title', isset($page) ? $page->title : ''), array('class' => 'span6')); ?> 
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Subtitle', 'subtitle', array('class' => 'control-label')); ?> 
			<div class="controls">
				<?php echo Form::input('subtitle', Input::post('subtitle', isset($page) ? $page->subtitle : ''), array('class' => 'span6')); ?> 
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Uri', 'uri', array('class' => 'control-label')); ?> 
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">/</span><?php echo Form::input('uri', Input::post('uri', isset($page) ? $page->uri : ''), array('class' => 'span6')); ?> 
				</div>
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Keywords', 'keywords', array('class' => 'control-label')); ?> 
			<div class="controls">
				<?php echo Form::input('keywords', Input::post('keywords', isset($page) ? $page->keywords : ''), array('class' => 'span6')); ?> 
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Description', 'description', array('class' => 'control-label')); ?> 
			<div class="controls">
				<?php echo Form::textarea('description', Input::post('description', isset($page) ? $page->description : ''), array('class' => 'span7', 'rows' => 8)); ?>
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Layout id', 'layout_id', array('class' => 'control-label')); ?> 
			<div class="controls">
				<?php echo Form::select('layout_id', isset($page) ? $page->layout_id : 'none', Theme::forge()->active('tbp')->layouts(true)) ?> 
			</div>
		</div>
		
		<div class="control-group">
			<?php echo Form::label('Priority', 'priority', array('class' => 'control-label')); ?> 
			<div class="controls">
				<?php echo Form::select('priority', isset($page) ? $page->priority : 5, range(0,10)); ?> 
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Change Frequency', 'changes', array('class' => 'control-label')); ?> 
			<div class="controls">
				<?php echo Form::select('changes', isset($page) ? $page->changes : 4, array(
					1 => 'Always', 2 => 'Hourly', 3 => 'Daily', 4 => 'Weekly', 5 => 'Monthly', 6 => 'Yearly', 7 => 'Never'
				)); ?> 
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Hidden', 'hidden', array('class' => 'control-label')); ?> 
			<div class="controls">
				<?php echo Form::select('hidden', isset($page) ? $page->hidden : 2, array(
					1 => 'Completely', 2 => 'No', 3 => 'From Sitemap')
				); ?> 
			</div>
		</div>
		
		<div class="controls">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
			<?php echo Html::anchor('/pages', 'Cancel', array('class' => 'btn btn-danger')) ?> 
		</div>
	</fieldset>
<?php echo Form::close(); ?>