<?php
    class ServicoAtendimento {
        // Atributos
        private $servico; // 
        private $atendimento; //

        // Métodos
        public function getServico() {
            return $this->servico;
        }

        public function setServico($servico) {
            $this->servico = $servico;
        }

        public function getAtendimento() {
            return $this->atendimento;
        }

        public function setAtendimento($atendimento) {
            $this->atendimento = $atendimento;
        }
        }
    }
