<?php
    class AnimalDAO {
        public function create($animal) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO animal(nome,peso,dataNascimento,id_especie, id_cliente) 
                     VALUES (:n, :p, :d, :e, :c)"
                );
                $query->bindValue(':n',$animal->getNome(), PDO::PARAM_STR);
                $query->bindValue(':p',$animal->getPeso(), PDO::PARAM_STR);
                $query->bindValue(':d',$animal->getDataNascimento(), PDO::PARAM_STR);
                // Bind para a chave estrangeira
                $query->bindValue(':t',$animal->getEspecie()->getId(), PDO::PARAM_INT);
                $query->bindValue(':c',$animal->getCliente()->getId(), PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM produto");                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $produtos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    // Para a associação com o TipoProduto
                    $daoAnimal = new EspecieDAO();
                    $Especie = $Especie->find($linha['Especie']);
                  
                    $daoAnimal = new EspecieDAO();
                    $Especie = $Especie->find($linha['Especie']);

                    // Construindo um objeto do Produto
                    $animal = new Animal();
                    $animal->setId($linha['id_Animal']);
                    $animal->setNome($linha['nome']);
                    $animal->setValorPeso($linha['peso']);
                    $animal->setDataNascimenro($linha['data_nascimento']);
                    // Definir o atributo (objeto) TipoProduto
                    $animal->setEspecie($Especie);

                    array_push($animais,$animal);
                }

                return $produtos;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
        
        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM produto WHERE id_produto = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);             

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                // Para a associação com o TipoProduto
                $daoProduto = new EspecieDAO();
                $tipoProduto = $daoProduto->find($linha['id_tipo_produto']);

                // Construindo um objeto do Produto
                $animal = new Animal();
                $animal->setId($linha['id_animal']);
                $animal->setNome($linha['nome']);
                $animal->setValorUnitario($linha['valor_unitario']);
                $animal->setdataNascimemto($linha['data_nascimento']);
                // Definir o atributo (objeto) TipoProduto
                $produto->setTipoProduto($tipoProduto);

                return $produto;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($produto) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE produto 
                     SET descricao = :d, valor_unitario = :v, quantidade = :q, id_tipo_produto = :t  
                     WHERE id_produto = :i"
                );
                $query->bindValue(':d',$animal->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':v',$animal->getValorUnitario(), PDO::PARAM_STR);
                $query->bindValue(':q',$animal->getQuantidade(), PDO::PARAM_STR);
                // Bind para a chave estrangeira
                $query->bindValue(':e',$animal->getEspecie()->getId(), PDO::PARAM_INT);
                $query->bindValue(':c',$animal->getCliente()->getId(), PDO::PARAM_INT);
                $query->bindValue(':i',$animal->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM animal 
                     WHERE id_animal= :i"
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
