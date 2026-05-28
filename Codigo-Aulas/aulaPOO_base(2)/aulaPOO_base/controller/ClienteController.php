<?php
namespace App\Controller;

use App\Util\Functions as Util;
use App\Model\Cliente;
use App\Dal\ClienteDao;
use App\View\clienteView;

use \Exception;

class ClienteController{
    public static ?string $msg = null;

    public static function cadastrar() : void {
        if ($_SERVER['REQUEST_METHOD'] ==="POST" && isset($_POST["nome"])) {
            [$nome, $sobrenome, $ddd, $telefone] = array_map([Util::class, "preparaTexto"], array_values($_POST));
            
            try{
                $cliente = Cliente::criar(null, (int)$ddd, (int)$telefone, $nome, $sobrenome);
                /*echo "<pre>";
                var_dump($cliente);
                echo "</pre>";
                exit;*/
                $id = ClienteDao::cadastrar($cliente);

                header("Location: ?p=cad");
                exit;

            } catch (\Exception $e){
                self::$msg = $e->getMessage();
            }
        }

        clienteView::formulario(self::$msg);
    }

    public static function listar(?int $deletar = null) : void {
        $clientes = ClienteDao::listar();
        clienteView::listar($clientes, $deletar);
    }

    public static function buscarClientePorId(int $id) : ?Cliente {
        return ClienteDao::buscarPorId($id);
    }

    public static function deletar() : void {
        if (isset($_GET["del"])) {
            self::listar((int)$_GET["del"]);
        }

        if (isset($_GET["deletar"])) {
            ClienteDao::excluir((int)$_GET["deletar"]);
            header("Location: ?p=list");
            exit;
        }
    }
}
