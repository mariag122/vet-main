<?php
    class Atendimento {
        // Atributos
        private $id;
        private $data_atendimento;
        private $animal; //
        private $servico; // 

        // Métodos
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getData_atendimento() {
            return $this->data_atendimento;
        }

        public function setData_atendimento($data_atendimento) {
            $this->data_atendimento = $data_atendimento;
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
