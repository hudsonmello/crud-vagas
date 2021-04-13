<?php

// require __DIR__.'/vendor/autoload.php';

require __DIR__ . '/app/Database/database.php';
require __DIR__ . '/app/Entity/usuario.php';
require __DIR__ . '/app/Session/login.php';

use App\Database\Database;
use App\Entity\Usuario;
use App\Session\Login;


Login::requireLogout();

// alertas para os formularíos 
$alertLogin = '';
$alertCadastro = '';

// validação do post
if (isset($_POST['acao'])) {

    switch ($_POST['acao']) {
        case 'logar':

            // busca usuario por email 
            $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);

            // valida a instancia e a senha do usuario
            if (!$obUsuario instanceof Usuario || !password_verify($_POST['senha'], $obUsuario->senha)) {
                $alertLogin = 'E-mail ou senha são inválidos';
                break;
            }

            // loga usuario
            Login::login($obUsuario);

            break;

        case 'cadastrar':
            //validação campos obrigatórios
            if (isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {

                $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);
                if ($obUsuario instanceof Usuario) {
                    $alertCadastro = 'O e-mail informado já está em uso';
                    break;
                }

                // novo usuario
                $obUsuario = new Usuario;
                $obUsuario->nome = $_POST['nome'];
                $obUsuario->email = $_POST['email'];
                $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $obUsuario->cadastrar();

                // loga usuario
                Login::login($obUsuario);
            }
            break;
    }
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-login.php';
include __DIR__ . '/includes/footer.php';
