<?php
    //$pagina = isset($_GET["page"])? $_GET["page"] : "home";

    $pagina = $_GET["page"] ?? "home";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página em PHP</title>
</head>
<body>
<?php 
//@ para suprimir erros Warnings
    include "./header.php"; //Warning
    require "./nav.php"; //Fatal Error
    echo "<main>";
    require_once match ($pagina) {
        "home" => "./pages/home.php",
        "sobre" => "./pages/sobre.php",
        "contato" => "./pages/contato.php",
        default => "./pages/home.php"
    };


    //require "./pages/home.php";
    //require_once "./pages/home.php"; // mostra uma vez só
    echo "</main>";
    include_once "./footer.php";

    var_dump($_GET);

?>
</body>
</html>