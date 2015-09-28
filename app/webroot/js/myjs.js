/**
 * 
 */


function addCSSToElement(e) {
	var tar = e.target;
	if (tar.localName == "a") {
		e.currentTarget.children[0].children[0].style.color = 'gray';
		e.currentTarget.children[1].children[0].style.color = 'gray';
		e.currentTarget.children[2].children[0].style.color = 'gray';
		e.currentTarget.children[0].style.backgroundColor = "black";
		e.currentTarget.children[1].style.backgroundColor = "black";
		e.currentTarget.children[2].style.backgroundColor = "black";

	}
	if (tar.localName == "a") {
		tar.parentNode.style.backgroundColor = "#42444a";
		tar.parentNode.style.borderTopRightRadius = "8px";
		tar.parentNode.style.borderTopLeftRadius = "8px";
		tar.style.color = 'red';

	}
	if (tar.localName == "li") {
		/*
		 * tar.style.backgroundColor = "#42444a"; tar.style.borderTopRightRadius =
		 * "8px"; tar.style.borderTopLeftRadius = "8px";
		 * tar.children[0].style.color = 'red';
		 */

	}
}


function appendCSSclassByTag(tag, className) {

	tag.className += ' ' + className;
}
function removeCSSclassByTag(tag, className) {

	tag.className = tag.className.replace(className, "");
}
function collapseTXT(evt) {
	var link = evt.currentTarget.parentNode.childNodes[3];
	var tag = evt.currentTarget.parentNode.childNodes[1];
	if (link.textContent.trim() == "see more") {
		link.textContent = 'hide text';
		// change icon
		var clsName = tag.className;
		removeCSSclassByTag(tag, 'hide-text');
	} else {
		link.textContent = 'see more';
		// change icon
		var clsName = tag.className;
		appendCSSclassByTag(tag, 'hide-text');
	}

}