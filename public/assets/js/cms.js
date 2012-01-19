/**
* CMS Functionality
*
* @author  Frank Bardon, Jr. <frank@nerdsrescue.me>
* @version 0.1
*/
var CMS = CMS || {};

CMS.editing = false;

CMS.active  = null;
CMS.body    = null;
CMS.regions = null;
CMS.modules = null;
CMS.control = null;
CMS.drawer  = null;

CMS.UI = (function(CMS, $) { return {
	edit: null,
	init: function() {
		CMS.body    = $('body').animate({marginTop:'40px'});
		CMS.control = $('#cms-control');
		CMS.drawer  = $('#cms-drawer', this.control);
		CMS.regions = $('div[data-region], div[data-global]');
		CMS.modules = $('div[data-module]');
		this.edit   = $('[data-cms="activate"]');
	},
	activate: function(flag) {
		CMS.editing = flag;
		if(CMS.editing) {
			Aloha.jQuery(CMS.modules).aloha();
			this.edit.text('Save Page');
			CMS.modules.addClass('cms-editable');
		} else {
			Aloha.jQuery(CMS.modules).mahalo();
			this.edit.text('Edit Page');
			CMS.modules.removeClass('cms-editable');
		}
		return CMS.editing;
	}
}; }(CMS, jQuery));


CMS.Dialog = (function (CMS, $) { return {
	init: function() {
		this.html     = null,
		this.trigger  = null,
		this.modal    = $('#cms-modal');
		this.header   = $('div.modal-header', this.modal);
		this.content  = $('div.modal-body', this.modal);
		this.footer   = $('div.modal-footer', this.modal);

		// Save clicked buttons for modal data loading
		this.triggers = $('[data-target="#cms-modal"]').click(function(event) {
			CMS.Dialog.trigger = $(event.currentTarget);
			CMS.Dialog.modal.modal('show');
		});

		this.modal.modal({
			backdrop: true,
			keyboard: true
		}).on('show', function() {
			CMS.Dialog.header.find('h3').text(CMS.Dialog.trigger.data('header'));
			CMS.Dialog.content.hide().load(CMS.Dialog.trigger.data('load'));
		}).on('shown', function(event) {
			CMS.Dialog.content.fadeIn();
		}).on('hide', function(event) {
		}).on('hidden', function(event) {
			CMS.Dialog.content.html('<p>Loading…</p>');
		});
	}
}; }(CMS, jQuery));

$(function() {

	CMS.UI.init();
	CMS.Dialog.init();

	CMS.control.on('click', '[data-cms="activate"]', function(event) {
		CMS.editing ? CMS.UI.activate(false) : CMS.UI.activate(true);
		return false;
	});

	// Create drag and droppables from drawer…
});