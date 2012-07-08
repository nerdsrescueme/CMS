(function(window, $) {

//  Built-in object extensions
// ------------------------------------------------------------------------

	String.prototype.despace = function() {
		return this.split(' ').join('')
	}

	String.prototype.untitleize = function() {
		return this.charAt(0).toLowerCase() + this.slice(1)
	}

	String.prototype.titleize = function() {
		return this.charAt(0).toUpperCase() + this.slice(1)
	}

	Array.prototype.contains = function(obj) {
		var i = this.length
		while(i--)
			if(this[i] === obj) return true

		return false;
	}


//  jQuery Extensions (Can be extended to support more browsers?)
// ------------------------------------------------------------------------

	$.extend($, { sanitize: function(node) {
		var tags  = Nerd.html.tags
		,   attrs = Nerd.html.attributes
	
		$(node).children().each(function(i, child) {

			$.sanitize(child)

			var tag = child.localName.toLowerCase()
			
			if ($.inArray(tag, tags) < 0) {
				$(child).contents().each(function(j, content) {
					$(content).remove().insertBefore(child)
				})
				$(child).remove()
			} else {
				$.each(child.attributes, function() {
					var attr = this.localName
					
					if ($.inArray(attr, attrs[tag]) < 0) child.removeAttribute(attr)
				});
			}
		});
		
		return $(node).html();
	}});

	$.extend($, { selection: function() {
		return Nerd.Frame.document.getSelection()
	}});

	$.extend($, { range: function() {
		return $.selection().getRangeAt(0)
	}});


//  Let's build Nerd!
// ------------------------------------------------------------------------

	$.extend(window.Nerd, {
		regions: []
	,	Commands: {}
	,	Frame: {}
	,	Editor: {}
	,	Modal: {}
	,	Panel: {}
	,	Pallette: {}
	});

	var Editor   = Nerd.Editor
	,   Frame    = Nerd.Frame
	,   Commands = Nerd.Commands
	,   Modal    = Nerd.Modal
	,   Panel    = Nerd.Panel
	,   Pallette = Nerd.Pallette


//  Nerd
// ------------------------------------------------------------------------

	Nerd.trigger = function(action, opts) {
		try {
			this[action](opts)
		}
		catch(err) {
			var pieces = action.split(':')
			this[pieces[0].titleize()][pieces[1]](opts)
		}
	}

	Nerd.save = function() {
		var save = { globals: {}, locals: {}}
		
		Nerd.regions.each(function() {
			var savable = $(this)
			,   current = save.locals
			
			if(savable.data('editable') == 'global') current = save.globals
			
			current[savable.attr('id')] = savable.html()
		})
		
		console.log(save)
		
		$.ajax({
			type: 'POST'
		,	url: CMS_BASE + '/cms/save'
		,	data: { page: CMS_PAGE, data: save }
		,	complete: function(response) { console.log(response.responseText) }
		,	dataType: 'json'
		});
	}


//  Editor
// ------------------------------------------------------------------------

	Editor.has_changes = Editor.is_activated = false

	Editor.activate = function() {
		this.style = $('<style>')
		    .text('[contenteditable="true"] { box-shadow: 0 0 8px lightblue; }')
		    .appendTo(Frame.head)
		Nerd.frame.animate({ height: Nerd.frame.height() - Editor.toolbar.height()})
		Editor.toolbar.slideDown()
		Nerd.regions.attr('contentEditable', 'true')
		Editor.is_activated = true
	}

	Editor.deactivate = function() {
		
		Nerd.save()
		
		Nerd.frame.height('100%')
		this.style.remove()
		Editor.toolbar.slideDown()
		Nerd.regions.attr('contentEditable', 'false')
		Panel.hide()
		Modal.hide()
		Pallette.hide()
		Editor.hide()
		Editor.is_activated = false
	}

	Editor.hide = function() {
		Editor.toolbar.slideUp()
	}

	Editor.show = function() {
		Editor.toolbar.slideDown()
	}

	Editor.edit_state = false

	Editor.edited = function(edited) {
		if (typeof(edited) != 'undefined') Editor.edit_state = edited
		return Editor.edit_state
	}

	Editor.initialize = function() {

		var hdata    = $('head').html()
		,   toolbar  = $('#nerd-toolbar').detach()
		,   trigger  = $('#nerd-trigger').detach()
		,   data     = $('body').html()
		,   body     = $('body').html('').prepend(toolbar)
		,   buttons  = $('#nerd-buttons')
		,   frame    = $('<iframe src="about:blank" id="nerd-frame">').appendTo(body)
		,   body     = frame.contents().find('body').html(data)
		,   head     = frame.contents().find('head').html(hdata)
		,   document = frame[0].contentDocument
		,   keys     = [1,13,37,38,39,40]

		// Add activation trigger
		trigger.appendTo('body').click(function (e) {
			return Editor.is_activated ? Editor.deactivate() : Editor.activate()
		})

		// Make all links target top window
		$('a', body).attr('target', '_top').click(function (e) {
			if (Editor.is_activated) return false;
			if (Editor.edited()) {
				return confirm('Are you sure you want to leave this page? You will lose any unsaved changes.');
			}
		});

		// Toolbar button handling
		toolbar.on('click', '[data-function]', function(evt) {		
			evt.preventDefault()
			
			var that = $(this)
			,   func = that.data('function')

			// If we're already in, don't reload
			//if (that.hasClass('active')) return

			//$('#nerd-tools .active').removeClass('active')
			//that.addClass('active')

			switch(func) {
				case 'command' :
					Commands[(that.data('command'))]()
					break
				case 'modal' :
					Modal.load(that.attr('href'))
					break
				case 'panel' :
					Panel.load(that.attr('href'))
				case 'pallette' :
					Pallette.load(that.attr('href'))
			}
		});

		// Button tooltips
		$('[title]', toolbar).tooltip({ placement: 'bottom', delay: 25 })

		// Expose local objects to global Nerd object
		Nerd.regions    = body.find('[data-editable]')
		Nerd.frame      = frame
		Editor.toolbar  = toolbar
		Frame.body      = body
		Frame.document  = document
		Frame.head      = head

		// Custom paste handling
		$(Frame.document).bind('paste', function (e) {
			var clipboard = e.originalEvent.clipboardData
			,   data = $.sanitize($('<div>').html(clipboard.getData('text/html')))

			Commands.exec('insertHTML', false, data)
			return false
		});

		// Keypress events
		Nerd.regions.on('keydown mouseup', function(e) {
			var key = e.which

			Editor.edited(true)

			// On Click
			if(key === 1) Editor.focused = this
			if(keys.contains(key)) Editor.selection = $.selection()
		})

		Nerd.Editor   = this
		Nerd.Frame    = Frame
		Nerd.Commands = Commands
		Nerd.Modal    = Modal.initialize()
		Nerd.Panel    = Panel.initialize()
		Nerd.Pallette = Pallette.initialize()

		//this.activate();
	}


//  Modal Dialog
// ------------------------------------------------------------------------
	Modal.initialize = function() {
		this.instance = Nerd.Frame.body.find('#nerd-modal')
			.detach()
			.appendTo('body')
			.modal({ show: false })
		return this.instance
	}

	Modal.show = function() {
		this.instance.modal('show');
	}

	Modal.hide = function() {
		this.instance.modal('hide');
	}

	Modal.reposition = function() {
		this.instance.css({
			marginLeft: (this.instance.width() / 2) * -1
		,	marginTop:  (this.instance.height() /2) * -1
		})
		return this
	}

	Modal.load = function(url) {
		$.get(url, function(data) {
			Modal.instance.html(data)
		})
		.success(function() {
			Modal.reposition().show()
		})
		.error(function() {
			alert('Request unable to be honored')
		})
		.complete(function() {})
	}


//  Panel Dialog
// ------------------------------------------------------------------------
	Panel.initialize = function() {
		this.instance = Nerd.Frame.body.find('#nerd-panel')
			.detach()
			.appendTo('body')
			.modal({ backdrop: false, show: false })
		this.content  = this.instance.find('.content')
		return this.instance
	}

	Panel.show = function() {
		this.instance.modal('show')
	}
	
	Panel.hide = function() {
		this.instance.modal('hide')
	}

	Panel.reposition = function() {
		this.instance
			.height(Nerd.frame.height() * .9)
		return this
	}

	Panel.load = function(url) {
		$.get(url, function(data) {
			Panel.content.html(data)
		})
		.success(function() {
			Panel.reposition().show()
		})
		.error(function() {
			alert('Request unable to be honored')
		})
		.complete(function() {})
	}


//  Palletes
// ------------------------------------------------------------------------
	Pallette.initialize = function() {
		return Nerd.Frame.body.find('#nerd-pallette')
			.detach()
			.appendTo('body')
	}

	Pallette.show = function() {
	}
	
	Pallette.hide = function() {}
	
	Pallette.load = function() {
		this.show()
	}


//  Pre-defined Commands
// ------------------------------------------------------------------------

	Commands = {
		exec: function(command, ui, value) {
			Frame.document.execCommand(command, ui, value)
			Commands.normalize()
		}
	,	normalize: function() {
			Editor.focused && Editor.focused.normalize()
		}
	,	wrap: function(node) {
			var range     = $.range()
			,   parent    = range.commonAncestorContainer
			,   container = range.commonAncestorContainer.parentNode

			// Do nothing if we are already within a <nodeName> tag
			if(container.nodeName === node.nodeName) return

			// Delete any <nodeName> tags within selection
			$(container).find(node.nodeName).each(function() {
				that.replaceWith($(this).html())
			})

			range.surroundContents(node)
			Commands.normalize()
		}
	,	anchor: function() {
			var anchor = prompt('What do we call it?')
			if (anchor === null) return
			Commands.exec('createbookmark', false, anchor)
		}
	,	block: function() {
			var block = prompt('What kind of block?')
			if (block === null) return
			Commands.exec('formatblock', false, block)
		}
	,	bold: function() {
			var node = Frame.document.createElement('strong')
			Commands.wrap(node)
		}
	,	clear: function() {
			Commands.exec('delete')
		}
	,	clearanchor: function() {
			Commands.exec('unbookmark')
		}
	,	clearformat: function() {
			Commands.exec('removeformat')
		}
	,	clearlink: function() {
			Commands.exec('unlink')
		}
	,	copy: function() {
			Commands.exec('copy')
		}
	,	cut: function() {
			Commands.exec('cut')
		}
	,	hr: function() {
			Commands.exec('inserthorizontalrule')
		}
	,	image: function() {
			var image = prompt('Where is the image?')
			if (image === null) return
			Commands.exec('insertimage', false, image)
		}
	,	indent: function() {
			Commands.exec('indent')
		}
	,	italic: function() {
			var node = Frame.document.createElement('em')
			Commands.wrap(node)
		}
	,	justifyleft: function() {
			Commands.exec('justifyleft')
		}
	,	justifycenter: function() {
			Commands.exec('justifycenter')
		}
	,	justifyright: function() {
			Commands.exec('justifyright')
		}
	,	link: function() {
			var link = prompt('Where do we point the link to?')
			if (link === null) return
			Commands.exec('createlink', false, link)
		}
	,	ol: function() {
			Commands.exec('insertorderedlist')
		}
	,	outdent: function() {
			Commands.exec('outdent')
		}
	,	paste: function() {
			Commands.exec('paste')
		}
	,	print: function() {
			Editor.deactivate()
			Commands.exec('print')
			setTimeout(Editor.activate, 1500)
		}
	,	source: function() {
			alert('Show HTML Source')
		}
	,	sub: function() {
			var node = Frame.document.createElement('sub')
			Commands.wrap(node)
		}
	,	sup: function() {
			var node = Frame.document.createElement('sup')
			Commands.wrap(node)
		}
	,	strike: function() {
			var node = Frame.document.createElement('del')
			Commands.wrap(node)
		}
	,	ul: function() {
			Commands.exec('insertunorderedlist')
		}
	,	underline: function() {
			var node = Frame.document.createElement('u')
			Commands.wrap(node)
		}
	,	undo: function() {
			Commands.exec('undo')
		}
	}

	// Attach custom handlers to Commands object, will overwrite...
	var handlers = Nerd.handlers
	for (var handler in handlers) {
		Commands[handler] = handlers[handler]
	}

	return Nerd

})(window, $); // end Nerd
