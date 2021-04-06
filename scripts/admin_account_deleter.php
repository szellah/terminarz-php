<?php
require_once "connect.php";
session_start();

if(isset($_SESSION['user_rank'])){
	if($_SESSION['user_rank']==1){

		if(isset($_POST['search_data'])){
			$id = htmlentities($_POST['id'], ENT_QUOTES, "UTF-8");
			$visible = htmlentities($_POST['Widoczny'], ENT_QUOTES, "UTF-8");

			$sql = "UPDATE uzytkownicy SET Widoczny='$visible' WHERE id='$id'";

			require "connection_open.php";
			$result = @$db_connection->query($sql);
			require "connection_close.php";
		}

		if(isset($_POST['delete_multiple_users'])){
			$to_delete = 1;
			$sql = "DELETE FROM lekcje WHERE lekcje.idWykladowcy IN (SELECT uzytkownicy.id FROM uzytkownicy WHERE Widoczny = 1) OR lekcje.idUcznia IN (SELECT uzytkownicy.id FROM uzytkownicy WHERE Widoczny = 1)";

			require "connection_open.php";
			if($result = @$db_connection->query($sql))
			{
				$sql="DELETE FROM `uzytkownicy` WHERE uzytkownicy.Widoczny = 1 ";
				if($result = @$db_connection->query($sql))
				{
					$_SESSION['message'] = "#general_succes_display|Udało się usunąć konta";
					header("Location: ../panel_account.php"); 
				}
			}
			else
			{
				$_SESSION['message'] = "#general_error_display|Nie udało się usunąć użytkowników";
				header("Location: ../panel_account.php"); 
			}

			require "connection_close.php";
		}
	}
}
?>