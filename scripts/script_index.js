$(function() {
  $("#check-in-date").datepicker({
      inline:true,
      showOtherMonths:true,
      dateFormat: "yy-mm-dd",
      dayNamesMin: ["Mån", "Tis", "Ons", "Tor", "Fre", "Lör", "Sön"],
      minDate: 0,
      onSelect: function (date) {
          var date2 = $("#check-in-date").datepicker("getDate");
          date2.setDate(date2.getDate() + 1);
          $("#check-out-date").datepicker("setDate", date2);
          //sets minDate to checkin date + 1
          $("#check-out-date").datepicker("option", "minDate", date2);
      }
  });
  $("#check-out-date").datepicker({
      inline:true,
      showOtherMonths:true,
      dateFormat: "yy-mm-dd",
      dayNamesMin: ["Mån", "Tis", "Ons", "Tor", "Fre", "Lör", "Sön"],
      onClose: function () {
          var checkin = $("#check-in-date").datepicker("getDate");
          var checkout = $("#check-out-date").datepicker("getDate");
          //check to prevent a user from entering a date below date of checkin
          if (checkout <= checkin) {
              var minDate = $("#check-out-date").datepicker("option", "minDate");
              $("#check-out-date").datepicker("setDate", minDate);
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

var today = year + "-" + month + "-" + day;
var tomorrow = year + "-" + month + "-" + tomorrow;

document.getElementById("check-in-date").value = today;
document.getElementById("check-out-date").value = tomorrow;

// Booking

var inputs = document.getElementsByTagName("input");
var selects = document.getElementsByTagName("select");

function mySubmit() {
  localStorage.setItem("inCheck", inputs[0].value);
  localStorage.setItem("outCheck", inputs[1].value);
  localStorage.setItem("doubleBeds", selects[0].value);
  localStorage.setItem("singleBeds", selects[1].value);
}
