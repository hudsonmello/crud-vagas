<?php

namespace  App\Database;

use \PDO;
use \PDOException;
use PDOStatement;

class Database
{
    // constantes usadas na conexão com o banco de dados
    private const HOST = "localhost";
    private const USER = "root";
    private const DBNAME = "crud";
    private const PASSWD = "root";

     // tabela a ser manipulada
    private $table;

    // armazena o objeto PDO e garante apenas uma única conexão
    private $connection;



    // define a tabela e instancia a conexão
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }



    /**
     * cria conexão com o banco
     * @return PDO
     */
    private function setConnection() 
    {
            try {
                $this->connection = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DBNAME,self::USER,self::PASSWD);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $exception) {
                die("<h1>Whoops! Erro ao conectar...</h1>");
            }

    }

    /**
     * método responsável por executar querys no banco
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);

            return $stmt;

        } catch (\PDOException $exception) {
            die("ERROR ..." . $exception->getMessage());
        }

    }

    

    /**
     * método por inserir dados no banco
     *
     * @param array $values [field => value]
     * @return interger ID inserido
     */
    public function insert($values)
    {
        // dados da query

        $fields = array_keys($values);
        // $columns = implode(',', $fields);

        $binds = array_pad([], count($fields), '?');
        // $binds = implode(',', $convert);

        // montar a query
        $query = 'INSERT INTO '.$this->table.'('.implode(',', $fields).') VALUES ('.implode(',',$binds).')';

        // executa o insert
        $this->execute($query, array_values($values));

        // retorna o id inserido
        return $this->connection->lastInsertId();
    }



    /**
     * Método para executar a consulta no banco
     *
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement 
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*'): PDOStatement
    {

        // dados da query
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        // monta a query
        $query = 'SELECT'.$fields.'FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        // executa a query
        return $this->execute($query);
    }



    /**
     * Método para executar atualizações no banco
     *
     * @param string $where
     * @param array $values
     * @return boolean
     */
    public function update($where, $values)
    {
        // dados da query
        $fields = array_keys($values);

        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields). '=? WHERE '. $where;
        echo $query;
        // executar a query
        $this->execute($query, array_values($values));

        return true;
    }



    /**
     * Método responsável por excluir do banco um registro
     *
     * @param string $where
     * @return boolean
     */
    public function delete($where)
    {
        // monta a query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        // executa a query
        $this->execute($query);

        return true;
    }

}
