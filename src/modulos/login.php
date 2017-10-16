<?php
if (!defined('SECURE')) {
    die("Logged Hacking attempt!");
}

require_once CORE . '/clase.usuario.php';
$User = new Usuario();
if ($User->isLoggedIn($db)) {
    header("Location: index.php?do=panel");
} else {
    if (!empty($_POST)) {
        $row = $User->checkExist($db);
        switch ($row) {
            case 0:
                {
                    $User->login($_POST, $db);
                    break;
                }
            case 1:
            {
                header('Location: index.php?do=login&action=usuario-existe');
                break;
            }
            case 2:
                {
                    header("Location: index.php?do=login&accion=usernotfound");
                    break;
                }
            case 3:
            {
                $User->registro($_POST, $db);
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
            <form id="login" name="form_login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?do=login" role="form">
              <h1>Inicio de sesion</h1>
              <fieldset>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" required id="usuario" name="usuario" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contrasena" required id="password" name="password" />
              </div>
              <div>
              <button type="submit" value="login" name="tipo" id="login" class="btn btn-sm btn-primary">
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
                  <h1><i class="fa fa-paw"></i> 4 Ases </h1>
                  <p>©2017 Derechos reservados</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div name="register" class="animate form registration_form">
          <section class="login_content">
            <form name="form_register" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?do=login" role="form">
              <h1>Crear cuenta</h1>
              <fieldset>
              <div>
                <input id="usuario" name="usuario" type="text" class="form-control" placeholder="Usuario" required/>
              </div>
              <div>
                <input name="correo" type="email" class="form-control" placeholder="Correo" required />
              </div>
              <div>
                <input name="password" type="password" class="form-control" placeholder="Contrasena" required />
              </div>
              <div>
                <input name="nombre" type="text" class="form-control" placeholder="Nombre" required >
              </div>
              <div>
                <input name="apellido" type="text" class="form-control" placeholder="Apellido" required >
              </div>
              <div>
                <input name="patrocinador" type="text" class="form-control" placeholder="Codigo de patrocinador" required >
              </div>
              <div>
                <input name="direccion" type="text" class="form-control" placeholder="Direccion" required >
              </div>
              <div>
                <input name="telefono" type="text" class="form-control" placeholder="Telefono: +1(302)5555555" required >
              </div>
              <div>
                  <select name="sexo" name="sexo" class="form-control" required>
                      <option value="Hombre">Hombre</option>
                      <option value="Mujer">Mujer</option>
                  </select>
              </div>
              <div>
              <label for="form-field-select-1">Posicion</label>
              <select name="posicion" class="form-control" name="position" id="position" required>
                  <option value="Izquierda">Izquierda</option>
                  <option value="Derecha">Derecha</option>
              </select>
              </div>
              <div>
              <label for="form-field-select-1">Tipo de documento de identidad</label>
              <select class="form-control" name="tipo_documento" id="tipo_documento" required>
                  <option value="Cedula">Cedula</option>
                  <option value="Pasaporte">Pasaporte</option>
                  <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                  <option value="Cedula extranjera">Cedula extranjera</option>
              </select>
              <input name="cod_documento" class="form-control" type="text" placeholder="Codigo de identidad" required >
              </div>
              <div>
              <label for="form-field-select-1">Residencia</label>
              <select name="pais" class="form-control" id="pais" required>
              <optgroup label="Pais">
              <option value="Colombia">Colombia </option>
              <option value="Ecuador">Ecuador</option>
              <option value="Argentina">Argentina</option>
              <option value="Mexico">Mexico </option>
              <option value="Perú">Perú</option>
              <option value="Venezuela">Venezuela</option>
              <option value="España">España</option>
                  </optgroup>
              </select>
              <select class="form-control" name="ciudad" id="coidad" required>
              <optgroup label="Ciudad">
              <option value="Cali">Cali</option>
              <option value="Palmira">Palmira</option>
              <option value="Yumbo">Yumbo</option>
              <option value="Buga">Buga</option>
              <option value="Candelaria">Candelaria</option>
              <option value="Bogotá">Bogotá</option>
              <option value="Medellin">Medellin</option>
              </optgroup>
              </select>
              </div>

              <div>
              <button type="submit" value="register" name="tipo" id="register" class="btn btn-sm btn-primary">
              <i class="ace-icon fa fa-key"></i>
              <span class="bigger-110">Registrar</span>
               </button>
              </div>
              </fieldset>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ya tienes cuenta?
                  <a href="#signin" class="to_register"> Entrar </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> 4 Ases</h1>
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
