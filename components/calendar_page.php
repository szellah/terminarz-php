<?php
$months = ['Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'];
$today=getdate();
$month = $months[$today['mon']-1];

?>



<div id="calendar_page">
	<div id="red_tab"></div>
	<div id="calendar_container">
		<div id="day_of_week"></div>
		<div id="day_of_month"><?php echo "$today[mday]"; ?></div>
		<div id="month"><?php echo "$month"; ?></div>
	</div>
</div>