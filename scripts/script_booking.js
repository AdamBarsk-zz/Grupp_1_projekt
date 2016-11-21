
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

// FORM LOGIC

var customers = [];
var inputs = document.getElementsByTagName("input");
var textArea = document.getElementsByTagName("textarea")[0];

window.onload = function() {

  // Load saved values
  Load();

  // Check if user makes a change and save
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", Save);
  }
  textArea.addEventListener("change", Save);
};

function mySubmit() {

  // Check if demands are met
  validate();

  // Create new object "customer"
  var customer = {
		inCheck: 					inputs[0].value,
		outCheck: 				inputs[1].value,
    doubleBeds:       inputs[2].value,
    singleBeds:       inputs[3].value,
		name: 				    inputs[4].value,
		email: 						inputs[5].value,
		phoneNumber: 			inputs[6].value,
		specialRequests: 	textarea.value
	};

  // Add customer to a list of customers
	customers.push(customer);
}
function Load() {

  // If found memory, load data
  // How to make it to a switch?
  if (typeof(localStorage.getItem("inCheck")) == 'string') {
    inputs[0].value = localStorage.getItem("inCheck");
  }
  if (typeof(localStorage.getItem("outCheck")) == 'string') {
    inputs[1].value = localStorage.getItem("outCheck");
  }
  if (typeof(localStorage.getItem("doubleBeds")) == 'string') {
    inputs[2].value = localStorage.getItem("doubleBeds");
  }
  if (typeof(localStorage.getItem("singleBeds")) == 'string') {
    inputs[3].value = localStorage.getItem("singleBeds");
  }
  if (typeof(localStorage.getItem("name")) == 'string') {
    inputs[4].value = localStorage.getItem("name");
  }
  if (typeof(localStorage.getItem("email")) == 'string') {
    inputs[5].value = localStorage.getItem("email");
  }
  if (typeof(localStorage.getItem("phoneNumber")) == 'string') {
    inputs[6].value = localStorage.getItem("phoneNumber");
  }
  if (typeof(localStorage.getItem("specialRequests")) == 'string') {
    textArea.value = localStorage.getItem("specialRequests");
  }
}
function Save(index) {

  // Save data to localStorage
	localStorage.setItem("inCheck", inputs[0].value);
	localStorage.setItem("outCheck", inputs[1].value);
  localStorage.setItem("doubleBeds", inputs[2].value);
  localStorage.setItem("singleBeds", inputs[3].value);
	localStorage.setItem("name", inputs[4].value);
	localStorage.setItem("email", inputs[5].value);
	localStorage.setItem("phoneNumber", inputs[6].value);
	localStorage.setItem("specialRequests", textArea.value);
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
