<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Tabuada do 1 ao 10</title>
    <style>
        .grid-tabuada {
            display: grid;
            /* Cria 5 colunas de tamanhos iguais */
            grid-template-columns: repeat(5, 1fr); 
            gap: 15px;
            padding: 20px;
        }

        .tabuada-box {
            border: 2px solid #4A90E2;
            border-radius: 8px;
            padding: 10px;
            background-color: #f0f7ff;
            text-align: center;
            font-family: sans-serif;
        }

        h3 { 
            background-color: #4A90E2; 
            color: white; 
            margin: -10px -10px 10px -10px;
            padding: 5px;
            border-radius: 5px 5px 0 0;
        }
    </style>
</head>
<body>
    <h1 style = "text-align: center;"> Tabuada do 1 ao 10</h1>

    <div class="grid-tabuada">
    <?php
    for($i = 1; $i <= 10; $i++) {
        echo "<div class='tabuada-box'>";
        echo "<h3>Tabuada do $i</h3>";

        for($j = 1; $j <= 10; $j++){
            $res = $i * $j;
            echo "{$i} x {$j} = <strong>{$res}</strong><br>";
        }
        echo "</div>";
    }
    ?>
    </div>
    
</body>
</html>