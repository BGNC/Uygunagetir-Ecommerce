<?php

$id=$_GET["id"];
$adet=$_GET["adet"];


session_start();

$_SESSION["sepet"]["$id"]= array('urun_id' => $id,'adet'=>$adet);


?>