

<script type="text/javascript">	

	// Only load jQuery if it's not included in the theme.
	if (typeof(jQuery) == 'undefined')
		document.write("<scr" + "ipt type=\"text/javascript\" src=\"<?php echo Asset::find_file('jquery.js', 'js') ?>?<?php echo filemtime(DOCROOT.'/assets/js/jquery.js') ?>\"></scr" + "ipt>");

	var CMS_BASE = '<?php echo Uri::base(false) ?>';
	var CMS_URI  = '<?php echo trim($_SERVER['REQUEST_URI'], '/') ?>';
	var CMS_PAGE = '<?php echo $page->id ?>';

</script>

<?php

	echo Asset::js('bootstrap.js');
	echo Asset::js('nerd.init.js');
	
?>

<div id="nerd-toolbar">
	<div id="nerd-tools">
		<a href="/cms/modals/pages" data-function="modal">Pages</a>
		<a href="/cms/modals/finder" data-function="modal">Finder</a>
		<a href="/cms/panels/media" data-function="pallette">Media Inspector</a>
		<!--<a href="/cms/panels/snippets" data-function="panel">Snippets</a>-->
		<a href="/cms/panels/notes" data-function="panel">Notes</a>
	</div>
    <div id="nerd-buttons">
		<a href="#" class="icon-file icon-white" data-function="command" data-command="save" title="Save"></a>
		<a href="#" class="icon-print icon-white" data-function="command" data-command="print" title="Print"></a>
		<a href="#" class="icon-chevron-left icon-white" data-function="command" data-command="undo" title="Undo"></a>
		<a href="#" class="icon-chevron-right icon-white" data-function="command" data-command="redo" title="Redo"></a>
		<a href="#" class="icon-minus-sign icon-white" data-function="command" data-command="cut" title="Cut"></a>
		<a href="#" class="icon-remove-sign icon-white" data-function="command" data-command="copy" title="Copy"></a>
		<a href="#" class="icon-ok-sign icon-white" data-function="command" data-command="paste" title="Paste"></a>
		<a href="#" class="icon-bold icon-white" data-function="command" data-command="bold" title="Bold"></a>
		<a href="#" class="icon-italic icon-white" data-function="command" data-command="italic" title="Italic"></a>
		<a href="#" class="icon-text-width icon-white" data-function="command" data-command="underline" title="Underline"></a>
		<a href="#" class="icon-font icon-white" data-function="command" data-command="strike" title="Strike"></a>
		<a href="#" class="icon-font icon-white" data-function="command" data-command="sup" title="Superscript"></a>
		<a href="#" class="icon-font icon-white" data-function="command" data-command="sub" title="Subscript"></a>
		<a href="#" class="icon-bookmark icon-white" data-function="command" data-command="anchor" title="Insert Bookmark"></a>
		<a href="#" class="icon-share icon-white" data-function="command" data-command="link" title="Link"></a>
		<a href="#" class="icon-share icon-white" data-function="command" data-command="clearlink" title="Unlink"></a>
		<a href="#" class="icon-picture icon-white" data-function="command" data-command="image" title="Image"></a>
		<a href="#" class="icon-resize-horizontal icon-white" data-function="command" data-command="hr" title="Insert Horizontal Rule"></a>
		<a href="#" class="icon-list icon-white" data-function="command" data-command="ol" title="Ordered List"></a>
		<a href="#" class="icon-list icon-white" data-function="command" data-command="ul" title="Unordered List"></a>
		<a href="#" class="icon-indent-left icon-white" data-function="command" data-command="indent" title="Increase Indent"></a>
		<a href="#" class="icon-indent-right icon-white" data-function="command" data-command="outdent" title="Decrease Indent"></a>
		<a href="#" class="icon-align-left icon-white" data-function="command" data-command="justifyleft" title="Justify Left"></a>
		<a href="#" class="icon-align-center icon-white" data-function="command" data-command="justifycenter" title="Justify Center"></a>
		<a href="#" class="icon-align-right icon-white" data-function="command" data-command="justifyright" title="Justify Right"></a>
		<a href="#" class="icon-list-alt icon-white" data-function="command" data-command="block" title="Format Block"></a>
		<a href="#" class="icon-fire icon-white" data-function="command" data-command="source" title="View HTML Source"></a>
		<a href="#" class="icon-remove icon-white" data-function="command" data-command="clearformat" title="Clear Formatting"></a>
        
    </div>
</body>
</html>

</div>

<div id="nerd-trigger">
	<i class="icon icon-white icon-edit"></i>
</div>

<div id="nerd-modal" class="hide fade">
	<div>TESTING!!!!</div>
</div>

<div id="nerd-panel" class="hide fade">
	<div class="close" data-dismiss="modal">x</div>
	<div class="content">PANEL!!!!!</div>
</div>

<div id="nerd-pallette" class="hide fade">
	<div class="close" data-dismiss="modal">x</div>
	<div class="content">PALLETTE!!!!</div>
</div>
