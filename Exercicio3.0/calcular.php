<?php
// Faixas etárias: código => [descrição, percentual de desconto]
$faixas = [
    1 => ["Até 50 anos", 0],
    2 => ["51 a 69 anos", 5],
    3 => ["70 anos ou mais", 7],
];
const DESCONTO_FIDELIDADE = 5;

$erro = "";

// Só aceita acesso pelo formulário
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$totalTexto = trim($_POST["total"] ?? "");
$faixa = (int) ($_POST["faixa"] ?? 1);
$fidelidade = isset($_POST["fidelidade"]);

// Converte "1.234,56" ou "12,50" para número
$totalLimpo = $totalTexto;
if (strpos($totalLimpo, ",") !== false) {
    $totalLimpo = str_replace(".", "", $totalLimpo);
    $totalLimpo = str_replace(",", ".", $totalLimpo);
}

if ($nome === "") {
    $erro = "Informe o nome do cliente.";
} elseif (!is_numeric($totalLimpo) || (float) $totalLimpo <= 0) {
    $erro = "Informe um total de pedido válido.";
} elseif (!isset($faixas[$faixa])) {
    $erro = "Faixa etária inválida.";
} else {
    $total = (float) $totalLimpo;
    $descFaixa = $faixas[$faixa][1];
    $descFidelidade = $fidelidade ? DESCONTO_FIDELIDADE : 0;
    $descontoTotal = $descFaixa + $descFidelidade; // descontos somados
    $valorDesconto = $total * $descontoTotal / 100;
    $totalFinal = $total - $valorDesconto;
}

function real($v) {
    return "R$ " . number_format($v, 2, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Farmácia Parecetaloka - Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="pagina estreita">
    <header class="topo">
        <h1>Farmácia Parecetaloka</h1>
        <p>Resultado do pedido</p>
    </header>

    <?php if ($erro): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php else: ?>
        <section class="resultado">
            <p class="cliente">Cliente: <strong><?= htmlspecialchars($nome) ?></strong></p>

            <table>
                <tr>
                    <td>Total do pedido</td>
                    <td><?= real($total) ?></td>
                </tr>
                <tr>
                    <td>Faixa etária (<?= $faixas[$faixa][0] ?>)</td>
                    <td><?= $descFaixa ?>%</td>
                </tr>
                <tr>
                    <td>Cartão fidelidade</td>
                    <td><?= $descFidelidade ?>%</td>
                </tr>
                <tr>
                    <td>Desconto total (<?= $descontoTotal ?>%)</td>
                    <td>- <?= real($valorDesconto) ?></td>
                </tr>
                <tr class="final">
                    <td>Total a pagar</td>
                    <td><?= real($totalFinal) ?></td>
                </tr>
            </table>
        </section>
    <?php endif; ?>

    <a class="voltar" href="index.html">Novo cálculo</a>
</main>
</body>
</html>