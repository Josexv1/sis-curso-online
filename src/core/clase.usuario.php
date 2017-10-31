<?php
if (!defined('SECURE')) {
    die("Logged Hacking attempt!");
}
class Usuario
{
    public function checkExist(PDO $db)
    {
        $query = "
        SELECT  correo
        FROM  usuarios
        WHERE usuario = :usuario
        ";
        $query_params = array(
            ':usuario' => $_POST['usuario']
        );
        try {
            $stmt   = $db->prepare($query);
            $result = $stmt->execute($query_params);
        } //fin try
         catch (PDOException $ex) {
            echo '
            <div class="panel-body">
            <div class="alert alert-warning alert-dismissable">
            <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
            ×
            </button>
            Tenemos problemas al ejecutar la consulta. El error es el siguiente: ';
            echo $ex->getMessage();
            echo '
            </div>
            </div>
            ';
        } //fin catch
        $row = $stmt->fetch();
        // si row = false, no conseguimos, retornamos 2
        // 0 = conseguido y pasamos al login (login)
        // 1 = conseguido error de registro
        // 2 = no conseguido error de login
        // 3 = no conseguido pasamos al registro
        if ($_POST['tipo'] == "register") {
            if ($row) {
                $check = 1;
                return $check;
            } else {
                $check = 3;
                return $check;
            }
        } else {
            if ($row) {
                $check = 0;
                return $check;
            } else {
                $check = 2;
                return $check;
            }

        }



    } // fin funcion check
    public function lasdID(PDO $db) {
        $stmt = $db->lastInsertId();
        return $stmt;
    }

    /**
     * registro: registra al usuario siguiendo estos
     * Primero: Intentamos subir la imagen al directorio /upload/usuario/nombre.ext
     * Segundo: Si todo funciona llenamos los datos en la base de datos
     * lo que registro mas la ruta de la imagen
     *
     * @param [array] $post
     * @param PDO $db
     * @return void
     */

    public function registro($post, PDO $db)
    {

        $nivel = 2; // usuario comun
        $query = "
        INSERT INTO usuarios (
            usuario,
            nombre,
            apellido,
            correo,
            telefono,
            direccion,
            password,
            salt,
            nivel,
            cookie,
            patrocinador,
            sexo,
            tipo_documento,
            cod_documento,
            pais,
            ciudad,
            b_glob_pos
        ) VALUES (
            :usuario,
            :nombre,
            :apellido,
            :correo,
            :telefono,
            :direccion,
            :password,
            :salt,
            :nivel,
            :cookie,
            :patrocinador,
            :sexo,
            :tipo_documento,
            :cod_documento,
            :pais,
            :ciudad,
            :b_glob_pos
        )
    ";
    $salt = str_replace('=', '.', base64_encode(mcrypt_create_iv(20)));
    $password = hash('sha512', $post['password'] . $salt);
    for($round = 0; $round < 65536; $round++){
     $password = hash('sha512', $password . $salt);
      }
      $c = 000000;
    $query_params = array(
        ':usuario' => $post['usuario'],
        ':nombre' => $post['nombre'],
        ':apellido' => $post['apellido'],
        ':correo' => $post['correo'],
        ':telefono' => $post['telefono'],
        ':direccion' => $post['direccion'],
        ':password' => $password,
        ':salt' => $salt,
        ':nivel' => $nivel,
        ':cookie' => $c,
        ':patrocinador' => $post['patrocinador'],
        ':sexo' => $post['sexo'],
        ':tipo_documento' => $post['tipo_documento'],
        ':cod_documento' => $post['cod_documento'],
        ':pais' => $post['pais'],
        ':ciudad' => $post['ciudad'],
        ':b_glob_pos' => $post['posicion']

    );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
     echo "
    <div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                <h3>¡Error!</h3>
            </div>
            <div class='modal-body'>

                <p>Para registrarse previamente debe haber tenido una cita</p>
            </div>
            <div class='modal-footer'>
            <button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
            </div>
        </div>
        </div>
    </div>";

};
}
    public function login($post, PDO $db)
    {
        try {
            $stmt = $db->prepare("
            SELECT *
            FROM usuarios
            WHERE usuario=:usuario
            ");
            $stmt->execute(array(":usuario" => $_POST['usuario']));
            $userRow = $stmt->fetch();
            if ($stmt->rowCount() == 1) {
                // si podemos agarrar los datos del usuario los usamos, si no exit.
                $id_usuario     = $userRow['correo'];
                $check_password = hash('sha512', $_POST['password'] . $userRow['salt']);
                for ($round = 0; $round < 65536; $round++) {
                    $check_password = hash('sha512', $check_password . $userRow['salt']);
                }
                if ($check_password === $userRow['password']) {
                    // si el password concuerda colocamos la sesion!
                    $numero_aleatorio = mt_rand(1000000, 999999999);
                    $query            = "
                    UPDATE usuarios
                    SET cookie = :numero
                    WHERE usuario = :usuario";
                    $query_params = array(
                        ':numero'   => $numero_aleatorio,
                        ':usuario'  => $userRow['usuario']
                    );
                    try {
                        $stmt   = $db->prepare($query);
                        $result = $stmt->execute($query_params);
                    } //fin try
                     catch (PDOException $ex) {
                        echo '
                        <div class="panel - body">
                        <div class="alertalert - warningalert - dismissable">
                        <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
                        ×
                        </button>
                        Tenemos problemas al ejecutar la consulta. El error es el siguiente: ';
                        echo $ex->getMessage();
                        echo '
                        </div>
                        </div>
                        ';

                    } //fin catch
                    // implementacion del recordar usuario colocamos la cookie para siempre por defecto.
                    // if ($_POST["recordar"]=="1"){
                    setcookie("session", $numero_aleatorio, time() + (60 * 60 * 24 * 365));
                    // }//fin if recordar
                    // else{
                    //   setcookie("session", $numero_aleatorio, time()+(60*60));
                    // }//fin else recordar
                    header("Location: index.php?do=panel");
                } // fin if check password
                else {
                    // si la password no concuerda nos vamos a el error de usuario
                    header("Location: index.php?do=login&accion=badpass");
                }
            } // fin if row count
        } catch (PDOException $ex) {
            echo '
            <div class="panel - body">
            <div class="alertalert - warningalert - dismissable">
            <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
            ×
            </button>
            Tenemos problemas al ejecutar la consulta. El error es el siguiente: ';
            echo $ex->getMessage();
            echo '
            </div>
            </div>
            ';
        }
    }

    public function isLoggedIn(PDO $db)
    {
        if (isset($_COOKIE["session"])) {
            $query = "
            SELECT  correo
            FROM    usuarios
            WHERE   cookie = :cookie
            ";
            $query_params = array(
                ':cookie' => $_COOKIE['session'],
            );
            try {
                $stmt   = $db->prepare($query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                echo '
                <div class="panel - body">
                <div class="alertalert - warningalert - dismissable">
                <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
                ×
                </button>
                Tenemos problemas al ejecutar la consulta. El error es el siguiente: ';
                echo $ex->getMessage();
                echo '
                </div>
                </div>
                ';
            };
                return true;
        } else {
            return false;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout(PDO $db)
    {
        $numero_aleatorio = mt_rand(1000000, 999999999);
        // $query            = '
        // UPDATE usuarios
        // SET logueado = :logueado
        // WHERE cookie = :usuario
        // ';
        // $query_params     = array(
        //     ':usuario'  => $_COOKIE['session']
        // );
        // try {
        //     $stmt = $db->prepare($query);
        //     $stmt->execute($query_params);
        // } catch (PDOException $ex) {
        //     echo '
        //     <div class="panel - body">
        //     <div class="alertalert - warningalert - dismissable">
        //     <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
        //     ×
        //     </button>
        //     Tenemos problemas al ejecutar la consulta. El error es el siguiente: ';
        //     echo $ex->getMessage();
        //     echo '
        //     </div>
        //     </div>
        //     ';
        // }
        $id_usuario       = 0;
        $numero_aleatorio = 0;
        setcookie('session', '', 0);
        header('Location: index.php?accion=salir');
    }

    public function getDataBySession($session, PDO $db)
    {
        $query = '
        SELECT *
        FROM   usuarios
        WHERE  cookie = :id
        ';
        $query_params = array(
            ':id' => $session,
        );
        try {
            $stmt = $db->prepare($query);
            $stmt->execute($query_params);
        } catch (PDOException $ex) {
            echo '
            <div class="panel - body">
            <div class="alertalert - warningalert - dismissable">
            <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
            ×
            </button>
            Tenemos problemas al ejecutar la consulta. El error es el siguiente: ';
            echo $ex->getMessage();
            echo '
            </div>
            </div>
            ';
        }
        $dataUsuario = $stmt->fetch();

        return $dataUsuario;
    }

    public function getUsuarios(PDO $db){
        $query = "  SELECT  *
        FROM    usuarios

        ";
        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
        }
        catch(PDOException $ex){
        echo "Error > " .$ex->getMessage();
        }
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public function getPerfil($usuario, PDO $db)
    {
        $query = 'SELECT *
        FROM   usuarios
        WHERE  usuario = :id
        ';
        $query_params = array(
            ':id' => $usuario,
        );
        try {
            $stmt = $db->prepare($query);
            $stmt->execute($query_params);
        } catch (PDOException $ex) {
            echo '
            <div class="panel - body">
            <div class="alertalert - warningalert - dismissable">
            <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
            ×
            </button>
            Tenemos problemas al ejecutar la consulta. El error es el siguiente: ';
            echo $ex->getMessage();
            echo '
            </div>
            </div>
            ';
        }
        $dataUsuario = $stmt->fetch();

        return $dataUsuario;
    }

    public function getPosicion(PDO $db)
    {
        $query = "
        SELECT max(b_glob_pos)
        FROM usuarios
        ";
        try{
            $stmt = $db->prepare($query);
            $stmt->execute();
        }catch (PDOException $ex) {
            echo '
            <div class="panel - body">
            <div class="alertalert - warningalert - dismissable">
            <button aria-hidden="true" class="close" data-dismiss="alert" type="button">
            ×
            </button>
            Tenemos problemas al ejecutar la consulta. El error es el siguiente: ';
            echo $ex->getMessage();
            echo '
            </div>
            </div>
            ';
        }
        $d = $stmt->fetch();

        return $d;
    }

}
