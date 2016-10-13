
// GALLERY SLIDER

//Startar slidern
var falukorv = document.getElementsByClassName('preview');

for (var i = 0; i < falukorv.length; i++) {
	falukorv[i].addEventListener('click', startZoom);
}


function startZoom(){

  var zoombg = document.getElementById('black');
  var  = document.getElementsByClassName('preview');

  zoombg.style.display = "block";
}


//Avslutar slidern
document.getElementById('black').addEventListener('click', stopZoom);

function stopZoom(){
  var zoombg = document.getElementById('black')
  var zoomed = document.getElementsByClassName('preview')

  zoombg.style.display = "none"
  zoomed.style.display = "none"
}


//hejhejhej