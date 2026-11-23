<?php

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id    = $_POST['id_t'];
    $nome  = $_POST['txtnome'];
    $email = $_POST['txtemail'];
    $senha = $_POST['txtsenha'];
    $sexo  = $_POST['txtsexo'];
    $data  = $_POST['txtdata'];

    try {
        $campos  = ["nome_t = ?", "email_t = ?", "sexo_t = ?"];
        $valores = [$nome, $email, $sexo];

        if (!empty($senha)) {
            $campos[]  = "senha_t = ?";
            $valores[] = password_hash($senha, PASSWORD_DEFAULT);
        }

        if (!empty($data)) {
            $campos[]  = "dtna_t = ?";
            $valores[] = $data;
        }

        $valores[] = $id;

        $sql = "UPDATE tbteste SET " . implode(", ", $campos) . " WHERE codi_t = ?";

        $atualizar = $cmd->prepare($sql);
        $atualizar->execute($valores);

        if ($atualizar->rowCount() > 0) {
            echo "<script>
                alert('Registro atualizado com sucesso!');
                location.href='listar.php';
            </script>";
        } else {
            echo "<script>
                alert('ID inexistente.');
                location.href='atualizar.html';
            </script>";
        }

    } catch (PDOException $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
    }
}