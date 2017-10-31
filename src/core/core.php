<?php

if (!defined('SECURE')) {
    die('Logged Hacking attempt!');
}
include_once CORE . '/config.php';
include_once CORE .'/clase.usuario.php';
$User = new Usuario;
if (isset($_GET['do'])) {
    switch ($_GET['do']) {
        case 'panel':{
                if ($User->isLoggedIn($db)) {
                    include_once MOD . '/panel.php';
                    break;
                } else {
                    header("Location: index.php?do=login");
                }
            }
        case 'login':{
                if ($User->isLoggedIn($db)) {
                    include_once MOD . '/panel.php';
                    break;
                } else {
                    include_once MOD . '/login.php';
                    break;
                }
            }
        case 'salir':{
                $User->logout($db);
                break;
            }

        case 'perfil':{
                if ($User->isLoggedIn($db)) {
                    include_once MOD . '/perfil.php';
                    break;
                } else {
                    header("Location: index.php?do=login");
                }
            }
        case 'cursos':{
            if ($User->isLoggedIn($db)){
                include_once MOD . '/cursos.php';
                break;
            } else {
                header("Location: index.php?do=login");
            }
        }
        case 'usuarios':{
            if ($User->isLoggedIn($db)){
                include_once MOD . '/usuarios.php';
                break;
            } else {
                header("Location: index.php?do=login");
            }
        }
        case 'comprar':{
            if ($User->isLoggedIn($db)){
                include_once MOD . '/comprar.php';
                break;
            } else {
                header("Location: index.php?do=login");
            }
        }
        case 'verificar-pagos':{
            if ($User->isLoggedIn($db)){
                include_once MOD . '/verpagos.php';
                break;
            } else {
                header("Location: index.php?do=login");
            }
        }case 'matriz':{
            if ($User->isLoggedIn($db)){
                include_once MOD . '/matriz.php';
                break;
            } else {
                header("Location: index.php?do=login");
            }
        }case 'eliminar':{
            include_once MOD . '/eliminar.php';
            break;
        }case 'registrar_curso':{
            if ($User->isLoggedIn($db)) {
                include_once MOD . '/registro/curso.php';
            }else{
                header('Location: index.php?do=login');
            }
            break;
        }
        default:
            if ($User->isLoggedIn($db)) {
                include_once MOD . '/login.php';
                break;
            } else {
                include_once MOD . '/visitante.php';
                break;
            }
    } // fin switch
} //fin if
else {
    // si no tenemos ningun do=???? enviamos al landing page
    include_once MOD . '/visitante.php';
}

if (isset($_GET['accion'])) {
    switch ($_GET['accion']) {
        case 'registrado':
            echo "
      <div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
    <div class='modal-dialog'>
            <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h3>¡Felicidades!</h3>
        </div>
        <div class='modal-body'>
          <p>Te has registrado con éxito!</p>
          <p> Ahora puedes acceder al sistema, por medio del panel que aparecerá al cerrar esta ventana.</p>
        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
        </div>
            </div>
          </div>
      </div>";
            break;
        case 'pass_error':
            echo "
    <div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
     <div class='modal-dialog'>
             <div class='modal-content'>
            <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
            <h3>¡Houston, tenemos un problema!</h3>
            </div>
          <div class='modal-body'>
            <p> El usuario y la contraseña no coinciden con nuestros registros. Contacta al administrador de sistemas, si has olvidado tus datos de inicio de sesion.</p>
          </div>
          <div class='modal-footer'>
<button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
           </div>
                </div>
            </div>
        </div>";
            break;
        case 'log_error':
            echo "<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
     <div class='modal-dialog'>
             <div class='modal-content'>
        <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h3>¡La página está protegida!</h3>
          </div>
          <div class='modal-body'>
          <p>Si quieres ingresar a la pagina anterior, debes entrar con tus datos al sistema primero!</p>
          </div>
          <div class='modal-footer'>
<button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
          </div>
                </div>
            </div>
        </div>";
            break;
        case 'salir':
            echo "<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
   <div class='modal-dialog'>
             <div class='modal-content'>
          <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h3>¡Ha cerrado sesión correctamente!</h3>
          </div>
          <div class='modal-body'>
          <p>Hemos cerrado todas las conexiones con el sistema.</p>
          </div>
          <div class='modal-footer'>
<button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
           </div>
            </div>
        </div>
    </div>";
            break;
        case 'inactivo':
            echo "
      <div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
   <div class='modal-dialog'>
             <div class='modal-content'>
          <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h3>¡Tu cuenta no está activada!</h3>
          </div>
          <div class='modal-body'>
          <p>Tu cuenta se encuentra inactiva, espera a que un Adminisrador revise tu registro y te otorge los permisos necesarios.</p>
          </div>
          <div class='modal-footer'>
<button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
           </div>
            </div>
        </div>
    </div>";
            break;
        case 'logueado':
            echo "<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
   <div class='modal-dialog'>
             <div class='modal-content'>
          <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h3>¡Hey que haces!</h3>
          </div>
          <div class='modal-body'>
          <p>No se que intentas, pero esta accion esta prohibida.</p>
          </div>
          <div class='modal-footer'>
<button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
           </div>
            </div>
        </div>
    </div>";
            break;
    } //fin del switch
} //fin del isset accion
;
