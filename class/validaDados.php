<?php

class validaDados
{
    public $nomeCliente;
    public $emailCliente;
    public $mensagemCliente;

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
            session_start();
            $mensagemRetornoErro = "Por gentileza, preencha seu nome corretamente!";
            $_SESSION["nomeVazio"] = $mensagemRetornoErro;
            return header('Location: ./index.php');
            exit();
        }
    }

    public function validaEmail()
    {
        if (!empty($this->emailCliente) && isset($this->emailCliente)) {
            return $this->emailCliente;
        } else {
            session_start();
            $mensagemRetornoErro = "Por gentileza, preencha seu e-mail corretamente!";
            $_SESSION["emailVazio"] = $mensagemRetornoErro;
            return header('Location: ./index.php');
            exit();
        }
    }

    public function validaMensagem()
    {
        if (!empty($this->mensagemCliente) && isset($this->mensagemCliente)) {
            return $this->mensagemCliente;
        } else {
            session_start();
            $mensagemRetornoErro = "Por gentileza, preencha sua mensagem corretamente!";
            $_SESSION["mensagemVazia"] = $mensagemRetornoErro;
            return header('Location: ./index.php');
            exit();
        }
    }
}

$iniciaClassValidaDados = new validaDados($_POST["nomeCliente"], $_POST["emailCliente"], $_POST["mensagemCliente"]);
