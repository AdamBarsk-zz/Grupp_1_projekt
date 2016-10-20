//Make array of the thumbnails
var imgArray = $('.flashy').toArray();

//Pop up carousel when clicking thumbnail
$(".flashy").click(function(){
  var leftArrow = $("<span class='glyphicon glyphicon-chevron-left' id='left-arrow'></span>");
  var rightArrow = $("<span class='glyphicon glyphicon-chevron-right' id='right-arrow'></span>");
  var image = $("<img src='" + event.target.src + "' id='slider' />");
  $("#white").empty(); //Refreshing/empty pop-up on every click
  $("#black").css("display", "block"); //Make black bg visible
  $("#white").css("display", "block"); //Make pop-up visible
  $("#white").append(image, leftArrow, rightArrow); //Fill pop-up with img and arrows
  imgIndex = $('.flashy').index(this);
<<<<<<< HEAD
  slide(imgIndex); 
  console.log(imgIndex);
});

function slide(imgIndex) {
  $("span.glyphicon").click(function(){
    switch('span.glyphicon') {
  /*  case 'span.glyphicon' === '#right-arrow' && imgIndex === imgArray.length:  //if on last image going right, go to first image
        imgIndex = imgArray[0];
        $('#white.first').replaceWith("<img src='" + imgIndex.src + "' id='slider' />");
        break;
      case 'span.glyphicon' === '#left-arrow' && imgIndex === 0:  //if on first image going left, go to last image
        imgIndex = imgArray.length;
         $('#white.first').replaceWith("<img src='" + imgIndex.src + "' id='slider' />");
        break; */
      case this === '#right-arrow':  //go to next image
        imgIndex++;
        $('#white.first').replaceWith("<img src='" + imgIndex + "' id='slider' />");
        break;
      default:  //go to previous image
        imgIndex--;
        $('#white.first').replaceWith("<img src='" + imgIndex + "' id='slider' />");
        console.log(imgIndex);
          break;
    }
  });
}


=======
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

>>>>>>> bf72c81b521aa8b471de06a51ac4f4b1b2594f85
//Hides carousel
$("#black, #footer").click(function(){
  $("#black").css("display", "none"); //Hide the black bg
  $("#white").css("display", "none"); //Hide pop-up div
});
<<<<<<< HEAD


$("#test2").prop('src', images[i].src);
=======
>>>>>>> bf72c81b521aa8b471de06a51ac4f4b1b2594f85
