<?php
if(!isset($_SESSION['user_login']))
{
	header("Location: index.php");
	exit();
}
?>
<script src="scripts/admin_visibility_handler.js">
</script>
<script src="scripts/regex_password_handler.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	passwordRegexButtonHandler('#add_account_form [name="submit"]','#add_account_form [name="password"]','#add_account_display', true);
});
	
	$(document).ready(function(){
  $(".user_box").click(function(){
    toggleVisibility(this,"scripts/admin_account_deleter.php");
  });

});

	
</script>

<h1 title="Użytkownicy" class="depth">Użytkownicy</h1>

<div id="liner">

<div class="title">Dodaj użytkownika</div>

<form id="add_account_form" method="POST" action="scripts/admin_account_adder.php">
<div>Login<input type="text" name="login"></div>
<div>Hasło<input type="password" name="password"></div>
<div>Imię<input type="text" name="name"></div>
<div>Nazwisko<input type="text" name="surname"></div>
<div>Uprawnienia
<select name="rank">
	<option value="1">Administrator</option>
	<option value="2">Użytkownik</option>
</select></div>
<div>Rola
<select name="role">
	<option value="1">Nauczyciel</option>
	<option value="2">Uczeń</option>
</select>
</div>
<div class="btn_box"><input  class="wide_btn btn blue_btn small_btn"  name="submit" type="submit" value="Dodaj użytkownika"></div>
</form>

<div class="password_error_display">
<div id="add_account_display"></div>
</div>

<div class="title">Usuń użytkownika</div>

<form action="scripts/admin_account_deleter.php" method="POST">
	<div class="btn_box"><input class="btn red_btn small_btn" type="submit" name="delete_multiple_users" value="Usuń"></div>
</form>
<div class="table_display">
<table>
	<thead>
		<tr>
			<td>Id</td>
			<td>Login</td>
			<td>Imię</td>
			<td>Nazwisko</td>
			<td>Ranga</td>
			<td>Rola</td>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT uzytkownicy.id, uzytkownicy.Login, uzytkownicy.Imie, uzytkownicy.Nazwisko, uzytkownicy.Ranga, uzytkownicy.Rola FROM `uzytkownicy`";
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
</tbody>
</table>
</div>

</div>


