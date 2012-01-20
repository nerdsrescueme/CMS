<div id="cms-control" class="navbar navbar-fixed">
	<div class="navbar-inner">
		<div class="fluid-container">
			<a href="#" class="brand" data-cms="activate">Edit Page</a>
			<ul class="nav">
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						Pages
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#" data-target="#cms-modal" data-header="Listing Pages" data-load="/pages" data-toggle="modal">List Pages</a></li>
						<li><a href="#" data-target="#cms-modal" data-header="New Page" data-load="/pages/create" data-toggle="modal">New Page</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav pull-right">
				<li class="dropdown">
					<a href="#" data-toggle="dropdown">Username</a>
					<ul class="dropdown-menu">
						<li><a href="#">Something</a></li>
						<li class="divider"></li>
						<li><a href="#">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>

<div id="cms-modal" class="modal hide fade">
	<div class="modal-header">
		<a href="#" class="close" data-dismiss="modal">&times;</a>
		<h3>Modal Heading</h3>
	</div>
	<div class="modal-body">
		<p>Loading...</p>
	</div>
	<div class="modal-footer">
		<a href="#" data-cms="submit" class="btn primary">Primary</a>
		<a href="#" data-cms="cancel" class="btn danger">Secondary</a>
	</div>
</div>

<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/aloha/lib/aloha.js" data-aloha-plugins="common/format,common/list,common/link,common/undo,common/paste,common/block,common/contenthandler,common/abbr,extra/browser,common/commands,extra/flag-icons"></script>
<?php echo Asset::render('admin') ?>