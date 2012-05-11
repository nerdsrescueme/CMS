
<!-- jQuery and jQuery UI (REQUIRED) -->
<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

<!-- elFinder CSS (REQUIRED) -->
<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/elfinder.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/theme.css">

<!-- elFinder JS (REQUIRED) -->
<script type="text/javascript" src="/assets/js/elfinder.min.js"></script>


<!-- elFinder initialization (REQUIRED) -->
<script type="text/javascript" charset="utf-8">
	$().ready(function() {
		var elf = $('#finder').elfinder({
			url : '/assets/finder/php/connector.php'  // connector URL (REQUIRED)
			// lang: 'ru',
		}).elfinder('instance');
	});
</script>

<!-- Element where elFinder will be created (REQUIRED) -->
<div id="finder"></div>
