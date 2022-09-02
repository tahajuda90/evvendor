
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vali/')?>css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Sistem Evaluasi Penyedia Pengadaan Barang/Jasa</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
        <?php if (null !== $this->session->flashdata('message')): ?>
              <div class="alert alert-dismissible alert-warning">
                  <button class="close" type="button" data-dismiss="alert">×</button>
                  <p><?= $this->session->flashdata('message') ?></p>
              </div>
          <?php endif ?>        
      <div class="logo">
        <h1>SiPP</h1>
      </div>
      <div class="login-box">          
          <form method="post" class="login-form" action="<?= base_url('C_User/login')?>">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" name="identity" autofocus>
          </div>
          <div class="form-group">
              <label class="control-label">PASSWORD</label>
              <input class="form-control" id="passInput" type="password" name="password">
              <div class="utility">
                  <div class="animated-checkbox">
                      <label>
                          <input type="checkbox" id="showPass"><span class="label-text">Show Password</span>
                      </label>
                  </div>
              </div>
          </div>
          <div class="form-group">
            <div class="utility pull-right">
              <div class="animated-checkbox">
                <label>
                    <input type="checkbox" name="remember" value="1"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              
            </div>
          </div>
          <div class="form-group btn-container">
              <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?= base_url('assets/vali/')?>js/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url('assets/vali/')?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/vali/')?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/vali/')?>js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url('assets/vali/')?>js/plugins/pace.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
  
        $('#showPass').on('click', function(){
           var passInput=$("#passInput");
           if(passInput.attr('type')==='password')
             {
               passInput.attr('type','text');
           }else{
              passInput.attr('type','password');
           }
       });
    });
    </script>
  </body>
</html>