

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
	echo Asset::js('json.js');

?>

<div id="nerd-toolbar">
	<div id="nerd-tools">
		<a href="/cms/modals/pages" data-function="modal">Pages</a>
		<a href="/cms/modals/navigation" data-function="modal">Navigation</a>
		<a href="/cms/modals/finder" data-function="modal">Finder</a>
		<a href="/cms/panels/media" data-function="pallette" title="Media Inspector">Media Inspector</a>
		<!--<a href="/cms/panels/snippets" data-function="panel">Snippets</a>-->
		<a href="/cms/panels/notes" data-function="panel">Notes</a>
		<a href="/user">Users</a>
	</div>
    <div id="nerd-buttons">
		<a href="#" class="icon-chevron-left icon-white" data-function="command" data-command="undo" title="Undo"></a>
		<a href="#" class="icon-chevron-right icon-white" data-function="command" data-command="redo" title="Redo"></a>
		<a href="#" class="icon-bold icon-white" data-function="command" data-command="bold" title="Bold"></a>
		<a href="#" class="icon-italic icon-white" data-function="command" data-command="italic" title="Italic"></a>
		<a href="#" class="icon-text-width icon-white" data-function="command" data-command="underline" title="Underline"></a>
		<a href="#" class="icon-font icon-white" data-function="command" data-command="strike" title="Strike"></a>
		<a href="#" class="icon-font icon-white" data-function="command" data-command="sup" title="Superscript"></a>
		<a href="#" class="icon-font icon-white" data-function="command" data-command="sub" title="Subscript"></a>
		<a href="/cms/pallettes/a" class="icon-share icon-white" data-function="pallette" data-command="link" title="Insert a link"></a>
		<a href="#" class="icon-share icon-white" data-function="command" data-command="clearlink" title="Unlink"></a>
		<a href="/cms/pallettes/image" class="icon-picture icon-white" data-function="pallette" title="Insert an image"></a>
		<a href="/cms/pallettes/video" class="icon-picture" data-function="pallette" title="Insert an youtube video"></a>
		<a href="#" class="icon-resize-horizontal icon-white" data-function="command" data-command="hr" title="Insert Horizontal Rule"></a>
		<a href="#" class="icon-list icon-white" data-function="command" data-command="ol" title="Ordered List"></a>
		<a href="#" class="icon-list icon-white" data-function="command" data-command="ul" title="Unordered List"></a>
		<a href="#" class="icon-indent-left icon-white" data-function="command" data-command="indent" title="Increase Indent"></a>
		<a href="#" class="icon-indent-right icon-white" data-function="command" data-command="outdent" title="Decrease Indent"></a>
		<a href="#" class="icon-align-left icon-white" data-function="command" data-command="justifyleft" title="Justify Left"></a>
		<a href="#" class="icon-align-center icon-white" data-function="command" data-command="justifycenter" title="Justify Center"></a>
		<a href="#" class="icon-align-right icon-white" data-function="command" data-command="justifyright" title="Justify Right"></a>
		<a href="/cms/pallettes/block" class="icon-list-alt icon-white" data-function="pallette" data-command="block" title="Format Block Element"></a>
		<a href="/cms/pallettes/source" class="icon-fire icon-white" data-function="command" data-command="source" title="HTML Source"></a>
		<a href="#" class="icon-remove icon-white" data-function="command" data-command="clearformat" title="Clear Formatting"></a>

    </div>
</body>
</html>

</div>


<div id="nerd-trigger">
	<i class="icon icon-white icon-edit"></i>
</div>

<div id="nerd-modal" class="modal hide fade">
	<div>TESTING!!!!</div>
</div>

<div id="nerd-panel" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Panel</h3>
	</div>
	<div class="content">PANEL!!!!!</div>
</div>

<div id="nerd-pallette" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Pallette</h3>
	</div>
	<div class="modal-body content">
		<p>PALLETTE!!!!</p>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
		<button class="btn btn-danger" data-dismiss="modal">Close</button>
	</div>
</div>
