<?php
session_start();
if(isset($_SESSION['user_rank'])){
	if($_SESSION['user_rank']==1){

		$login = $_SESSION['user_login'];

		$user_password =htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

		require_once 'regex_password_handler.php';

		if(check_password_regex($user_password)){

			$user_login = htmlentities($_POST['login'], ENT_QUOTES, "UTF-8");
			$user_name= htmlentities($_POST['name'], ENT_QUOTES, "UTF-8");
			$user_surname =htmlentities($_POST['surname'], ENT_QUOTES, "UTF-8");
			$user_rank = htmlentities($_POST['rank'], ENT_QUOTES, "UTF-8");
			$user_role = htmlentities($_POST['role'], ENT_QUOTES, "UTF-8");

			$user_password = hash('sha256', $user_password);

			$sql="SELECT uzytkownicy.Ranga AS Rank FROM `uzytkownicy` WHERE uzytkownicy.Login = '$login'";

			require_once "connect.php";
			require "connection_open.php";
			if($result = @$db_connection->query($sql))
			{
				if($result->num_rows==1){
					$user= $result->fetch_assoc();
					if($user['Rank']==1){

						$sql = "INSERT INTO `uzytkownicy` (`id`, `Login`, `Haslo`, `Imie`, `Nazwisko`, `Ranga`, `Rola`) VALUES (NULL, '$user_login', '$user_password', '$user_name', '$user_surname', '$user_rank', '$user_role')";

						if(@$db_connection->query($sql)){
						
						$_SESSION['message'] = "#general_succes_display|Udało się dodać konto";
						header("Location: ../panel_account.php");
						}
						else{
							$_SESSION['message'] = "#general_error_display|Nie udało się zapisać użytkownika użytkownika";
							header("Location: ../panel_account.php"); 
						}
					}
					else{
						$_SESSION['message'] = "#general_error_display|Nie posiadasz wystarczających uprawnień do wykonania akcji";
						header("Location: ../panel_account.php"); 
					}
				}
				else{
					$_SESSION['message'] = "#general_error_display|Błąd bazy danych";//zwrócono wiecej niż jeden
					header("Location: ../panel_account.php"); 
				}
			}else{
				$_SESSION['message'] = "#general_error_display|Błąd bazy danych";//zapytanie
				header("Location: ../panel_account.php"); 
			}
			require "connection_close.php";
		}else{
			$_SESSION['message'] = "#general_error_display|Podane hasło jest niepoprawne";
			header("Location: ../panel_account.php"); 
		}
	
	}
}

?>