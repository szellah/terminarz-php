<?php
if(!is_null($connection_open)){
	if($connection_open){
		$db_connection->close();
	}
}
?>