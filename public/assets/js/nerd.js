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
		
		//console.log(save)
		
		$.ajax({
			type: 'POST'
		,	url: CMS_BASE + '/cms/save'
		,	data: { page: CMS_PAGE, data: save }
		,	complete: function(response) {
				//console.log(response.responseText)
				Nerd.Editor.edited(false)
			}
		,	dataType: 'json'
		});
	}


//  Editor
// ------------------------------------------------------------------------

	Editor.has_changes = Editor.is_activated = false

	Editor.activate = function() {
		this.style = $('<style>')
		    .text('[data-editable="local"] { box-shadow: 0 0 8px lightblue; } [data-editable="global"] { box-shadow: 0 0 8px lightgreen; }')
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

		// Disable links…
		$('a', body).bind('click.links', function(event) {
			if (Nerd.Editor.is_activated) return false;
			$(this).attr('target', '_top');
		})

		// Toolbar button handling
		toolbar.on('click', '[data-function]', function(evt) {		
			evt.preventDefault()
			
			var that = $(this)
			,   func = that.data('function')

			switch(func) {
				case 'command' :
					Commands[(that.data('command'))]()
					break
				case 'modal' :
					Modal.load(that.attr('href'))
					break
				case 'panel' :
					Panel.load(that.attr('href'))
					break
				case 'pallette' :
					Pallette.header(that.data('original-title'))
					Pallette.load(that.attr('href'), that.data('command'))
					break
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
		Nerd.regions.on('keyup mouseup', function(e) {
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
		return this
	}

	Modal.show = function() {
		this.instance.modal('show')
		this.instance.show()
		return this
	}

	Modal.hide = function() {
		this.instance.modal('hide')
		return this
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
		.complete(function() {
		})
	}


//  Palletes
// ------------------------------------------------------------------------
	Pallette.initialize = function() {
		this.instance = Nerd.Frame.body.find('#nerd-pallette')
			.detach()
			.appendTo('body')
			.modal({ backdrop: false, show: false })
		this.data    = {}
		this.content = this.instance.find('.content')
		return this.instance
	}

	Pallette.show = function() {
		this.instance.modal('show')
	}
	
	Pallette.hide = function() {
		this.unloadFormInterceptor()
		this.instance.modal('hide')
	}

	Pallette.header = function(title) {
		this.instance.find('h3').first().html(title)
	}

	Pallette.loadFormInterceptor = function() {
		this.content.find('form').bind('submit', function(event) {
			event.preventDefault()
			
			var fields = $(this).serializeArray()
			,   field  = fields.pop()
			,   data   = {}
			
			while (typeof field == 'object') {
				data[field.name] = field.value
				field = fields.pop()
			}
			
			// Execute command submitted with form
			Commands[data.command](data)
			Pallette.unloadFormInterceptor()
			console.log('unloaded')
			Pallette.hide()
		})

		this.instance.find('button[type="submit"]').bind('click', function(event) {
			Pallette.instance.find('form').trigger('submit')
		})
	}
	
	Pallette.unloadFormInterceptor = function() {
		this.content.find('form').unbind('submit')
		this.instance.find('button[type="submit"]').unbind('click')
	}
	
	Pallette.load = function(url, id) {

		// If content has been previously loaded, use that
		if (this.data[id]) {
			this.content.html(this.data[id])
			this.loadFormInterceptor()
			this.show()
			return
		}

		$.get(url, function(data) {
			Pallette.data[id] = data
			Pallette.content.html(data)
		})
		.success(function() {
			console.log('again')
			Pallette.loadFormInterceptor()
			Pallette.show()
		})
		.error(function() {
			alert('Request unable to be honored')
		})
		.complete(function() {
		})
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
	,	insert: function(node) {
			$.selection().getRangeAt(0).insertNode(node)
		}
	,	block: function(blockdata) {
			Commands.exec('formatblock', false, blockdata.block)
		}
	,	bold: function() {
			var node = Frame.document.createElement('strong')
			Commands.wrap(node)
		}
	,	clear: function() {
			Commands.exec('delete')
		}
	,	clearformat: function() {
			Commands.exec('removeformat')
		}
	,	clearlink: function() {
			Commands.exec('unlink')
		}
	,	hr: function() {
			Commands.exec('inserthorizontalrule')
		}
	,	image: function(imgdata) {
			var image = Frame.document.createElement('img')
			    image.src = imgdata.src
			    image.className = imgdata.class
			Commands.insert(image)

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
	,	link: function(adata) {
			var a = Frame.document.createElement('a')
			    a.href = adata.href
			    if (adata.class.length > 0) a.className = adata.class
			    if (adata.target != 0) a.target = adata.target
			    if (adata.rel != 0) a.rel = adata.rel
			Commands.wrap(a)
		}
	,	ol: function() {
			Commands.exec('insertorderedlist')
		}
	,	outdent: function() {
			Commands.exec('outdent')
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
