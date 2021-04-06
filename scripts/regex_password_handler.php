<?php

function check_password_regex($password){
	$p = $password;
	return regex_small_letters($p) & regex_big_letters($p) & regex_numbers($p) & regex_signs($p) & regex_length($p);
}

function regex_small_letters($password){
	$pattern = "/.*[a-ąćęłńóśżź]+.*/";
	return preg_match($pattern, $password);
}

function regex_big_letters($password){
	$pattern = "/.*[A-ZĄĆĘŁŃÓŚŻŹ]+.*/";
	return preg_match($pattern, $password);
}

function regex_numbers($password){
	$pattern = "/.*[0-9]+.*/";
	return preg_match($pattern, $password);
}

function regex_signs($password){
	$pattern = "/.*([!#$%^&*()_\-+={}|\\/\"'?><.,;:\[\]])+.*/";
	return preg_match($pattern, $password);
}

function regex_length($password){
	$pattern = "/.{8,}/";
	return preg_match($pattern, $password);
}

?>