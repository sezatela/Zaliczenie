<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Weryfikacja</title>
      <link rel="stylesheet" href="dist/css/adminlte.min.css">
  </head>
  <body>
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.css">

    <div class="content">
      <form class="center" action="index.php" method="get">
        <div class=" callout callout-success col-md-12 ">
          <h5 >Na twojego maila została wysłana wiadomość z linkiem do aktywacji konta :)</h5>
          <button type="submit" name="mail" class="btn btn-primary">Powrót do strony logowania</button>
        </div>

      </form>
    </div>

<?php
$email1= $_GET['email1'];

$to      = 'sezatela@gmial.com';
$subject = 'Link aktywacyjny';
$message = "http://127.0.0.1/Zaliczenie/scripts/active.php?kod=$email1";
$headers = array(
    'From' => 'sezatela@gmial.com',
    'Reply-To' => 'sezatela@gmial.com',
);

mail($to, $subject, $message, $headers);
?>
</body>
</html>
