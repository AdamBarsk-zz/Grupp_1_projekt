
// GALLERY SLIDER

//Startar slidern
var falukorv = document.getElementsByClassName('flashy');

for (var i = 0; i < falukorv.length; i++) {
	falukorv[i].addEventListener('click', startZoom);
}



function startZoom(){
  var zoombg = document.getElementById('black');
	var div = document.getElementById('white')
	div.innerHTML = "<img src="+this.src+" />"
  + "<img src='icons/leftArrow.png' id='leftArrow' />"
  + "<img src='icons/rightArrow.png' id='rightArrow' />" 
  

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
