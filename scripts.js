
// GALLERY SLIDER

//Startar slidern
var active_image;
var falukorv = document.getElementsByClassName('flashy');
var images = [];
for (var i = 0; i < falukorv.length; i++) {

	images.push(falukorv[i])
	images[i].addEventListener('click', startZoom);
}

function startZoom(event){
  var zoombg = document.getElementById('black');
	var div = document.getElementById('white');
	active_image = event.target.id;
	div.innerHTML = "<img src='"+event.target.src+"' id='test2' />"
	 + '<span class="glyphicon glyphicon-chevron-left" id="left-arrow"></span>'
	 + '<span class="glyphicon glyphicon-chevron-right" id="right-arrow"></span>'
	listener(event.target);
  zoombg.style.display = "block";
	div.style.display = "block";
}

//Avslutar slidern
document.getElementById('black').addEventListener('click', stopZoom);
document.getElementById('footer').addEventListener('click', stopZoom);

function stopZoom(){
  var zoombg = document.getElementById('black');
	var div = document.getElementById('white');

  zoombg.style.display = "none";
	div.style.display = "none";
}

// Change image
function listener(e){
	$("span.glyphicon").on('click', move);
	i=active_image-1;
	function move(){
		if (this.id == 'left-arrow') {
			i--;
		} else if (this.id == 'right-arrow') {
			i++;
		}
		if (i < 0) {
		 i = images.length - 1;
		}
		if (i > (images.length) - 1) {
			i = 0;
		}
		$("#test2").prop('src', images[i].src);
	}
}
