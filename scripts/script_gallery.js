//Make array of the thumbnails
var imgArray = $('.flashy').toArray();

//Pop up carousel when clicking thumbnail
$(".flashy").click(function(){
  var leftArrow = $("<div class='arrow'><span class='glyphicon glyphicon-chevron-left' id='left-arrow'></span></div>");
  var rightArrow = $("<div class='arrow'><span class='glyphicon glyphicon-chevron-right' id='right-arrow'></span></div>");
  var image = $("<img src='" + event.target.src + "' id='slider' />");
  $("#white").empty(); //Refreshing/empty pop-up on every click
  $("#black").css("display", "block"); //Make black bg visible
  $("#white").css("display", "block"); //Make pop-up visible
  $("#white").append(image, leftArrow, rightArrow); //Fill pop-up with img and arrows
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
$("#black, #footer").click(function(){
  $("#black").css("display", "none"); //Hide the black bg
  $("#white").css("display", "none"); //Hide pop-up div
});
