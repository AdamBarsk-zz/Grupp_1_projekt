$(".admin").attr("contenteditable", "true");

admin = $(".admin");
texter = [];
for (var i = 0; i < admin.length; i++) {
  texter.push(admin[i].id);
  console.log(texter[i]);
}

$("#save").click(function(texter){
  for (var i = 0; i < admin.length; i++) {


  $edit = $(admin[i]).html();
  $id = admin[i].id;
  $.ajax({
    url: "save.php",
    type: "post",
    data: {data: $edit, id: $id},
    // processData: false,
    datatype: "html",
  });
}
});
