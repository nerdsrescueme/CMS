(function(window, $) {

//  Built-in object extensions
// ------------------------------------------------------------------------

	String.prototype.despace = function() {
		return this.split(' ').join('');
	}

	String.prototype.untitleize = function() {
		return this.charAt(0).toLowerCase() + this.slice(1);
	}

	String.prototype.titleize = function() {
		return this.charAt(0).toUpperCase() + this.slice(1);
	}

	Array.prototype.contains = function(obj) {
		var i = this.length;
		while(i--) {
			if(this[i] === obj) return true;
		}
		return false;
	}


//  jQuery Extensions (Can be extended to support more browsers?)
// ------------------------------------------------------------------------

	$.extend($, { sanitize: function(node) {
		var tags  = Nerd.html.tags,
		    attrs = Nerd.html.attributes;
	
		$(node).children().each(function(i, child) {
		
			$.sanitize(child);

			var tag = child.localName.toLowerCase();
			
			if ($.inArray(tag, tags) < 0) {
				$(child).contents().each(function(j, content) {
					$(content).remove().insertBefore(child);
				});
				$(child).remove();
			} else {
				$.each(child.attributes, function() {
					var attr = this.localName;
					
					if ($.inArray(attr, attrs[tag]) < 0) {
						child.removeAttribute(attr);
					}
				});
			}
		});
		
		return $(node).html();
	}});

	$.extend($, { selection: function() {
		return Frame.document.getSelection();
	}});

	$.extend($, { range: function() {
		return $.selection().getRangeAt(0);
	}});


//  Let's build Nerd!
// ------------------------------------------------------------------------

	$.extend(window.Nerd, {
		regions: [],
		Commands: {},
		Frame: {},
		Editor: {},
		Modal: {}
	});

	var Editor   = Nerd.Editor,
	    Frame    = Nerd.Frame,
	    Commands = Nerd.Commands;
	    Modal    = Nerd.Modal;


	Nerd.trigger = function(action, opts) {
		try {
			this[action](opts);
		}
		catch(err) {
			var pieces = action.split(':');
			this[pieces[0].titleize()][pieces[1]](opts);
		}
	}


//  Editor
// ------------------------------------------------------------------------

	Editor.has_changes = false;
	Editor.is_activated = false;

	Editor.activate = function() {
		this.style = $('<style>')
		    .text('[contenteditable="true"] { box-shadow: 0 0 8px lightblue; }')
		    .appendTo(Frame.head);
		Editor.toolbar.slideDown();
		Nerd.regions.attr('contentEditable', 'true');
		Editor.is_activated = true;
	}

	Editor.deactivate = function() {
		this.style.remove();
		Editor.toolbar.slideDown();
		Nerd.regions.attr('contentEditable', 'false');
		this.hide();
		Editor.is_activated = false;
	}

	Editor.hide = function() {
		Editor.toolbar.slideUp()
	}

	Editor.show = function() {
		Editor.toolbar.slideDown()
	}

	Editor.edit_state = false;

	Editor.edited = function(edited) {
		if (typeof(edited) != 'undefined') {
			Editor.edit_state = edited
		}
		return Editor.edit_state;
	}

	Editor.initialize = function() {

		var data     = $('body').html(),
		    hdata    = $('head').html(),
		    body     = $('body').html('<div id="nerd-toolbar"><div id="nerd-buttons">'),
		    toolbar  = $('#nerd-toolbar'),
		    buttons  = $('#nerd-buttons'),
		    btnhtml  = '',
		    frame    = $('<iframe src="about:blank" id="nerd-frame">').appendTo(body),
		    body     = frame.contents().find('body').html(data),
		    head     = frame.contents().find('head').html(hdata),
		    document = frame[0].contentDocument,
		    btns     = Nerd.buttons,
		    btnlen   = btns.length,
		    keys     = [1,13,37,38,39,40]; // Keys that change selection

		// Add activation trigger
		$('<div id="nerd-trigger"><i class="icon icon-white icon-edit"></i></div>').appendTo('body').click(function (e) {
			if (Editor.is_activated) {
				$(this).html('<i class="icon icon-white icon-edit"></i>');
				return Editor.deactivate()
			}
			
			$(this).html('<i class="icon icon-white icon-check"></i>');
			return Editor.activate();
		});

		// Make all links target top window
		$('a', body).attr('target', '_top').click(function (e) {
			if (Editor.is_activated) return false;
			if (Editor.edited()) {
				return confirm('Are you sure you want to leave this page? You will lose any unsaved changes.');
			}
		});

		// Make Toolbar
		toolbar.on('click', '[data-function]', function(e) {
			return false;
		});

		// Make Buttons
		for (var i=0; i < btnlen; i++) {
			btnhtml += (btns[i].length === 0)
			  ? '<span> </span>'
			  : '<a href="#" title="' + btns[i][0] + '" class="icon-' + btns[i][2] + ' icon-white" data-function="' + btns[i][1].despace().untitleize() + '"></a>';
		}
		buttons.append(btnhtml).on('click', '[data-function]', function(e) {
			e.preventDefault();
			Commands[($(this).data('function'))]();
			Editor.focused && Editor.focused.focus();
		});

		// Button tooltips
		$('[title]', buttons).tooltip({ placement: 'bottom', delay: 500 });

		// Expose local objects to global Nerd object
		Nerd.regions    = body.find('[data-editable]');
		Editor.buttons  = buttons;
		Editor.document = document;
		Editor.toolbar  = toolbar;
		Frame.instance  = frame;
		Frame.body      = body;
		Frame.document  = document;
		Frame.head      = head;

		// Custom paste handling
		$(Frame.document).bind('paste', function (e) {
			e.preventDefault();

			var clipboard = e.originalEvent.clipboardData,
			    data = $('<div>').html(clipboard.getData('text/html')),
			    data = $.sanitize(data);

			Commands.exec('insertHTML', false, data);
		});

		// Keypress events
		Nerd.regions.on('keydown mouseup', function(e) {
			var key = e.which;

			Editor.edited(true);

			// On Click
			if(key === 1) {
				Editor.focused = this;
			}

			if(keys.contains(key)) {
				Editor.selection = $.selection();
			}
		});

		Nerd.Editor   = this;
		Nerd.Frame    = Frame;
		Nerd.Commands = Commands;
		Nerd.Modal    = Modal;

		//this.activate();
	}


//  Modal Dialog
// ------------------------------------------------------------------------
	Modal.initialize = function() {
		return Nerd.Frame.body.find('#nerd-modal').modal();
	}

	Modal.show = function() {
		Nerd.Frame.body.find('#nerd-modal').modal('show');
	}

	Modal.hide = function() {
		Nerd.Frame.body.find('#nerd-modal').modal('hide');
	}


//  Pre-defined Commands
// ------------------------------------------------------------------------

	Commands = {
		exec: function(command, ui, value) {
			Frame.document.execCommand(command, ui, value);
			Commands.normalize();
		},
		normalize: function() {
			Editor.focused && Editor.focused.normalize();
		},
		wrap: function(node) {
			var range     = $.range(),
			    parent    = range.commonAncestorContainer,
			    container = range.commonAncestorContainer.parentNode;

			// Do nothing if we are already within a <nodeName> tag
			if(container.nodeName === node.nodeName) return;

			// Delete any <nodeName> tags within selection
			$(container).find(node.nodeName).each(function() {
				var that = $(this);
				that.replaceWith(that.html());
			});

			range.surroundContents(node);

			Commands.normalize();
		},
		anchor: function() {
			var anchor = prompt('What do we call it?');
			if (anchor === null) return;
			Commands.exec('createbookmark', false, anchor);
		},
		block: function() {
			var block = prompt('What kind of block?');
			if (block === null) return;
			Commands.exec('formatblock', false, block);
		},
		bold: function() {
			var node = Frame.document.createElement('strong');
			Commands.wrap(node);
		},
		clear: function() {
			Commands.exec('delete');
		},
		clearanchor: function() {
			Commands.exec('unbookmark');
		},
		clearformat: function() {
			Commands.exec('removeformat');
		},
		clearlink: function() {
			Commands.exec('unlink');
		},
		copy: function() {
			Commands.exec('copy');
		},
		cut: function() {
			Commands.exec('cut');
		},
		hr: function() {
			Commands.exec('inserthorizontalrule');
		},
		image: function() {
			var image = prompt('Where is the image?');
			if (image === null) return;
			Commands.exec('insertimage');
		},
		indent: function() {
			Commands.exec('indent');
		},
		italic: function() {
			var node = Frame.document.createElement('em');
			Commands.wrap(node);
		},
		justifyleft: function() {
			Commands.exec('justifyleft');
		},
		justifycenter: function() {
			Commands.exec('justifycenter');
		},
		justifyright: function() {
			Commands.exec('justifyright');
		},
		link: function() {
			var link = prompt('Where do we point the link to?');
			if (link === null) return;
			Commands.exec('createlink', false, link);
		},
		ol: function() {
			Commands.exec('insertorderedlist');
		},
		outdent: function() {
			Commands.exec('outdent');
		},
		paste: function() {
			Commands.exec('paste');
		},
		print: function() {
			Editor.deactivate();
			Commands.exec('print');
			setTimeout(Editor.activate, 1500);
		},
		source: function() {
			alert('Show HTML Source');
		},
		sub: function() {
			var node = Frame.document.createElement('sub');
			Commands.wrap(node);
		},
		sup: function() {
			var node = Frame.document.createElement('sup');
			Commands.wrap(node);
		},
		strike: function() {
			var node = Frame.document.createElement('del');
			Commands.wrap(node);
		},
		ul: function() {
			Commands.exec('insertunorderedlist');
		},
		underline: function() {
			var node = Frame.document.createElement('u');
			Commands.wrap(node);
		},
		undo: function() {
			Commands.exec('undo');
		}
	}

	// Attach custom handlers to Commands object, will overwrite...
	var handlers = Nerd.handlers;
	for (var handler in handlers) {
		Commands[handler] = handlers[handler];
	}

	return Nerd;

})(window, $); // end Nerd
