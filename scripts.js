
// GALLERY SLIDER

//Startar slidern
window.onload = function (){

document.getElementById('preview').addEventListener('click', startZoom);

function startZoom(){
  var zoombg = document.getElementById('black');
  var zoomed = document.getElementById('zoom');
  var previewHide = document.getElementById('preview');

  zoombg.style.display = "block";
  zoomed.style.display = "block";
  previewHide.style.display = "none";
}
}

//Avslutar slidern
window.onload = function (){

document.getElementById('black').addEventListener('click', stopZoom);

function stopZoom(){
  var zoombg = document.getElementById('black')
  var zoom = document.getElementById('zoom')
  var previewHide = document.getElementById('preview');

  zoombg.style.display = "none"
  zoom.style.display = "none"
  previewHide.style.display = "block";
}
}