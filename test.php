<DOCTYPE html>
<html>
<body>

<h1> <center>To Do List</center> </h1>

<form method="post">
	<label>Task:
		<input type="text" name="task">
	</label>
	<label>Date:
		<input type="datetime-local" name="date">
	</label>
	<label>Time:
		<input type="text" name="time">
	</label>
	<label>Who:
		<input type="text" name="who">
	</label>
	<input type="submit">
</form>
<?PHP

if (!empty($_POST)) {
	//var_dump($_POST);
	$data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	addData($data["task"], $data["date"], $data["who"]);
}

$user_name = "root";
$password = "";
$database = "mydb";
$server = "localhost";

mysqli_connect($server, $user_name, $password,$database);

print"Connection to the server has opened";

$db_handle = mysqli_connect($server, $user_name, $password, $database);



$db_found = mysqli_select_db($db_handle,$database);
if ($db_found){
    	
	$SQL = "SELECT * FROM to_do_list";
	$result = mysqli_query($db_handle, $SQL);

	while($db_field = mysqli_fetch_assoc($result)){
		print "<BR>";
		print $db_field['id']. "<BR>";
		print "<BR>";
		print "Task: ";
		print $db_field['Task']. "<BR>";
		print "Date: ";
	    print $db_field['date']. "<BR>";
		print "Who: ";
		print $db_field['Who']. "<BR>";
		print "<BR>";
		
	}
}

else{
	print"No money found";
}


function addData(string $task,string $time, string $who){
	$user_name = "root";
    $password = "";
    $database = "mydb";
    $server = "localhost";
	
	mysqli_connect($server, $user_name, $password,$database);
	$db_handle = mysqli_connect($server, $user_name, $password);
	$db_found = mysqli_select_db($db_handle,$database);
	if ($db_found){
	    $SQL = "INSERT INTO to_do_list(Task, date, Who) VALUES (?, ?, ?)";
        $result= $db_handle->prepare($SQL);
		$result->bind_param("sss", $task, $time, $who);
		$result->execute();

		mysqli_close($db_handle);
		print "<BR>";
        print "Records Added to database";
	return 'to do list';
}
else{
	print "Nothing found here";
}
}
$db_handle->close();

?>

<body>
<html>