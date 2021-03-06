var nopts = {
	style:  '/assets/css/nerd.css',
	script: '/assets/js/nerd.js',
	start:  false
};

var Nerd = {
	handlers: {
		save: function() {
			Nerd.Editor.edited(false);
			alert('saving');
		}
	},
	html: {
		tags: ['i', 'em', 'b', 'strong', 'u'],
		attributes: {}
	},
	elements: {
		p: ['class'],
		h1: ['class'],
		h2: ['class'],
		h3: ['class'],
		h4: ['class'],
		h5: ['class'],
		h6: ['class'],
		div: ['class'],
		blockquote: [],
		pre: [],
		code: [],
		strong: [],
		b: [],
		em: [],
		i: [],
		a: ['href', 'rel', 'class'],
		span: ['class', 'style'],
		img: ['src', 'class', 'alt']
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
	if($.browser.webkit || $.browser.chrome) {
		loadNerd();
	} else {
		alert("The Nerd Editor only works on Chrome and Safari right now.");
	}
});