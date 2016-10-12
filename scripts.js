
// GALLERY SLIDER

//Startar slidern
var falukorv = document.getElementsByClassName('preview');

for (var i = 0; i < falukorv.length; i++) {
	falukorv[i].addEventListener('click', startZoom);
}

var imgArray = [].slice.call(falukorv);
console.log(imgArray);
function startZoom(){
  var zoombg = document.getElementById('black');
	var previewHide = document.getElementsByClassName('preview');

  zoombg.style.display = "block";
	previewHide.style.display = "none";
}

//Avslutar slidern
document.getElementById('black').addEventListener('click', stopZoom);

function stopZoom(){
  var zoombg = document.getElementById('black')
  var previewHide = document.getElementById('preview');

  zoombg.style.display = "none"
  previewHide.style.display = "block";
}
