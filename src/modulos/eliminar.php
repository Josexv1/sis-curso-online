<?php
if (! defined ( 'SECURE' )) {
	die ( "Logged Hacking attempt!" );
}
$tipo = $_GET['tipo'];
$id = $_GET['id'];
function eliminar($tipo, $id, PDO $db)
{
    switch ($tipo) {
        case 'curso':{
            $query ="
            DELETE FROM cursos
            WHERE codigo = :codigo
            ";
            $params = array(':codigo' => $id);
            $stmt = $db->prepare($query);
            $result = $stmt->execute($params);
            header('Location: index.php?do=panel');
            break;
        }case 'usuario':

            break;
        default:
        header('Location: index.php?do=panel');
            break;
    }
}
eliminar($tipo, $id, $db);
