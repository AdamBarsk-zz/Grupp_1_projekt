
$(function() {
  $("#checkin").datepicker({
      inline:true,
      showOtherMonths:true,
      firstDay: 1,
      dateFormat: "yy-mm-dd",
      dayNamesMin: ["Sön", "Mån", "Tis", "Ons", "Tor", "Fre", "Lör"],
      minDate: today,
      required: true,
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
      required: true,
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
var textarea = document.getElementsByTagName("textarea")[0];

window.onload = function() {
  // Load saved values
  Load();

  // Check if user makes a change and save
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", Save);
  }
};

function bookRooms() {
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
  // Get values and save to localStorage
  inputs[0].value = localStorage.getItem("inCheck");
  inputs[1].value = localStorage.getItem("outCheck");
  inputs[2].value = localStorage.getItem("doubleBeds");
  inputs[3].value = localStorage.getItem("singleBeds");
  inputs[4].value = localStorage.getItem("name");
  inputs[5].value = localStorage.getItem("email");
  inputs[6].value = localStorage.getItem("phoneNumber");
  textarea.value = localStorage.getItem("specialRequests");
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
	localStorage.setItem("specialRequests", textarea.value);
}

// Form validation
var validate = $(function() {
    $("#bookingForm").validate({
      highlight: function(element) {
        $(element).closest(".form-group").addClass("has-error");
      },
      unhighlight: function(element) {
        $(element).closest(".form-group").removeClass("has-error");
      },

      rules: {
        doubleRooms: {
          required: true,
          digits: true
      //  range: [0, available rooms]
        },

        singleRooms: {
          required: true,
          digits: true
       // range: [0, available rooms]
        },

        familyRooms: {
          required: true,
          digits: true
        //range: [0, available rooms]
        },

        firstname: {
          required: true
        },

        lastname: {
         required: true
        },

        email: {
         required: true,
          email: true
        },

        phonenumber: {
          required: true
        }
      },

      messages: {
        doubleRooms: {
          required: "Fyll i antal dubbelrum",
          digits: "Använd endast siffror",
      //  range: ""
        },

        singleRooms: {
          required: "Fyll i antal enkelrum",
          digits: "Använd endast siffror",
      //  range: ""
        },

        familyRooms: {
          required: "Fyll i antal familjerum",
          digits: "Använd endast siffror",
      //  range: ""
        },

        firstname: {
          required: "Fyll i ditt förnamn"
        },

        lastname: {
         required: "Fyll i ditt efternamn"
        },

        email: {
          required: "Fyll i din emailadress",
          email: "Ange en giltig emailadress"
        },

        phonenumber: {
          required: "Fyll i ditt telefonnummer"
        }
      }
    });
  });
