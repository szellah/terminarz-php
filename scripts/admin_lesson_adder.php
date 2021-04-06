<?php
session_start();

if(isset($_SESSION['user_rank'])){
	if($_SESSION['user_rank']==1){
		$login = $_SESSION['user_login'];

		$lesson_subject = htmlentities($_POST['subject'], ENT_QUOTES, "UTF-8");
		$lesson_teacher = htmlentities($_POST['teacher'], ENT_QUOTES, "UTF-8");
		$lesson_student = htmlentities($_POST['student'], ENT_QUOTES, "UTF-8");
		$lesson_room = htmlentities($_POST['room'], ENT_QUOTES, "UTF-8");
		$lesson_date = htmlentities($_POST['date'], ENT_QUOTES, "UTF-8");
		$lesson_hour = htmlentities($_POST['hour'], ENT_QUOTES, "UTF-8");


		$sql="SELECT uzytkownicy.Ranga AS Rank FROM `uzytkownicy` WHERE uzytkownicy.Login = '$login'";
		require_once "connect.php";
		require "connection_open.php";

		if($result = @$db_connection->query($sql))
		{
			if($result->num_rows==1){
				$user= $result->fetch_assoc();
				if($user['Rank']==1){


					$sql = "SELECT id FROM `lekcje` WHERE Data='$lesson_date' AND Godzina_lekcyjna='$lesson_hour' AND idWykladowcy='$lesson_teacher'";
					if($result = @$db_connection->query($sql))
					{

						if($result->num_rows==0)
						{

							$sql = "SELECT id FROM `lekcje` WHERE Data='$lesson_date' AND Godzina_lekcyjna='$lesson_hour' AND idUcznia = '$lesson_student'";
							if($result = @$db_connection->query($sql))
							{
								if($result->num_rows==0)
								{

									$sql = "INSERT INTO `lekcje` (`id`, `idPrzedmiotu`, `idWykladowcy`, `idUcznia`, `idSali`, `Data`, `Godzina_lekcyjna`) VALUES (NULL, '$lesson_subject', '$lesson_teacher', '$lesson_student', '$lesson_room', '$lesson_date', '$lesson_hour');";

									if(@$db_connection->query($sql)){
									$_SESSION['message'] = "#general_succes_display|Udało się dodać lekcję";
									header("Location: ../panel_lesson.php"); 
									}else{
										$_SESSION['message'] = "#general_error_display|Nie udało się zapisać lekcji";
										header("Location: ../panel_lesson.php"); 
									}
								}else{
									$_SESSION['message'] = "#general_error_display|Uczeń ma inne lekcje w tym terminie";
									header("Location: ../panel_lesson.php"); 
								}
							}else{
								$_SESSION['message'] = "#general_error_display|Błąd bazy danych";
								header("Location: ../panel_lesson.php"); 
							}
						}else{
							$_SESSION['message'] = "#general_error_display|Wykładowca ma inne lekcje w tym terminie";
							header("Location: ../panel_lesson.php"); 
						}
					}else{
						$_SESSION['message'] = "#general_error_display|Błąd bazy danych";
						header("Location: ../panel_lesson.php"); 
					}
				}else{
					$_SESSION['message'] = "#general_error_display|Nie posiadasz wystarczających uprawnień do wykonania akcji";
					header("Location: ../panel_lesson.php"); 
				}
			}else{
				$_SESSION['message'] = "#general_error_display|Błąd bazy danych";//inna ilość niż 1
				header("Location: ../panel_lesson.php"); 
			}
		}else{
			$_SESSION['message'] = "#general_error_display|Błąd bazy danych";//zapytanie
			header("Location: ../panel_lesson.php"); 
		}
	}
}
?>


