<?php



function get_records($sql){
	global $db_connection;
	
	$records = null;

	if($result = @$db_connection->query($sql))
	{
		$i=0;
		while($row=$result->fetch_assoc())
		{
			$records[$i]=$row;
			$i++;
		}
	}
return $records;
}

function get_records_numerical($sql){
	global $db_connection;
	
	$records = null;

	if($result = @$db_connection->query($sql))
	{
		$i=0;
		while($row=$result->fetch_row())
		{
			$records[$i]=$row;
			$i++;
		}
	}
return $records;
}



?>