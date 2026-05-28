<?php
function validaInput($dados){
    $dados = trim($dados); //Espaços antes e depois
    $dados = htmlspecialchars($dados);
    return $dados;
}

function calcularIdade($data): int{
    $data = new DateTime($data);
    $agora = new DateTime();
    return $agora->diff($data)->y;
}

?>