<?php
    class Serviço {
        // Atributos
        private $idServico;
        private $nome;
        private $descricao;
        private $valor;
    
        // Métodos
        public function getIdServico() {
            return $this->idServico;
        }

        public function setIdServico($idServico) {
            $this->idServico = $idServico;
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
