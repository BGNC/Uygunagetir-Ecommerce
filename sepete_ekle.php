<?php

$id=$_POST["urun_id"];
$adet=$_POST["adet"];


session_start();

if(in_array($id,$_SESSION["sepet"][$id])){

	$_SESSION["sepet"][$id]["adet"]++;

}
else
{
	$_SESSION["sepet"]["$id"]= array('urun_id' => $id,'adet'=>$adet);
}

header("location:sepet.php");




?>