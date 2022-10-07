<?php

class insereProtocolo
{

    private $nomeCliente;
    private $emailCliente;
    private $mensagemCliente;

    public $statusProtocolo;
    public $ano;
    public $idProtocolo;

    public function __construct()
    {
        $this->nomeCliente = $_POST["nomeCliente"];
        $this->emailCliente = $_POST["emailCliente"];
        $this->mensagemCliente = $_POST["mensagemCliente"];
    }

    public function validaNome()
    {
        if (!empty($this->nomeCliente) && isset($this->nomeCliente)) {
            return $this->nomeCliente;
        } else {
            $mensagemRetornoErro = "Por gentileza, preencha seu nome corretamente!";
            return $mensagemRetornoErro;
            exit();
        }
    }

    public function validaEmail()
    {
        if (!empty($this->emailCliente) && isset($this->emailCliente)) {
            return $this->emailCliente;
        } else {
            $mensagemRetornoErro = "Por gentileza, preencha seu e-mail corretamente!";
            return $mensagemRetornoErro;
            exit();
        }
    }

    public function validaMensagem()
    {
        if (!empty($this->mensagemCliente) && isset($this->mensagemCliente)) {

            $descricao = explode("\n", $this->mensagemCliente);

            for ($i = 0; $i < count($descricao); $i++) {
                $descricao[$i] = '<p>' . $descricao[$i] . '</p>';
            }

            $arrayDescricao = implode($descricao);

            $this->mensagemCliente = $arrayDescricao;

            return $this->mensagemCliente;
        } else {
            $mensagemRetornoErro = "Por gentileza, preencha sua mensagem corretamente!";
            return $mensagemRetornoErro;
            exit();
        }
    }

    public function realizarInsercao(){
        require('./conexaoDB.php');
        $iniciaClassConexaoDB = new ConexaoDB();
        $conn = $iniciaClassConexaoDB->conectarDB();

        $this->ano = date("Y");
        $this->statusProtocolo = 1;

        $contruindoQueryINSERT = $conn->prepare("INSERT INTO protocolo (solicitante,descricao,email,ano,status,dataCadastro) VALUES (?,?,?,?,?,now())");
        $contruindoQueryINSERT->bindParam(1,$this->nomeCliente,PDO::PARAM_STR);
        $contruindoQueryINSERT->bindParam(2, $this->mensagemCliente, PDO::PARAM_STR);
        $contruindoQueryINSERT->bindParam(3, $this->emailCliente, PDO::PARAM_STR);
        $contruindoQueryINSERT->bindParam(4, $this->ano, PDO::PARAM_STR);
        $contruindoQueryINSERT->bindParam(5, $this->statusProtocolo, PDO::PARAM_INT);   
        $contruindoQueryINSERT->execute();
        $this->idProtocolo = $conn->lastInsertId();
    }

    public function pegarID() {
        return $this->idProtocolo;
    }

    public function redirectPagina(){
        session_start();
        $_SESSION["idProtocolo"] = $this->idProtocolo;
        return header('Location: .././solicitacao-aberta.php');
    }
}

$iniciaClassInsereProtocolo = new insereProtocolo($_POST["nomeCliente"], $_POST["emailCliente"], $_POST["mensagemCliente"]);
$iniciaClassInsereProtocolo->validaNome();
$iniciaClassInsereProtocolo->validaEmail();
$iniciaClassInsereProtocolo->validaMensagem();
$iniciaClassInsereProtocolo->realizarInsercao();
$iniciaClassInsereProtocolo->pegarID();
$iniciaClassInsereProtocolo->redirectPagina();