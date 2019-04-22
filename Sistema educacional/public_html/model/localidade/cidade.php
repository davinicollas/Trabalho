<?php
class Cidade extends Model {
    private $id;
    private $id_estado;
    private $nome;

    public function __construct() {
        parent::__construct();
    }

    public function listar($id_estado) {
        return $this->queryRows("SELECT * FROM cidade WHERE id_estado ='" .$id_estado. "'");
    }
    public function editar() {
        return $this->query("UPDATE cidade SET id= '" .$this->id. "', id_estado= '" .$this->id_estado. "', nome= '" .$this->nome. "', WHERE  id= '" .$this->id. "'");
    }
    public function adicionar() {
        return $this->query("INSERT INTO cidade (id,id_estado,nome) VALUES ('" .$this->id. "','" .$this->id_estado. "','" .$this->nome. "')");
    }
    //função de delete//
    public function remover() {
        return $this->query("DELETE FROM cidade WHERE id= '" .$this->id. "'");
    }
    //função que recupera dados pelo id//
    public function buscar() {
        return $this->queryRow("SELECT id, id_estado,nome FROM cidade WHERE id = '" . $this->id. "'");
    }
    function getId() {
        return $this->id;
    }

    function getId_estado() {
        return $this->id_estado;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

}

?>