<?php

include_once "../base.php";

$db= new DB("news");

$type=$_GET['id'];

$row=$db->find('id');

echo $row ['text'];
?>