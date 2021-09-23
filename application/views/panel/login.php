
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title ?></title>
  <link rel="shortcut icon" href="<?=base_url('assets/web/') ?>assets/images/favicon.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/panel/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('assets/panel/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/panel/') ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/panel/') ?>plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <?php 
      $t = explode("-", $title);
      ?>
      <a href="<?=base_url('adminweb') ?>" class="h1"><b><?=$t[0] ?></b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" autocomplete="off">
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
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="btn_login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      

      

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<script src="<?=base_url('assets/panel/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/panel/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets/panel/') ?>dist/js/adminlte.min.js"></script>
<script src="<?=base_url('assets/panel/') ?>plugins/toastr/toastr.min.js"></script>
<script>
  $(function() {
    
    $('#btn_login').on('click',function(){
        var email=$('#email').val();
        var password=$('#password').val();
        if (email === "") {
          toastr.error('Email Wajib di isi')
        }else{
          if (password === "") {
            toastr.error('Password Wajib di isi')
          }else{
            $.ajax({
              type : "POST",
              url  : "<?=base_url('auth/login') ?>",
              dataType : "JSON",
              data : {email:email , password:password},
              success: function(data){
                if (data.result == 1) {
                  toastr.success(data.message)
                  $('[name="email"]').val("");
                  $('[name="password"]').val("");
                  setTimeout(function () {
                     window.location.href = "<?=base_url('adminweb') ?>";
                  }, 1500);
                }else{
                  toastr.error(data.message)
                }
              }
            });
            return false;
          }
        }
        
    });
  });
</script>
</body>
</html>
