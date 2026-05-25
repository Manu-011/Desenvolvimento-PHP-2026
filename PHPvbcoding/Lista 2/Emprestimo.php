<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Emprestimo</title>
</head>
<body>
    <?php
    // Definindo a constante para a taxa de juros
    define("TAXA_JUROS", 0.05); // Taxa de juros fixa de 5%
    
    // Calcula o valor total a ser pago em um empréstimo
    // @param float $valorPrincipal O valor principal do empréstimo
    // @param int $meses O número de meses para o empréstimo
    // @return float O valor total a ser pago, incluindo juros

    function calcularValorTotal(float $valorEmprestado, int $numMeses): float {
        // Calcula o valor dos juros
        //Formula juros simples: J = P * i * t
        //Onde J é o valor dos juros, P é o valor principal, i é a taxa de juros e t é o tempo em meses
        $juros = $valorEmprestado * TAXA_JUROS * $numMeses;
        $valorTotal = $valorEmprestado + $juros;
        return $valorTotal;
    }
    // Exemplo de uso da função
    $valorSolicitado = 1000.00; // Valor do empréstimo
    $prazo = 12; // Número de meses para o empréstimo
    $totalPagar = calcularValorTotal($valorSolicitado, $prazo); 

    echo "Valor solicitado: R$ " . number_format($valorSolicitado, 2, ',', '.') . "<br>";
    echo "Prazo: $prazo meses<br>";
    echo "Valor total a pagar: R$ " . number_format($totalPagar, 2, ',', '.');
    echo "<strong>. Total a pagar ao final: R$ " . number_format($totalPagar, 2, ',', '.') . "</strong>";
    ?>
</body>
</html>