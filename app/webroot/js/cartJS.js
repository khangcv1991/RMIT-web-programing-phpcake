/**
 * 
 */
function validateCode(code) {
	var re = /^\d{5}-\d{5}-[A-Z]{2}$/gi;
	return re.test(code);
}

function actionFormSubmit(formID) {
	var e = document.getElementById(formID.trim());

	if (e.id == "vocher1") {
		var tmp = e[0];
		if (validateCode(tmp.value) == true) {
			e.submit();
		} else {
			alert("input worng format!");
		}
	} else {
		e.submit();
	}

}
function displayNoticeMessage(msg) {
	if (msg.trim() != "" && msg != null && typeof (msg) != "undefined") {
		alert("Invalid voucher code!");
	}
}
function submitDeleteForm(url){
	var f = document.createElement("form");
	f.setAttribute('method',"post");
	f.setAttribute('action',url);
	f.submit();
}