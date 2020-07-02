<?php
session_start();

if (!isset($_SESSION['logged']['email'])) {
 header('location: ../');
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.html" class="brand-link">
      <img src="../dist/img/download.jpg"
           alt="User"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div>
        <div>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="user.php" class="nav-link active">
                  Strona Startowa
              </a>
        </div>
        <div>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item has-treeview">
              <a href="../wybory.php" class="nav-link active">
                  Wybory
              </a>
        </div>
        <div>

          <a href="../scripts/logout.php" class="nav-link">
              <img src="../dist/img/sign-out-alt-solid.svg" alt="image"  style="opacity: .4" width="25" height="25">
              Wyloguj się
          </a>

      </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <p class="nav-link"> Znajomi </p>
                  <?php
                  // Pobranie 8 ostatnio zalogowanych użytkowników
                  require_once '../scripts/connect.php';
                  $sql = "SELECT * FROM `user` ORDER BY `last_login` DESC limit 8 offset 1";
                  $result = $conn->query($sql);
                  while($user1 = $result->fetch_assoc()){

                    echo <<<USER
                    <li>
                    <img src="$user1[avatar]" alt="User Image  width="50" height="50"
                    class="brand-image img-circle elevation-3 "
                    style="opacity: .8">
                    <a class="users-name" href="">$user1[name]</a>
                    <span class="users-date"></br>
USER;

                    //oblicz kiedy byl ostatnio zalogowany
                    //dzisiaj, wczoraj, ile dni temu (od miesiaca), mieciac temu, roktemu
                    require_once '../scripts/function.php';

                    $last_login = $user1['last_login'];
                    echo "<a>Aktywny<a> ";
                    echo countDay($last_login);

                    echo <<<USER
                    <hr color=white>
                    </span>
                    </li>
                    USER;
                  }
                  ?>
                </p>
              </a>
            </li>
                  </li>
        </ul>
      </nav>


  </aside>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                   <?php
                   echo "<img src=\"{$_SESSION['logged']['avatar']}\" class='img-circle elevation-2' alt='User Image'>";
                   ?>
                </div>

                <h3 class="profile-username text-center">
                  <?php
                    echo $_SESSION['logged']['name'], ' ', $_SESSION['logged']['surname'];
                  ?>
                </h3>

                <p class="text-muted text-center">Widoczne informacje</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Data Urodzenia</b> <a class="float-right">
        <?php
        $email = $_SESSION['logged']['email'];
        $sql2="SELECT `birthday` FROM `user` WHERE `email` = '$email'";
        $result = $conn->query($sql2);
        if($user1 = $result->fetch_assoc()){
          echo "$user1[birthday]";
        }

          ?>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">
    <?php
echo "$email";
     ?>
                   </a>
                  </li>
                  <li class="list-group-item">
                    <b>Obywatelstwo</b> <a class="float-right">
<?php
if (isset($_GET["id"])) {
  echo "$_GET[id]";
}
//}
 ?>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <b>Miasto</b> <a class="float-right">

                    </a>
                  </li>
                </ul>


              </div>
              <!-- /.card-body -->
            </div>
                <?php
                  require_once '../scripts/chat.php';
                  $chat =chat();
                ?>
            </div>
          </div>

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">

                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Dodaj</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edytuj Dane</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <?php
                    if (!empty($_GET['link']) || !empty($_GET['opis'])) {
                      $add=$_GET['link'];
                        $add1=$_GET['opis'];
                      echo<<<Add

                          <div class="card-body">
                            <div class="tab-content">
                              <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                  <div class="user-block">

                                    <img src={$_SESSION['logged']['avatar']} class='img-circle elevation-2' alt='User Image'>
                                    <span class="username">
                                      <a href="#">{$_SESSION['logged']['name']} {$_SESSION['logged']['surname']}</a>
                                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                      </span>
Add;
                                    if (isset($add)) {
                                      echo "<img height='100' width='150' src='$add' alt='image'><br>";
                                    }if (isset($add1)){
                                      echo "$add1";
                                    }

                                echo<<<Add1
                                  </div>
                                  <!-- /.user-block -->
                      <div class="input-group input-group-sm mb-0">
                        <input class="form-control form-control-sm" placeholder="Dodaj komentarz">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-danger">Send</button>
                        </div>
                      </div>
                    </div>
Add1;
};
                     ?>

                    <div class="post">
                      <div class="user-block">

                        <img class="img-circle img-bordered-sm" src="../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>

                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>



                      <div class="input-group input-group-sm mb-0">
                        <input class="form-control form-control-sm" placeholder="Dodaj komentarz">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-danger">Send</button>
                        </div>
                      </div>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>

                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Dodaj komentarz">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                      </div>
                      <!-- /.user-block -->
                      <div>

                        <div class="timeline-item">
                          <div class="timeline-body">
                            <img height="100" width="150" src="https://adminlte.io/themes/AdminLTE/dist/img/photo1.png" alt="...">
                            <img height="100" width="150" src="https://adminlte.io/themes/AdminLTE/dist/img/photo2.png" alt="...">
                            <img height="100" width="150" src="https://adminlte.io/themes/AdminLTE/dist/img/photo3.jpg" alt="...">
                            <img height="100" width="150" src="https://adminlte.io/themes/AdminLTE/dist/img/photo4.jpg" alt="...">
                          </div>
                        </div>
                      </div>

                      <p></p>
                      <div class="input-group input-group-sm mb-0">
                        <input class="form-control form-control-sm" placeholder="Dodaj komentarz">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-danger">Send</button>
                        </div>
                      </div>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <form align="right" class="" action="user.php" method="get">
                          <table>
                            <h3 align="left">Dodaj Link do zdjecia Oraz opis</h3>
                            <tr><input type="text" class="form-control" name="link" placeholder="Link"></tr><br>
                            <tr><input type="text" class="form-control" name="opis" placeholder="Opis do linku"></tr><br>
                          </table>
                            <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                          <input  type="submit" class="btn btn-danger" name="linki" value="Dodaj"><br>
                        </div>
                        </div>
                      </form>
                        <form align="right" action="user.php" method="get">

                        <h3 align="left">Dodaj Post</h3>
                        <h6 align="left">(Jeszcze nie aktywne)</h6>
                        <textarea name="area" rows="6" cols="125"></textarea>
                        <input  type="submit" class="btn btn-danger" name="linki" value="Dodaj"><br>
                      </form>


                    </div>
                  <div class="tab-pane" id="settings">
                    <form class="" action="user.php" method="get">

                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Obywatelstwo</label>
                        <div class="col-sm-10">
                          <select name="id">
                          <?php

                          $sql1 = "SELECT name, id FROM `country`";
                              $result1 = $conn->query($sql1);
                          $i = 0;
                          while ($row = $result1->fetch_assoc()) {
                            $tab[$i] = $row['name'];
                            $i++;
                              echo<<<LISTA
                              <option> $row[name] </option>
LISTA;
}

                           ?>
                           </select>

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Miasto</label>
                        <div class="col-sm-10">
                          <select>
                          <?php

                          $sql3 = "SELECT name FROM `city`";
                              $result3 = $conn->query($sql3);
                          $i = 0;
                          while ($row1 = $result3->fetch_assoc()) {
                            $tab1[$i] = $row1['name'];
                            $i++;
                              echo<<<LISTA
                              <option> $row1[name] </option>
LISTA;
                          }
                           ?>
                           </select>
                        </div>
                      </div>
                      <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Data Urodzenia</label>
                        <input type="date" name="birthday" value="Data Urodzenia">
                        <div class="col-sm-10">

                          <?php
                          if (!empty($_GET['birthday'])) {

                          $sq = "UPDATE `user` SET `birthday` = '$_GET[birthday]' WHERE `email` = '$email' ";
                              $resul = $conn->query($sq);
                            }else {
                              echo "";
                            }
                           ?>

                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</form>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
