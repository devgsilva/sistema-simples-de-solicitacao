<!DOCTYPE html>
<html lang="pt-br">

<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache" />

    <title>SAC - Página Inicial</title>

    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

</head>

<body>
    <main>
        <form action="./solicitacao-aberta.php" method="POST" class="formulario-contato card">
            <div class="form-grupo">
                <h3>BUSCAR UMA SOLICITAÇÃO</h3>
            </div>
            <div class="form-group">
                <?php
                if (isset($_SESSION["protocoloNaoEncontrado"])) {
                ?>
                    <small class="error"><?php echo $_SESSION["protocoloNaoEncontrado"]; ?></small>
                <?php
                    session_destroy();
                }
                ?>
            </div>
            <div class="form-grupo">
                <label for="">Informe o número de Protocolo</label>
                <input type="number" min="1" name="idProtocolo" id="idProtocolo">
            </div>
            <div class="form-grupo">
                <button type="submit" class="btn btn-indigo"><i class="las la-search"></i> BUSCAR</button>
            </div>
        </form>
        <form action="./valida-dados.php" method="POST" class="formulario-contato card">
            <div class="form-grupo">
                <h3>ABRIR UMA SOLICITAÇÃO SOLICITAÇÃO</h3>
            </div>
            <div class="form-grupo">
                <label for="">Informe o seu nome</label>
                <input type="text" name="nomeCliente" id="nomeCliente" required>
                <?php
                if (isset($_SESSION["nomeVazio"])) {
                ?>
                    <small class="error"><?php echo $_SESSION["nomeVazio"]; ?></small>
                <?php
                }
                ?>
            </div>
            <div class="form-grupo">
                <label for="">Informe o seu e-mail</label>
                <input type="email" name="emailCliente" id="emailCliente" required>
                <?php
                if (isset($_SESSION["emailVazio"])) {
                ?>
                    <small class="error"><?php echo $_SESSION["emailVazio"]; ?></small>
                <?php
                }
                ?>
            </div>
            <div class="form-grupo">
                <label for="">Informe a sua solicitação</label>
                <textarea name="mensagemCliente" id="mensagemCliente" cols="30" rows="5" required></textarea>
                <?php
                if (isset($_SESSION["mensagemVazia"])) {
                ?>
                    <small class="error"><?php echo $_SESSION["mensagemVazia"]; ?></small>
                <?php
                }
                ?>
            </div>
            <div class="form-grupo">
                <button type="submit" class="btn btn-indigo"><i class="lab la-telegram-plane"></i> ENVIAR</button>
            </div>
        </form>
    </main>

</body>


<?php
session_destroy();
?>

</html>