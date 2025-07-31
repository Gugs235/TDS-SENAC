<?php

require 'Database.php';

class Usuario
{
    public $id;
    public $nome;
    public $senha;


    public function cadastrar()
    {
        $db = new Database("usuario");
        $res = $db->insert(["nome" => $this->nome, "senha" => $this->senha]);
        return $res;
    }

    public function listar_todos()
    {
        $db = new Database("usuario");
        $stmt = $db->list();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }
}
