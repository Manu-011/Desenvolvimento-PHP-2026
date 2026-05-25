<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatar Nomes</title>
</head>
<body>
    <?php
/**
 * Formata um array de nomes de "Nome Sobrenome" para "Sobrenome, Nome".
 * * @param array $listaDeNomes
 * @return array
 */
function formatarNomes(array $listaDeNomes): array {
    // array_map percorre o array e aplica a função de callback em cada item
    return array_map(function($nomeCompleto) {
        
        // 1. Dividimos a string pelo espaço
        // explode() transforma "João Silva" em ["João", "Silva"]
        $partes = explode(' ', trim($nomeCompleto));

        // 2. Verificamos se existe um sobrenome para evitar erros
        $nome = $partes[0];
        $sobrenome = isset($partes[1]) ? $partes[1] : '';

        // 3. Retornamos a string formatada
        return "{$sobrenome}, {$nome}";
        
    }, $listaDeNomes);
}

// --- TESTANDO A FUNÇÃO ---

$nomesOriginais = ["João Silva", "Maria Oliveira", "Carlos Santos", "Ana Costa"];
$nomesFormatados = formatarNomes($nomesOriginais);

echo "<h3>Nomes Formatados:</h3>";
echo "<pre>";
print_r($nomesFormatados);
echo "</pre>";
?>
</body>
</html>