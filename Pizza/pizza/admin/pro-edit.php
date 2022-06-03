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
if (!empty($_POST["id"])&&!empty($_POST["nazwa"])&&!empty($_POST["opis"])&&!empty($_POST["rodzaj"])&&!empty($_POST["cenam"])&&!empty($_POST["cenad"]))
{
  $img_name = $_FILES["zdjecie"]['name'];
  if($img_name!="")
  {
    $img_loc = $_FILES["zdjecie"]['tmp_name'];
    move_uploaded_file($img_loc,'../img/pizza/'.$img_name);
  }
  else
  {
    $img_name=$_POST["zdjecieob"];
  }
  include("../connect.php");
  $db->query("UPDATE `produkty` SET `nazwa`='$_POST[nazwa]',`opis`='$_POST[opis]',`typ`='$_POST[rodzaj]',`cenam`='$_POST[cenam]',`cenad`='$_POST[cenad]',`zdjecie`='$img_name' WHERE `id`=".$_POST["id"]);
  header("Location: produkty");

}
else {
  $_SESSION["info"]="<p style='color: red'>Wystąpił błąd</p>";
  echo "<script>history.back();</script>";
} ?>
