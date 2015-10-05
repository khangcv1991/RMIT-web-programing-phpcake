/**
 * 
 */

var mFrom = document.getElementById('mContactForm');
var mQType;

window.onload = function() {
	mFrom = document.getElementById("mContactForm");

};
function validatePhone(phone) {
	var re = /^\d{10}$/i;
	return re.test(phone);
}
function actionFormSubmit() {
	var flag = 0;
	var tmpElement;
	tmpElement = document.getElementById("question-subject");
	if (tmpElement.value.indexOf("please select") >= 0) {
		tmpElement = document.getElementById("subject-error");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("subject-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}
	tmpElement = document.getElementById("cust-type-personal");
	if (tmpElement.checked == false) {
		tmpElement = document.getElementById("cust-type-group");
		if (tmpElement.checked == false) {
			tmpElement = document.getElementById("cusType-error");
			removeCSSclassByTag(tmpElement, "hidden-error");
			appendCSSclassByTag(tmpElement, "display-error");
			flag = 1;
		} else {
			tmpElement = document.getElementById("cusType-error");
			removeCSSclassByTag(tmpElement, "display-error");
			appendCSSclassByTag(tmpElement, "hidden-error");
		}

	} else {
		tmpElement = document.getElementById("cusType-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	tmpElement = document.getElementById("cust-name-txt-area");
	if (tmpElement.value == null || tmpElement.value.trim() == '') {
		tmpElement = document.getElementById("cusName-error");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("cusName-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	tmpElement = document.getElementById("cust-email-txt-area");
	if (tmpElement.value == null || tmpElement.value.trim() == ''
			|| tmpElement.value.match(/([A-H])/gi) < 0) {
		tmpElement = document.getElementById("cusEmail-error");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("cusEmail-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	tmpElement = document.getElementById("cust-phone-txt-area");
	if (tmpElement.value == null || tmpElement.value.trim() == ''
			|| validatePhone(tmpElement.value.trim()) == false) {
		tmpElement = document.getElementById("cusPhone-error");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("cusPhone-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	tmpElement = document.getElementById("cust-postcode-txt-area");
	if (tmpElement.value == null || tmpElement.value.trim() == '') {
		tmpElement = document.getElementById("cusPostcode-error");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("cusPostcode-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	tmpElement = document.getElementById("cust-mess-txt-area");
	if (tmpElement.value == null || tmpElement.value.trim() == '') {
		tmpElement = document.getElementById("cusMess-error");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("cusMess-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	tmpElement = document.getElementById("cust-confirm-box");
	if (tmpElement.value == null || tmpElement.value.trim() == '') {
		tmpElement = document.getElementById("cusMess-error");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("cusMess-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}
	if (flag == 0) {
		mFrom.submit();
	}

}