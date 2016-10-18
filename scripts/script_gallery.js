//Make array of the thumbnails

var imgArray = $('flashy').toArray();

//Pop up carousel when clicking thumbnail 
$(".flashy").click(function(){
  var leftArrow = $("<span class='glyphicon glyphicon-chevron-left' id='left-arrow'></span>");
	var rightArrow = $("<span class='glyphicon glyphicon-chevron-right' id='right-arrow'></span>");
	var image = $("<img src='" + event.target.src + "' id='slider' class='active' />");
  $("#white").empty(); //Refreshing/empty pop-up on every click
  $("#black").css("display", "block"); //Make black bg visible
  $("#white").css("display", "block"); //Make pop-up visible
  $("#white").append(image, leftArrow, rightArrow); //Fill pop-up with img and arrows
  listener(event.target);
});

//Empties and hides carousel
$("#black, #footer").click(function(){
  $("#black").css("display", "none");
  $("#white").css("display", "none");
});

//Slidefunction
$("span.glyphicon").click(listener(event.target){
  		console.log(event.target);
	});
