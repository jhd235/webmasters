
var txtid = [
		"fullname",
		"login",
		"pass",
		"datebirth",
		"place",
		"marital_status",
		"education",
		"work",
		"phone",
		"email",
		"addinfo"
	];
	var txten = [
		"Full name",
		"Login",
		"Pass",
		"Date of birth",
		"Place",
		"Marital status",
		"Education",
		"Work",
		"Phone",
		"Email",
		"Additional info"
	];
	var txtru = [
		"ФИО",
		"Логин",
		"Пароль",
		"Дата рождения",
		"Место проживания",
		"Семейное положение",
		"Образование",
		"Опыт работы",
		"Телефон",
		"Email",
		"Дополнительные сведения о себе"
	];
	
	var length = txtid.length;
	function en(){
	document.getElementById("lang").value = "en";
		for (i = 0; i < length; i++){
				
				document.getElementById(txtid[i]).innerHTML = txten[i];
				document.getElementById(txtid[i]+0).placeholder = txten[i];
				document.getElementById("submit").value = "Register";
				document.getElementById("marital_status0").options[0].innerHTML = "Single";
				document.getElementById("marital_status0").options[1].innerHTML = "Married";
			
			};
		
	};
	
function ru(){
document.getElementById("lang").value = "ru";
		for (i = 0; i < length; i++){
				
				document.getElementById(txtid[i]).innerHTML = txtru[i];
				document.getElementById(txtid[i]+0).placeholder = txtru[i];
				document.getElementById("submit").value = "Зарегистрироваться";
				document.getElementById("marital_status0").options[0].innerHTML = "Свободен\Свободна";
				document.getElementById("marital_status0").options[1].innerHTML = "Женат\Замужем";
			
			};
		
	};