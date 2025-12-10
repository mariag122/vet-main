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
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getValor() {
            return $this->valor;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }
        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->nome;
        }

    }

