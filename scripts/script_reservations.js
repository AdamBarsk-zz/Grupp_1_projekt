$(function() {
  $("#reservation-date").datepicker({
      inline: true,
      showOtherMonths: true,
      firstDay: 1,
      dateFormat: "yy-mm-dd",
      dayNamesMin: ["Sön", "Mån", "Tis", "Ons", "Tor", "Fre", "Lör"]
    });
});

  var date = new Date();

  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day;

  document.getElementById("reservation-date").value = today;

  var selects = document.getElementsByTagName("select");


$(".checkout").click(function() {
  console.log(this);
  $id = $(this).parent().next().html();
  $.ajax({
    url: "checkout.php",
    type: "post",
    data: {id:$id},
    datatype: "html",
  });
  location.reload();
});
