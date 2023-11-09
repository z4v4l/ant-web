<?php
/* 2:20 03.04.2021 */

/*  188.190.1.60, "188.190.30.99" */

	date_default_timezone_set("Europe/Helsinki");

	$prefix		= 0xFFFFC000;
	$nolognet	= 0xB29EC000;
	$ip_string	= strtok($_SERVER['HTTP_X_FORWARDED_FOR'], ",");
	$ip			= ip2long($ip_string);
	if(array_key_exists('subject', $_GET) && ($ip & $prefix) != $nolognet){
		$log_entry = date('d-m-Y H:i:s') . ";\t" . $_GET['subject'] . ";\t"
			. $_SERVER['HTTP_X_FORWARDED_FOR'] . ";\t"
			. $_SERVER['HTTP_HOST'] . "\r\n"
			. $_SERVER['HTTP_USER_AGENT'] . "\r\n\r\n";

		file_put_contents('./res/acc.txt', $log_entry, FILE_APPEND);
	}

	include "doc/AntMain.htm";
?>
