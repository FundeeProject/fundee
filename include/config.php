<?PHP
############ DATABASE CONNECTION #################
error_reporting(0);
$host = "localhost";
$user = "root";
$pass = "1234";
$dbname = "FUNDEE";
$connect = mysql_connect($host,$user,$pass);
$data = mysql_query($dbname);
$objDB = mysql_select_db($dbname);
mysql_query("SET NAMES UTF8");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
setlocale(LC_ALL, 'th_TH');

############ GENERAL SETTING ######################
$title = "ระบบยืม - คืนครุภัณฑ์";
$version = "?version=1";
?>