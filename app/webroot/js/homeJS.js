/**
 * 
 */
$(function() {
	$("#mtabs").tabs();
	var tar = document.getElementById("mlink-tabs");
	tar.children[0].style.backgroundColor = "#42444a";
	tar.children[0].style.borderTopRightRadius = "8px";
	tar.children[0].style.borderTopLeftRadius = "8px";
	tar.children[0].children[0].style.color = "red";
});