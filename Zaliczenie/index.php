<?php
  session_start();

  if (isset($_SESSION['logged']['email'])) {
    header('location: ./scripts/login.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Zaloguj się</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./index.php"><b>Logowanie</b></a>

    <!-- Prawidłowe dodanie użytkownika -->
    <?php
      if (isset($_GET['register']) || isset($_GET['logout']) || isset($_GET['mail']) || isset($_GET['back'])) {
        echo <<<ERROR
          <div class="card bg-success">
            <div class="card-header">
ERROR;
              if (isset($_GET['register'])) {
                echo '<h3 class="card-title">Prawidłowo dodano użytkownika</h3>';
              }
              else if(isset($_GET['logout'])){
                echo '<h3 class="card-title">Prawidłowo wylogowano użytkownika</h3>';
              }else if(isset($_GET['mail'])){
                echo '<h3 class="card-title">Aktywuj link w e-mailu</h3>';
              }else if(isset($_GET['back'])){
                echo '<h3 class="card-title">Teraz mozesz sie zalogować</h3>';
              }

        echo <<<ERROR
            </div>
         </div>
ERROR;
      }

      if (isset($_SESSION['error'])) {
        echo <<<ERROR
          <div class="card bg-danger">
            <div class="card-header">
              <h3 class="card-title">$_SESSION[error]</h3>
            </div>
         </div>
ERROR;
        unset($_SESSION['error']);
      }
    ?>

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
  <form action="./scripts/login.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Zapamiętaj mnie
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Dołącz</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- LUB -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Zapomniałem hasła</a>
      </p>
      <p class="mb-0">
        <a href="./register.php" class="text-center">Dodaj nowego użytkownika</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>

</body>
</html>
