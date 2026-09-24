<?php

const FAIXAS = [
    '1' => ['rotulo' => 'Até 50 anos',     'desconto' => 0],
    '2' => ['rotulo' => '51 a 69 anos',    'desconto' => 5],
    '3' => ['rotulo' => '70 anos ou mais', 'desconto' => 7],
];
const DESCONTO_FIDELIDADE = 5;

function brl(float $v): string
{
    return 'R$ ' . number_format($v, 2, ',', '.');
}

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function lerValor(string $texto): ?float
{
    $texto = trim(str_replace(' ', '', $texto));
    if (str_contains($texto, ',')) {
        $texto = str_replace('.', '', $texto); // 1.234,56 -> 1234,56
        $texto = str_replace(',', '.', $texto);
    }
    return is_numeric($texto) && (float)$texto > 0 ? (float)$texto : null;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

$nome       = trim($_POST['nome'] ?? '');
$faixa      = $_POST['faixa'] ?? '';
$fidelidade = isset($_POST['fidelidade']);
$total      = lerValor($_POST['total'] ?? '');
$erros      = [];

if ($nome === '') {
    $erros[] = 'Informe o nome do cliente.';
}
if ($total === null) {
    $erros[] = 'Informe um total de pedido maior que zero. Exemplo: 149,90';
}
if (!isset(FAIXAS[$faixa])) {
    $erros[] = 'Escolha uma faixa etária.';
}

if (!$erros) {
    $percentual = FAIXAS[$faixa]['desconto'] + ($fidelidade ? DESCONTO_FIDELIDADE : 0);
    $desconto   = round($total * $percentual / 100, 2);
    $final      = $total - $desconto;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Farmácia Parecetaloka - Resumo do pedido</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800&display=swap">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="topo">
    <span class="logo" aria-hidden="true"></span>
    <h1>Farmácia Parecetaloka</h1>
    <p>Resumo do pedido</p>
</header>
<main class="pagina">
    <?php if ($erros): ?>
        <div class="erros" role="alert">
            <?php foreach ($erros as $erro): ?>
                <p><?= e($erro) ?></p>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <section class="cupom">
            <h2>Resumo do pedido</h2>
            <dl>
                <div><dt>Cliente</dt><dd><?= e($nome) ?></dd></div>
                <div><dt>Faixa etária</dt><dd><?= e(FAIXAS[$faixa]['rotulo']) ?></dd></div>
                <div><dt>Cartão fidelidade</dt><dd><?= $fidelidade ? 'Sim' : 'Não' ?></dd></div>
            </dl>
            <dl class="valores">
                <div><dt>Total do pedido</dt><dd><?= brl($total) ?></dd></div>
                <div class="desconto"><dt>Desconto (<?= $percentual ?>%)</dt><dd>&minus;<?= brl($desconto) ?></dd></div>
                <div class="final"><dt>Total a pagar</dt><dd><?= brl($final) ?></dd></div>
            </dl>
        </section>
    <?php endif; ?>

    <a class="voltar" href="index.html"><?= $erros ? 'Voltar e corrigir' : 'Novo pedido' ?></a>
</main>
</body>
</html>