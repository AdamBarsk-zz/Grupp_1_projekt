
// GALLERY SLIDER

//Startar slidern
var falukorv = document.getElementsByClassName('flashy');

for (var i = 0; i < falukorv.length; i++) {
	falukorv[i].addEventListener('click', startZoom);
}

function startZoom(){
  var zoombg = document.getElementById('black');
	var div = document.getElementById('white')
	div.innerHTML += "<img src='"+this.src+"' />"



  zoombg.style.display = "block";
	div.style.display = "block";
}

//Avslutar slidern
document.getElementById('black').addEventListener('click', stopZoom);
document.getElementById('footer').addEventListener('click', stopZoom);

function stopZoom(){
  var zoombg = document.getElementById('black')
	var div = document.getElementById('white')

  zoombg.style.display = "none"
	div.style.display = "none";
}

// Change image

$("#left-arrow").on('click', move);
function move()
{
	console.log("hej")
	    // //Om span class= left i--
	    // if (this.id == 'left') { i--; }
	    //     // Om span class=right i++
	    // else if (this.id == 'right') { i++; }
			//
	    // // OM i<0 eller i > images.length-1 då ändra i till godkänt värde
	    // if (i < 0) { i = images.length - 1; }
	    // if (i > (images.length - 1)) { i = 0;}
	    // $("#myImg").prop('src', images[i].src);//Visa bild
}
