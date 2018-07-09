
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" id="bootstrap-css">
    
    <!-- Sweetalert -->
    <script type="text/javascript" src="<?php echo base_url('asset/sweetalert/sweetalert.min.js') ?>"></script>
    
    <script type="text/javascript" ></script>
    <style type="text/css">
    body{
    background-color:#f5f5f5;
}
.form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 80px;
    padding: 40px 0px 20px 0px;
    background-color: #ffffff;
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16);
}
.login-title
{
    color: #555;
    font-size: 22px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.select-img
{
  border-radius: 50%;
    display: block;
    height: 75px;
    margin: 0 30px 10px;
    width: 75px;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.select-name
{
    display: block;
    margin: 30px 10px 10px;
}

.logo-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

</style>
</head>
<body>


  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="account-wall">
          <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="login">
              <img class="profile-img" src="<?php echo base_url('img/gmim.png') ?>" alt="">
                <form class="form-signin" action="<?php echo base_url('index.php/login/check_login'); ?>" method="POST">
                  <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                  <input type="submit" class="btn btn-lg btn-info btn-block" value="Login" />
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php 
/*
    $sess = $this->session->userdata('login');
    if ($sess == 'gagal') {
       echo '<script type="text/javascript">swal("Login Gagal!", "Username atau Password salah!", "warning");</script>';
    }
    $this->session->mark_as_temp('login', 1);

    */
?>

</body>
</html>
