<?php
require_once "./helpers/functions.php";
/*echo "<pre>";
var_dump($_POST);
echo "</pre>"*/;

if (isset($_POST["nome"])) {
    $chaves = ["nome", "email", "senha", "conf_senha", "data_nasc", "hora", "genero"];
    [$nome, $email, $senha, $confSenha, $dataNasc, $hora, $genero] = array_map(
        fn($key) => validaInput($_POST[$key]), $chaves);

    $idade = calcularIdade($dataNasc);
    //var_dump($nome);
}
?>
<section>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha Confere</th>
                <th>Data de Nascimento</th>
                <th>Idade</th>
                <th>Periodo</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $nome ?? "" ?></td>
                <td><?= $email ?? "" ?></td>
                <td></td>
                <td><?= $dataNasc ?? "" ?></td>
                <td><?= $idade ?? "" ?></td>
                <td></td>
                <td><?= $genero ?? "" ?></td>
            </tr>
        </tbody>
    </table>
</section>