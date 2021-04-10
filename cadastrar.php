<?php

// require __DIR__.'/vendor/autoload.php';

require __DIR__.'/app/Database/database.php';
require __DIR__.'/app/Entity/vaga.php';


define('TITLE', 'Cadastrar Vaga');

use App\Entity\Vaga;
$obVaga = new \App\Entity\Vaga();

// validação $_POST
if(isset($_POST["titulo"], $_POST["descricao"], $_POST["ativo"])){

    $obVaga->titulo = $_POST["titulo"];
    $obVaga->descricao = $_POST["descricao"];
    $obVaga->ativo = $_POST["ativo"];
    $obVaga->cadastrar();

    header("Location: index.php?status=success");
    exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';



