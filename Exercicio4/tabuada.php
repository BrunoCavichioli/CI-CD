<?php

$numero = "";
$resultado = [];
$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST["acao"] ?? "";

    if ($acao === "calcular") {
        $numero = trim($_POST["numero"] ?? "");

        if ($numero === "" || !is_numeric($numero)) {
            $erro = "Informe um número válido.";
        } else {
            $n = $numero + 0;
            for ($i = 1; $i <= 10; $i++) {
                $resultado[] = [$n, $i, $n * $i];
            }
        }
    }
}