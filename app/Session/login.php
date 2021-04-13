<?php

namespace App\Session;

class Login
{
    /**
     * metodo responsavel por iniciar a sessao 
     *
     */
    private static function init()
    {
        // verifica status da sessoa
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // inicia a sessao
            session_start();
        }
    }

    /**
     * metodo responsavel por retornar os dados do usuario logado
     *
     * @return void
     */
    public static function getUsuarioLogado()
    {
        self::init();

        // retorna dados do usuario na sessao
        return self::isLogged() ? $_SESSION['usuario'] : null;
    }

    /**
     * metodo para criar sessao no login
     *
     * @param Usuario $obUsuario
     */
    public static function login($obUsuario)
    {
        self::init();
        // sessao de usuario (não se deve gravar senha na sessao)
        $_SESSION['usuario'] = [
            'id' => $obUsuario->id,
            'nome' => $obUsuario->nome,
            'email' => $obUsuario->email
        ];

        // redireciona usuario para index
        header("Location: index.php");
        exit;
    }

    /**
     * metodo para deslogar usuario
     *
     */
    public static function logout()
    {
        // iniciar a sessao
        self::init();
        // remove a sessao do usuario
        unset($_SESSION['usuario']);

        // redireciona usuario para index
        header("Location: login.php");
        exit;


    }



    /**
     * Método responsável por verificar se o usuário está logado
     *
     * @return boolean
     */
    public static function isLogged()
    {   // inicia sessao
        self::init();

        // validação da sessao
        return isset($_SESSION['usuario']['id']);
    }

    /**
     * método responsável por obrigar o usuário estar logado para acessar
     * se não estiver logado, será redirecionado
     * @return void
     */
    public static function requireLogin()
    {
        if (!self::isLogged()) {
            header("Location: login.php");
            exit;
        }
    }

    /**
     * método responsável por obrigar o usuário estar deslogado para acessar
     *
     * @return void
     */
    public static function requireLogout()
    {
        if (self::isLogged()) {
            header("Location: index.php");
            exit;
        }
    }
}
