<?php

use App\Session\Login;

$usuarioLogado = Login::getUsuarioLogado();

$usuario = $usuarioLogado ?
  $usuarioLogado['nome'] . ' '. ' <a href="logout.php" class="text-light font-weight-bold ml-3">SAIR</a>' :
  'Visitante <a href="login.php" class="text-light font-weight-bold ml-3">ENTRAR</a>'

?>


<!doctype html>
<html lang="pt-BR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>Crud Vagas!</title>
</head>

<body class="bg-dark text-light">

  <!-- div abre no header e fecha no footer -->
  <div class="container">

    <div class="jumbotron bg-danger">
      <h1>Crud de Vagas</h1>
      <p>Exemplo de crud orientado a objetos</p>

      <hr class="border-light">

      <div class="d-flex justify-content-start">

        <?= $usuario ?>

      </div>

    </div>