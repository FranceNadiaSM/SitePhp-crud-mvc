<?php

class PostController
{
    public function index($params)
    {
        try {
            $postagem = Postagem::selecionaPorId($params);

            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Eviroment($loader);
            $template = $twig->load('single.html');

            $parametros = array();
            $parametros['titulo'] = $postagem->titulo;
            $parametros['conteudo'] = $postagem->conteudo;
            $parametros['comentarios'] = $postagem->comentarios;

            $conteudo = $template->render($parametros);
            //echo $conteudo;

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}