<?php
if(isset($_SESSION['user_rank']))
{

if($_SESSION['user_rank']==1){

	if(isset($_POST['SentPrefrence'])){



		$sent_prefrences = htmlentities($_POST['SentPrefrence'], ENT_QUOTES, "UTF-8");
		$sent_teacher = htmlentities($_POST['SentTeacher'], ENT_QUOTES, "UTF-8");
		$sent_student = htmlentities($_POST['SentStudent'], ENT_QUOTES, "UTF-8");
		
		if($sent_prefrences=="1")
		{
			$user_id =$sent_teacher;
			$user_role = $sent_prefrences;
		}
		elseif($sent_prefrences=="2")
		{
			$user_id = $sent_student;
			$user_role = $sent_prefrences;
		}
		else
		{
			$user_id = $_SESSION['user_id'];
			$user_role = $_SESSION['user_role'];
		}
	}
	else
	{
	$user_id = $_SESSION['user_id'];
	$user_role = $_SESSION['user_role'];
	}

}
else{
	$user_id = $_SESSION['user_id'];
	$user_role = $_SESSION['user_role'];
}
}

?>