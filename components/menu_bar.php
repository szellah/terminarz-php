<?php
if(!isset($_SESSION['user_login']))
{
	header("Location: ../");
	exit();
}
?>
<div id="menu_place_holder"></div>
<div id="menu">
	<ul>
		<li><a class="dashboard" href="dashboard.php">Terminarz</a></li>
		<li><a class="settings" href="settings.php">Ustawienia</a></li>
		<?php
			if($_SESSION['user_rank']==1)
				echo "<li><a class=\"panel_account dropdown\" href=\"panel_account.php\">Użytkownicy</a></li><li><a class=\"panel_lesson dropdown\" href=\"panel_lesson.php\">Lekcje</a></li>";
		?>
		<li class="right"><a href="scripts/logout.php">Wyloguj</a></li>
	</ul>
</div>
<div id="left_panel">
	<div id="info">
	<?php
include 'calendar_page.php';

?>
<section>
<?php

$user_name = $_SESSION['user_name'];
$user_surname = $_SESSION['user_surname'];
$user_rank = $_SESSION['user_rank'];
$user_role = $_SESSION['user_role'];
$ranks =['Administrator','Użytkownik'];
$roles = ['Wykładowca','Uczeń'];

echo "$user_name $user_surname<hr>".$ranks[$user_rank-1]."<br>".$roles[$user_role-1];

	?>
	</section>
</div>
</div>
