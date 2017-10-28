<?php
if (!defined('SECURE')) {
    die("Logged Hacking attempt!");
}

class Compra
{
    public function registrar($post, PDO $db)
    {
        $query = "
        INSERT INTO pagos (
            usuario,
            curso,
            version,
            fecha,
            precio,
            txbitcoin,
            carterabitcoin
        ) VALUES (
            :usuario,
            :curso,
            :version,
            :fecha,
            :precio,
            :txbitcoin,
            :carterabitcoin

        )
    ";
    $query_params = array(
        ':usuario' => $post['usuario'],
        ':curso' => $post['curso'],
        ':version' => $post['version'],
        ':fecha' => $post['fecha'],
        ':precio' => $post['precio'],
        ':txbitcoin' => $post['txBitcoin'],
        ':carterabitcoin' => $post['carteraBitcoin']

    );
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        return true;
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

                <p>Error al guardar los datos en la base de datos</p>
            </div>
            <div class='modal-footer'>
            <button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
            </div>
        </div>
        </div>
    </div>";
};
    }

    public function regFoto($file, $u, $f, PDO $db)
    {
        // delete file local path
        $file = str_replace($_SERVER['DOCUMENT_ROOT'], '', $file);
        $query = "UPDATE pagos SET imagenPago = ? WHERE usuario = ? AND fecha = ?";
        try {
            $stmt = $db->prepare($query);
            $stmt->bindParam(1, $file);
            $stmt->bindParam(2, $u);
            $stmt->bindParam(3, $f);
            $result = $stmt->execute();
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

                    <p>Error al guardar imagen en la base de datos</p>
                </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-info' data-dismiss='modal'>¡Entiendo!</button>
                </div>
            </div>
            </div>
        </div>";
    };
    }

    public function verCompras(PDO $db)
    {
        $query = "SELECT * FROM pagos WHERE status = 'NoPago'";
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
}
