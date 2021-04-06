<?php
$site_title="Panel Logowania";
require_once "components/header.php";

?>

<body id="index" style="overflow:hidden;">

<?php
if(isset($_SESSION['user_login'])){
	header("Location: dashboard.php"); 
}
else{
	require "components/login_pane.php";
}
?>

</body>
</html>
