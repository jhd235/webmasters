<meta charset = "utf-8">
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once("config.php");
$conn_result = mysql_connect($host, $user, $pass) or die("connection fail ".mysql_error());
if (empty($_POST['login'])) 
{die("Вы не ввели логин<br>");

};
if (empty($_POST['pass']))
{
	die("Вы не ввели пароль");
}
$login = mysql_real_escape_string($_POST['login']);
$pass = mysql_real_escape_string($_POST['pass']);
$pass = md5($pass);
$query_lookup = "select id, fullname, login, datebirth, place, marital_status, education, work, phone, email, addinfo, color
from tantalkz_webmasters.users where login = '$login' and pass = '$pass'";
$result = mysql_query($query_lookup) or die("Не зарегистрирован");
$array = mysql_fetch_array($result);
$iid = $array['id'];
$query_avatar = "select id, name_original, path, name_file from tantalkz_webmasters.avatars where id = $iid";
$res_avatar = mysql_query($query_avatar) or die("Не зарегистрирован");
$avatar = mysql_fetch_array($res_avatar);
echo "id: ".$array['id']."<br>";
echo "Fullname: ".$array['fullname']."<br>";
echo "Login: ".$array['login']."<br>";
echo "Datebirth: ".$array['datebirth']."<br>";
echo "Place: ".$array['place']."<br>";
echo "Marital status: ".$array['marital_status']."<br>";
echo "Education: ".$array['education']."<br>";
echo "Work: ".$array['work']."<br>";
echo "Phone: ".$array['phone']."<br>";
echo "Email: ".$array['email']."<br>";
echo "Addinfo: ".$array['addinfo']."<br>";
echo "Avatar: <a href=".$avatar['path'].">Link</a><br>";