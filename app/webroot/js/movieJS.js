/**
 * 
 */

function collapseVideo(evt) {	
	var tag = evt.currentTarget.parentNode.childNodes[9];
	if (tag.className.indexOf('hide-text') >= 0) {		
		removeCSSclassByTag(tag, 'hide-text');
	} else {
		
		appendCSSclassByTag(tag, 'hide-text');
	}
}