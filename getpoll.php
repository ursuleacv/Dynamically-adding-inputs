<?php
require_once('MySqlDb.php');
$Db = new MySqlDb('localhost', 'root', 'root', 'test');
$chestionar = $_POST['poll'];

$insertdata =  array(
	'cat_id' => 2,
	'ques' => $chestionar[0],
	'created_on' => date ( "Y-m-d H:i:s" ) 
	);
$results = $Db->insert('questions',$insertdata);
$insertdata = array();

$results = $Db->query('select id from questions order by id desc limit 1');
$last_id = $results[0]['id'];

$n =  count($chestionar);
for ($i=1; $i < $n ; $i++) { 
	$insertdata =  array(
		'ques_id' => $last_id,
		'value' => $chestionar[$i]
	);
	if ($Db->insert('options',$insertdata)) echo 'succes';

	print_r($insertdata);
}


?>