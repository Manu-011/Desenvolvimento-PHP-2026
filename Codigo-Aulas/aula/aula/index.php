<?php
//var_dump($_GET);
$pagina = $_GET["abobora"] ?? "home";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 04</title>
</head>
<body>  
<?php
    require_once "./header.php";
    require_once("./menu.php");
    require_once match($pagina){
        "home" => "./paginas/home.php",
        "form" => "./paginas/formulario.php",
        "tab" => "./paginas/tabela.php",
        default => "./paginas/404.php",
    };
    require_once("./rodape.php");
?>
</body>
</html>