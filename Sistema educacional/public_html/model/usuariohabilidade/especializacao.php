<?php

// igual cidades//
class Especializacao extends Model {
    private $id;
    private $nome;
    

    public function __construct() {
        parent::__construct();
               
    }
    public function listar() {
     
        return $this->queryRows("SELECT * FROM especializacao ");
    }
     public function editar() {
        return $this->query("UPDATE especializacao SET id= '" . $this->id . "', nome= '" . $this->nome . "', WHERE  id= '" . $this->id . "'");
    }
    public function adicionar() {
        return $this->query("INSERT INTO especializacao (id,nome) VALUES ('" . $this->id . "','" . $this->nome . "')");
    }
    //função de delete//
    public function remover() {
        return $this->query("DELETE FROM especializacao WHERE id= '" . $this->id . "'");
    }
    //função que recupera dados pelo id//
    public function buscar() {
        return $this->queryRow("SELECT id,nome FROM especializacao WHERE id = '" . $this->id . "'");
    }
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }


}
?>