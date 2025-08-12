<?php

class Database
{

    private $host = "127.0.0.1";
    private $usuario = "root";
    private $senha = "";
    private $db = "connect_db";
    private $port = "3306";
    private $conn;
    private $tabela;



    public function __construct($tabela = null)
    {
        $this->tabela = $tabela;
        $this->conectar();
    }

    public function connect()
    {
        return $this->conn;
    }

    public function conectar()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host .
                ";dbname=" . $this->db . ";", $this->usuario, $this->senha);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            echo "<pre>";
            print_r($th->getMessage());
            echo "</pre";
        }
    }
    public function execute($query, $binds = [])
    {
        $stmt = null;
        try {
            $stmt =  $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        } catch (\Throwable $th) {
            echo "<pre>";
            print_r($th->getMessage());
            echo "</pre";
        }
    }

    public function insert($values)
    { // inserindo um valor no banco de dados
        try {

            // fiels = campo            // bind = valor
            // INSERT INTO usuario (id, nome, senha) VALUES (1, 'fulano', '12345'),
            $fields = array_keys($values);
            $binds = array_fill(0, count($fields), '?');

            $query = 'INSERT INTO ' . $this->tabela . '(' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
            $res = $this->execute($query, array_values($values));
            return $res ? true : false;
        } catch (\Throwable $th) {
        }
    }

    public function list($fields = '*')
    {
        $query = "";
        try {
            $query = "SELECT " . $fields . " FROM " . $this->tabela . ";";
            return $this->execute($query);
        } catch (\Throwable $th) {
            echo "<pre>";
            print_r($query);
            echo "</pre";
        }
    }

    public function delete($where)
    {
        try {
            $query = "DELETE FROM " . $this->tabela . " WHERE " . $where;
            $del = $this->execute($query);
            $del = $del->rowCount();

            if ($del == 1) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
        }
    }

    public function update($where, $array)
    {
        try {
            $fields = array_keys($array);
            $values = array_values($array);


            $query = "UPDATE " . $this->tabela . " SET " . implode("=?,", $fields) . " =? WHERE " . $where;
            $res = $this->execute($query, $values);
            return $res->rowCount();
        } catch (\Throwable $th) {
        }
    }
}
