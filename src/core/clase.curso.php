<?php
class Curso
{
    public function verVideos($curso, $id, PDO $db)
    {
        # code...
    }
    public function imprimirCursos(PDO $db)
    {
        //primero buscamos los cursos.
        $query = "
        SELECT *
        FROM cursos
        WHERE estado = 'activo'
        ";
        $st = $db->prepare($query);
        $st->execute();
        $rs = $st->fetchAll();

        return $rs;
    }
    public function getCurso($curso, $version, PDO $db)
    {
        //primero buscamos los cursos.
        $query = "
        SELECT *
        FROM cursos
        WHERE nombre = :curso
        AND version = :version
        ";
        $params = array(':curso' => $curso, ':version' => $version);
        $st = $db->prepare($query);
        $st->execute($params);
        $rs = $st->fetch();

        return $rs;
    }


}

