<?php

$configs = include('config.php');
$db_connect_test_task = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['database']);

$login = $_POST['login'];
$password = md5($_POST['password']);

$query  = sprintf("SELECT 
						id,
						real_name
					FROM 
						users 
					WHERE
						(login = '$login'
						OR
						email = '$login')
						AND
						password = '$password'
				",
				mysqli_real_escape_string($db_connect_test_task, $login),
				mysqli_real_escape_string($db_connect_test_task, $password)
				);
$result = mysqli_query($db_connect_test_task, $query);

if($result && mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$source = array(
		'success' => true,
		'id' => $row['id'],
		'real_name' => $row['real_name']
 	);
	include 'session/startSession.php';
}
else{
	$source = array(
		'success' => false,
		'message' => 'Wrong login or password'
 	);
}
mysqli_close($db_connect_test_task);

echo json_encode($source);
?>
