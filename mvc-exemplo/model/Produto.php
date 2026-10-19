<?php

class Produto {
    private ?int $id;
    private string $nome;
    private float $preco;

    public function __construct(string $nome, float $preco, ?int $id = null) {
        if ($preco < 0) {
            throw new InvalidArgumentException("O preço do produto não pode ser negativo.");
        }
        
        $this->nome = $nome;
        $this->preco = $preco;
        $this->id = $id;
    }

    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getPreco(): float { return $this->preco; }

    public static function salvar(Produto $produto): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Inicializa o array na sessão caso não exista
        if (!isset($_SESSION['banco_produtos'])) {
            $_SESSION['banco_produtos'] = [];
        }

        if ($produto->getId() === null) {
            $novoId = count($_SESSION['banco_produtos']) + 1;
            $produto = new Produto($produto->getNome(), $produto->getPreco(), $novoId);
        }

        $_SESSION['banco_produtos'][] = $produto;
    }

    public static function listarTodos(): array {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return $_SESSION['banco_produtos'] ?? [];
    }
}
