<?php

$configs = include('config.php');
$db_connect_test_task = mysqli_connect($configs['host'], $configs['username'], $configs['password'], $configs['database']);

$query  = sprintf("SELECT 
						*
					FROM 
						countries
				");
$result = mysqli_query($db_connect_test_task, $query);

if($result && mysqli_num_rows($result)>0){
	$source = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
else{
	$source = array(
		'success' => false
 	);
}

mysqli_close($db_connect_test_task);

echo json_encode($source);
?>
