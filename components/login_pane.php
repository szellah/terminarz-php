

<h1 class="depth" title="Terminarz">
	Terminarz
</h1>
<div id="login_window" class="vertical-center">
<?php
require_once 'components/calendar_page.php';
?>


<form name="panelLogowania" action="scripts/verify.php" method="POST">
<input class="login" type="text" placeholder="Login" name="login">
<br>
<input class="login" type="password" placeholder="Hasło" name="password">
<br>
<input type="submit" value="Zaloguj">
</form>

<div id="login_error_display" class="error_window"></div>
</div>
