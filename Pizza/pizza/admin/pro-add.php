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
if (!empty($_POST["nazwa"])&&!empty($_POST["opis"])&&!empty($_POST["rodzaj"])&&!empty($_POST["cenam"]))
{
  $img_loc = $_FILES["zdjecie"]['tmp_name'];
  $img_name = $_FILES["zdjecie"]['name'];
  move_uploaded_file($img_loc,'../img/pizza/'.$img_name);
  include("../connect.php");
  $stmt = $db->prepare("INSERT INTO `produkty`(`nazwa`, `opis`, `typ`, `cenam`, `cenad`, `zdjecie`) VALUES (?, ?, ?, ?, ?, ?);");
  $stmt->bind_param("ssssss", $_POST["nazwa"], $_POST["opis"], $_POST["rodzaj"], $_POST["cenam"], $_POST["cenad"], $img_name);
  $stmt->execute();
  header("Location: produkty");

}
else {
  $_SESSION["info"]="<p style='color: red'>Wystąpił błąd</p>";
  echo "<script>history.back();</script>";
} ?>
