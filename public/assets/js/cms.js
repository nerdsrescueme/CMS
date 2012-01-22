
if (top.Mercury) {
	window.Mercury = top.Mercury;
	Mercury.PageEditor.prototype.save = function() {
		var data = this.serialize();
		var lightview = Mercury.lightview(null, {title: 'Saving', closeButton: true});
		setTimeout(function() {
			var textarea = '<textarea style="width:100%;height:300px" wrap="off">' + top.JSON.stringify(data, null, '  ') + '</textarea>';
			lightview.loadContent('<div style="width:500px">Saving in the demo is disabled, but you can see what would be sent to the server below.' + textarea + '</div>');
		}, 500);
	}
}

var CMS = {

uri: null,
init: function(uri) {

	this.uri = uri;

	jQuery('.mercury-panel-pane').delegate('.mercury-note-delete', 'click', function(e) {
		var $clicked = jQuery(e.currentTarget);
	
		jQuery.ajax({
			type: 'DELETE',
			url: '/notes/note/' + $clicked.data('id'),
			success: function(data) {
				if(data.success) $clicked.parent().fadeOut(500, function() { $(this).remove() });
			},
			error: function(data) {
				alert('Unable to delete note at this time.');
			}
		});
	});
	
	jQuery('.mercury-panel-pane').delegate('.mercury-note-form', 'submit', function(e) {
		$content = $('.mercury-note-form input[name="content"]');
		$none    = $('.mercury-notes-none');
		jQuery.ajax({
			type: 'POST',
			url: '/notes/note',
			data: {uri: CMS.uri, content: $content.val()},
			success: function(data) {
				if(data.success) $('.mercury-notes-panel').append('<div><span class="mercury-note-delete" data-id="'+data.id+'"><a href="#">X</a></span><p>Just Now: '+$content.val()+'</p><hr/></div>');
				$content.val('');
				$none.remove();
			},
			error: function(data) {
				alert('Unable to save note at this time.');
			}
		});
		return false;
	});
}
};