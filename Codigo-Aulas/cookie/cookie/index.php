<?php
if (isset($_COOKIE["novo"])) {
    setcookie("novo", "", time() - 3600, "/"); //Apaga o cookie
}else{
    setcookie("novo", "Testando...", time() + 3600, "/");
}
echo "<pre>";
var_dump($_COOKIE['novo'] ?? "O Cookie não existe.");
var_dump($_COOKIE['admin'] ?? "admin não existe.");
echo "</pre>";