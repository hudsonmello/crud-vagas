<?php

namespace App\Entity;

use App\Database\Database;
use \PDO;


class Usuario{

    /**
     * identificador do usuario
     *
     * @var interger
     */
    public $id;

    /**
     * nome do usuario
     *
     * @var string
     */
    public $nome;

    /**
     * email do usuario
     *
     * @var string
     */
    public $email;

    /**
     * hash da senha do usuario
     *
     * @var string
     */
    public $senha;

    /**
     * método responsável por cadastrar novo usuario no banco
     *
     * @return boolean
     */
    public function cadastrar()
    {
        // database
        $obDatabase = new Database('usuario');

        // insere um novo usuario
        $this->id = $obDatabase->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha
        ]);

        return true;
    }

   /**
    * metodo para retornar usuario pelo email 
    *
    * @param string $email
    * @return Usuario
    */
    public static function getUsuarioPorEmail($email){
        return (new Database('usuario'))->select('email = "'.$email.'"')->fetchObject(self::class);

    }


}