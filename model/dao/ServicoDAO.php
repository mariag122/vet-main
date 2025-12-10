<?php
    class ServicoDAO {
        public function create($Servico) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO servico(nome,descricao,valor) 
                     VALUES (:n, :d, :v)"
                );
                $query->bindValue(':c',$servico->getNome(), PDO::PARAM_STR);
                $query->bindValue(':r',$servico->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':e',$servico->getValor(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM servico");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $servicos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $servico = new Servico();
                    $servico->setId($linha['id_servico']);
                    $servico->setCnpj($linha['nome']);
                    $servico->setRazaoSocial($linha['descricao']);
                    $servico->setEmail($linha['valor']);

                    array_push($servicos,$servico);
                }

                return $servicos;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM servico WHERE id_servico = :i");
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $servico = new Servico();
                $servico->setId($linha['id_servico']);
                $servico->setNome($linha['nome']);
                $servico->setDescricao($linha['descricao']);
                $servico->setValor($linha['valor']);
                return $servico;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($servico) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE servico 
                     SET nome = :n , descricao = :d, valor = :v
                     WHERE id_servico = :i"
                );
                $query->bindValue(':n',$servico->getNome(), PDO::PARAM_STR);
                $query->bindValue(':d',$servico->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':v',$servico->getValor(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM servico 
                     WHERE id_servico = :i"
                );
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }
