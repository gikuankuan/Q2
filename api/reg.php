<?php
// include_once "../base.php";
// $db=new DB("user");
// $acc=$_POST['acc'];
// $pw=$_POST['pw'];
// $email=$_POST['email'];

// echo $db->save(['acc'=>$acc,'pw'=>$pw,'email'=>$email]);

include_once "../base.php";
$db=new DB("user");


echo $db->save($_POST);
?>