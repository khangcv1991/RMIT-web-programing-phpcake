/**
 * 
 */

var mFrom = document.getElementById('mContactForm');
var mQType;

window.onload = function() {
	mFrom = document.getElementById("mContactForm");

};

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
function validatePhone(phone){
	 var re = /^\d{10}$/i;
	    return re.test(phone);
}
function actionFormSubmit() {
	var flag = 0;
	var tmpElement;
	
	
	

	tmpElement = document.getElementById("cust-name-txt-area");
	if (tmpElement.value == null || tmpElement.value.trim() == '') {
		tmpElement = document.getElementById("cusName-error");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	}else{
		tmpElement = document.getElementById("cusName-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	tmpElement = document.getElementById("cust-email-txt-area");
	if (tmpElement.value == null || tmpElement.value.trim() == ''
			|| validateEmail(tmpElement.value) == false) {
		tmpElement = document.getElementById("cusEmail-error");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	}else{
		tmpElement = document.getElementById("cusEmail-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	tmpElement = document.getElementById("cust-phone-txt-area");
	if (tmpElement.value == null || tmpElement.value.trim() == '' ||validatePhone(tmpElement.value.trim()) == false) {
		tmpElement = document.getElementById("cusPhone-error");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	}else{
		tmpElement = document.getElementById("cusPhone-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	
	if (flag == 0) {
		mFrom.submit();
	}

}