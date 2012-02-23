(function($) {


var defaultAllowTags = ['i', 'em', 'b', 'strong', 'u'];
var defaultAllowAttrs = {}

function sanitizeChildren( root, allowTags, allowAttrs ) {
	allowTags = allowTags || defaultAllowTags;
	allowAttrs = allowAttrs || defaultAllowAttrs;

	$(root).children().each(function(i, child) {
		sanitizeChildren( child, allowTags, allowAttrs );

		var tag = child.localName.toLowerCase();

		if( $.inArray( tag, allowTags ) < 0 ) {
			$(child).contents().each(function(j, content) {
				$(content).remove().insertBefore(child);
			});
			$(child).remove();
		} else {
			$.each(child.attributes, function() {
				var attr = this.localName;

				if( !defaultAllowAttrs.hasOwnProperty(tag) 
					|| $.inArray( attr, defaultAllowAttrs[tag] ) < 0 ) {
					child.removeAttribute( attr );
				}
			});
		}
	});
};

$.fn.sanitizeHtml = function(allowTags, allowAttrs) {
	allowTags = allowTags || defaultAllowTags;
	allowAttrs = allowAttrs || defaultAllowAttrs;

	sanitizeChildren( this, allowTags, allowAttrs );

	return $(this);
}

})(jQuery);