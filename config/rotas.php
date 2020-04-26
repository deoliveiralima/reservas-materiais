<?php

use ProjetosIgor\ReservaMaterial\Controller\MaterialController;
/** Obter o id para  */


return [
        
        '/material/cadastro' => array('classe' => MaterialController::class, 'metodo' => 'exibirformularioCadastro') ,
        '/material/cadastro' => array('classe' => MaterialController::class, 'metodo' => 'exibirformularioCadastro') ,
        '/material/salvar' => array('classe' => MaterialController::class, 'metodo' => 'salvar') ,
        '/material/listar' => array('classe' => MaterialController::class, 'metodo' => 'exibirLista') ,
        '/material/atualizacao' => array('classe' => MaterialController::class, 'metodo' => 'exibirFormularioAtualizacao') ,
        '/material/atualizar' => array('classe' => MaterialController::class, 'metodo' => 'atualizar') ,

        
];