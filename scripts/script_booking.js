$(function() {
  $("#checkin").datepicker({
      inline: true,
      showOtherMonths: true,
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
      inline: true,
      showOtherMonths: true,
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
var tomorrowMonth = date.getDate() +1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (tomorrowMonth < 10) tomorrowMonth = "0" + tomorrowMonth;
if (day < 10) day = "0" + day;
if (tomorrow < 10) tomorrow = "0" + tomorrow;

var today = year + "-" + month + "-" + day;
var tomorrow = year + "-" + month + "-" + tomorrow;

document.getElementById("checkin").value = today;
document.getElementById("checkout").value = tomorrow;

// FORM LOGIC

var customers = [];
var inputs = document.getElementsByTagName("input");
var selects = document.getElementsByTagName("select");
var textArea = document.getElementsByTagName("textarea")[0];
window.onload = function() {

  // Load saved values
  Load();

  // Check if user makes a change and save
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", Save);
  }

  for (var i = 0; i < selects.length; i++) {
    selects[i].addEventListener("change", Save);
  }

  textArea.addEventListener("change", Save);
};

document.getElementById('submitBooking').addEventListener('click', function (){
 // Validate form
 validate();
});

function Load() {

  // If found memory, load data
  // How to make it to a switch?
  if (typeof(localStorage.getItem("checkin")) == 'string') {
    document.getElementById("checkin").value = localStorage.getItem("checkin");
  }
  if (typeof(localStorage.getItem("checkout")) == 'string') {
    document.getElementById("checkout").value = localStorage.getItem("checkout");
  }
  if (typeof(localStorage.getItem("doublerooms")) == 'string') {
    document.getElementById("doublerooms").value = localStorage.getItem("doublerooms");
  }
  if (typeof(localStorage.getItem("singlerooms")) == 'string') {
    document.getElementById("singlerooms").value = localStorage.getItem("singlerooms");
  }
  if (typeof(localStorage.getItem("familyrooms")) == 'string') {
    document.getElementById("familyrooms").value = localStorage.getItem("familyrooms");
  }
  if (typeof(localStorage.getItem("firstname"))){
    document.getElementById("firstname").value = localStorage.getItem("firstname");
  }
  if (typeof(localStorage.getItem("lastname"))){
    document.getElementById("lastname").value = localStorage.getItem("lastname");
  }
  if (typeof(localStorage.getItem("email")) == 'string') {
    document.getElementById("email").value = localStorage.getItem("email");
  }
  if (typeof(localStorage.getItem("phonenumber")) == 'string') {
    document.getElementById("phonenumber").value = localStorage.getItem("phonenumber");
  }
  if (typeof(localStorage.getItem("requests")) == 'string') {
    document.getElementById("requests").value = localStorage.getItem("requests");
  }
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

      rules:  {
        checkin: {
          required: true,
          minlength: 10
        },

        checkout: {
          required: true,
          minlength: 10
        },

        doublerooms: {
          require_from_group: [1, ".rooms"]
        },
        singlerooms: {
          require_from_group: [1, ".rooms"]
        },
        familyrooms: {
          require_from_group: [1, ".rooms"]
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
          required: true,
          digits: true,
          minlength: 8,
          maxlength: 20
        }
      },

      messages: {

        checkin: {
          required: "Fyll i inchecknings datum",
          minlength: "Fyll i ett giltigt datum"
        },

        checkout: {
          required: "Fyll i utchecknings datum",
          minlength: "Fyll i ett giltigt datum"
        },

        doublerooms: {
          require_from_group: "Fyll i antal rum"
        },

        singlerooms: {
          require_from_group: ""
        },

        familyrooms: {
          require_from_group: ""
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
          required: "Fyll i ditt telefonnummer",
          digits: "Ange ett giltigt telefonnummer",
          minlength: "Ditt telefonnummer är för kort",
          maxlength: "Ditt telefonnummer är för långt"
        }
      }
    });
  }
  // places the database errors in the same field as jquery validator
  $( ".error" ).appendTo( "#errors" );
