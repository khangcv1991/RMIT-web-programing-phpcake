/**
 * 
 */
function validateEmail(email) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	return re.test(email);
}
function actionFormSubmit(formID) {
	var flag = 0;
	var tmpElement;

	var mFrom = document.getElementById(formID);

	tmpElement = document.getElementById("cust-email-txt-area");
	if (tmpElement.value == null || tmpElement.value.trim() == ''
			|| validateEmail(tmpElement.value) == false) {
		tmpElement = document.getElementById("cusEmail-error");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("cusEmail-error");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	if (flag == 0) {
		mFrom.submit();
	}

}