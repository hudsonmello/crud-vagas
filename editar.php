<?php

// require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Vaga');

require __DIR__.'/app/Database/database.php';
require __DIR__.'/app/Entity/vaga.php';

use App\Entity\Vaga;

// validação do id
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header("Location: index.php?status=error");
    exit;
}

// consulta a vaga no banco
$obVaga = Vaga::getVaga($_GET['id']);

// validar se a vaga existe
if(!$obVaga instanceof Vaga){
    header("Location: index.php?status=error");
    exit;
}

// validação $_POST
if(isset($_POST["titulo"], $_POST["descricao"], $_POST["ativo"])){



    $obVaga->titulo = $_POST["titulo"];
    $obVaga->descricao = $_POST["descricao"];
    $obVaga->ativo = $_POST["ativo"];
    $obVaga->atualizar();

    header("Location: index.php?status=success");
    exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';



