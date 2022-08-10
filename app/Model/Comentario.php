<?php

class Comentario
{
    public static function selecionarComentarios($idPost)
    {
        $conn = Connection::getCon();

        $sql = "SELECT * FROM comentario WHERE id_postagem = ::id";
        $sql = $con->prepare($sql);
        $sql = bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObect('comentario')){
        $resultado[] = $row;
        }

        return $resultado;
    }
}