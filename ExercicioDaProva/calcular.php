<?php
$horas = $_POST['horas'];
$veiculo = $_POST['veiculo'];
if (isset($_POST['lavagem']))
{
    $lavagem = "sim";
}
else
{
    $lavagem = "não";
}

if ($veiculo == 0)
{
    $primeira = 10;
    $adicional = 6;
}
else
{
    $primeira = 6;
    $adicional = 3;
}

$total = $primeira;
for ($i = 2 ; $i <= $horas ; $i++) {
    $total = $total + $adicional;
}

if ($total > 50) {
    $total = 50;
}

if ($lavagem == "sim") {
    $total = $total + 20;
}

$nomeVeiculo = ($veiculo == 0) ? "Carro" : "Moto";
$valorFormatado = number_format($total, 2, ',', '.');
?>