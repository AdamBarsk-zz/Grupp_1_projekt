
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

// Form logic
var customers = [];
var inputs = document.getElementsByTagName("input");
var textarea = document.getElementsByTagName("textarea")[0];

window.onload = function() {
  // Load saved values
  Load();
};

for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener("change", Save);
}

function bookRooms() {
  // Check if demands are met
  validate();
}
function Load() {
  inputs[0].value = localStorage.getItem("inCheck");
  inputs[1].value = localStorage.getItem("outCheck");
  inputs[2].value = localStorage.getItem("doubleBeds");
  inputs[3].value = localStorage.getItem("singleBeds");
  inputs[4].value = localStorage.getItem("name");
  inputs[5].value = localStorage.getItem("email");
  inputs[6].value = localStorage.getItem("phoneNumber");
  inputs[0].value = localStorage.getItem("specialRequests");
}
function Save(index) {
  var customer = {
		inCheck: 					document.getElementsByTagName("input")[0].value,
		outCheck: 				document.getElementsByTagName("input")[1].value,
    doubleBeds:       document.getElementsByTagName("input")[2].value,
    singleBeds:       document.getElementsByTagName("input")[3].value,
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
