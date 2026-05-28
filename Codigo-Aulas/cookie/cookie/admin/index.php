<?php
setcookie("novo", "Testando...", time() + 3600, "/");
if (!isset($_COOKIE["admin"])) {
    setcookie("admin", "Este cookie é do admin! ***", time() + 3600, "/cookie/admin");
}

echo "<pre>";
var_dump($_COOKIE['novo'] ?? "O Cookie não existe.");
var_dump($_COOKIE['admin'] ?? "admin não existe.");
var_dump(time());
echo "</pre>";