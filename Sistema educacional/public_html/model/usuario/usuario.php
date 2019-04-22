<?php
class Usuario extends Model {
    private $id;
    private $nome;
    private $email;
    private $data_cadastro;
    private $data_nascimento;
    private $senha;
    private $confirmacaosenha;
    private $imagem;
    private $id_cidade;
    private $id_curso;
    private $id_estado;

    public function __construct() {
        parent::__construct();
    }
   public function uploadImagem($fileUP) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($fileUP["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        echo $imageFileType;
        if (isset($_POST["submit"])) {
            $check = getimagesize($fileUP["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        if ($fileUP["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($fileUP["tmp_name"], $target_file)) {
                echo "The file " . basename($fileUP["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        return "uploads/" . basename($fileUP["name"]);
    }
    public function validar($row) {
        $array_erro = array();
        if (isset($row["nome"])&& strlen($row["nome"]) >2) {
            $this->nome = filter_var($row["nome"], FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            $array_erro["nome"] = "Informe o nome.";
        }
        if (isset($row["email"]) && strlen($row["email"]) > 8) {
            $this->email = filter_var($row["email"], FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            $array_erro["email"] = "O e-mail é inválido.";          
        }
        if (isset($row["data_nascimento"])) {
            $this->data_nascimento = filter_var($row["data_nascimento"], FILTER_SANITIZE_SPECIAL_CHARS);
            $data_nascimento = $row["data_nascimento"];
        } else {
            $array_erro["data_nascimento"] = "Você deve informar a data de nascimento.";           
        } 
        if (isset($row["data_cadastro"])) {
            $this->data_cadastro = filter_var($row["data_cadastro"], FILTER_SANITIZE_SPECIAL_CHARS);
            $data_cadastro = $row["data_cadastro"];
        } else {
            $array_erro["data_cadastro"] = "Você deve informar a data de nascimento.";           
        } 
        if (isset($row["id_estado"])) {
            $this->id_estado = filter_var($row["id_estado"], FILTER_SANITIZE_NUMBER_INT);
        } else {
            $array_erro["id_estado"] = "Deve-se informar um estado.";            
        }
        if (isset($row["id_cidade"])) {
            $this->id_cidade = filter_var($row["id_cidade"], FILTER_SANITIZE_NUMBER_INT);
        } else {
            $array_erro["id_cidade"] = "Deve-se informar uma cidade.";            
        }
        if (isset($row["id_curso"])) {
            $this->id_curso = filter_var($row["id_curso"], FILTER_SANITIZE_NUMBER_INT);
        } else {
            $array_erro["id_curso"] = "Deve-se informar um curso.";            
        }
        if (isset($row["senha"]) && strlen($row["senha"]) > 5) {
            $this->senha = md5(filter_var($row["senha"], FILTER_SANITIZE_SPECIAL_CHARS));
        } else {
            $array_erro["senha"] = "Você deve inserir uma senha com pelo menos 5 caracteres.";        
        }
        if (isset($row["confirmacaosenha"]) && strlen($row["confirmacaosenha"]==["senha"]) ) {
            $this->confirmacaosenha = md5(filter_var($row["confirmacaosenha"], FILTER_SANITIZE_SPECIAL_CHARS));
        } else {
            $array_erro["confirmacaosenha"] = "Senhas não confere.";           
        }
        return $array_erro;
    }
    
    //função de login//
    
    public function login() {
        // Função da classe model que busca uma linha só e recebe a query pelo parametro
        return $this->queryRow("SELECT * FROM usuario WHERE email = '" . $this->email . "' AND senha= '" . $this->senha . "'");
    }
    //função de adicionar//
    public function adicionar() {//função onde verifica se existe email se caso existir nao cadastra, se existi exibe erro.
        $valid = $this->queryRow("SELECT * FROM usuario WHERE nome = '" . $this->nome . "' AND email= '" . $this->email . "'");
        if (empty($valid)) {
            return $this->query("INSERT INTO usuario (nome,email,data_nascimento,data_cadastro,id_estado,id_cidade,id_curso,senha,imagem) VALUES ('".$this->nome."','".$this->email."','".$this->data_nascimento."','".date('Y/m/d')."','".$this->id_estado."','".$this->id_cidade."','".$this->id_curso."','".$this->senha."','".$this->imagem."')");
        } else {
            echo "erro pois ja tem cadastro";
        }
    }
    
    //função de editar perfil//
    public function editar() {

        return $this->query("UPDATE usuario SET nome= '".$this->nome."', email= '".$this->email."', data_nascimento= '".$this->data_nascimento."',id_estado= '".$this->id_estado."' ,id_cidade= '".$this->id_cidade."', id_curso= '".$this->id_curso ."', senha= '".$this->senha."',imagem= '".$this->imagem."' WHERE  id= '" . $this->id . "'");
    }
    //função de delete//
    public function remover() {
        return $this->query("DELETE FROM usuario WHERE id= '".$this->id."'");
        
    }
    //função que recupera dados pelo id//
    public function buscar() { 
    return $this->queryRow("SELECT usuario.*, curso.nome AS nome_curso, cidade.nome AS nome_cidade,estado.nome AS nome_estado   FROM usuario INNER JOIN curso ON usuario.id_curso = curso.id INNER JOIN cidade ON usuario.id_cidade = cidade.id INNER JOIN estado ON usuario.id_estado = estado.id WHERE usuario.id='".$this->id."'");
        }
    public function listarServico(){
            return $this->queryRows("SELECT servico.*, usuario.imagem AS imagem, usuario.nome AS nome_usuario, servico.nome AS servico_nome FROM servico INNER JOIN usuario ON usuario.id = servico.id_usuario WHERE servico.id_usuario='".$this->id."'");
    }
    
        function getId() {
    return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getData_cadastro() {
        return $this->data_cadastro;
    }

    function getData_nascimento() {
        return $this->data_nascimento;
    }

    function getSenha() {
        return $this->senha;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getId_cidade() {
        return $this->id_cidade;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setData_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setId_cidade($id_cidade) {
        $this->id_cidade = $id_cidade;
    }

    function getConfirmacaosenha() {
        return $this->confirmacaosenha;
    }

    function setConfirmacaosenha($confirmacaosenha) {
        $this->confirmacaosenha = $confirmacaosenha;
    }


}

    