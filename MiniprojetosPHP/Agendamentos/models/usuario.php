<?php
//models/usuario.php

//puxa a classe de conexão com o banco de dados
require_once '../config/Database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }
    
    //read - ler os dados do banco de dados
    public function buscarPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);

        //retorna os dados do usuário encontrado
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

//read Busca um usuário pelo ID (Para mostrar o perfil ou no agendamento)
    public function buscarPorId($id) {
        $sql = "SELECT id, nome, email, tipo FROM usuarios WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);

         return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //create - criar um novo usuário
    public function criar($nome, $email, $senha, $tipo = 'cliente') {
        //nunca salvamos em texto puro, sempre criptografamos a senha
        //geramos uma hash irreversível antes de jogar no banco

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha, tipo)
               VALUES (:nome, :email, :senha, :tipo)";
    
        $stmt = $this->db->prepare($sql);

        try {
            $executou = $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senhaHash,
                ':tipo' => $tipo
            ]);

        return ["sucesso" => true, "id" => $this->db->lastInsertId()]; // Retorna true e o ID do usuário criado

        } catch (PDOException $e) {
            // Aqui você pode logar o erro ou lidar com ele de alguma forma
            if($e->getCode() == 23000) { // Código de erro para violação de chave única (e-mail já existe)
            return ["sucesso" => false, "mensagem" => "Este e-mail já está cadastrado."]; // Retorna false se ocorrer um erro
        }
       
        }
     return ["sucesso" => false, "mensagem" => "Ocorreu um erro ao criar o usuário."]; // Retorna false se ocorrer um erro
    }
}

?>