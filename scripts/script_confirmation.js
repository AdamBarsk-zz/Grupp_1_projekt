var customer = {
  inCheck:					localStorage.getItem("inCheck"),
  outCheck: 				localStorage.getItem("outCheck"),
  doubleBeds:       localStorage.getItem("doubleBeds"),
  singleBeds:       localStorage.getItem("singleBeds"),
  firstName:				localStorage.getItem("firstName"),
  lastName:					localStorage.getItem("lastName"),
  email:						localStorage.getItem("email"),
  adress:						localStorage.getItem("adress"),
  phoneNumber:			localStorage.getItem("phoneNumber"),
  specialRequests:	localStorage.getItem("specialRequests")
};
document.getElementsByTagName("p")[0].innerHTML = customer.inCheck;
document.getElementsByTagName("p")[1].innerHTML = customer.outCheck;
document.getElementsByTagName("p")[2].innerHTML = customer.doubleBeds;
document.getElementsByTagName("p")[3].innerHTML = customer.singleBeds;
document.getElementsByTagName("p")[4].innerHTML = customer.firstName;
document.getElementsByTagName("p")[5].innerHTML = customer.lastName;
document.getElementsByTagName("p")[6].innerHTML = customer.email;
document.getElementsByTagName("p")[7].innerHTML = customer.adress;
document.getElementsByTagName("p")[8].innerHTML = customer.phoneNumber;
document.getElementsByTagName("p")[9].innerHTML = customer.specialRequests;
console.log(customer);
