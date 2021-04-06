<?php
$site_title = "Strona główna";
require_once "components/header.php";
?>
<body id="dashboard">

<?php

require_once "components/menu_bar.php";





require_once "scripts/record_getter.php";


require_once "scripts/connect.php";
require "scripts/connection_open.php";

$user_name = $_SESSION['user_name'];
$user_surname = $_SESSION['user_surname'];
$user_rank = $_SESSION['user_rank'];
$user_role = $_SESSION['user_role'];


?>

<div id="main_window">

<?php
require_once "components/general_message_display.php";
require_once "components/general_succes_display.php";
?>


<div id="calendar_control">

<?php
if($user_rank==1){
	?>

<div id="admin_calendar_controll">
	<div id="sent_prefrence_box">Wyświetl dla
<select id="sent_prefrence">
	<optgroup>
	<option value="1">Wykładowcy</option>
	<option value="2">Ucznia</option>
	<option selected="selected" value="-1">Siebie</option>
	</optgroup>
</select>
</div>
<div id="sent_teacher_box">
Wykładowca
<select id="sent_teacher">
	<optgroup>
	<?php
	$sql = "SELECT uzytkownicy.id AS id, uzytkownicy.Imie AS Name, uzytkownicy.Nazwisko AS Surname FROM `uzytkownicy` WHERE uzytkownicy.Rola = 1";
		$records = get_records($sql);
		if(!is_null($records)){
		foreach ($records as $obj) {
			$obj_id = $obj['id'];
			$obj_name = $obj['Name'];
			$obj_surname = $obj['Surname'];
			echo "<option value=\"$obj_id\">$obj_name $obj_surname</option>";
		}
	}

	?>
	</optgroup>
</select></div>

<div id="sent_student_box">
Uczeń
	<select id="sent_student">
		<optgroup>
	<?php
	$sql = "SELECT uzytkownicy.id AS id, uzytkownicy.Imie AS Name, uzytkownicy.Nazwisko AS Surname FROM `uzytkownicy` WHERE uzytkownicy.Rola = 2";
		$records = get_records($sql);
		
		foreach ($records as $obj) {
			$obj_id = $obj['id'];
			$obj_name = $obj['Name'];
			$obj_surname = $obj['Surname'];
			echo "<option value=\"$obj_id\">$obj_name $obj_surname</option>";
		}
	

	?>
	</optgroup>
</select>
</div>

</div>


<?php
}
?>

<button class="btn normal_btn blue_btn" id="calendar_caller">Sprawdź</button>

<script src="scripts/calendar_handler.js?=<?php echo time(); ?>"></script>
<script src=" <?php echo $_SESSION['user_rank']==1 ? 'scripts/admin_calendar_caller_handler.js' : 'scripts/calendar_caller_handler.js'; ?> "></script>



<div id="basic_calendar_controll">

<button class="btn normal_btn arrow_btn"><</button>

<div>
<div class="calendar_input" id="i1"></div>
<div class="calendar_input" id="i2"></div>
</div>

<button class="btn normal_btn arrow_btn">></button>

</div>

</div>

<div id="place"></div>





<?php
require_once "scripts/connection_close.php";
?>



</div>

<script type="text/javascript">
	var months = ['Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'];
	var t_date = new Date();
	var t_month = t_date.getMonth();
	var t_year = t_date.getFullYear();

	var grid_array=calendarBuilder(t_month+1, t_year);

	$(document).ready(function(){
		$("#i1").html(months[t_month]);
		$("#i2").html(t_year);

		$(".arrow_btn").click(function(){
			if($(this).html() == '&gt;'){

				if(t_month<11)
				{
					t_month++;
				}
				else
				{
					t_year++;
					t_month=0;
				}
			}else if($(this).html() == '&lt;')
			{
				if(t_month>0)
				{
					t_month--;
				}
				else
				{
					t_year--;
					t_month=11;
				}
			}
			$("#i1").html(months[t_month]);
			$("#i2").html(t_year);
		});

		$("#sent_prefrence").change(function(){

			switch($(this).val()*1){
				case 1:
				$("#sent_student_box").fadeOut(150);
				$("#sent_teacher_box").fadeIn(150);
				break;
				case 2:
				$("#sent_student_box").fadeIn(150);
				$("#sent_teacher_box").fadeOut(150);
				break;
				case -1:
				$("#sent_student_box").fadeOut(150);
				$("#sent_teacher_box").fadeOut(150);
			}
		});
	});
</script>



</body>
</html>