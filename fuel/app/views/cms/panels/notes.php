<div class="mercury-notes-panel">

	<form class="mercury-note-form">
		<input type="text" name="content" maxlength="255" placeholder="Write note and press enter">
	</form>
<?php if($notes) : ?>
<?php foreach($notes as $note) : ?>
	<div>
		<span class="mercury-note-delete" data-id="<?php echo $note['id'] ?>"><a href="#">X</a></span>
		<p><?php echo date('m-d', $note->created_at) ?>: <?php echo $note['content'] ?></p>
		<hr>
	</div>
<?php endforeach ?>
<?php else : ?>
	<p class="mercury-notes-none">No notes</p>
<?php endif ?>
</div>