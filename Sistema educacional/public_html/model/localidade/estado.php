<?php
class Estado extends Model {

    private $id;
    private $nome;

    public function __construct() {
        parent::__construct();
        $this->cidade = array();
    }

    public function listar() {
        return $this->queryRows("SELECT * FROM estado");
    }

    public function editar() {
        return $this->query("UPDATE estado SET id= '" .$this->id. "', nome= '" .$this->nome. "', WHERE  id= '" .$this->id. "'");
    }

    public function adicionar() {
        return $this->query("INSERT INTO estado (id,,nome) VALUES ('" .$this->id. "','" .$this->nome. "')");
    }

    //função de delete//
    public function remover() {
        return $this->query("DELETE FROM estado WHERE id= '" .$this->id. "'");
    }

    //função que recupera dados pelo id//
    public function buscar() {
        return $this->queryRow("SELECT id,nome FROM estado WHERE id = '" .$this->id. "'");
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