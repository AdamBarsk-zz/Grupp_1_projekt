
// GALLERY SLIDER

//Startar slidern
var falukorv = document.getElementsByClassName('preview');

for (var i = 0; i < falukorv.length; i++) {
	falukorv[i].addEventListener('click', startZoom);
}

function startZoom(){

  var zoombg = document.getElementById('black');
  var zoomed = document.getElementsByClassName('zoom');
  var previewHide = document.getElementsByClassName('preview');

  zoombg.style.display = "block";
  zoomed.style.display = "block";
  previewHide.style.display = "none";
}

//Avslutar slidern
document.getElementById('black').addEventListener('click', stopZoom);

function stopZoom(){
  var zoombg = document.getElementById('black')
  var zoom = document.getElementById('zoom')
  var previewHide = document.getElementById('preview');

  zoombg.style.display = "none"
  zoom.style.display = "none"
  previewHide.style.display = "block";
}
<<<<<<< HEAD
=======



//hejhejhej
>>>>>>> 6818a0f3dfd4792043f7471291a65ef71d10df60
