<?php
//config/database.php

class database {
    //variavel para armazenar a conexao
    private static $conexao = null;
    
    // As credenciais de acesso ao banco de dados local
    private static $host = "localhost";
    private static $dbname = "barbearia";
    private static $usuario = "root";
    private static $senha = "";

    public static function conectar() {
        if (self::$conexao === null) {
            try {
                $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8";
                self::$conexao = new PDO($dsn, self::$usuario, self::$senha);

                // configura o PDO para lançar exceções em caso de erro
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die("Erro fatal na conexao com o banco: " . $e->getMessage());
            }
        }
        return self::$conexao;
    }
}
?>