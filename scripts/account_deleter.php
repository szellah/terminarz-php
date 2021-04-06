<?php


session_start();

if(isset($_SESSION['user_login'])){
	$login = $_SESSION['user_login'];
	$password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
	$password = hash('sha256', $password);

	$sql="SELECT uzytkownicy.id FROM uzytkownicy WHERE uzytkownicy.Login='$login' AND uzytkownicy.Haslo='$password'";

	require_once "connect.php";
	require_once "connection_open.php";
	if($result = @$db_connection->query($sql))
	{
		
		if($result->num_rows==1)
		{
			
			$user= $result->fetch_assoc();
			$user_id = $user['id'];
			
			$sql = "DELETE FROM lekcje WHERE lekcje.idWykladowcy = $user_id OR lekcje.idUcznia = $user_id";
			
			if(@$db_connection->query($sql)){

				$sql = "DELETE FROM `uzytkownicy` WHERE uzytkownicy.id='$user_id'";
				if(@$db_connection->query($sql)){
					header("Location: logout.php");
				}
				else{
					$_SESSION['message'] = "#general_error_display|Nie udało się usunąć konta";
					header("Location: ../settings.php");
				}
			}
			else{
				$_SESSION['message'] = "#general_error_display|Nie udało się usunąć lekcji przypisanych do konta";
				header("Location: ../settings.php");
			}
		}
		else{
			$_SESSION['message'] = "#general_error_display|Wpisano niepoprawne hasło";
			header("Location: ../settings.php");
		}
	}
	else{
		$_SESSION['message'] = "#general_error_display|Błąd bazy danych";
		header("Location: ../settings.php");
	}
	require "connection_close.php";
}

?>