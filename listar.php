<?php

include 'conexao.php';

$consulta = $cmd->prepare("SELECT * FROM tbteste ORDER BY codi_t DESC");
$consulta->execute();
$registros = $consulta->fetchAll(PDO::FETCH_ASSOC);

function limpar($valor) {
    return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Registros</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>

<div class="menu-cad">

    <h1>Registros Cadastrados</h1>

    <table border="1" cellpadding="8" width="100%">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Sexo</th>
            <th>Nascimento</th>
        </tr>

        <?php foreach ($registros as $linha) { ?>
        <tr>
            <td><?= limpar($linha['codi_t']) ?></td>
            <td><?= limpar($linha['nome_t']) ?></td>
            <td><?= limpar($linha['email_t']) ?></td>
            <td><?= limpar($linha['sexo_t']) ?></td>
            <td><?= limpar($linha['dtna_t']) ?></td>
        </tr>
        <?php } ?>
    </table>

    <?php if (empty($registros)) { ?>
        <p>Nenhum registro encontrado.</p>
    <?php } ?>

    <a href="index.html">Voltar ao menu</a>

</div>

</body>
</html>