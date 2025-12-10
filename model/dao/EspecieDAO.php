<?php
    class EspecieDAO {
        public function create($especie) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO especie(descricao) 
                     VALUES (:d)"
                );
                $query->bindValue(':d',$especie->getDescricao(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM especie");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $servicos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $especie = new Especie();
                    $especie->setId($linha['id_especie']);
                    $especie->setDescricao($linha['descricao']);

                    array_push($especies,$especie);
                }

                return $especie;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM especie WHERE id_especie = :i");
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $especie = new especie();
                $especie->setId($linha['id_especie']);
                $especie->setDescricao($linha['descricao']);
              
                return $especie;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($especie) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE especie 
                     SET descricao = :d
                     WHERE id_especie = :i"
                );
                $query->bindValue(':d',$especie->getDescricao(), PDO::PARAM_STR);
              
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
                    "DELETE FROM especie 
                     WHERE id_especie = :i"
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
