<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= !isset($titulo)? '' : $titulo ?></title>

    <script src="/view/assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/view/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/view/assets/css/extras.css">
</head>
<body>

 <!-- inicio DA div CLASSE CONTEUDO -->
<div class="conteudo"> 

<div class="alert <?= !isset($_SESSION['classe'])? ''  : $_SESSION['classe'] ?>" role="alert">
  <?= !isset($_SESSION['mensagem'])? '3sdfas'  : $_SESSION['mensagem'] ?>
</div>
