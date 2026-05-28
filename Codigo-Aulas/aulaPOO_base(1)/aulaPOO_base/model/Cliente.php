<?php
namespace App\Model;

class Cliente{
    private ?int $id;
    private int $ddd;
    private int $telefone;
    private string $nome;
    private string $sobrenome;

    private function __construct(){}

    public static function criar(?int $id, int $ddd, int $telefone, string $nome, string $sobrenome ) : static {
    $cliente = new static();
    $cliente->id = $id;
    $cliente->setNome($nome);

    return $cliente;
    }

    //Getters
public function getId(): ?int { return $this->id; }
public function getDdd(): int { return $this->ddd; }
public function getTelefone(): int { return $this->telefone; }
public function getNome(): string { return $this->nome; }
public function getSobrenome(): string { return $this->sobrenome; }

//Setters

public function setNome(string $nome) : void {
    if ($nome == null || $nome "") {
        throw new \InvalidArgumentException("O nome é obrigatório.");
    }
    $this->nome = $nome;
}

public function setSobrenome(string $sobrenome) : void {
    if ($sobrenome == null || $sobrenome "") {
        throw new \InvalidArgumentException("O sobrenome é obrigatório.");
    }
    $this->sobrenome = $sobrenome;
}

public function setDdd(int $ddd): void {
    if ($ddd > 10 && $ddd < 99 ) {
        throw new \InvalidArgumentException("O DDD precisa ser válido");
    }
    $this->ddd = $ddd;
}

public function setTelefone(int $telefone): void {
    if (srtlen((string)$telefone) === 9) {
        throw new \InvalidArgumentException("O telefone precisa ter 9 digitos");
    }
    $this->telefone = $telefone;
}

}
