<?php
    class AtendimentoDAO {
        public function create($atendimento) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO atendimento(dataAtendimento,id_animal,id_servico) 
                     VALUES (:d, :a, :s)"
                );
                $query->bindValue(':d',$atendimento->getDataAtendimento(), PDO::PARAM_STR);
                // Bind para as chaves estrangeiras
                $query->bindValue(':f',$compra->getFornecedor()->getId(), PDO::PARAM_INT);
                $query->bindValue(':u',$compra->getUsuario()->getId(), PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM atendimento");                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $atendimentos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    // 
                    $daoAnimal = new AnimalDAO();
                    $animal = $daoAnimal->find($linha['id_animal']);
                    
                    //
                    $daoServico = new UsuarioDAO();
                    $servico = $daoServico->find($linha['id_servico']);

                    //
                    $atendimento = new Atendimento();
                    $atendimento->setId($linha['id_atendimento']);
                    $atendimento->setDataAtendimento($linha['dataAtendimento']);
                    $atendimento->setAnimal($animal);
                    // Definir o atributo
                    $atendimento->setServico($servico);

                    array_push($atendimentos,$atendimento);
                }

                return $atendimentos;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
        
        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM atendimento WHERE id_atendimento = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);             

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                
                // Para a associação com o Fornecedor
                $daoAnimal = new AnimalDAO();
                $Animal = $daoAnimal->find($linha['id_animal']);
                
                // Para a associação com o Usuário
                $daoServico = new ServicoDAO();
                $servico = $daoServico->find($linha['id_servico']);

                // Construindo um objeto do compra
                $atendimento = new Atendimento();
                $atendimento->setId($linha['id_atendimento']);
                $atendimento->setDataAtendimento($linha['dataAtendimento']);
                $atendimento->setAnimal($animal);
                
                // Definir o atributo (objeto) fornecedor
                $atendimento->setServico($servico);

                return $atendimento;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($atendimento) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE atendimento 
                     SET dataAtendimento = :d, id_animal = :a, id_servico = :s  
                     WHERE id_atendimento = :i"
                );
                $query->bindValue(':d',$atendimento->getDataAtendimento(), PDO::PARAM_STR);
                // Bind para as chaves estrangeiras
                $query->bindValue(':a',$atendimento->getAnimal()->getId(), PDO::PARAM_INT);
                $query->bindValue(':s',$atendimento->getServico()->getId(), PDO::PARAM_INT);
                $query->bindValue(':i',$atendimento->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM atendimento 
                     WHERE id_atendimento = :i"
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
