
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

// FORM LOGIC

var customers = [];
var inputs = document.getElementsByTagName("input");

window.onload = function() {

  document.getElementById("checkin").value = today;
  document.getElementById("checkout").value = tomorrow;

  // Load saved values
  Load();

  // Check if user makes a change and save
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", Save);
  }
};

function bookRooms() {

  // Validate form
  validate();
}
function Load() {

  // Get values and load from localStorage
  document.getElementById("checkin").value = localStorage.getItem("checkin");
  document.getElementById("checkout").value = localStorage.getItem("checkout");
  document.getElementById("doublerooms").value = localStorage.getItem("doublerooms");
  document.getElementById("singlerooms").value = localStorage.getItem("singlerooms");
  document.getElementById("familyrooms").value = localStorage.getItem("familyrooms");
  document.getElementById("firstname").value = localStorage.getItem("firstname");
  document.getElementById("lastname").value = localStorage.getItem("lastname");
  document.getElementById("email").value = localStorage.getItem("email");
  document.getElementById("phonenumber").value = localStorage.getItem("phonenumber");
  document.getElementById("requests").value = localStorage.getItem("requests");
}
function Save(index) {

  // Validate on input change
  validate();

  // Save data to localStorage
	localStorage.setItem("checkin", document.getElementById("checkin").value);
	localStorage.setItem("checkout", document.getElementById("checkout").value);
  localStorage.setItem("doublerooms", document.getElementById("doublerooms").value);
  localStorage.setItem("singlerooms", document.getElementById("singlerooms").value);
  localStorage.setItem("familyrooms", document.getElementById("familyrooms").value);
	localStorage.setItem("firstname", document.getElementById("firstname").value);
  localStorage.setItem("lastname", document.getElementById("lastname").value);
	localStorage.setItem("email", document.getElementById("email").value);
	localStorage.setItem("phonenumber", document.getElementById("phonenumber").value);
	localStorage.setItem("requests", document.getElementById("requests").value);
}

// Form validation
function validate() {
    $("#bookingForm").validate({
          errorPlacement: function(error, element){
            error.appendTo("#errors");
          },

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
  };
