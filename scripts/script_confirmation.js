
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