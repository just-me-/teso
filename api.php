<?php
session_start();

$status = $_POST['collected'] == 1 ? 1 : 0;
$shard_id = strip_tags($_POST['id']);
$_SESSION[$shard_id] = $status;

?>