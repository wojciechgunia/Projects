<?php session_start();
if(isset($_SESSION['userid']))
{
  require("../connect.php");
  $qwe = $db->query("SELECT * FROM `user` WHERE `id`='".$_SESSION['userid']."';");
  if($qwe->num_rows<1)
  {
    header("Location: ./logowanie");
  }
  $db->close();
}
else {
  header("Location: ./logowanie");
}
  if(!empty($_POST["id"]))
  {

    $id=$_POST["id"];
    require("../connect.php");
    $db->query("DELETE FROM `produkty` WHERE `id`='".$id."'");
    header("Location: produkty");

  }
  else {
    header("Location: produkty");
  }


 ?>
