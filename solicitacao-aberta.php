<?php
session_start();

require_once('./class/buscaProtocolo.php');

if (isset($_SESSION["idProtocolo"])) {
    $idProtocolo = $_SESSION["idProtocolo"];
    $buscarProtocolo = new buscaProtocolo($idProtocolo);
}

if (isset($_POST["idProtocolo"])) {
    $idProtocolo = $_POST["idProtocolo"];
    $buscarProtocolo = new buscaProtocolo($idProtocolo);
} elseif (empty($_POST["idProtocolo"]) && empty($_SESSION["idProtocolo"])) {
    return header('Location: ./index.php');
}

$dadosSolicitacao = $buscarProtocolo->selecioneSolicitacao($idProtocolo);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache" />
    <title>SAC - Solicitação aberta</title>

    <link rel="stylesheet" href="./css/estilo.css?<?php echo rand(1, 1000); ?>"">

    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

</head>

<body>
    <main>
        <div class="solicitacao-aberta card">
            <div class="form-big-grupo">
                <div class="form-grupo">
                    <small>Número Protocolo</small>
                    <?php echo $dadosSolicitacao["numero"]; ?>
                </div>
                <div class="form-grupo">
                    <small>Data da abertura</small>
                    <?php echo date('d-m-Y H:i', strtotime($dadosSolicitacao["dataCadastro"])); ?>
                </div>
                <div class="form-grupo">
                    <small>Situação</small>
                    <?php if ($dadosSolicitacao["status"] == 1) {
                        echo "Aguardado análise";
                    };
                    ?>
                </div>
            </div>
            <div class="form-grupo">
                <small>Nome do solicitante</small>
                <p> <?php echo $dadosSolicitacao["solicitante"]; ?></p>
            </div>
            <div class="form-grupo">
                <small>E-mail do solicitante</small>
                <p><?php echo $dadosSolicitacao["email"]; ?></p>
            </div>
            <div class="form-grupo">
                <small>Descrição da solicitação</small>
                <?php echo $dadosSolicitacao["descricao"]; ?>
            </div>
            <div class="form-grupo">
                <a href="index.php" class="btn btn-indigo">Abrir nova solicitação</a>
            </div>
        </div>
    </main>
</body>

<?php

?>

</html>