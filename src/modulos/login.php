<?php

if (!defined('SECURE')) {
    die("Logged Hacking attempt!");
}

include_once CORE . '/clase.usuario.php';

$user = new usuario();

if ($user->isLoggedIn()) {
    header("Location: index.php?do=panel");
} else {
    if (!empty($_POST['login'])) {
        $row = $user->checkExist();
        switch ($row) {
            case 0:
                {
                    $user->login($_POST);
                    break;
                }

            case 1:{
                    header("Location: index.php?do=login&accion=logueado");
                    break;
                }

            case 2:{
                    header("Location: index.php?do=login&accion=usernotfound");
                    break;
                }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Entrar al sistema </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form name="form_login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" role="form">
              <h1>Inicio de sesion</h1>
              <fieldset>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" required id="usuario" name="usuario" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contrasena" required id="password" name="password" />
              </div>
              <div>
              <button type="submit" value="login" name="login" id="login" class="btn btn-sm btn-primary">
                  <i class="ace-icon fa fa-key"></i>
                  <span class="bigger-110">Entrar</span>
                   </button>
                <a class="reset_pass" href="#">Olvidaste la contrasena?</a>
              </div>
</fieldset>
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Quiero registrarme
                  <a href="#signup" class="to_register"> Crear cuenta </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Sistema X</h1>
                  <p>©2017 Derechos reservados</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Crear cuenta</h1>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Correo" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contrasena" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Registrarme!</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ya tienes cuenta?
                  <a href="#signin" class="to_register"> Entrar </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Sistema X</h1>
                  <p>©2017 Derechos reservados</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
