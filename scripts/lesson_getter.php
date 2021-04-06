<?php
include '../components/calendar.php';
	function getCategory($category_name){
		$names = ['Tworzenie stron WWW','MS Office i ECDL','Programowanie','Grafika komputerowa'];
		for ($i=0; $i < count($names); $i++) { 
			if($names[$i]==$category_name)
				return $i;
		}
		return -1;
	}
	


if(isset( $_POST['SentMonth']))
{
	

	$month = htmlentities($_POST['SentMonth'],ENT_QUOTES, "UTF-8");
	$next_month = $month+1;
	$year = htmlentities($_POST['SentYear'],ENT_QUOTES, "UTF-8");

	session_start();

	include 'lesson_prefrences.php';
	//stąd wychodzi $user_id i $user_role


	if($user_role == 1){
		$sql_condition = "idWykladowcy";
		$sql_fields = "uczniowie.Imie, uczniowie.Nazwisko";
	}else{
		$sql_condition = "idUcznia";
		$sql_fields = "wykladowcy.Imie, wykladowcy.Nazwisko";
	}

	require_once "connect.php";
	require_once "connection_open.php";
	require_once "record_getter.php";

	$sql = "SELECT `przedmioty`.`Nazwa`, `przedmioty`.`Kategoria`, $sql_fields, `sale`.`numer`, `lekcje`.`Data`, `lekcje`.`Godzina_lekcyjna` FROM `lekcje` LEFT JOIN `przedmioty` ON `lekcje`.`idPrzedmiotu`=`przedmioty`.`id` LEFT JOIN `uzytkownicy` AS wykladowcy ON `lekcje`.`idWykladowcy`=wykladowcy.`id` LEFT JOIN `uzytkownicy` AS uczniowie ON `lekcje`.`idUcznia`=uczniowie.`id` LEFT JOIN `sale` ON `lekcje`.`idSali`=`sale`.`id` WHERE $sql_condition=$user_id AND Data BETWEEN '$year-$month-01' AND '$year-$next_month-01' ORDER BY `lekcje`.`Data` ASC, `lekcje`.`Godzina_lekcyjna` ASC";

	$records = get_records_numerical($sql);

if(!is_null($records)){
	foreach ($records as $lesson) {
		$lesson_subject = $lesson[0];
		$lesson_category = getCategory($lesson[1]);
		$lesson_name = $lesson[2];
		$lesson_surname = $lesson[3];
		$lesson_room = $lesson[4];
		$lesson_date = $lesson[5];
		$lesson_hour = $lesson[6];

		$offset = 1;
		if(substr($lesson_date,-2,1)!=0)
			$offset = 2;

		$lesson_day = substr($lesson_date,-$offset, $offset);

		?>
		<script type="text/javascript">
			var suffix="";
			$(document).ready(function(){
			$("<?php echo "#day_$lesson_day"; ?>").append("<?php echo "<div class=\'lesson lesson_$lesson_hour category_$lesson_category\'>$lesson_subject <div> z $lesson_name $lesson_surname w pokoju $lesson_room</div></div>"; ?>");// z $lesson_name $lesson_surname w pokoju $lesson_room<

			});

			$(document).ready(function(){
				
		    $(".lesson").click(function(){
		      $(this).children().fadeIn(150);
		    });

		    $(".lesson").mouseleave(function(){
		      $(this).children().fadeOut(150);
			  });

		    $(".lesson>div").mouseleave(function(){
		      $(this).fadeOut(150);
			  });


		    var d = new Date();

		    if(d.getFullYear()==t_year && d.getMonth()==t_month ){

		    	suffix = (new Date()).getDate();
		    	$("#day_"+suffix).addClass("today");
		    }

		    });

			
		</script>

		
		<?php
	}
}


	require_once"connection_close.php";

}




?>


