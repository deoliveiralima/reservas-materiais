<?php
namespace ProjetosIgor\ReservaMaterial\Controller;

trait ControllerComHtml{ 

    public function renderizaHtml(string $caminhoTemplate, array $conteudo): string
    {
        //transformar as chaves em variaveis atribuindo para cada uma seus valores
        extract($conteudo);

       
        ob_start();
        require __DIR__ . '/../../view/paginas/' . $caminhoTemplate;
        $html = ob_get_clean();

        $_SESSION['mensagem'] = '';
        $_SESSION['classe'] = '';
        return $html;
    }

}