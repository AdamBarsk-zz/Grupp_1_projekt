
// GALLERY SLIDER

//Startar slidern
var falukorv = document.getElementsByClassName('flashy');
var images = []
for (var i = 0; i < falukorv.length; i++) {

	images.push(falukorv[i])
	images[i].addEventListener('click', startZoom);
}



console.log(images);

function startZoom(){
  var zoombg = document.getElementById('black');
	var div = document.getElementById('white')
	div.innerHTML = "<img src='"+this.src+"' id='test2' />"
	 + '<span class="glyphicon glyphicon-chevron-left" id="left-arrow"></span>'
	 + '<span class="glyphicon glyphicon-chevron-right" id="right-arrow"></span>'

	 listener();
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
function listener(){
	$("span.glyphicon").on('click', move);
	function move()
	{

	    // //Om span class= left i--
	    if (this.id == 'left-arrow') {
				 i--;
			 }
	    //     // Om span class=right i++
	    else if (this.id == 'right-arrow') {
				 i++;
		 	}
			//
	    // // OM i<0 eller i > images.length-1 då ändra i till godkänt värde
	    if (i < 0) {
				 i = images.length - 1;
			 }
	    if (i > (images.length) - 1) {
				 i = 0;
			 }
	    $("#test2").prop('src', images[i].src);//Visa bild
	}
}
