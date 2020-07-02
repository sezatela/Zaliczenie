<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.css">

    <?php
    require_once './connect.php';

  if (isset($_GET['kod'])){
  $gk = $_GET['kod'];
  $sql= "UPDATE `user` SET `active`= '1',`genKey`= ''  WHERE `genKey`= '$gk'";
  $conn->query($sql);
  echo<<<OK


   <form class= center action="../" method="get ">

   <div class=" callout callout-success col-md-12 ">
     <h5 >Twoje konto zostało aktywowane</h5>
     <button type="submit" name="back" class="btn btn-primary">Powrót do strony logowania</button>
   </div>
   </form>
OK;

    }else {
    echo<<<BACK
     </br>
<form class= center action="../" method="get">
  <div class=" callout callout-danger col-md-12 ">
    <h5>Wystapił błąd</h5>
        <button type="submit" class="btn btn-primary btn-block">Powrót do strony logowania</button>
</div>
</form>
BACK;
$_SESSION['error'] = 'Spróbuj ponownie!';
  }
    ?>

  </body>
</html>
