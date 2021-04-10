<?php

namespace App\Entity;

use App\Database\Database;

use \PDO;

class Vaga{

    /**
     * @var integer
     */
    public $id;
    /**
     * @var string
     */
    public $titulo;
    /**
     * @var string
     */
    public $descricao;
    /**
     * @var string
     */
    public $ativo;
    /**
     * @var string
     */
    public $dt_vaga;

    // método para cadastrar no banco
    public function cadastrar(){
        // definir a data
        $this->dt_vaga = date('Y-m-d H:i:s');

        // inserir no banco
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
                                        'titulo' => $this->titulo,
                                        'descricao' => $this->descricao,
                                        'ativo' => $this->ativo,
                                        'dt_vaga' => $this->dt_vaga,  
                                    ]);



        // atribuir id da vaga na instância

        // retornar sucesso
            return true;
    }

    /**
     * Método para atualizar a vaga no banco
     *
     * @return boolean
     */
    public function atualizar()
    {
        return (new Database('vagas'))->update('id ='.$this->id, [
                                                            'titulo' => $this->titulo,
                                                            'descricao' => $this->descricao,
                                                            'ativo' => $this->ativo,
                                                            'dt_vaga' => $this->dt_vaga,
        ]);
    }

    /**
     * Método para excluir um registro do banco
     *
     * @return boolean
     */
    public function excluir(){
        return (new Database('vagas'))->delete('id = '.$this->id);
    }

    /**
     * método para listar as vagas do banco
     *
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getVagas($where = null, $order = null, $limit = null){
        return (new Database('vagas'))->select($where,$order,$limit)
                                        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * método para obter as vagas do banco pelo id
     *
     * @param interger $id
     * @return Vaga
     */
    public static function getVaga($id){
        return (new Database('vagas'))->select('id = '.$id)->fetchObject(self::class);
    }




}