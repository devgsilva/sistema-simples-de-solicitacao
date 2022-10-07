<?php

class buscaProtocolo {

    public $idProtocoloInformado;

    public function __construct($idProtocolo)
    {
        if ($idProtocolo){
            $this->idProtocoloInformado = $idProtocolo;
        }
    }

    public function selecioneSolicitacao($idProtocoloInformado){
        require('ConexaoDB.php');
        $iniciaClassConexaoDB = new ConexaoDB();
        $conn = $iniciaClassConexaoDB->conectarDB();
        $contruidoQuerySELECT = $conn->prepare("SELECT * FROM protocolo WHERE numero = ?");
        $contruidoQuerySELECT->bindParam(1, $idProtocoloInformado,PDO::PARAM_INT);
        $contruidoQuerySELECT->execute();
        
        $retornoRowCount = $contruidoQuerySELECT->rowCount();
        if($retornoRowCount == 1){
            $contruidoQuerySELECT = $contruidoQuerySELECT->fetch();
            return $contruidoQuerySELECT;
        }
        else {
            session_start();
            $_SESSION["protocoloNaoEncontrado"] = "NÚMERO DE PROTROCOLO NÃO ENCONTRADO!";
            return header('Location: ./index.php');
        }       
    }
}

?>