<?php
    class AnimalDAO {
        public function create($animal) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO animal(nome,peso,dataNascimento,id_cliente) 
                     VALUES (:n, :p, :d, :c)"
                );
                $query->bindValue(':n',$animal->getNome(), PDO::PARAM_STR);
                $query->bindValue(':p',$animal->getPeso(), PDO::PARAM_STR);
                $query->bindValue(':d',$animal->getDataNascimento(), PDO::PARAM_STR);
                // 
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
                $query = BD::getConexao()->prepare("SELECT * FROM animal");                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $animais = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    // Para a associação
                  
                    $daoAnimal = new ClienteDAO();
                    $cliente = $cliente->find($linha['cliente']);

                    // Construindo um objeto do Produto
                    $animal = new Animal();
                    $animal->setId($linha['id_Animal']);
                    $animal->setNome($linha['nome']);
                    $animal->setValorPeso($linha['peso']);
                    $animal->setDataNascimento($linha['data_nascimento']);
                    // Definir o atributo (objeto) TipoProduto
                    $animal->setCliente($cliente);

                    array_push($animais,$animal);
                }

                return $animais;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
        
        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM animal WHERE id_animal = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);             

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                // Para a associaçao
                $daoAnimal = new ClienteDAO();
                $tipoAnimal = $daoAnimal->find($linha['cliente]);

                // Construindo um objeto do Animal
                $animal = new Animal();
                $animal->setId($linha['animal']);
                $animal->setNome($linha['nome']);
                $animal->setPeso($linha['peso']);
                $animal->setDataNascimeto($linha['data_nascimento']);
                $animal->setCliente($cliente);
                return $animal;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($animal) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE animal
                     SET nome = :n, peso = :p, dataNascimento = :d, id_cliente = :c
                     WHERE id_cliente = :i"
                );
                $query->bindValue(':n',$animal->getAnimal(), PDO::PARAM_STR);
                $query->bindValue(':p',$animal->getPeso(), PDO::PARAM_STR);
                $query->bindValue(':d',$animal->getDataNascimento(), PDO::PARAM_STR);
                // Bind para a chave estrangeira
                $query->bindValue
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
                     WHERE id_animal = :i"
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
