<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }
        th {
            background-color: #333;
            color: white;
            padding: 12px;
        }
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <h1 style="text-align: center;">Tabela de Usuários</h1>

    <?php
    // Passo 1: Criar o "vetor" (array multidimensional) com os dados
    $usuarios = [
        [
            "id" => 1,
            "nome" => "João",
            "sobrenome" => "Silva",
            "ddd" => "11",
            "telefone" => "98888-7777"
        ],
        [
            "id" => 2,
            "nome" => "Maria",
            "sobrenome" => "Oliveira",
            "ddd" => "21",
            "telefone" => "97777-6666"
        ],
        [
            "id" => 3,
            "nome" => "Carlos",
            "sobrenome" => "Santos",
            "ddd" => "41",
            "telefone" => "96666-5555"
        ],
        [
            "id" => 4,
            "nome" => "Ana",
            "sobrenome" => "Costa",
            "ddd" => "31",
            "telefone" => "95555-4444"
        ]
    ];
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>DDD</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Passo 2: Exibir os dados em uma tabela HTML
            foreach ($usuarios as $usuario) {
                echo "<tr>";
                echo "<td>" . $usuario['id'] . "</td>";
                echo "<td>" . $usuario['nome'] . "</td>";
                echo "<td>" . $usuario['sobrenome'] . "</td>";
                echo "<td>" . $usuario['ddd'] . "</td>";
                echo "<td>" . $usuario['telefone'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    
</body>
</html>