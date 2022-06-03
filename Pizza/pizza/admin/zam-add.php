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
if (!empty($_POST["ulica"])&&!empty($_POST["nrdom"])&&!empty($_POST["miasto"])&&!empty($_POST["e-mail"])&&!empty($_POST["razem"])&&!empty($_POST["telefon"])&&!empty($_POST["platnosc"])&&!empty($_POST["status"]))
{
  include("../connect.php");
  $zam = str_replace("\n", "<br>", $_POST["zamowienie"]);
  $stmt = $db->prepare("INSERT INTO `zamówienie` (`ulica`, `nr_domu`, `nr_mieszkania`, `miejscowosc`, `email`, `telefon`, `platnosc`, `zamówienie`, `kasa`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
  $stmt->bind_param("ssssssssss", $_POST["ulica"], $_POST["nrdom"], $_POST["nrmiesz"], $_POST["miasto"], $_POST["e-mail"], $_POST["telefon"], $_POST["platnosc"], $zam, $_POST["razem"], $_POST["status"]);
  $stmt->execute();
  $db->query("UPDATE `statystyki` SET `zakupow`=`zakupow`+1, `kasa`=`kasa`+$_POST[razem] WHERE `id`=1");
  header("Location: panel");

}
else {
  $_SESSION["info"]="<p style='color: red'>Wystąpił błąd</p>";
  echo "<script>history.back();</script>";
} ?>
