<<<<<<< HEAD
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Vought International</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <img src="https://images.alphacoders.com/124/thumb-1920-1246830.png" alt="Capitão Pátria" class="hero-img">

    <h2>Resultados</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num1 = (float) $_POST['numero1'];
        $num2 = (float) $_POST['numero2'];

        $soma          = $num1 + $num2;
        $subtracao     = $num1 - $num2;
        $multiplicacao = $num1 * $num2;
        $potencia      = $num1 ** $num2;

        if ($num2 != 0.0) {
            $divisao = $num1 / $num2;
            
            $int1 = (int) $num1;
            $int2 = (int) $num2;
            
            if ($int2 != 0) {
                $modulo = $int1 % $int2;
            } else {
                $modulo = "<span class='error'>Erro: Módulo por zero não é permitido.</span>";
            }
        } else {
            $divisao = "<span class='error'>Erro: Divisão por zero não é permitida.</span>";
            $modulo  = "<span class='error'>Erro: Módulo por zero não é permitido.</span>";
        }

        $concatenacao = (string) $num1 . (string) $num2;

        echo "<div class='results'>";
        echo "<p><strong>Primeiro Valor:</strong> <span>{$num1}</span></p>";
        echo "<p><strong>Segundo Valor:</strong> <span>{$num2}</span></p>";
        echo "<hr>";
        echo "<p><strong>Soma (+):</strong> <span>{$soma}</span></p>";
        echo "<p><strong>Subtração (-):</strong> <span>{$subtracao}</span></p>";
        echo "<p><strong>Multiplicação (*):</strong> <span>{$multiplicacao}</span></p>";
        echo "<p><strong>Divisão (/):</strong> <span>{$divisao}</span></p>";
        echo "<p><strong>Resto / Módulo (%):</strong> <span>{$modulo}</span></p>";
        echo "<p><strong>Potência (**):</strong> <span>{$potencia}</span></p>";
        echo "<p><strong>Concatenação (.):</strong> <span>{$concatenacao}</span></p>";
        echo "</div>";
    } else {
        echo "<p class='error'>Nenhum dado foi enviado via formulário.</p>";
    }
    ?>

    <a href="index.html" class="btn-voltar">Novo Cálculo</a>
</div>

</body>
=======
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Vought International</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <img src="https://images.alphacoders.com/124/thumb-1920-1246830.png" alt="Capitão Pátria" class="hero-img">

    <h2>Resultados</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num1 = (float) $_POST['numero1'];
        $num2 = (float) $_POST['numero2'];

        $soma          = $num1 + $num2;
        $subtracao     = $num1 - $num2;
        $multiplicacao = $num1 * $num2;
        $potencia      = $num1 ** $num2;

        if ($num2 != 0.0) {
            $divisao = $num1 / $num2;
            
            $int1 = (int) $num1;
            $int2 = (int) $num2;
            
            if ($int2 != 0) {
                $modulo = $int1 % $int2;
            } else {
                $modulo = "<span class='error'>Erro: Módulo por zero não é permitido.</span>";
            }
        } else {
            $divisao = "<span class='error'>Erro: Divisão por zero não é permitida.</span>";
            $modulo  = "<span class='error'>Erro: Módulo por zero não é permitido.</span>";
        }

        $concatenacao = (string) $num1 . (string) $num2;

        echo "<div class='results'>";
        echo "<p><strong>Primeiro Valor:</strong> <span>{$num1}</span></p>";
        echo "<p><strong>Segundo Valor:</strong> <span>{$num2}</span></p>";
        echo "<hr>";
        echo "<p><strong>Soma (+):</strong> <span>{$soma}</span></p>";
        echo "<p><strong>Subtração (-):</strong> <span>{$subtracao}</span></p>";
        echo "<p><strong>Multiplicação (*):</strong> <span>{$multiplicacao}</span></p>";
        echo "<p><strong>Divisão (/):</strong> <span>{$divisao}</span></p>";
        echo "<p><strong>Resto / Módulo (%):</strong> <span>{$modulo}</span></p>";
        echo "<p><strong>Potência (**):</strong> <span>{$potencia}</span></p>";
        echo "<p><strong>Concatenação (.):</strong> <span>{$concatenacao}</span></p>";
        echo "</div>";
    } else {
        echo "<p class='error'>Nenhum dado foi enviado via formulário.</p>";
    }
    ?>

    <a href="index.html" class="btn-voltar">Novo Cálculo</a>
</div>

</body>
>>>>>>> c852f56f4b8c516003b85ea6956a2b664170c7b3
</html>