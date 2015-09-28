/**
 * 
 */
var MOVIE_TIMES = {
	MOVIE1 : {
		times : [ "Wed", "Thur", "Fri", "Sat", "Sun" ],
		times2 : [ "9PM", "9PM", "9PM", "9PM", "9PM" ]
	},
	MOVIE2 : {
		times : [ "Mon", "Tue", "Wed", "Thur", "Fri" ],
		times2 : [ "9PM", "9PM", "1PM", "1PM", "1PM" ]
	},
	MOVIE3 : {
		times : [ "Mon", "Tue", "Sat", "Sun" ],
		times2 : [ "6PM", "6PM", "3PM", "3PM" ]
	},
	MOVIE4 : {
		times : [ "Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun" ],
		times2 : [ "1PM", "1PM", "6PM", "6PM", "6PM", "12PM", "12PM" ]
	}
}
var PRICE_LIST_M_T = {
	S_FU : {
		value : 12
	},
	S_CO : {
		value : 10

	},
	S_CH : {
		value : 8
	},
	F_AD : {
		value : 25
	},
	F_CH : {
		value : 20
	},
	BB : {
		value : 20
	}
};
var PRICE_LIST_W_F = {
	S_FU : {
		value : 18
	},
	S_CO : {
		value : 15

	},
	S_CH : {
		value : 12
	},
	F_AD : {
		value : 30
	},
	F_CH : {
		value : 25
	},
	BB : {
		value : 30
	}
};
var PRICE_LIST_NULL = {
	S_FU : {
		value : 0
	},
	S_CO : {
		value : 0

	},
	S_CH : {
		value : 0
	},
	F_AD : {
		value : 0
	},
	F_CH : {
		value : 0
	},
	BB : {
		value : 0
	}
};
var rowSeat = [ "H", "G", "F", "E", "D", "C", "B", "A" ];
var seatMap = [ [ 1, 1, 1, 1, 1, 2, 2, 2, 2, 1, 1, 1, 1, 1 ],
		[ 1, 1, 1, 1, 1, 2, 2, 2, 2, 1, 1, 1, 1, 1 ],
		[ 1, 1, 1, 1, 1, 2, 2, 2, 2, 1, 1, 1, 1, 1 ],
		[ 1, 1, 1, 1, 1, 2, 2, 2, 2, 1, 1, 1, 1, 1 ], [ 3, 3, 3, 3 ],
		[ 3, 3, 3, 3 ], [ 3, 3, 3 ], [ 3, 3 ] ];

var seat_main_status = [ "avaiable", "unavaiable" ];
var seat_normal_type = [ 'sa', 'sp', 'sc' ];
var seat_first_type = [ 'fa', 'fc' ];
var seat_bean_type = [ 'b1', 'b2', 'b3' ];
var seat_class_type = {
	NORMAL : 1,
	FIRST : 2,
	BEAN : 3,
};

function addSeatToCart(seatID){
	var e = document.getElementById("curr-cart");
	var items = e.value;
	if(items.indexOf(seatID) < 0 ){
		items = items + " " + seatID;
	}
	 e.value = items;
}
function removeSeatFromCart(seatID){
	var e = document.getElementById("curr-cart");
	var items = e.value;
	e.value = items.replace(seatID, "").trim();
	
}
function creatInternalNode(row, col, status, parent) {
	var seat = document.createElement("div");

	var id = rowSeat[row] + col;
	seat.setAttribute("class", "seat " + seat_main_status[status]);

	seat.setAttribute("id", id)
	seat.innerHTML = id;

	parent.appendChild(seat);

	return seat;

}
function createRowSeat(id, length, parent) {
	var rowSeat = document.createElement("div");
	var id = "row" + id;

	rowSeat.setAttribute("id", id)
	rowSeat.setAttribute("class", "seat-row");
	rowSeat.style.width = "" + (length + 2) * 40 + "px";

	parent.appendChild(rowSeat);
	return rowSeat;
}

function getSeatType(e) {
	var id = e.id;
	var row, col;
	col = parseInt(id.replace(/([A-H])/gi, ''));
	id = e.id;
	row = rowSeat.indexOf(id.replace(/([0-9])/gi, ''));
	return seatMap[row][col];

}
function addCSSclassAtBeginByTag(tag, className) {
	var tmp;
	tmp = tag.className;
	tag.className = className + ' ' + tmp;
}
function changeTicketQuanity(type, index ,addNum){
		//set quanity
		var idElement;		 
		var element; 
		if(type == seat_class_type.NORMAL){
			idElement = seat_normal_type[index];
		}else if(type == seat_class_type.FIRST){
			idElement = seat_first_type[index];
		}
		else if(type == seat_class_type.BEAN){
			idElement = seat_bean_type[index];
		}

		idElement = idElement.toUpperCase() + '-quanity';
		element = document.getElementById(idElement);			
		element.value = parseInt(element.value) + addNum;
}
function changeTxTSeat(e, type, text) {
	var count;
	if (type == seat_class_type.NORMAL) {
		count = seat_normal_type.indexOf(text);
		if (count < 0){
			count = 0;
			
		}
		else if (count == seat_normal_type.length - 1) {
			count = -2;
		} else {
			count = count + 1;
		}
		if (count != -2) {
			e.innerHTML = seat_normal_type[count];
			//add seat to cart
			addSeatToCart(e.id);
			//set quanity
			changeTicketQuanity(seat_class_type.NORMAL, count, 1);
			if(count > 0){
				//set quanity
			changeTicketQuanity(seat_class_type.NORMAL, count - 1 , -1);
			}

			if (e.className.indexOf("selecting") < 0) {
				removeCSSclassByTag(e, "normal-class");
				appendCSSclassByTag(e, "selecting");
			}
		} else {
			e.innerHTML = e.id;
			appendCSSclassByTag(e, "normal-class");
			removeCSSclassByTag(e, "selecting");
			//remove seat from cart
			removeSeatFromCart(e.id);
			//set quantity
			changeTicketQuanity(seat_class_type.NORMAL, seat_normal_type.length - 1, -1);
		}
	} else if (type == seat_class_type.FIRST) {
		count = seat_first_type.indexOf(text);
		if (count < 0){
			count = 0;			
		}
		else if (count == seat_first_type.length - 1) {
			count = -2;
		} else {
			count = count + 1;
		}
		if (count != -2) {
			e.innerHTML = seat_first_type[count];
			//add seat to cart
			addSeatToCart(e.id);
			//set quanity
			changeTicketQuanity(seat_class_type.FIRST, count, 1);
			if(count > 0){
				//set quanity
			changeTicketQuanity(seat_class_type.FIRST, count - 1, -1);
			}
			if (e.className.indexOf("selecting") < 0) {
				removeCSSclassByTag(e, "first-class");
				appendCSSclassByTag(e, "selecting");
			}
		} else {
			e.innerHTML = e.id;
			appendCSSclassByTag(e, "first-class");
			removeCSSclassByTag(e, "selecting");
			//remove seat from cart
			removeSeatFromCart(e.id);
			//set ticket quanity
			changeTicketQuanity(seat_class_type.FIRST, seat_first_type.length - 1, -1);
		}
	} else if (type == seat_class_type.BEAN) {
		count = seat_bean_type.indexOf(text);
		if (count < 0){
			count = 0;
			//set quanity
			var idElement = seat_normal_type[count];
			idElement = idElement.toUpperCase() + '-quanity';
			var element = document.getElementById(idElement);			
			element.innerHTML = parseInt(element.innerHTML) + 1;
		}
		else if (count == seat_bean_type.length - 1) {
			count = -2;
		} else {
			count = count + 1;
		}
		if (count != -2) {
			e.innerHTML = seat_bean_type[count];
			//add seat to cart
			addSeatToCart(e.id);
			//set quanity
			changeTicketQuanity(seat_class_type.BEAN, count, 1);
			if(count > 0){
				//set quanity
			changeTicketQuanity(seat_class_type.BEAN, count - 1, -1);
			}
			if (e.className.indexOf("selecting") < 0) {
				removeCSSclassByTag(e, "bean-class");
				appendCSSclassByTag(e, "selecting");
			}
		} else {
			e.innerHTML = e.id;
			//remove seat from cart
			removeSeatFromCart(e.id);
			//set quanity
			changeTicketQuanity(seat_class_type.BEAN, seat_bean_type.length - 1, -1);
			appendCSSclassByTag(e, "bean-class");
			removeCSSclassByTag(e, "selecting");
		}
	}
}
function seat_onClick(evt) {
	var seat = evt.target;

	if (seat.className.indexOf("seat") > -1) {
		switch (getSeatType(seat)) {
		case seat_class_type.NORMAL:
			changeTxTSeat(seat, seat_class_type.NORMAL, seat.innerHTML);
			break;
		case seat_class_type.FIRST:
			changeTxTSeat(seat, seat_class_type.FIRST, seat.innerHTML);
			break;
		case seat_class_type.BEAN:
			changeTxTSeat(seat, seat_class_type.BEAN, seat.innerHTML);
			break;
		}
	}

}
function initiateMap() {
	var seat_map = document.getElementById("seat_map");
	var i, j;
	for (i = 0; i < seatMap.length; i++) {
		var row = createRowSeat(i, seatMap[i].length, seat_map);
		for (j = 0; j < seatMap[i].length; j++) {
			var seat = creatInternalNode(i, j, 0, row);

			if (seatMap[i][j] == 1)
				appendCSSclassByTag(seat, "normal-class");
			if (seatMap[i][j] == 2)
				appendCSSclassByTag(seat, "first-class");
			if (seatMap[i][j] == 3)
				appendCSSclassByTag(seat, "bean-class");

		}
	}
	var row = createRowSeat(i + 1, seatMap[0].length, seat_map);
	row.innerHTML = "SCREEN";
	row.style.textAlign = "center";
	row.style.fontSize = "150%";
	row.style.backgroundColor = "#333";
	row.style.marginTop = "40px";
}

function getPriceList() {
	var priceList;
	var e;
	e = document.getElementById("movie-name");
	if (e.value.trim() == "please select")
		return PRICE_LIST_NULL;
	e = document.getElementById("movie-time");
	if (e.value.trim() == "please select")
		return PRICE_LIST_NULL;
	e = document.getElementById("movie-day");
	if (e.value.trim() == "please select" || e.value.trim() == "")
		return PRICE_LIST_NULL;
	e = document.getElementById("movie-day");
	if (e.value.trim() == "Mon" || e.value.trim() == "Tue") {
		priceList = PRICE_LIST_M_T;
		return priceList;
	}
	if (e.value.trim() == "please select")
		return null;
	if (e.value.trim() == "Sat" || e.value.trim() == "Sun") {
		priceList = PRICE_LIST_W_F;
		return priceList;
	}
	if (e.value.trim() != "Sat" || e.value.trim() != "Sun") {
		e = document.getElementById("movie-time");
		if (e.value.trim() == "please select")
			return null;
		if (e.value.trim() == "1PM") {
			priceList = PRICE_LIST_M_T;
			return priceList;
		} else {
			priceList = PRICE_LIST_W_F;
			return priceList;
		}
	}

}
function calculatePrice(evt) {

	var priceList;
	var e;
	var q;
	var total = 0;
	setMovieShedule();
	priceList = getPriceList();
	if (priceList == null)
		return;
	e = document.getElementById("SA-quanity");
	q = parseInt(e.value);
	e = document.getElementById("SA-display");
	e.value = "$" + (q * priceList.S_FU.value).toFixed(2);
	total += q * priceList.S_FU.value;

	e = document.getElementById("SP-quanity");
	q = parseInt(e.value);
	e = document.getElementById("SP-display");
	e.value = "$" + (q * priceList.S_CO.value).toFixed(2);
	total += q * priceList.S_CO.value;

	e = document.getElementById("SC-quanity");
	q = parseInt(e.value);
	e = document.getElementById("SC-display");
	e.value = "$" + (q * priceList.S_CH.value).toFixed(2);
	total += q * priceList.S_CH.value;

	e = document.getElementById("FA-quanity");
	q = parseInt(e.value);
	e = document.getElementById("FA-display");
	e.value = "$" + (q * priceList.F_AD.value).toFixed(2);
	total += q * priceList.F_AD.value;

	e = document.getElementById("FC-quanity");
	q = parseInt(e.value);
	e = document.getElementById("FC-display");
	e.value = "$" + (q * priceList.F_CH.value).toFixed(2);
	total += q * priceList.F_CH.value;

	e = document.getElementById("B1-quanity");
	q = parseInt(e.value);
	e = document.getElementById("B1-display");
	e.value = "$" + (q * priceList.BB.value).toFixed(2);
	total += q * priceList.BB.value;

	e = document.getElementById("B2-quanity");
	q = parseInt(e.value);
	e = document.getElementById("B2-display");
	e.value = "$" + (q * priceList.BB.value).toFixed(2);
	total += q * priceList.BB.value;

	e = document.getElementById("B3-quanity");
	q = parseInt(e.value);
	00
	e = document.getElementById("B3-display");
	e.value = "$" + (q * priceList.BB.value).toFixed(2);
	total += q * priceList.BB.value;

	e = document.getElementById("total_price");
	e.value = "$" + (total).toFixed(2);
}
function setMovieShedule() {
	var e;
	var i;
	var opt;
	e = document.getElementById("movie-day");
	for (i = 1; i < e.options.length; i++) {
		// e.removeChild(e.options[i]);
		e.options[i].textContent = "";
	}
	e = document.getElementById("movie-name");
	if (e.value.trim() == "Ant Man") {
		var tmp;
		e = document.getElementById("movie-day");

		for (i = 0; i < MOVIE_TIMES.MOVIE1.times.length; i++) {
			e.options[i + 1].textContent = MOVIE_TIMES.MOVIE1.times[i];

		}

		e = document.getElementById("movie-day");

		for (i = 0; i < MOVIE_TIMES.MOVIE1.times.length; i++) {

			if (e.value.trim() == MOVIE_TIMES.MOVIE1.times[i])
				tmp = i;

		}
		e = document.getElementById("movie-time");
		e.options[1].textContent = MOVIE_TIMES.MOVIE1.times2[tmp];
	}
	if (e.value.trim() == "Force of Destiny") {

		e = document.getElementById("movie-day");

		for (i = 0; i < MOVIE_TIMES.MOVIE2.times.length; i++) {
			e.options[i + 1].textContent = MOVIE_TIMES.MOVIE2.times[i];

		}
		e = document.getElementById("movie-day");

		for (i = 0; i < MOVIE_TIMES.MOVIE2.times.length; i++) {

			if (e.value.trim() == MOVIE_TIMES.MOVIE2.times[i])
				tmp = i;

		}
		e = document.getElementById("movie-time");
		e.options[1].textContent = MOVIE_TIMES.MOVIE2.times2[tmp];
	}

	if (e.value.trim() == "Ben-Hur") {

		e = document.getElementById("movie-day");

		for (i = 0; i < MOVIE_TIMES.MOVIE3.times.length; i++) {
			e.options[i + 1].textContent = MOVIE_TIMES.MOVIE3.times[i];

		}

		e = document.getElementById("movie-day");

		for (i = 0; i < MOVIE_TIMES.MOVIE3.times.length; i++) {

			if (e.value.trim() == MOVIE_TIMES.MOVIE3.times[i])
				tmp = i;

		}
		e = document.getElementById("movie-time");
		e.options[1].textContent = MOVIE_TIMES.MOVIE3.times2[tmp];

	}

	if (e.value.trim() == "A Walk in the Woods") {

		e = document.getElementById("movie-day");

		for (i = 0; i < MOVIE_TIMES.MOVIE3.times.length; i++) {
			e.options[i + 1].textContent = MOVIE_TIMES.MOVIE3.times[i];

		}

		e = document.getElementById("movie-day");

		for (i = 0; i < MOVIE_TIMES.MOVIE4.times.length; i++) {

			if (e.value.trim() == MOVIE_TIMES.MOVIE4.times[i])
				tmp = i;

		}
		e = document.getElementById("movie-time");
		e.options[1].textContent = MOVIE_TIMES.MOVIE4.times2[tmp];

	}

}

function actionFormSubmit() {
	var mFrom = document.getElementById('mBookingForm');
	var flag = 0;
	var tmpElement;
	tmpElement = document.getElementById("movie-name");
	if (tmpElement.value.indexOf("please select") >= 0
			|| tmpElement.value.trim() == "") {
		tmpElement = document.getElementById("error-movie-select");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("error-movie-select");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	tmpElement = document.getElementById("movie-day");
	if (tmpElement.value.indexOf("please select") >= 0
			|| tmpElement.value.trim() == "") {
		tmpElement = document.getElementById("error-movie-select");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("error-movie-select");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	tmpElement = document.getElementById("movie-time");
	if (tmpElement.value.indexOf("please select") >= 0
			|| tmpElement.value.trim() == "") {
		tmpElement = document.getElementById("error-movie-select");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("error-movie-select");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	tmpElement = document.getElementById("total_price");
	if (tmpElement.value.trim() == "$0.00" || tmpElement.value.trim() == "") {
		tmpElement = document.getElementById("error-ticket-select");
		removeCSSclassByTag(tmpElement, "hidden-error");
		appendCSSclassByTag(tmpElement, "display-error");
		flag = 1;
	} else {
		tmpElement = document.getElementById("error-ticket-select");
		removeCSSclassByTag(tmpElement, "display-error");
		appendCSSclassByTag(tmpElement, "hidden-error");
	}

	if (flag == 0) {
		mFrom.submit();
	}

}