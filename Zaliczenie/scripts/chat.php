<?php


if (!isset($_SESSION['logged']['email'])) {
 header('location: ../');
}

function chat(){
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Widgets</title>
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
            <div class="row">
              <div>
                <!-- DIRECT CHAT PRIMARY -->
                <div class="card card-prirary cardutline direct-chat direct-chat-primary">
                  <div class="card-header">
                    <h3 class="card-title">Chat</h3>

                    <div class="card-tools">

                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                              data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                      <!-- Message. Default to the left -->
                      <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left">
<?php
echo $_SESSION['logged']['name'], ' ', $_SESSION['logged']['surname'];
?>
                          </span>

                        </div>
<?php
echo "<img src=\"{$_SESSION['logged']['avatar']}\" class='direct-chat-img' alt='User Image'>";
?>
                        <div class="direct-chat-text">
                          Nie zapomnij zalogować się na konto admina :)
                          </div>
                          <?php
                          if(!empty($_POST['message'])){
                          $txt = $_POST['message'];
                          echo "<img src=\"{$_SESSION['logged']['avatar']}\" class='direct-chat-img' alt='User Image'>";
                          echo "<div class='direct-chat-text'>$txt</div>";
                          }else {

                          }

                           ?>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->



                    </div>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form action="#" method="post">
                      <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                          <button type="input" class="btn btn-primary">Send</button>
                        </span>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>

<?php

}
?>
