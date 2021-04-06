<?php
if(!isset($_SESSION['user_login']))
{
	header("Location: index.php");
	exit();
}
?>

<script src="scripts/admin_visibility_handler.js">
</script>
<script type="text/javascript">

	
	$(document).ready(function(){
  $(".lesson_box").click(function(){
    toggleVisibility(this,"scripts/admin_lesson_deleter.php");
  });

});

	
</script>


<h1 title="Lekcje" class="depth">Lekcje</h1>

<div id="liner">

<div class="title">Dodaj lekcje</div>
<form method="POST" action="scripts/admin_lesson_adder.php">


<div>Przedmiot
	<select name="subject">
	<?php
	$sql = "SELECT przedmioty.id AS id, przedmioty.Nazwa AS Name FROM `przedmioty`";
		$records = get_records($sql);
		foreach ($records as $obj) {
			$obj_id = $obj['id'];
			$obj_name = $obj['Name'];
			echo "<option value=\"$obj_id\">$obj_name</option>";
		}

	?>
</select>
</div>

<div>Wykładowca
<select name="teacher">
	<?php
	$sql = "SELECT uzytkownicy.id AS id, uzytkownicy.Imie AS Name, uzytkownicy.Nazwisko AS Surname FROM `uzytkownicy` WHERE uzytkownicy.Rola = 1";
		$records = get_records($sql);
		foreach ($records as $obj) {
			$obj_id = $obj['id'];
			$obj_name = $obj['Name'];
			$obj_surname = $obj['Surname'];
			echo "<option value=\"$obj_id\">$obj_name $obj_surname</option>";
		}

	?>
</select>
</div>

<div>Uczeń
	<select name="student">
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
</select>
</div>

<div>Sala
	<select name="room">
	<?php
		$sql = "SELECT sale.id AS id, sale.numer AS Number FROM `sale`";
		$records = get_records($sql);
		foreach ($records as $obj) {
			$obj_id = $obj['id'];
			$obj_number = $obj['Number'];
			echo "<option value=\"$obj_id\">$obj_number</option>";
		}

	?>
</select>
</div>



<div>Data
<input type="date" name="date"></div>

<div>Godzina lekcyjna:
<select name="hour">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
</select></div>

<div class="btn_box "><input class="btn small_btn blue_btn wide_btn" type="submit" value="Dodaj lekcje"></div>
</form>


<div class="title">Usuń lekcje</div>

<form action="scripts/admin_lesson_deleter.php" method="POST">
	<div class="btn_box"><input class="btn red_btn small_btn" type="submit" name="delete_multiple_lessons" value="Usuń"></div>
</form>
<div class="table_display">
<table>
	<thead>
		<tr>
			<td>Id</td>
			<td>Przedmiot</td>
			<td>Imię Wykładowcy</td>
			<td>Nazwisko Wykładowcy</td>
			<td>Imię Ucznia</td>
			<td>Nazwisko Ucznia</td>
			<td>Sala</td>
			<td>Data</td>
			<td>Lekcja</td>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT `lekcje`.`id`, `przedmioty`.`Nazwa`, wykladowcy.Imie, wykladowcy.Nazwisko, uczniowie.Imie, uczniowie.Nazwisko, `sale`.`numer`, `lekcje`.`Data`, `lekcje`.`Godzina_lekcyjna` FROM `lekcje` LEFT JOIN `przedmioty` ON `lekcje`.`idPrzedmiotu`=`przedmioty`.`id` LEFT JOIN `uzytkownicy` AS wykladowcy ON `lekcje`.`idWykladowcy`=wykladowcy.`id` LEFT JOIN `uzytkownicy` AS uczniowie ON `lekcje`.`idUcznia`=uczniowie.`id` LEFT JOIN `sale` ON `lekcje`.`idSali`=`sale`.`id`";
	$records = get_records_numerical($sql);
	foreach ($records as $obj) 
	{
?>
		<tr>
			<?php 
				for($i = 0; $i < count($obj); $i++){
					echo "<td>".$obj[$i]."</td>";
				}

			?>
			<td><input class="lesson_box" type="checkbox" value="<?php echo $obj[0] ?>" <?php echo $obj[count($obj)-1] == 1 ? "checked" : "" ?> ></td>
		</tr>
<?php
	}
?>
</tbody>
</table>
</div>

</div>
