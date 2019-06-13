<?php
    /* require $_SERVER['DOCUMENT_ROOT'].'/newsportal/config/init.php';
     /* debug('here'); */
   require 'inc/header.php';
   /*  debug($_SESSION);
    debug($_COOKIE,true); */
/* --------------------------------------SESSION AND COOKIE SET garako xa ki xaena------------------------------------------------------ */
if(isset($_SESSION,$_SESSION['token']) && !empty($_SESSION['token'])){
    redirect('cms/dashboard.php','success','You are already logged in.');
}

if(isset($_COOKIE,$_COOKIE['_au']) && !empty($_COOKIE['_au'])){
    redirect('cms/dashboard.php','success','Welcome back!');
}
/* --------------------------------------END SESSION AND COOKIE SET------------------------------------------------------ */
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign Up</h3>
                </div>
                <div class="panel-body">
                    <?php flash(); ?>
                    <form action="process/login.php" method="post" role="form">
                        <fieldset>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="E-mail" name="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    value="">
                            </div>
                            <div class="check-box">
                                <label for="remember">
                                    <input type="checkbox" name="remember" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    /* require $_SERVER['DOCUMENT_ROOT'].'/newsportal/config/init.php';
     /* debug('here'); */
   require 'inc/footer.php';
?>