<?php
session_start();
if(isset($_POST["delete"]))
{
  echo $_POST["delete"];
  $tab=$_SESSION["koszyk"];
  $nr=$_POST["delete"];
  \array_splice($tab,$nr,1);
  $_SESSION["koszyk"]=$tab;
  header("Location: koszyk");
}

 ?>
