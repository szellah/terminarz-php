<?php
$site_title = "Zarządzanie użytkownikami";
require_once "components/header.php";
if(!isset($_SESSION['user_login']))
{
	header("Location: index.php");
	exit();
}

$user_name = $_SESSION['user_name'];
$user_surname = $_SESSION['user_surname'];
$user_rank = $_SESSION['user_rank'];
$user_role = $_SESSION['user_role'];

if($user_rank!=1){
	header("Location: index.php");
	exit();
}


?>
<body id="panel_account">


<?php
require_once "scripts/connect.php";
require_once "scripts/connection_open.php";

require_once "components/menu_bar.php";

?>

<div id="main_window">
<?php
require_once "components/general_message_display.php";
require_once "components/general_succes_display.php";

require_once "scripts/record_getter.php";
require_once "components/admin_pane_account.php";

require_once "scripts/connection_close.php"
?>
</div>

</body>