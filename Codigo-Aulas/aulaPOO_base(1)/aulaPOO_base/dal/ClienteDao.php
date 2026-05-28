<?php
namespace App\Dal;

use App\Dal\Conn;
use App\Model\Cliente;
use PDO;
use PDOException;

abstract class ClienteDao{
    public static function cadastrar(Cliente $cliente) : int {
        try {
        $pdo = Conn::getConn();    
        $sql = $pdo->prepare("INSERT INTO clientes (nome, sobrenome, ddd, telefone) VALUES (:nome, :sobrenome, :ddd, :telefone)");
    $sql->bindValue(":nome". $cliente->getNome(), PDO::PARAM_STR);

    $sql->bindValue(":sobrenome". $cliente->getSobrenome(), PDO::PARAM_STR);

    $sql->bindValue(":ddd", $cliente->getDdd(), PDO::PARAM_INT);
    $sql->bindValue(":telefone", $cliente->getTelefone(), PDO::PARAM_INT);
    $sql->execute();
    return (int) $pdo->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    }
    }
}
