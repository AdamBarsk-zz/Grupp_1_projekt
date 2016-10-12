
// GALLERY SLIDER

//Startar slidern
document.getElementById('preview').addEventListener('click', startZoom);

function startZoom(){
  var zoombg = document.getElementById('black');
  var zoomed = document.getElementById('zoom');

  zoombg.style.display = "block";
  zoomed.style.display = "block";
}

//Avslutar slidern
document.getElementById('black').addEventListener('click', stopZoom);

function stopZoom(){
  var zoombg = document.getElementById('black')
  var zoom = document.getElementById('soom')

  zoombg.style.display = "none"
  zoom.style.display = "none"
}
