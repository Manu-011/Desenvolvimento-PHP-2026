<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par ou Impar</title>
</head>
<body>
    <?php
        
        //funcao que verifica se o numero é par ou impar
        // @param int $numero O numero inteiro a ser verificado
         // @return string Retorna "par" se o numero for par, ou "impar" se for impar
         

        function ParOuImpar(int $numero): string {
            if ($numero % 2 === 0) {
                return "O numero $numero é par";
            } else {
                return "O numero $numero é impar";
            }
        }
        // Testando a função

        //exemplo com o uso de numero par
        echo ParOuImpar(4) . "<br>";// Retorno: O numero 4 é par

        //exemplo com o uso de numero impar
        echo ParOuImpar(7) . "<br>"; // Retorno: O numero 7 é impar
        
        //Exemplo com numero zero
        echo ParOuImpar(0) . "<br>"; // Retorno: O numero 0 é par
    ?>
</body>
</html>