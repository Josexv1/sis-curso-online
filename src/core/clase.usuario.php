<?php
if (!defined('SECURE')) {
    die("Logged Hacking attempt!");
}
require CORE . '/config.php';

class usuario
{
    private $conn;
    public function __construct()
    {
        $database   = new Database();
        $db         = $database->dbConnection();
        $this->conn = $db;
    }

    public function checkExist()
    {
        $query = "  SELECT  ID,
        password,
        salt,
        correo,
        nivel,
        logueado
        FROM  usuarios
        WHERE usuario = :usuario
        ";
        $query_params = array(
            ':usuario' => $_POST['usuario'],
        );
        try {
            $stmt   = $this->conn->prepare($query);
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

        // si row = true, conseguimos un usuario logueado.
        // si row logueado = si, retornamos 1
        // si row logueado = no, retornamos 0
        // si row = false, no conseguimos, retornamos 2
        // 0 = conseguido y pasamos al login
        // 1 = conseguido, pero esta logueado, error de login, no pasamos
        // 2 = no conseguido, error usuario no existe

        if ($row) {
            if ($row['logueado'] === 'SI') {
                $check = 1;
                return $check;
            } else {
                $check = 0;
                return $check;
            }
        } //fin if row
        else {
            $check = 2;
            return $check;
        } //fin if else row
    } // fin funcion check
    public function lasdID()
    {
        $stmt = $this->conn->lastInsertId();
        return $stmt;
    }

    // public

    // function registro($uname, $email, $upass, $code)
    // {
    //   try {
    //     $password = md5($upass);
    //     $stmt = $this->conn->prepare("INSERT INTO tbl_users(userName,userEmail,userPass,tokenCode)
    //                                                  VALUES(:user_name, :user_mail, :user_pass, :active_code)");
    //     $stmt->bindparam(":user_name", $uname);
    //     $stmt->bindparam(":user_mail", $email);
    //     $stmt->bindparam(":user_pass", $password);
    //     $stmt->bindparam(":active_code", $code);
    //     $stmt->execute();
    //     return $stmt;
    //   }

    //   catch(PDOException $ex) {
    //     echo $ex->getMessage();
    //   }
    // }

    public function login($post)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE usuario=:usuario");
            $stmt->execute(array(":usuario" => $_POST['usuario']));
            $userRow = $stmt->fetch();
            if ($stmt->rowCount() == 1) {

                // si podemos agarrar los datos del usuario los usamos, si no exit.

                $id_usuario     = $userRow['ID'];
                $check_password = hash('sha512', $_POST['password'] . $userRow['salt']);
                for ($round = 0; $round < 65536; $round++) {
                    $check_password = hash('sha512', $check_password . $userRow['salt']);
                }

                if ($check_password === $userRow['password']) {

                    // si el password concuerda colocamos la sesion!

                    $numero_aleatorio = mt_rand(1000000, 999999999);
                    $query            = "UPDATE usuarios
                    SET cookie = :numero, logueado = :logueado
                    WHERE usuario = :usuario";
                    $query_params = array(
                        ':numero'   => $numero_aleatorio,
                        ':usuario'  => $userRow['usuario'],
                        ':logueado' => 'SI',
                    );
                    try {
                        $stmt   = $this->conn->prepare($query);
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

    public function isLoggedIn()
    {
        if (isset($_COOKIE["session"])) {
            $query = "  SELECT  logueado
            FROM    usuarios
            WHERE   cookie = :cookie
            ";
            $query_params = array(
                ':cookie' => $_COOKIE['session'],
            );
            try {
                $stmt   = $this->conn->prepare($query);
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

            }
            $row = $stmt->fetch();
            if ($row['logueado'] == 'SI') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        $numero_aleatorio = mt_rand(1000000, 999999999);
        $logueado         = 'NO';
        $query            = 'UPDATE usuarios SET logueado = :logueado WHERE cookie = :usuario';
        $query_params     = array(
            ':usuario'  => $_COOKIE['session'],
            ':logueado' => $logueado,
        );
        try {
            $stmt = $this->conn->prepare($query);
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
        $id_usuario       = 0;
        $numero_aleatorio = 0;
        setcookie('session', '', 0);
        header('Location: index.php?accion=salir');
    }

    public function sendMail($email, $message, $subject)
    {
        require_once 'mailer/class.phpmailer.php';
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 465;
        $mail->AddAddress($email);
        $mail->Username = "your_gmail_id_here@gmail.com";
        $mail->Password = "your_gmail_password_here";
        $mail->SetFrom('your_gmail_id_here@gmail.com', 'Coding Cage');
        $mail->AddReplyTo("your_gmail_id_here@gmail.com", "Coding Cage");
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
    }

    public function getDataBySession($session)
    {
        $query = 'SELECT nombre,
        apellido,
        nivel
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

}
