<?php

$servidor = "localhost";
$banco    = "dbteste";
$usuario  = "root";
$senha    = "12345678";      // se o root tem senha, coloque aqui
$porta    = "3305";

$opcoes = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

if (class_exists('Pdo\Mysql')) {
    $opcoes[Pdo\Mysql::ATTR_FOUND_ROWS] = true;
} else {
    $opcoes[PDO::MYSQL_ATTR_FOUND_ROWS] = true;
}

try {
    $cmd = new PDO(
        "mysql:host=$servidor;port=$porta;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha,
        $opcoes
    );
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}