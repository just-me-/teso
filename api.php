<?php
session_start();

$status = $_POST['collected'] == 1 ? 1 : 0;
$shard_id = strip_tags($_POST['id']);
//$_SESSION[$shard_id] = $status;


//Use a timespan of 3 week
$remembering_timespan = time() + 3 * 7 * 24 * 60 * 60;
setcookie($shard_id, $status, $remembering_timespan);


?>