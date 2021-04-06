<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_title; ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheets/calendar.css?=<?php echo time(); ?>">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Oswald:wght@200;300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Shippori+Mincho+B1:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<script src="scripts/vue.js"></script>
	<script>
		<?php
			if(isset($_SESSION['message']))
			{
				$to_display = $_SESSION['message'];
				unset($_SESSION['message']);
				echo "var msg = \"$to_display\";";
			}

		?>
		if(typeof msg !== 'undefined'){
			if(isNaN(msg)){
				var msg_location = msg.split('|')[0];
				msg_text = msg.split('|')[1];
				$(document).ready(function(){
					$(msg_location).fadeIn(700);
					$(msg_location).append(msg_text);
				});
			}
		}

	</script>
</head>

