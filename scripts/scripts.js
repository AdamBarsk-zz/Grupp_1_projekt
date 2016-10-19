// BOKNING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!11

$(function() {
  $("#checkin, #checkout").datepicker({
    inline: true,
    showOtherMonths: true,
    dateFormat: "yy-mm-dd",
    dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
  });
});

var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;
document.getElementById("checkin").value = today;
document.getElementById("checkout").value = today;



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
