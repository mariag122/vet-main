<?php
    class Serviço {
        // Atributos
        private $id;
        private $nome;
        private $descrição;
        private $valor;
    
        // Métodos
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getValorUnitario() {
            return $this->valorUnitario;
        }

        public function setValorUnitario($valorUnitario) {
            $this->valorUnitario = $valorUnitario;
        }

        public function getQuantidade() {
            return $this->quantidade;
        }

        public function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }
        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->descricao;
        }
    }