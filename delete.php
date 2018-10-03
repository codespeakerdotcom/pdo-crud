<?php 

require_once 'config.php';

if( count($_POST['persid']) > 0 ){

	foreach($_POST['persid'] as $persid){
		$where = ['id' => $persid];
		$pdo->prepare("DELETE FROM persontbl WHERE pid=:id")->execute($where);
	} 
}

header('Location: index.php');