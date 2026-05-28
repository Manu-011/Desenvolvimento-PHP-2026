<?php
namespace App\View;

use App\Model\Cliente;

class clienteView{
    public static function listar(): void {
        
    ?>
        <table>
            <thead>
                <tr>
                    <th><a href="#">Id</a></th>
                    <th><a href="#">Nome</a></th>
                    <th><a href="#">Sobrenome</a></th>
                    <th><a href="#">DDD</a></th>
                    <th><a href="#">Telefone</a></th>
                    <th>Alterar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <?php
    }
    public static function formulario(?string $msg) : void {
        if ($msg !== null): ?>
        <div class="alert">
            <?= $msg ?>
        <span class="close" onclick="this.parentElement.style.display='none'">&times;</span>
        </div>
        
        <?php endif; ?>
        

    ?>
        <form action="<?= "?p=cad" ?>" method="post">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= "" ?>" >

            <label>Sobrenome:</label>
            <input type="text" name="sobrenome" value="<?= "" ?>" >

            <label>DDD:</label>
            <input type="number" name="ddd" value="<?= "" ?>" >

            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?= "" ?>" >

            <button type="submit" name="enviaForm">
                Salvar
            </button>
        </form>
        <?php
    }
}