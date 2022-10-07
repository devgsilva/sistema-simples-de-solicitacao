<?php

require_once('./class/validaDados.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache" />

    <title>SAC - Confirmação dos dados</title>

    <link rel="stylesheet" href="./css/estilo.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
    <main>
        <div class="custom-main">
            <form action="./class/insereProtocolo.php" method="POST" class="formulario-contato card">
                <div class="form-grupo">
                    <h2>VALIDE OS DADOS DA SUA SOLICITAÇÃO</h2>
                </div>
                <div class="form-grupo">
                    <label for="">Confirme o seu nome</label>
                    <input type="text" name="nomeCliente" id="nomeCliente" value="<?php echo $iniciaClassValidaDados->validaNome(); ?>" required readonly>
                </div>
                <div class="form-grupo">
                    <label for="">Confirme o seu e-mail</label>
                    <input type="email" name="emailCliente" id="emailCliente" value="<?php echo $iniciaClassValidaDados->validaEmail(); ?>" required readonly>
                </div>
                <div class="form-grupo">
                    <label for="">Confirme a sua mensagenm</label>
                    <textarea name="mensagemCliente" id="mensagemCliente" cols="30" rows="10" required readonly><?php echo $iniciaClassValidaDados->validaMensagem(); ?></textarea>
                </div>
                <div class="form-big-grupo">
                    <a href="index.php" class="btn btn-red"><i class="las la-ban"></i> Corrigir dados</a>
                    <button type="submit" class="btn btn-indigo"><i class="las la-check-double"></i> CONFIRMAR DADOS</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>