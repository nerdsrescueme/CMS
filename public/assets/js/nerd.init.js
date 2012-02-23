var nopts = {
	style:  'assets/css/nerd.css',
	script: 'assets/js/nerd.js',
	start:  false
};

var Nerd = {
	buttons: [
		
		['Save', 'save', 'file'],
		['Print', 'print', 'print'],
		[],
		['Undo', 'undo', 'chevron-left'],
		['Redo', 'redo', 'chevron-right'], // Need to create
		[],
		['Cut', 'cut', 'minus-sign'],
		['Copy', 'copy', 'remove-sign'],
		['Paste', 'paste', 'ok-sign'],
		[],
		['Bold', 'bold', 'bold'],
		['Italic', 'italic', 'italic'],
		['Underline', 'underline', 'text-width'],
		['Strike', 'strike', 'font'],
		['Superscript', 'sup', 'font'],
		['Subscript', 'sub', 'font'],
		[],
		['Insert Bookmark', 'anchor', 'bookmark'],
		//['Unbookmark', 'clearanchor', 's-bookmark-1'],
		['Link', 'link', 'share'],
		['Unlink', 'clearlink', 'share'],
		[],
		['Image', 'image', 'picture'],
		['Insert Horizontal Rule', 'hr', 'resize-horizontal'],
		[],
		['Ordered List', 'ol', 'list'],
		['Unordered List', 'ul', 'list'],
		['Increase Indent', 'indent', 'indent-left'],
		['Decrease Indent', 'outdent', 'indent-right'],
		[],
		['Justify Left', 'justifyleft', 'align-left'],
		['Justify Center', 'justifycenter', 'align-center'],
		['Justify Right', 'justifyright', 'align-right'],
		[],
		['Format Block', 'block', 'list-alt'],
		['View HTML Source', 'source', 'fire'], // Need to create
		['Clear Formatting', 'clearformat', 'remove']
	],
	handlers: {
		save: function() {
			Nerd.Editor.edited(false);
			alert('saving');
		}
	},
	html: {
		tags: ['i', 'em', 'b', 'strong', 'u'],
		attributes: {}
	}
};

var body = document.body;
var head = document.getElementsByTagName('head')[0];

function loadNerd() {
	if(document.nerdLoaded) return;
	document.nerdLoaded = true;

	// Load nerd stylesheet
	var style      = document.createElement('link');
	    style.href = nopts.style;
	    style.rel  = 'stylesheet';
	    style.type = 'text/css';
	head.appendChild(style);

	// Load nerd javascript
	var script        = document.createElement('script');
	    script.src    = nopts.script;
	    script.type   = 'text/javascript';
	    script.onload = function() {
	    	window.Nerd.trigger('editor:initialize');
	    }
	head.appendChild(script);
}

$(document).ready(function() {
	if($.browser.webkit) {
		loadNerd();
	} else {
		alert("The Nerd Editor only works on Chrome and Safari right now.");
	}
});