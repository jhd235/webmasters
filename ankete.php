<meta charset = "utf-8">
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once("config.php");
$lang = $_POST["lang"];
$conn_result = mysql_connect($host, $user, $pass) or die("connection fail ".mysql_error());
$fullname = mysql_real_escape_string($_POST['fullname']);
$login = mysql_real_escape_string($_POST['login']);
$pass = mysql_real_escape_string($_POST['pass']);
$datebirth = mysql_real_escape_string($_POST['datebirth']);
$place = mysql_real_escape_string($_POST['place']);
$marital_status = mysql_real_escape_string($_POST['marital_status']);
$education = mysql_real_escape_string($_POST['education']);
$work = mysql_real_escape_string($_POST['work']);
$phone = mysql_real_escape_string($_POST['phone']);
$email = mysql_real_escape_string($_POST['email']);
$addinfo = mysql_real_escape_string($_POST['addinfo']);
$color = mysql_real_escape_string($_POST['color']);
if ($lang === "ru"){
echo "Вы заполнили анкету следующей информацией о себе:<br>";
echo "ФИО: ".$fullname; 
echo "Логин: ".$login; 
echo "<br>Дата рождения: ".$datebirth; 
echo "<br>Место проживания: ".$place; 
echo "<br>Семейное положение: ".$marital_status; 
echo "<br>Образование: ".$education; 
echo "<br>Опыт работы: ".$work; 
echo "<br>Телефон: ".$phone; 
echo "<br>Email: ".$email; 
echo "<br>Дополнительные сведения о себе: ".$addinfo; 
}
else {
	echo "You were filled out form with following:<br>";
echo "Fullname: ".$fullname; 
echo "Login: ".$login; 
echo "<br>Date of birth: ".$datebirth; 
echo "<br>Living place: ".$place; 
echo "<br>Marital status: ".$marital_status; 
echo "<br>Education: ".$education; 
echo "<br>Work expirience: ".$work; 
echo "<br>Phone: ".$phone; 
echo "<br>Email: ".$email; 
echo "<br>Additional info about me: ".$addinfo."<br>"; 
	}
	$pass = md5($pass);
	$query_insert = "INSERT INTO tantalkz_webmasters.users (id, fullname, login, pass, datebirth, place, 
	marital_status, education, work, phone, email, addinfo, color) VALUES(NULL, '$fullname', '$login', '$pass', '$datebirth', '$place', 
	'$marital_status', '$education', '$work', '$phone', '$email', '$addinfo', '$color')";
	/*$sql = "INSERT INTO `tantalkz_webmasters`.`users` (`id`, `fullname`, `datebirth`, `place`, 
	`marital_status`, `education`, `work`, `phone`, `email`, `addinfo`, `color`) VALUES 
	(NULL, \'John Doe\', \'2014-12-10\', \'Almaty\', \'married\', \'higher\', \'5 years\', \'321654987\', \'qw@oi.org\', \'note\', \'black\');";*/
	$query_select = "select * from users";
	echo $query_insert;
	$query_insert_result = mysql_query($query_insert) or die("insert fail ".mysql_error());

	
	//image processing part
	
$target_dir = "uploads/";
$name_original = basename($_FILES["fileToUpload"]["name"]);
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageFileType = pathinfo($name_original, PATHINFO_EXTENSION);
$name_hash = md5(basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $name_hash.".".$imageFileType;
$name_hash = $name_hash.".".$imageFileType;
$uploadOk = 1;

//echo $imageFileType;
$query_image_insert = "INSERT INTO tantalkz_webmasters.avatars (id, name_original, path, name_file) 
VALUES(NULL, '$name_original', '$target_file', '$name_hash')"; 
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "<br>Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		echo $uploadOk;
		mysql_query($query_image_insert);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}