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


//Hides carousel
$("#black, #footer").click(function(){
  $("#black").css("display", "none"); //Hide the black bg
  $("#white").css("display", "none"); //Hide pop-up div
});


$("#test2").prop('src', images[i].src);