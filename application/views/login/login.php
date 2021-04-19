<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/files/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/files/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/files/font-awesome.min.css">
  <script src="<?php echo base_url();?>/assets/files/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/assets/files/popper.min.js"></script>
  <script src="<?php echo base_url();?>/assets/files/bootstrap.min.js"></script>
  <style>
      .login-dark {
          height: 100vh;
          display:flex;
          align-items:center;
          position: relative;
        }
        
        .login-dark form {
          max-width: 420px;
          width: 90%;
          background-color: #1e2833;
          padding: 40px;
          border-radius: 4px;
          transform: translate(-50%, -50%);
          position: absolute;
          top: 50%;
          left: 50%;
          color: #fff;
          box-shadow: 3px 3px 4px rgba(0,0,0,0.2);
        }
        
        .login-dark .illustration {
          text-align: center;
          padding: 15px 0 20px;
          font-size: 100px;
          color: #2980ef;
        }
        
        .login-dark form .form-control {
          background: none;
          border: none;
          border-bottom: 1px solid #434a52;
          border-radius: 0;
          box-shadow: none;
          outline: none;
          color: inherit;
        }
        
        .login-dark form .btn-primary {
          background: #f6a82d;
          border: none;
          border-radius: 4px;
          padding: 11px;
          box-shadow: none;
          margin-top: 26px;
          text-shadow: none;
          outline: none;
        }
        
        .login-dark form .btn-primary:hover, .login-dark form .btn-primary:active {
          background: #c38017;
          outline: none;
        }
        
        .login-dark form .forgot {
          display: block;
          text-align: center;
          font-size: 12px;
          color: #6f7a85;
          opacity: 0.9;
          text-decoration: none;
        }
        
        .login-dark form .forgot:hover, .login-dark form .forgot:active {
          opacity: 1;
          text-decoration: none;
        }
        
        .login-dark form .btn-primary:active {
          transform: translateY(1px);
        }
  </style>
  </head>
<body style="background: #982f58;">
    <div class="login-dark">
        <form method="post" action="<?php echo base_url();?>index.php/welcome/">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <img class="img-fluid" src="https://alazharthodupuzha.org/wp-content/uploads/2020/06/website-logo-1.png">
            </div>
            <?php
            $message = $this->session->flashdata('loginErrorMessage');
            if( $message!='' ){
              echo sprintf( '<div style="color:red;">%s</div>', $message );
            }
            ?>
            <div class="form-group">
                <div style="color: red;"><?php echo form_error('username')?></div>
                <input class="form-control" type="text" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <div style="color: red;"><?php echo form_error('password')?></div>
                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember" id="remember"> Remember me
                </label>
            </div>
            <div class="form-group">
                <button type="submit" id="submit" class="btn btn-primary btn-block">Log In</button>
            </div>
        </form>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){

        var remember=localStorage.getItem("remember");
        if(remember==1)
        {
            $('#remember').attr("checked",true);
        }
        var storage_username=localStorage.getItem("username");
        var storage_password=localStorage.getItem("password");
        if(storage_username!='') $('#username').val(storage_username);
        if(storage_password!='') $('#password').val(storage_password);

        $('#submit').click(function(){
            // console.log('ssss');
            if($('#remember').is(':checked'))
            {
                var username=$('#username').val();
                var password=$('#password').val();
                localStorage.setItem("username",username);
                localStorage.setItem("password",password);
                localStorage.setItem("remember",1);
            }
            else
            {
                localStorage.setItem("username","");
                localStorage.setItem("password","");
                localStorage.setItem("remember",0);
            }
        });

    });
</script>