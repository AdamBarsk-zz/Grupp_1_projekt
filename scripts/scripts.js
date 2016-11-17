// BOKNING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!11

//Döp filen till det också!

$(function() {
  $("#checkin, #checkout").datepicker({
    inline: true,
    showOtherMonths: true,
    dateFormat: "yy-mm-dd",
    dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
  });
});

var customers = [];

function mySubmit() {
	var customer = {
		inCheck: 					document.getElementsByTagName("input")[0].value,
		outCheck: 				document.getElementsByTagName("input")[1].value,
		firstName: 				document.getElementsByTagName("input")[2].value,
		lastName: 				document.getElementsByTagName("input")[3].value,
		email: 						document.getElementsByTagName("input")[4].value,
		adress: 					document.getElementsByTagName("input")[5].value,
		phoneNumber: 			document.getElementsByTagName("input")[6].value,
		specialRequests: 	document.getElementsByTagName("textarea")[0].value
	};
	customers.push(customer);
	localStorage.setItem("inCheck", customer.inCheck);
	localStorage.setItem("outCheck", customer.outCheck);
	localStorage.setItem("firstName", customer.firstName);
	localStorage.setItem("lastName", customer.lastName);
	localStorage.setItem("email", customer.email);
	localStorage.setItem("adress", customer.adress);
	localStorage.setItem("phoneNumber", customer.phoneNumber);
	localStorage.setItem("specialRequests", customer.specialRequests);
	return false;
}
