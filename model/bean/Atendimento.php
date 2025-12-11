<?php
    class Atendimento {
        // Atributos
        private $id;
        private $dataAtendimento;
        private $animal; //
        private $servico; // 

        // Métodos
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getDataAtendimento() {
            return $this->dataAtendimento;
        }

        public function setDataAtendimento($dataAtendimento) {
            $this->dataAtendimento = $dataAtendimento;
        }

        public function getAnimal() {
            return $this->animal;
        }

        public function setAnimal($animal) {
            $this->animal = $animal;
        }

        public function getServico() {
            return $this->servico;
        }

        public function setServico($servico) {
            $this->servico = $servico;
        }
    }
