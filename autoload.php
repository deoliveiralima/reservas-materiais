<?php
spl_autoload_register(function(string $nomeDaClasse){

    

    $caminhoArquivo = str_replace('ProjetosIgor\\ReservaMaterial', 'src', $nomeDaClasse);
    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoArquivo);
    $caminhoArquivo.='.php';

    if (file_exists($caminhoArquivo)) {
        require_once $caminhoArquivo;
    }

});