<?php
session_start();

$key = array_keys($_GET);
var_dump($key);
if (!$_SESSION['bas'])
	$_SESSION['bas'] = array();
if($key){
	$data = array();
	$data = $_SESSION['bas'];
	if(!in_array($key[0],$data)){
		array_push($data,$key[0]);
		$_SESSION['bas'] = $data;
	}
}


//print_r($_SESSION);
//session_destroy();
header("Location: ".$_SERVER['HTTP_REFERER']);

?>