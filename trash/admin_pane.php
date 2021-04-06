<script src="scripts/admin_visibility_handler.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
	passwordRegexButtonHandler('#add_account_form [name="submit"]','#add_account_form [name="password"]','#add_account_display', true);
});
	
	$(document).ready(function(){
  $(".lesson_box").click(function(){
    toggleVisibility(this,"scripts/admin_lesson_deleter.php");
  });

  $(".user_box").click(function(){
    toggleVisibility(this,"scripts/admin_account_deleter.php");
  });

});

	
</script>
<?php
echo "</br>Panel Administratorski";





?>

<br><br>Dodaj użytkownika:
<form id="add_account_form" method="POST" action="scripts/admin_account_adder.php">
<br>Login:
	<input type="text" name="login">
<br>Hasło:
	<input type="text" name="password">
<br>Imię:
	<input type="text" name="name">
<br>Nazwisko:
	<input type="text" name="surname">
<br>Uprawnienia:
<select name="rank">
	<option value="1">Administrator</option>
	<option value="2">Użytkownik</option>
</select>
<br>Rola:
<select name="role">
	<option value="1">Nauczyciel</option>
	<option value="2">Uczeń</option>
</select><br>
<input name="submit" type="submit" value="Dodaj użytkownika">
</form>
<div id="add_account_display"></div>

<br><br>Usuń użytkownika:
<form action="scripts/admin_account_deleter.php" method="POST">
	<input type="submit" name="delete_multiple_users" value="Usuń">
</form>
<table>
	<?php
	$sql = "SELECT uzytkownicy.id, uzytkownicy.Login, uzytkownicy.Imie, uzytkownicy.Nazwisko, uzytkownicy.Ranga, uzytkownicy.Rola, uzytkownicy.Widoczny FROM `uzytkownicy`";
	$records = get_records_numerical($sql);
	foreach ($records as $obj) 
	{
?>
		<tr>
			<?php 
				for($i = 0; $i < count($obj); $i++){
					echo "<td>";

					if($i==4)//Rank
					{
						if($obj[$i]==1)
							echo "Administrator";
						else
							echo "Użytkownik";
					}
					else if($i==5)//Rank
					{
						if($obj[$i]==1)
							echo "Wykładowca";
						else
							echo "Uczeń";
					}
					else
						echo $obj[$i];

					echo "</td>";
				}

			?>
			<td><input class="user_box" type="checkbox" value="<?php echo $obj[0] ?>" <?php echo $obj[count($obj)-1] == 1 ? "checked" : "" ?> ></td>
		</tr>
<?php
	}
?>
</table>




<br><br>Dodaj lekcje:
<form method="POST" action="scripts/admin_lesson_adder.php">


<br>Przedmiot:
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
<br>Wykładowca:
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
<br>Uczeń:
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
<br>Sala:
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



<br>Data:
<input type="date" name="date">

<br>Godzina lekcyjna:
<select name="hour">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
</select><br>
<input type="submit" value="Dodaj lekcje">
</form>


Usuń lekcje:
<form action="scripts/admin_lesson_deleter.php" method="POST">
	<input type="submit" name="delete_multiple_lessons" value="Usuń">
</form>
<table>
	<?php
	$sql = "SELECT `lekcje`.`id`, `przedmioty`.`Nazwa`, wykladowcy.Imie, wykladowcy.Nazwisko, uczniowie.Imie, uczniowie.Nazwisko, `sale`.`numer`, `lekcje`.`Data`, `lekcje`.`Godzina_lekcyjna`, `lekcje`.Widoczny FROM `lekcje` LEFT JOIN `przedmioty` ON `lekcje`.`idPrzedmiotu`=`przedmioty`.`id` LEFT JOIN `uzytkownicy` AS wykladowcy ON `lekcje`.`idWykladowcy`=wykladowcy.`id` LEFT JOIN `uzytkownicy` AS uczniowie ON `lekcje`.`idUcznia`=uczniowie.`id` LEFT JOIN `sale` ON `lekcje`.`idSali`=`sale`.`id`";
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
</table>
