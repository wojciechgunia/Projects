<?php
session_start();
if(!empty($_POST["nazwa"]))
{
  if(isset($_SESSION["koszyk"]))
  {
    $tab=$_SESSION["koszyk"];
    array_push( $tab, array($_POST["nazwa"],$_POST["rozmiar"]));
    $_SESSION["koszyk"]=$tab;
  }
  else {
    $_SESSION["koszyk"]=array(array($_POST["nazwa"],$_POST["rozmiar"]));
  }
  $_SESSION["nowy"]=1;
  header("location: zamów-online");
}

 ?>
