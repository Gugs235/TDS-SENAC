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

    public function deletar($id)
    {
        try {
            $db = new Database("usuario");
            $res = $db->delete('id = ' . $id);

            return $res;
        } catch (\Throwable $th) {
        }
    }

    public function atualizar()
    {
        try {
            $db = new Database("usuario");
            $res = $db->update('id = ' . $this->id, [
                'nome' => $this->nome,
                'senha' => $this->senha
            ]);

            return $res;
        } catch (\Throwable $th) {
            echo "<script>console.log('Erro ao atualizar: " . $th->getMessage() . "');</script>"; // mostra no console qual é o erro
        }
    }
}
