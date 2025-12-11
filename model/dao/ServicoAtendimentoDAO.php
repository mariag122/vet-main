<?php
    class ServicoAtendimentoDAO {
        public function create($servicoAtendimento) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO servico_atendimento(id_servico, id_atendimento) 
                     VALUES (:s, :s, :a)"
                );
                $query->bindValue(':s',$servicoAtendimento->(), PDO::PARAM_INT);
                
                // Bind para as chaves estrangeiras
                $query->bindValue(':s',$servicoAtendimento->getServico()->getId(), PDO::PARAM_INT);
                $query->bindValue(':a',$servicoAtendimento->getAtendimento()->getId(), PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        // Método read deverá filtrar produtos a partir de um id de compra
        public function read($idServico) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM servico_atendimento WHERE id_servico = :c");
                $query->bindValue(':c',$idServico, PDO::PARAM_INT);                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $servicoAtendimentos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    // Para a associação com o Produto
                    $daoAtendimento = new AtendimentoDAO();
                    $atendimento= $daoAtendimemto->find($linha['id_atendimento']);  
                    $servico = new Atendimento();
                    $servico->setId($idServico);                  

                    // Construindo um objeto do compra
                    $servicoAtendimento = new ServicoAtendimento();
                    $servicoAtendimento->setServico($servico);                    
                    $servicoAtendimento->setAtendimento($atendimento);

                    array_push($servicoAtendimentos,$servicoAtendimento);
                }

                return $servicoAtendimentos;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        // Método destroy irá apagar um registro a partir da combinação das duas chaves primárias
        public function destroy($idServico, $idAtendimento) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM servico_atendimento 
                     WHERE id_servico = :s and id_atendimento = :a"
                );
                $query->bindValue(':s',$idServico, PDO::PARAM_INT);
                $query->bindValue(':a',$idAtendimento, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }
