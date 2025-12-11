<?php
    class Animal {
        private $id;
        private $nome;
        private $peso;
        private $dataNascimento;
        
        private $cliente;
        private $especie;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getPeso() {
            return $this->peso;
        }

        public function setPeso($peso) {
            $this->peso = $peso;
        }

        public function getDataNascimento() {
            return $this->dataNascimento;
        }

        public function setDataNascimento($dataNascimento) {
            $this->dataNascimento = $dataNascimento;
        }
        
        public function getCliente() {
            return $this->cliente;
        }

        public function setCliente($cliente) {
            $this->cliente = $cliente;
        }
        
        public function getEspecie() {
            return $this->especie;
        }

        public function setEspecie($especie) {
            $this->especie = $especie;
        }

        public function __toString() {
            return $this->nome;
        }
    }
