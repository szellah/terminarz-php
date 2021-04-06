<?php
$site_title = "Ustawienia";
require_once "components/header.php";
if(!isset($_SESSION['user_login']))
{
	header("Location: index.php");
	exit();
}


?>
<body id="settings">
<?php
require_once "components/menu_bar.php";


?>


<script src="scripts/regex_password_handler.js?=<?php echo time(); ?>" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function (){
		passwordCompleteButtonHandler('#change_password_form [name="submit"]','#change_password_form [name="new_password"]','#change_password_form [name="repeated_password"]','#change_password_display','#matching_password_display');
	});
</script>

<div id="main_window">
	<?php
require_once "components/general_message_display.php";
require_once "components/general_succes_display.php";
?>


<h1 title="Zarządzanie&#160;kontem:" class="depth">Zarządzanie&#160;kontem:</h1>


<div id="liner">
<div>

<div class="title">Zmień Hasło:</div>

<form id="change_password_form" method="POST" action="scripts/password_changer.php">

<div>Nowe hasło: <input type="password" name="new_password"></div>
<div>Powtórz hasło: <input type="password" name="repeated_password"></div>
<div>Stare hasło: <input type="password" name="old_password"></div>
<div class="btn_box"><input class="btn blue_btn small_btn " name="submit" type="submit" value="Zmień hasło"></div>

</form>

</div>


<div class="password_error_display">
<div id="matching_password_display"></div>

<div id="change_password_display"></div>
</div>


<div>

<div class="title">Usuń Konto:</div>


<form method="POST" action="scripts/account_deleter.php">

<div>Hasło:<input type="password" name="password"></div>
<div class="btn_box"><input class="btn blue_btn small_btn" type="submit" value="Usuń konto"></div>

</form>

</div>

</div>

</body>
</html>