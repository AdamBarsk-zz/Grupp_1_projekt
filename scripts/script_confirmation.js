function abort() {
	bookingdiv.style.display = "none";
	abortdiv.style.display = "block";

	// after 4 seconds, go back to home page
	setTimeout(function() {
		window.location.href = "/index.php";
	}, 4000);
}