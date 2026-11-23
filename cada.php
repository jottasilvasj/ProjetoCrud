<?php

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $vnome  = $_POST['txtnome'];
    $vemail = $_POST['txtemail'];
    $vsenha = password_hash($_POST['txtsenha'], PASSWORD_DEFAULT);
    $vsexo  = $_POST['txtsexo'];
    $vdata  = $_POST['txtdata'] ?: null;

    try {
        $cadastrar = $cmd->prepare(
            "INSERT INTO tbteste (nome_t, email_t, senha_t, sexo_t, dtna_t)
             VALUES (?, ?, ?, ?, ?)"
        );

        $cadastrar->execute([$vnome, $vemail, $vsenha, $vsexo, $vdata]);

        echo "<script>
            alert('Cadastro realizado com sucesso!');
            location.href='listar.php';
        </script>";

    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
}