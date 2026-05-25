<?php
// controllers/AuthController.php

// Inicia a sessão para podermos gravar os dados do usuário logado
session_start();

// Puxamos o Model de Usuário (que fará a busca no banco)
require_once '../models/Usuario.php';

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    /**
     * Recebe o POST do formulário de Login
     */
    public function logar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $email = trim($_POST['email']);
            $senha = $_POST['senha'];

            // Pede ao Model para buscar o usuário no banco de dados pelo e-mail
            $usuario = $this->usuarioModel->buscarPorEmail($email);

            // Verifica se o usuário existe e se a senha digitada bate com a hash do banco
            if ($usuario && password_verify($senha, $usuario['senha'])) {
                
                // LOGIN APROVADO: Cria as variáveis de Sessão
                $_SESSION['usuario_id']   = $usuario['id'];
                $_SESSION['nome_usuario'] = $usuario['nome'];
                $_SESSION['tipo_usuario'] = $usuario['tipo']; // 'cliente' ou 'profissional'

                // COOKIE: Se o usuário marcou a caixinha "Lembrar de mim"
                if (isset($_POST['lembrar_mim'])) {
                    // Cria um cookie com o e-mail que dura 30 dias (86400 segundos = 1 dia)
                    setcookie("lembrar_email", $email, time() + (86400 * 30), "/");
                } else {
                    // Se não marcou, apaga o cookie caso ele exista de um login anterior
                    if(isset($_COOKIE['lembrar_email'])) {
                        setcookie("lembrar_email", "", time() - 3600, "/");
                    }
                }

                // Redireciona para a tela principal do sistema
                header("Location: ../views/dashboard.php");
                exit;

            } else {
                // LOGIN REJEITADO: Volta para o login com mensagem de erro via GET
                header("Location: ../views/login.php?erro=" . urlencode("E-mail ou senha inválidos!"));
                exit;
            }
        }
    }

    /**
     * Faz o Logout (Sair do sistema)
     */
    public function sair() {
        // Limpa e destrói a sessão
        session_unset();
        session_destroy();

        // Redireciona de volta para a tela de login
        header("Location: ../views/login.php");
        exit;
    }
}
?>