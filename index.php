<?php

// require __DIR__.'/vendor/autoload.php';

require __DIR__.'/app/Database/database.php';
require __DIR__.'/app/Entity/vaga.php';
require __DIR__.'/app/Session/login.php';


use App\Entity\Vaga;
use App\Session\Login;

Login::requireLogin();

$vagas = Vaga::getVagas();



include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
