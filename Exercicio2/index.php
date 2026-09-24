<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Operadores em PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 40px;
        }
        .container {
            max-width: 500px;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        h2 { margin-top: 0; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover { background-color: #0056b3; }
        .results {
            margin-top: 20px;
            padding: 15px;
            background: #e9ecef;
            border-radius: 4px;
        }
        .results p { margin: 8px 0; }
        .error { color: #d9534f; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>Operadores no PHP</h2>
    
    <form action="" method="POST">
        <div class="form-group">
            <label for="numero1">Primeiro Número:</label>
            <input type="number" step="any" name="numero1" id="numero1" required 
                   value="<?php echo isset($_POST['numero1']) ? htmlspecialchars($_POST['numero1']) : ''; ?>">
        </div>
        
        <div class="form-group">
            <label for="numero2">Segundo Número:</label>
            <input type="number" step="any" name="numero2" id="numero2" required 
                   value="<?php echo isset($_POST['numero2']) ? htmlspecialchars($_POST['numero2']) : ''; ?>">
        </div>
        
        <button type="submit">Calcular Operações</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // 1. Recebimento dos dados via $_POST e conversão de tipo (casting)
        $num1 = (float) $_POST['numero1'];
        $num2 = (float) $_POST['numero2'];

        // 2. Operações Aritméticas
        $soma          = $num1 + $num2;
        $subtracao     = $num1 - $num2;
        $multiplicacao = $num1 * $num2;
        $potencia      = $num1 ** $num2;

        // 3. Tratamento de divisão e módulo por zero
        if ($num2 != 0.0) {
            $divisao = $num1 / $num2;
            
            // O operador % no PHP opera com valores inteiros
            $int1 = (int) $num1;
            $int2 = (int) $num2;
            
            if ($int2 != 0) {
                $modulo = $int1 % $int2;
            } else {
                $modulo = "<span class='error'>Erro: O segundo valor convertido para inteiro resulta em zero.</span>";
            }
        } else {
            $divisao = "<span class='error'>Erro: Divisão por zero não é permitida.</span>";
            $modulo  = "<span class='error'>Erro: Módulo por zero não é permitido.</span>";
        }

        // 4. Concatenação de dois valores como texto (casting explícito para string)
        $concatenacao = (string) $num1 . (string) $num2;

        // 5. Exibição dos resultados
        echo "<div class='results'>";
        echo "<h3>Resultados:</h3>";
        echo "<p><strong>Soma (+):</strong> {$soma}</p>";
        echo "<p><strong>Subtração (-):</strong> {$subtracao}</p>";
        echo "<p><strong>Multiplicação (*):</strong> {$multiplicacao}</p>";
        echo "<p><strong>Divisão (/):</strong> {$divisao}</p>";
        echo "<p><strong>Resto da Divisão / Módulo (%):</strong> {$modulo}</p>";
        echo "<p><strong>Potência (**):</strong> {$potencia}</p>";
        echo "<p><strong>Concatenação (.):</strong> {$concatenacao}</p>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>