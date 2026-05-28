<?php
//Declaração de variáveis
$variavel_em_php = "Não tem tipo";
$outra_variavel = 123;

//Saída de Texto
echo "Olá, mundo! \n" . PHP_EOL;
print("<br>Olá, mundo!");

$var = print "Olá";
echo "<br> $var";

//TypeCast
$inteiro = (int) 10;
$float = (float) 10;
$texto = 10 + ".10. dfbdfbsd d "; //A partir do 8.2 não funciona
$bool = (bool) 0;

echo "<pre>";
    var_dump($inteiro);
    var_dump($float);
    var_dump($texto);
    var_dump($bool);
echo "</pre>";

$vetor = [1,2,3,5,4,6,9];

echo "<hr>";
var_dump($vetor);
foreach($vetor as $key => &$valor){
    if($valor == 6) $valor++;    
}
echo "<br>";
var_dump($vetor);

$array_associativo = [
    1 => "Primeiro Valor",
    2.6 => "Segundo Valor",
    "p" => "Terceiro Valor"
];

echo "<pre>";
    var_dump($array_associativo);
echo "</pre>";

foreach($array_associativo as $valor){
    echo "<br> $valor";
}

$page;
if (!isset($page)) {
    $page = "value";
}

switch ($page) {
    case 'value':
        echo "<hr> $page <hr>";
    break;
    case 'teste':
        echo "<hr> $page <hr>";
    break;
    case 'outro':
        echo "<hr> $page <hr>";
    break;
    default:
        echo "<hr> Nenhuma Página <hr>";
    break;
}

echo "<hr> Match: <br>" . match($page){
    'value' => $page,
    'teste' => $page,
    'outro' => $page,
    default => "Nenhuma Página"
} . "<hr>";


// Funções

echo "<hr>";

function ola(){
    echo "<br>Olá<br>";
}

function soma($num1, $num2) : float {
    return $num1 + $num2;
}

echo "Função soma " . soma(10, 5);

ola();

function retorna_vetor(){
    return [1,2,3];
}

[$um, $dois, $tres] = retorna_vetor();

echo "<p>Vetor recebido em varável = " . ($um + $dois + $tres) ."</p>";

?>