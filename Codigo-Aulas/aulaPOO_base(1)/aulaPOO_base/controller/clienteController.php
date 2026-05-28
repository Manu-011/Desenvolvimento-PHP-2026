<?php
namespace App\Controller;

use App\Util\Functions as Util;
use App\Model\Cliente;
use App\Dal\ClienteDao;
use App\View\clienteView;

use \Exception;

class clienteController{
    public static ?string $msg = null;

    public static function cadastrar() : void {
        if ($_SERVER['REQUEST_METHOD'] ==="POST" && isset($_POST["nome"])) {
            [$nome, $sobrenome, $ddd, $telefone] = array_map([Util::class, "preparaTexto"], array_values($_POST));

            try{
                $cliente = Cliente::criar(null, (int)$ddd, (int)$telefone, $nome, $sobrenome);
                $id = ClienteDao::cadastrar($cliente);

                header("Location: ?p=cad");
                exit;

            } catch (\Exception $e){
                self::$msg = $e->getMessage();
            }
            clienteView::formulario(self::$msg);
           
        }
    }
}
