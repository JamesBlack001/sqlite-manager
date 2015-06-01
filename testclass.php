<?php
include 'sqliteManager.php';

try{
	$db = new sqliteManager('newnew');
	$db->setAttributes();
	//$db->addKey('hello');
	//$db->addKey('name');
	$db->addKey('message TfluT');

	$db->createString();
	$db->initiateTable();
	$db->dropTable('newnew');
}
catch(PDOexception $e){
	echo $sql . "<br>" . $e->getMessage();
}
?>