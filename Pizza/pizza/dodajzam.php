<?php
session_start();
if (!empty($_POST["ulica"])&&!empty($_POST["nrdom"])&&!empty($_POST["miasto"])&&!empty($_POST["e-mail"])&&!empty($_POST["telefon"])&&!empty($_POST["platnosc"])&&isset($_SESSION["koszyk"])&&!empty($_SESSION["koszyk"]))
{
  include("connect.php");
  $tab=$_SESSION["koszyk"];
  $zam="";
  $razem=0;
  $cenamalamin=0; $cenaduzamin=0; $duze=0; $male=0; $napoje=0; $dania=0; $cenamalarab=0;
  foreach ($tab as $row)
  {
    $que = $db->query("SELECT `nazwa`, `cenam`, `cenad`, `opis`, `typ` FROM `produkty` where `nazwa`='".$row[0]."'");
    while ($row2 = $que->fetch_assoc()) {
      if($row2['typ']==1)
      {
        if($row[1]=="mała")
        {
          $cena=$row2['cenam'];
          $male++;
          if($cenamalamin==0||$cena<$cenamalamin)
          {
            $cenamalamin=$cena;
          }
        }
        else {
          $cena=$row2['cenad'];
          $duze++;
          if($cenaduzamin==0||$cena<$cenaduzamin)
          {
            $cenaduzamin=$cena;
            $cenamalarab=$row2['cenam'];
          }
        }
      }
      if($row2['typ']==2)
      {
        $napoje++;
        $cena=$row2['cenam'];
      }
      if($row2['typ']==3)
      {
        $dania++;
        $cena=$row2['cenam'];
      }
    }
    $z=$i-1;
    $zam=$zam.$i.". ".$row[0]." ".$row[1]." ".$cena."zł<br>";

    $razem=$razem+$cena;
    $i++;
  }
  $rabat=0;
  if($duze>=2)
  {
    $rabat=$cenaduzamin/2;
  }
  if($duze>=1&&$napoje>=1)
  {
    if(($cenaduzamin-$cenamalarab)>$rabat)
    {
      $rabat=$cenaduzamin-$cenamalarab;
    }
  }
  $razem=$razem-$rabat;
  if($rabat>0)
    $zam=$zam."Rabat -".number_format($rabat, '2', '.', ' ')."zł<br>";
  $stmt = $db->prepare("INSERT INTO `zamówienie` (`ulica`, `nr_domu`, `nr_mieszkania`, `miejscowosc`, `email`, `telefon`, `platnosc`, `zamówienie`, `kasa`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1);");
  $stmt->bind_param("sssssssss", $_POST["ulica"], $_POST["nrdom"], $_POST["nrmiesz"], $_POST["miasto"], $_POST["e-mail"], $_POST["telefon"], $_POST["platnosc"], $zam, $razem);
  $stmt->execute();
  $db->query("UPDATE `statystyki` SET `zakupow`=`zakupow`+1, `kasa`=`kasa`+$razem WHERE `id`=1");
  $que = $db->query("SELECT `id` FROM `zamówienie` ORDER BY `id` desc LIMIT 1;");
  while ($row = $que->fetch_assoc()) {
    $nr=$row["id"];
  }
  unset($_SESSION["koszyk"]);
  $_SESSION["nr"]=$nr;
  header("Location: koszyk");
}
else {
  $_SESSION["info"]="<p style='color: red'>Uzupełnij wszystkie wymagane pola</p>";
  echo "<script>history.back();</script>";
}


 ?>
