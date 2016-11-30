var bookingdiv = document.getElementById("bookingdiv");
var bookeddiv = document.getElementById("bookeddiv");
var abortdiv = document.getElementById("abortdiv");

function submit() {

	bookingdiv.style.display = "none";
	bookeddiv.style.display = "block";

	// after 4 seconds, go back to home page
	setTimeout(function() {
		window.location.href = "/index.php";
	}, 4000);
}
function abort() {
	bookingdiv.style.display = "none";
	abortdiv.style.display = "block";

	// after 4 seconds, go back to home page
	setTimeout(function() {
		window.location.href = "/index.php";
	}, 4000);
}