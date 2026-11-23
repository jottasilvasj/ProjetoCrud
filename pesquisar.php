<?php

include 'conexao.php';

$nome = $_GET['nome'] ?? '';

$consulta = $cmd->prepare(
    "SELECT * FROM tbteste WHERE nome_t LIKE ? ORDER BY nome_t"
);
$consulta->execute(["%" . $nome . "%"]);
$registros = $consulta->fetchAll(PDO::FETCH_ASSOC);

function limpar($valor) {
    return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Pesquisa</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>

<div class="menu-cad">

    <h1>Resultado da Pesquisa</h1>

    <?php if (count($registros) > 0) { ?>

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

    <?php } else { ?>
        <p>Nenhum registro encontrado.</p>
    <?php } ?>

    <a href="pesquisar.html">Nova pesquisa</a>
    <a href="index.html">Voltar ao menu</a>

</div>

</body>
</html>