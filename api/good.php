<?php
include_once "../base.php";

$New=new DB("new");
$Log=new DB("log");

$id=$_POST['id'];
$type=$_POST['type'];
$user=$_POST['user'];
$post=$News->find($id);
switch($type){
    case 1:
        $Log->save(['news'=>$id,'user'=>$user]);
        
    break;
    case 2:
        $Log->del(['news'=>$id,'user'=>$user]);

    break;
    
}



?>