<div id="nerd-notes">
	<form>
		<input type="text" name="content" maxlength="255" placeholder="Write note and press enter">
	</form>
<?php if($notes) : ?>
<?php foreach($notes as $note) : ?>
	<div>
		<span data-id="<?php echo $note['id'] ?>"><a href="#">X</a></span>
		<p><?php echo date('m-d', $note->created_at) ?>: <?php echo $note['content'] ?></p>
		<hr>
	</div>
<?php endforeach ?>
<?php else : ?>
	<p>No notes</p>
<?php endif ?>
</div>

<script type="text/javascript">

$('#nerd-notes form').on('submit', function(event) {
	event.preventDefault()

	var input = $('#nerd-notes input').val()
	,	today = '<?php echo date('m-d') ?>'
	
	$.ajax({
		type: 'POST'
	,	url: '/n'
	,	data: { uri: CMS_URI, content: input }
	,	complete: function(result) {
			if(result.success) {
				var node = $('<div><span data-id="X"><a href="#">X</a></span><p></p><hr/></div>')
				
				$('span', node).data('id', result.id)
				$('p', node).html(today + ': ' + input)
				
				$('#nerd-notes form').val('').after(node)
				
				return
			}
			
			alert('Note could not be posted at this time.')
		}
	})
})

$('#nerd-notes').on('click', '[data-id]', function(event) {
	var note = $(this)
	,   id   = note.data('id')
	
	$.ajax({
		type: 'DELETE'
	,	url: '/n/' + id + '.json'
	,	complete: function(result) {
			$('span[data-id="' + id + '"]').parent().remove()
		}
	})
})

</script>