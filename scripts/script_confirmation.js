function submit() {

	var bookdiv = document.getElementById("bookdiv");
	var thanksdiv = document.getElementById("thanksdiv");

	bookdiv.style.display = "none";
	thanksdiv.style.display = "block";

	// after 6 seconds, go back to home page
	setTimeout(function() {
		window.location.href = "/index.php";
	}, 6000);
}