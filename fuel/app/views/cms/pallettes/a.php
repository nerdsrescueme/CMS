<?php echo Form::open(array('action' => '#', 'class' => 'well')) ?>
<?php echo Form::hidden('command', 'link') ?>
	<div class="control-group">
		<label for="form_href" class="control-label">Href</label>
		<div class="controls">
			<?php echo Form::input('href') ?>
		</div>
	</div>
	<div class="control-group">
		<label for="form_rel" class="control-label">Rel</label>
		<div class="controls">
			<?php echo Form::select('rel', 0, array(
				0 => 'None',
				'alternate'	=> 'Alternate version of the document',
				'stylesheet' => 'External style sheet ',
				'start' => 'First document in a selection',
				'next' => 'Next document in a selection',
				'prev' => 'Previous document in a selection',
				'contents' => 'Table of contents',
				'index' => 'Document index',
				'glossary' => 'Glossary (explanation of words)',
				'copyright' => 'Copyright information',
				'chapter' => 'Chapter',
				'section' => 'Section',
				'subsection' => 'Subsection',
				'appendix' => 'Appendix',
				'help' => 'Help document',
				'bookmark' => 'Related document',
				'nofollow' => 'No-follow (do not spider)',
				'license' => 'Link to copyright information',
				'tag' => 'Tag (keyword)',
				'friend' => 'Person relevant to this document',
			)) ?>
		</div>
	</div>
	<div class="control-group">
		<label for="form_class" class="control-label">Class</label>
		<div class="controls">
			<?php echo Form::input('class') ?>
		</div>
	</div>
	<div class="control-group">
		<label for="form_target" class="control-label">Target</label>
		<div class="controls">
			<?php echo Form::select('target', 0, array(
				0 => 'Normal',
				'_blank' => 'New window',
				'_top' => 'Top level window',
			)) ?>
		</div>
	</div>
<?php echo Form::close() ?>
