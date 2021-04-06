<?php
require_once "connect.php";
session_start();
if(isset($_SESSION['user_rank'])){
if($_SESSION['user_rank']==1){

	if(isset($_POST['search_data'])){
		$id = htmlentities($_POST['id'], ENT_QUOTES, "UTF-8");
		$visible = htmlentities($_POST['Widoczny'], ENT_QUOTES, "UTF-8");


		$sql = "UPDATE lekcje SET Widoczny='$visible' WHERE id='$id'";

		require "connection_open.php";
		$result = @$db_connection->query($sql);
		require "connection_close.php";
	}

	if(isset($_POST['delete_multiple_lessons'])){

		$sql = "DELETE FROM lekcje WHERE Widoczny=1";

		require "connection_open.php";
		if($result = @$db_connection->query($sql))
		{
			$_SESSION['message'] = "#general_succes_display|Udało się usunąć lekcje";
			header("Location: ../panel_lesson.php"); 
		}
		else
		{
			$_SESSION['message'] = "#general_error_display|Użytkownicy nie zostali usunięci";
			header("Location: ../panel_lesson.php");
		}

		require "connection_close.php";
	}

}
}
?>