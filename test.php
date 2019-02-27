<DOCTYPE html>
<html>
<body>

<h1> <center>To Do List</center> </h1>

<?PHP
//require '../configure.php';

$user_name = "root";
$password = "";
$database = "mydb";
$server = "127.0.0.1";

mysqli_connect($server, $user_name, $password,$database);
//$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
print"Connection to the server has opened";

$db_handle = mysqli_connect($server, $user_name, $password,$database);



$db_found = mysqli_select_db($db_handle,$database);

if ($db_found){
	print"We in the money";
}
else{
	print"No money found";
}


?>

<body>
<html>