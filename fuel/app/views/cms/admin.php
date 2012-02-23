

<script type="text/javascript">	

	// Only load jQuery if it's not included in the theme.
	if (typeof(jQuery) == 'undefined')
		document.write("<scr" + "ipt type=\"text/javascript\" src=\"<?php echo Asset::find_file('jquery.js', 'js') ?>?<?php echo filemtime(DOCROOT.'/assets/js/jquery.js') ?>\"></scr" + "ipt>");

</script>

<?php

	echo Asset::js('bootstrap.js');
	echo Asset::js('nerd.init.js');

