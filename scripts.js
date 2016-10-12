
// Gallery slider
document.getElementById('bajs').addEventListener('click', startZoom);

function startZoom(){
  var zoombg = document.getElementById('black');
  var zoomis = document.getElementById('soom');

  alert("Jag vann! Du förlorade!");

  zoombg.style.display = "block";
  zoomis.style.display = "block";
}


function stopZoom(){
  var zoombg = document.getElementById('black')
  var zoom = document.getElementById('soom')

  zoombg.style.display = "none"
  zoom.style.display = "none"
}

