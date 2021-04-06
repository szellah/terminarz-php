<?php

require_once "connect.php";

session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$login = htmlentities($login, ENT_QUOTES, "UTF-8");
$password = htmlentities($password, ENT_QUOTES, "UTF-8");

$password = hash('sha256', $password);

$sql = "SELECT uzytkownicy.id AS 'id', uzytkownicy.Login AS 'Login', uzytkownicy.Imie AS 'Name', uzytkownicy.Nazwisko AS 'Surname', uzytkownicy.Ranga AS Rank, uzytkownicy.Rola AS Role FROM uzytkownicy WHERE uzytkownicy.Login='$login' AND uzytkownicy.Haslo='$password'";

require "connection_open.php";
if($result = @$db_connection->query($sql))
	{
		if($result->num_rows==1)
		{
			$user = $result->fetch_assoc();
			$_SESSION['user_id']= $user['id']; 
			$_SESSION['user_login']= $login; 
			$_SESSION['user_name'] = $user['Name'];
			$_SESSION['user_surname'] = $user['Surname'];
			$_SESSION['user_rank'] = $user['Rank'];
			$_SESSION['user_role'] = $user['Role'];					
		}
		else
		{
			$_SESSION['message'] = "#login_error_display|Wpisany login bądź hasło są niepoprawne";
		}
	}
require "connection_close.php";


header("Location: ../");
?>