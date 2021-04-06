<?php

$db_connection = @new mysqli($host, $db_user, $db_password, $db_name);
$connection_open = false;

if($db_connection->connect_errno!=0){
    $_SESSION['message'] = "#general_error_display|Error:".$db_connection->connect_errno." Opis".$db_connection->connect_errno;
}
else{
		$connection_open = true;
}
?>