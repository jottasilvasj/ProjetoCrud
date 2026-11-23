<?php

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id_t'];

    try {
        $excluir = $cmd->prepare("DELETE FROM tbteste WHERE codi_t = ?");
        $excluir->execute([$id]);

        if ($excluir->rowCount() > 0) {
            echo "<script>
                alert('Registro excluído com sucesso!');
                location.href='listar.php';
            </script>";
        } else {
            echo "<script>
                alert('Registro não encontrado!');
                location.href='excluir.html';
            </script>";
        }

    } catch (PDOException $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
}