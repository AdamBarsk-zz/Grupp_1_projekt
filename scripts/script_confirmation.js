
var paragraphs = document.getElementsByTagName("p");

paragraphs[0].innerHTML = localStorage.getItem("checkin");
paragraphs[1].innerHTML = localStorage.getItem("checkout");
paragraphs[2].innerHTML = localStorage.getItem("doublerooms");
paragraphs[3].innerHTML = localStorage.getItem("singlerooms");
paragraphs[4].innerHTML = localStorage.getItem("familyrooms");
paragraphs[5].innerHTML = localStorage.getItem("firstname") + " " + localStorage.getItem("lastname");
paragraphs[6].innerHTML = localStorage.getItem("email");
paragraphs[7].innerHTML = localStorage.getItem("phonenumber");
paragraphs[8].innerHTML = localStorage.getItem("requests");

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