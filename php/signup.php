<?php

$configs = include('config.php');
$db_connect_test_task = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['database']);

$email = $_POST['email'];
$login = $_POST['login'];
$real_name = $_POST['real_name'];
$password = md5($_POST['password']);
$repeat_password = md5($_POST['repeat_password']);
$birth_date = $_POST['birth_date'];
$id_country = $_POST['id_country'];

if (empty($email)
	or empty($login)
	or empty($real_name)
	or empty($password)
	or empty($repeat_password)
	or empty($birth_date)
	or empty($id_country)) {
		$source = array(
			'success' => false,
			'message' => 'Please, fill all fields'
		);
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $source = array(
		'success' => false,
		'message' => 'Wrong E-mail'
 	);
}
elseif(preg_match('/["\[\]:;\|=,\+\*?<>]/', $login)) {
	$source = array(
		'success' => false,
		'message' => 'Login contains illegal characters'
 	);
}

elseif($password != $repeat_password){
	$source = array(
		'success' => false,
		'message' => 'Repeat password'
 	);
}
else{

$query = sprintf("SELECT
                        id
                    FROM
                        users
                    WHERE
                        login = '$login'
						OR
						email = '$email'
					",
                    mysqli_real_escape_string($db_connect_test_task, $login)
				);

$result = mysqli_query($db_connect_test_task, $query);

if (mysqli_fetch_array($result))
{
    $source = array(
		'success' => false,
		'message' => 'User already exists'
 	);
}
else
{
    $query = sprintf("INSERT INTO users (
						email,
						login,
						real_name,
						password,
						birth_date,
						id_country
                        )
                    VALUES(
                        '%s',
                        '%s',
                        '%s',
                        '%s',
						'%s',
                        '%s'
                    )",
                    mysqli_real_escape_string($db_connect_test_task, $email),
					mysqli_real_escape_string($db_connect_test_task, $login),
					mysqli_real_escape_string($db_connect_test_task, $real_name),
					mysqli_real_escape_string($db_connect_test_task, $password),
					mysqli_real_escape_string($db_connect_test_task, $birth_date),
					mysqli_real_escape_string($db_connect_test_task, $id_country)
                    );
    $result = mysqli_query($db_connect_test_task, $query);

 if ($result=='TRUE'){
	$source = array(
		'success' => true,
		'real_name' => $real_name
 	);
	include 'session/startSession.php';
	}
 else {
    $source = array(
		'success' => false,
		'message' => 'Wrong form'
 	);
    }
}

}

mysqli_close($db_connect_test_task);

echo json_encode($source);
?>
