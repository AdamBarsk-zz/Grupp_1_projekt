var customer = {
  inCheck:					localStorage.getItem("inCheck"),
  outCheck: 				localStorage.getItem("outCheck"),
  doubleBeds:       localStorage.getItem("doubleBeds"),
  singleBeds:       localStorage.getItem("singleBeds"),
  name:				      localStorage.getItem("name"),
  email:						localStorage.getItem("email"),
  phoneNumber:			localStorage.getItem("phoneNumber"),
  specialRequests:	localStorage.getItem("specialRequests")
};
var paragraphs = document.getElementsByTagName("p");
paragraphs[0].innerHTML = customer.inCheck;
document.getElementsByTagName("p")[1].innerHTML = customer.outCheck;
document.getElementsByTagName("p")[2].innerHTML = customer.doubleBeds;
document.getElementsByTagName("p")[3].innerHTML = customer.singleBeds;
document.getElementsByTagName("p")[4].innerHTML = customer.name;
document.getElementsByTagName("p")[5].innerHTML = customer.email;
document.getElementsByTagName("p")[6].innerHTML = customer.phoneNumber;
document.getElementsByTagName("p")[7].innerHTML = customer.specialRequests;
console.log(customer);
