<?php
session_start();

  ini_set('display_errors', true); error_reporting(E_ALL); // OBTER OS ERROS E NAO A PAGINA COM ERRO 500
  use ProjetosIgor\ReservaMaterial\Controller\MaterialController;
  use ProjetosIgor\ReservaMaterial\Entity\Pessoa;
  use ProjetosIgor\ReservaMaterial\Utils\DBconect;

  require 'autoload.php';
  $rotas = require "config/rotas.php";
  

  if( !array_key_exists($_SERVER['PATH_INFO'], $rotas)){
    echo "Página não encontrada";
    exit();
  }

  $controlador = new $rotas[$_SERVER['PATH_INFO']] ['classe'];
  call_user_func(array($controlador, $rotas[$_SERVER['PATH_INFO']] ['metodo']));

  // echo "<pre>";
 
  // echo "</pre>";
