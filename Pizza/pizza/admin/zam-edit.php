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
if (!empty($_POST["id"])&&!empty($_POST["ulica"])&&!empty($_POST["razem"])&&!empty($_POST["nrdom"])&&!empty($_POST["miasto"])&&!empty($_POST["e-mail"])&&!empty($_POST["telefon"])&&!empty($_POST["platnosc"])&&!empty($_POST["status"]))
{
  include("../connect.php");
  $id=$_POST["id"];
  $qwe=$db->query("SELECT `kasa` FROM `zamówienie` WHERE `id`='".$id."'");
  if($row=$qwe->fetch_assoc())
  {
  $kasa=$_POST["razem"]-$row["kasa"];
  }
  $zam = str_replace("\n", "<br>", $_POST["zamowienie"]);
  $b2=",`kasa`='$_POST[razem]',`status`='$_POST[status]' WHERE `id`=".$_POST["id"];
  $db->query("UPDATE `zamówienie` SET `ulica`='$_POST[ulica]',`nr_domu`='$_POST[nrdom]',`nr_mieszkania`='$_POST[nrmiesz]',`miejscowosc`='$_POST[miasto]',`email`='".$_POST['e-mail']."',`telefon`='$_POST[telefon]',`platnosc`='$_POST[platnosc]',`zamówienie`='$zam'".$b2);
  $db->query("UPDATE `statystyki` SET `kasa`=`kasa`+$kasa WHERE `id`=1");
  echo "<script>history.go(-2);</script>";

}
else {
  $_SESSION["info"]="<p style='color: red'>Wystąpił błąd</p>";
  echo "<script>history.back();</script>";
} ?>
