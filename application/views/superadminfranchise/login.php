<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tea Break Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href=<?php echo base_url("apple-icon.png")?>>
    <link rel="shortcut icon" href=<?php echo base_url("assets/logo.ico")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/normalize.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/vendors/bootstrap-4.1.3-dist/css/bootstrap.min.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/font-awesome.min.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/themify-icons.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/flag-icon.min.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/cs-skin-elastic.css")?>>
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href=<?php echo base_url("assets/scss/style.css")?>>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<style type="text/css">
.red{
    color: red !important;
}
.green{
    color: green !important;
}
</style>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                
                <div class="login-form align-content">
                        <div class="login-logo">
                            <a href="/">
                                <img class="align-content" src=<?php echo base_url("images/logo.png")?> alt="">
                            </a>
                        </div>
                        <div class="form-group">
                            <label id="labelusername">Username</label>
                            <input id="username" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label id="labelpassword">Password</label>
                            <input id="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <p class="green text-center" id="error"></p>
                        <button onclick="proses_login()" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                </div>
            </div>
        </div>
    </div>


    <script src=<?php echo base_url("assets/js/jquery.min.js")?>></script>
<!--     <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script> -->
    <script type="text/javascript">
        function proses_login() {
            if ($('#username').val() == '') {
                $('#username').addClass('is-invalid');
                $('#labelusername').addClass('red');
            }else{
                $('#username').removeClass('is-invalid');
                $('#labelusername').removeClass('red');
            }

            if ($('#password').val() == '') {
                $('#password').addClass('is-invalid');
                $('#labelpassword').addClass('red');
            }else{
                $('#password').removeClass('is-invalid');
                $('#labelpassword').removeClass('red');
            }

            if ($('#username').val() != '' && $('#password').val() != '') {
                var username = $('#username').val();
                var password = $('#password').val();
                $.ajax({
                    type:"post",
                    beforeSend: function(xhr) {
                        $('#error').html('Login in Process');
                    },
                    url: "<?php echo base_url('superadminfranchise/prosesLogin')?>/",
                    data:{ username:username,password:password},
                    dataType:"json",
                    success:function(response)
                    {
                      if (response.toString() == 'true') {
                        $('#error').addClass('green');
                        $('#error').removeClass('red');
                        $('#error').html('Success !');
                        window.location.href = "dashboardsuperadmin";
                      }else{
                        $('#error').addClass('red');
                        $('#error').removeClass('green');
                        $('#error').html('Username atau Password Salah !');
                      }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                      alert(errorThrown);
                    }
                });
            }
        }
    </script>

</body>
</html>
