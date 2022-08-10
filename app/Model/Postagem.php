<?php

class Postagem
{
    public static function selecionaTodos()
    {
        $con = Connection::getCon();

        $sql = "SELECT * FROM postagem ORDER BY id DESC";
        $sql = $conn->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Postagem')) {
            $resultado[] = $row;
        }

        if (!$resultado){
            throw new Exception("Não foi encontrado nenhum registro no banco.");
        }

        return $resultado;
    }

    public static function selecionaPorId($idPost)
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM Postagem WHERE id= :id";
        $sql = $con->prepare($sql);
        $sql = bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $resultado = $sql->fetchObject('Postagem');

        if (!resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco.");
        } else {
            $resultado->comentarios = Comentario::selecionaselecionarComentarios($resultado->id);

        }

        return $resultado;
    }
}