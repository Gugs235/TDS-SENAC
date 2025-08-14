<?php

require_once __DIR__ . '/../database/Database.php';

class Veiculos
{

    public $id;
    public $fabricante;
    public $modelo;
    public $ano_fabricacao;
    public $tipo_combustivel;
    public $nome_proprietario;
    public $email_proprietario;
    public $telefone_proprietario;
    private $conn;


    public function cadastrar_veiculo()
    {
        $db = new Database("veiculos");

        $res = $db->insert(["fabricante" => $this->fabricante, "modelo" => $this->modelo, "ano_fabricacao" => $this->ano_fabricacao, "tipo_combustivel" => $this->tipo_combustivel, "nome_proprietario" => $this->nome_proprietario, "email_proprietario" => $this->email_proprietario, "telefone_proprietario" => $this->telefone_proprietario]);
        return $res;
    }

    public function listar_todos_veiculos()
    {
        $db = new Database("veiculos");
        $stmt = $db->list();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }
}
