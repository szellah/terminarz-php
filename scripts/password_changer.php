<?php
session_start();

if(isset($_SESSION['user_login']))
{

$login = $_SESSION['user_login'];

$new_password= htmlentities($_POST['new_password'],ENT_QUOTES, "UTF-8");
$repeated_password=htmlentities($_POST['repeated_password'],ENT_QUOTES, "UTF-8");

require_once 'regex_password_handler.php';
if($new_password==$repeated_password && check_password_regex($new_password)){

	$old_password=htmlentities($_POST['old_password'],ENT_QUOTES, "UTF-8");

	$new_password = hash('sha256', $new_password);
	$old_password = hash('sha256', $old_password);

	$sql="SELECT uzytkownicy.id AS id FROM uzytkownicy WHERE uzytkownicy.Login='$login' AND uzytkownicy.Haslo='$old_password'";

	require_once "connect.php";
	require "connection_open.php";
	if($result = @$db_connection->query($sql))
	{
		if($result->num_rows==1){
			$user= $result->fetch_assoc();
			$user_id = $user['id'];

			$sql = "UPDATE uzytkownicy SET uzytkownicy.Haslo='$new_password' WHERE uzytkownicy.id=$user_id ";
			if(@$db_connection->query($sql)){
				$_SESSION['message'] = "#general_succes_display|Udało się zmienić hasło";
				header("Location: ../settings.php"); 
			}
			else{
				$_SESSION['message'] = "#general_error_display|Nie udało się zapisać nowego hasła";
				header("Location: ../settings.php"); 
			}

		}
		else{
			$_SESSION['message'] = "#general_error_display|Podane hasło jest niepoprawne";
			header("Location: ../settings.php"); 
		}
			
	}
	else{
		$_SESSION['message'] = "#general_error_display|Błąd bazy danych";//zapytanie
		header("Location: ../settings.php"); 
	}
	require_once "connection_close";
}
else{
	$_SESSION['message'] = "#general_error_display|Podane hasło jest niepoprawne";
	header("Location: ../settings.php"); 
}
}
?>