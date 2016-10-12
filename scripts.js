
// GALLERY SLIDER

//Startar slidern
var falukorv = document.getElementsByClassName('preview');

for (var i = 0; i < falukorv.length; i++) {
	falukorv[i].addEventListener('click', startZoom);
}

var imgArray = [].slice.call(falukorv);




function startZoom(){
  var zoombg = document.getElementById('black');
	var previewHide = document.getElementsByClassName('preview');
	var div = document.getElementById('white')
	div.innerHTML += "Hej"

  zoombg.style.display = "block";
	div.style.display = "block";

}

//Avslutar slidern
document.getElementById('black').addEventListener('click', stopZoom);

function stopZoom(){
  var zoombg = document.getElementById('black')
  var previewHide = document.getElementById('preview');

  zoombg.style.display = "none"

}
