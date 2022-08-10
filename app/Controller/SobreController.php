<?php

class SobreController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Eviroment($loader);
        $template = $twig->load('sobre.html');

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;

    }
}