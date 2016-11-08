
$(function() {
  $("#checkin").datepicker({
      inline:true,
      showOtherMonths:true,
      firstDay: 1,
      dateFormat: "yy-mm-dd",
      dayNamesMin: ["Sön", "Mån", "Tis", "Ons", "Tor", "Fre", "Lör"],
      minDate: today,
      onSelect: function (date) {
          var date2 = $("#checkin").datepicker("getDate");
          date2.setDate(date2.getDate() + 1);
          $("#checkout").datepicker("setDate", date2);
          //sets minDate to checkin date + 1
          $("#checkout").datepicker("option", "minDate", date2);
      }
  });
  $("#checkout").datepicker({
      inline:true,
      showOtherMonths:true,
      firstDay: 1,
      dateFormat: "yy-mm-dd",
      dayNamesMin: ["Sön", "Mån", "Tis", "Ons", "Tor", "Fre", "Lör"],
      minDate: tomorrow,
      onClose: function () {
          var checkin = $("#checkin").datepicker("getDate");
          var checkout = $("#checkout").datepicker("getDate");
          //check to prevent a user from entering a date below date of checkin
          if (checkout <= checkin) {
              var minDate = $("#checkout").datepicker("option", "minDate");
              $("#checkout").datepicker("setDate", minDate);
          }
      }
  });
});

var date = new Date();

var day = date.getDate();
var tomorrow = date.getDate() + 1;
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;
if (tomorrow < 10) tomorrow = "0" + tomorrow;

var today = year + "-" + month + "-" + day;
var tomorrow = year + "-" + month + "-" + tomorrow;

document.getElementById("checkin").value = today;
document.getElementById("checkout").value = tomorrow;

// Form logic
var customers = [];
var inputs = document.getElementsByTagName("input");

window.onload = function() {
  Load();
};

for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener("change", Save);
}

function mySubmit() {
  validate();
}
function Load() {
  inputs[0].value = localStorage.getItem("inCheck");
  inputs[1].value = localStorage.getItem("outCheck");
  inputs[2].value = localStorage.getItem("doubleBeds");
  inputs[3].value = localStorage.getItem("singleBeds");
  inputs[4].value = localStorage.getItem("inCheck");
  inputs[5].value = localStorage.getItem("outCheck");
  inputs[6].value = localStorage.getItem("doubleBeds");
  inputs[7].value = localStorage.getItem("singleBeds");
}
function Save(index) {
  var customer = {
		inCheck: 					document.getElementsByTagName("input")[0].value,
		outCheck: 				document.getElementsByTagName("input")[1].value,
    doubleBeds:       document.getElementsByTagName("input")[2].value,
    doubleBeds:       document.getElementsByTagName("input")[3].value,
		name: 				    document.getElementsByTagName("input")[4].value,
		email: 						document.getElementsByTagName("input")[5].value,
		phoneNumber: 			document.getElementsByTagName("input")[6].value,
		specialRequests: 	document.getElementsByTagName("textarea")[0].value
	};
	customers.push(customer);

  // Save data to localStorage
	localStorage.setItem("inCheck", customer.inCheck);
	localStorage.setItem("outCheck", customer.outCheck);
  localStorage.setItem("doubleBeds", customer.doubleBeds);
  localStorage.setItem("singleBeds", customer.singleBeds);
	localStorage.setItem("name", customer.name);
	localStorage.setItem("email", customer.email);
	localStorage.setItem("phoneNumber", customer.phoneNumber);
	localStorage.setItem("specialRequests", customer.specialRequests);
	return false;
}
function validate() {

  // Validation (check for spaces in name)
  var name = document.getElementById('name');
  chars = name.value.split(' ');
  if (chars.length > 1) {
    name.focus();
  }
  else {
    alert('Skriv hela ditt namn');
  }
}
