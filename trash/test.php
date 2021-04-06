<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="stylesheets/calendar.css?=<?phpecho time(); ?>">
</head>
<body>

<?php

require_once 'scripts/regex_password_handler.php';;

$str = htmlentities("Sebastian1.",ENT_QUOTES, "UTF-8");
if(check_password_regex($str))
	echo "hej no"; 



?>

</body>
</html>
