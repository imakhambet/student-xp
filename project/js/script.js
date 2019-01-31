//when not login user presses new entry button
var modal = document.getElementById("myModal");
var btn = document.getElementById("notLoginNewPost");
var span  = document.getElementsByClassName("close")[0];
// otevira modalni okno
btn.onclick = function() {
	modal.style.display = "block";
}
//zavira modalni okno
span.onclick = function() {
	modal.style.display = "none";
}
//****************************************************//

//validace registrace
function regVal() {
    //validace pole username
  	var username = document.forms["signup"]["username"].value;
    var re = /[a-zA-Z0-9\-\_]$/
	
    //konrola na prazdne zadani jmena
	if (username == "") {
		document.getElementById("username_err").innerHTML = "USERNAME IS REQUIRED!";
		document.getElementById('username_err').style.textAlign="center";
		document.getElementById('username_err').style.margin="auto";
		document.getElementById('username_err').style.color="#a94442";
		document.getElementById('username_err').style.border="2.5px solid #a94442";
		document.getElementById('username_err').style.width = "304px";
		document.getElementById('username_err').style.padding = "5px";
		document.getElementById('username_err').style.background = "#f2dede";
		return false;
	}else {
		document.getElementById("username_err").innerHTML = "";
		document.getElementById("username_err").style.padding = "0px";
		document.getElementById("username_err").style.marginBottom = "0px";
		document.getElementById("username_err").style.width = "0px";
		document.getElementById("username_err").style.border="none";
	}
	
    //kontrola na spravne zadani jmena
	if (username.length < 3 || username.search(re) == -1) {
		document.getElementById("username_err").innerHTML = "USERNAME MUST BE AT LEAST 3 CHARACTERS! <br> (letters, numbers or underscores)";
		document.getElementById('username_err').style.textAlign="center";
		document.getElementById('username_err').style.margin="auto";
		document.getElementById('username_err').style.color="#a94442";
		document.getElementById('username_err').style.border="2.5px solid #a94442";
		document.getElementById('username_err').style.width = "304px";
		document.getElementById('username_err').style.padding = "5px";
		document.getElementById('username_err').style.background = "#f2dede";
		return false;
	}else {
		document.getElementById("username_err").innerHTML = "";
		document.getElementById("username_err").style.padding = "0px";
		document.getElementById("username_err").style.marginBottom = "0px";
		document.getElementById("username_err").style.width = "0px";
		document.getElementById("username_err").style.border="none";
	}
	
    //validace email
	var email = document.forms["signup"]["email"].value;
	var emailCh = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  	if(email=="") {
		document.getElementById("email_err").innerHTML = "EMAIL IS REQUIRED!";
		document.getElementById("email_err").style.textAlign="center";
		document.getElementById("email_err").style.margin="auto";
		document.getElementById("email_err").style.color="#a94442";
		document.getElementById("email_err").style.border="2.5px solid #a94442";
		document.getElementById("email_err").style.width = "304px";
		document.getElementById("email_err").style.padding = "5px";
		document.getElementById("email_err").style.background = "#f2dede";
		return false;
  	}else {
		document.getElementById("email_err").innerHTML = "";
		document.getElementById("email_err").style.padding = "0px";
		document.getElementById("email_err").style.marginBottom = "0px";
		document.getElementById("email_err").style.width = "0px";
		document.getElementById("email_err").style.border="none";
	}
	//kontrola na spravnost zadani email
	if(!emailCh.test(email)) {
		document.getElementById("email_err").innerHTML = "EMAIL IS NOT CORRECT!";	
		document.getElementById("email_err").style.textAlign="center";
		document.getElementById("email_err").style.margin="auto";
		document.getElementById("email_err").style.color="#a94442";
		document.getElementById("email_err").style.border="2.5px solid #a94442";
		document.getElementById("email_err").style.width = "304px";
		document.getElementById("email_err").style.padding = "5px";
		document.getElementById("email_err").style.background = "#f2dede";
		return false;
  	}else {
		document.getElementById("email_err").innerHTML = "";
		document.getElementById("email_err").style.padding = "0px";
		document.getElementById("email_err").style.marginBottom = "0px";
		document.getElementById("email_err").style.width = "0px";
		document.getElementById("email_err").style.border="none";
	}
	
    //validace hesla
	var password = document.forms["signup"]["password"].value;
	if(password=="") {
		document.getElementById("password_err").innerHTML = "PASSWORD IS REQUIRED!";
		document.getElementById("password_err").style.textAlign="center";
		document.getElementById("password_err").style.margin="auto";
		document.getElementById("password_err").style.color="#a94442";
		document.getElementById("password_err").style.border="2.5px solid #a94442";
		document.getElementById("password_err").style.width = "304px";
		document.getElementById("password_err").style.padding = "5px";
		document.getElementById("password_err").style.background = "#f2dede";
		return false;
  	}else {
		document.getElementById("password_err").innerHTML = "";
		document.getElementById("password_err").style.padding = "0px";
		document.getElementById("password_err").style.marginBottom = "0px";
		document.getElementById("password_err").style.width = "0px";
		document.getElementById("password_err").style.border="none";
	}
	
	if(password.length < 6) {
		document.getElementById("password_err").innerHTML = "PASSWORD MUST BE AT LEAST 6 CHARACTERS!";
		document.getElementById("password_err").style.textAlign="center";
		document.getElementById("password_err").style.margin="auto";
		document.getElementById("password_err").style.color="#a94442";
		document.getElementById("password_err").style.border="2.5px solid #a94442";
		document.getElementById("password_err").style.width = "304px";
		document.getElementById("password_err").style.padding = "5px";
		document.getElementById("password_err").style.background = "#f2dede";
		return false;
  	}else {
		document.getElementById("password_err").innerHTML = "";
		document.getElementById("password_err").style.padding = "0px";
		document.getElementById("password_err").style.marginBottom = "0px";
		document.getElementById("password_err").style.width = "0px";
		document.getElementById("password_err").style.border="none";
	}
	
	//kontrola na podobnost hesel
	var password2 = document.forms["signup"]["password2"].value;
	if(password != password2) {
		document.getElementById("password2_err").innerHTML = "THE TWO PASSWORDS DON'T MATCH!";
		document.getElementById("password2_err").style.textAlign="center";
		document.getElementById("password2_err").style.margin="auto";
		document.getElementById("password2_err").style.color="#a94442";
		document.getElementById("password2_err").style.border="2.5px solid #a94442";
		document.getElementById("password2_err").style.width = "304px";
		document.getElementById("password2_err").style.padding = "5px";
		document.getElementById("password2_err").style.marginBottom = "5px";
		document.getElementById("password2_err").style.background = "#f2dede";
		return false;
  	}else {
		document.getElementById("password2_err").innerHTML = "";
		document.getElementById("password2_err").style.padding = "0px";
		document.getElementById("password2_err").style.marginBottom = "0px";
		document.getElementById("password2_err").style.width = "0px";
		document.getElementById("password2_err").style.border="none";
	}
}

//validace prihlaseni
function logVal() {
  	var username = document.forms["login"]["username"].value;
    
	if (username == "") {
		document.getElementById("username_err").innerHTML = "USERNAME IS REQUIRED!";
		document.getElementById('username_err').style.textAlign="center";
		document.getElementById('username_err').style.margin="auto";
		document.getElementById('username_err').style.color="#a94442";
		document.getElementById('username_err').style.border="2.5px solid #a94442";
		document.getElementById('username_err').style.width = "304px";
		document.getElementById('username_err').style.padding = "5px";
		document.getElementById('username_err').style.background = "#f2dede";
		return false;
	}else {
		document.getElementById("username_err").innerHTML = "";
		document.getElementById("username_err").style.padding = "0px";
		document.getElementById("username_err").style.marginBottom = "0px";
		document.getElementById("username_err").style.width = "0px";
		document.getElementById("username_err").style.border="none";
	}
		
	var password = document.forms["login"]["password"].value;
	if(password=="") {
		document.getElementById("password_err").innerHTML = "PASSWORD IS REQUIRED!";
		document.getElementById("password_err").style.textAlign="center";
		document.getElementById("password_err").style.margin="auto";
		document.getElementById("password_err").style.color="#a94442";
		document.getElementById("password_err").style.border="2.5px solid #a94442";
		document.getElementById("password_err").style.width = "304px";
		document.getElementById("password_err").style.padding = "5px";
		document.getElementById("password_err").style.background = "#f2dede";
		return false;
  	}else {
		document.getElementById("password_err").innerHTML = "";
		document.getElementById("password_err").style.padding = "0px";
		document.getElementById("password_err").style.marginBottom = "0px";
		document.getElementById("password_err").style.width = "0px";
		document.getElementById("password_err").style.border="none";
	}
	
}
/****************************************************/

//validace vytvoreni noveho prispevku
function newEntVal() {
	var country = document.forms["newEnt"]["country"].value;
	if(country === "Select country") {
		document.getElementById("country_err").innerHTML = "PLEASE CHOOSE A COUNTRY!";
		document.getElementById("country_err").style.textAlign="center";
		document.getElementById("country_err").style.margin="auto";
		document.getElementById("country_err").style.color="#a94442";
		document.getElementById("country_err").style.border="2.5px solid #a94442";
		document.getElementById("country_err").style.width = "304px";
		document.getElementById("country_err").style.padding = "5px";
		document.getElementById("country_err").style.marginBottom = "5px";
		document.getElementById("country_err").style.background = "#f2dede";
		return false;
	}
	else {
		document.getElementById("country_err").innerHTML = "";
		document.getElementById("country_err").style.padding = "0px";
		document.getElementById("country_err").style.marginBottom = "0px";
		document.getElementById("country_err").style.width = "0px";
		document.getElementById("country_err").style.border="none";
	}
	
	var univ = document.forms["newEnt"]["university"].value;
	if(univ == "") {
		document.getElementById("university_err").innerHTML = "UNIVERSITY NAME IS REIQUIRED!";
		document.getElementById("university_err").style.textAlign="center";
		document.getElementById("university_err").style.margin="auto";
		document.getElementById("university_err").style.color="#a94442";
		document.getElementById("university_err").style.border="2.5px solid #a94442";
		document.getElementById("university_err").style.width = "304px";
		document.getElementById("university_err").style.padding = "5px";
		document.getElementById("university_err").style.marginBottom = "5px";
		document.getElementById("university_err").style.background = "#f2dede";
		return false;
	}else {
		document.getElementById("university_err").innerHTML = "";
		document.getElementById("university_err").style.padding = "0px";
		document.getElementById("university_err").style.marginBottom = "0px";
		document.getElementById("university_err").style.width = "0px";
		document.getElementById("university_err").style.border="none";
	}
	
	var title = document.forms["newEnt"]["title"].value;

	if(title == "") {
		document.getElementById("title_err").innerHTML = "TITLE IS REIQUIRED!";
		document.getElementById("title_err").style.textAlign="center";
		document.getElementById("title_err").style.margin="auto";
		document.getElementById("title_err").style.color="#a94442";
		document.getElementById("title_err").style.border="2.5px solid #a94442";
		document.getElementById("title_err").style.width = "304px";
		document.getElementById("title_err").style.padding = "5px";
		document.getElementById("title_err").style.marginBottom = "5px";
		document.getElementById("title_err").style.background = "#f2dede";
		return false;
	}else {
		document.getElementById("title_err").innerHTML = "";
		document.getElementById("title_err").style.padding = "0px";
		document.getElementById("title_err").style.marginBottom = "0px";
		document.getElementById("title_err").style.width = "0px";
		document.getElementById("title_err").style.border="none";
	}
	
	
	var body = document.forms["newEnt"]["newEntry"].value;
	if(body == "") {
		document.getElementById("text_err").innerHTML = "TEXT IS REIQUIRED!";
		document.getElementById("text_err").style.textAlign="center";
		document.getElementById("text_err").style.margin="auto";
		document.getElementById("text_err").style.color="#a94442";
		document.getElementById("text_err").style.border="2.5px solid #a94442";
		document.getElementById("text_err").style.width = "304px";
		document.getElementById("text_err").style.padding = "5px";
		document.getElementById("text_err").style.marginBottom = "5px";
		document.getElementById("text_err").style.background = "#f2dede";
		return false;
	}else {
		document.getElementById("text_err").innerHTML = "";
		document.getElementById("text_err").style.padding = "0px";
		document.getElementById("text_err").style.marginBottom = "0px";
		document.getElementById("text_err").style.width = "0px";
		document.getElementById("text_err").style.border="none";
	}
}