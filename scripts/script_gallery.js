//Make array of the thumbnails
var imgArray = $('.flashy').toArray();

//Pop up carousel when clicking thumbnail
$(".flashy").click(function(){
  var leftArrow = $("<span class='glyphicon glyphicon-chevron-left' id='left-arrow'></span>");
  var rightArrow = $("<span class='glyphicon glyphicon-chevron-right' id='right-arrow'></span>");
  var image = $("<img src='" + event.target.src + "' id='slider' />");
  $("#img_placeholder").empty(); //Refreshing/empty pop-up on every click
  $("#overlay").css("display", "block"); //Make overlay bg visible
  $("#img_placeholder").css("display", "block"); //Make pop-up visible
  $("#img_placeholder").append(image, leftArrow, rightArrow); //Fill pop-up with img and arrows
  imgIndex = $('.flashy').index(this);
  slide(imgIndex);
  console.log(imgIndex);
});

// Change image
function slide(e){
 $("span.glyphicon").on('click', move);
 i=imgIndex;
 function move(){
  if (this.id == 'left-arrow') {
    i--;
  }
  else if (this.id == 'right-arrow') {
    i++;
  }
  if (i < 0) {
   i = imgArray.length - 1;
  }
  if (i > (imgArray.length) - 1) {
    i = 0;
  }
  $("#slider").prop('src', imgArray[i].src);
 }
}

//Hides carousel
$("#overlay, #footer").click(function(){
  $("#overlay").css("display", "none"); //Hide the overlay bg
  $("#img_placeholder").css("display", "none"); //Hide pop-up div
});