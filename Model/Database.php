<?php

class Database {

    private $host = '';
    private $db = '';
    private $name = '';
    private $pass = '';

    private function conectar(){
        try{
            $conn = new PDO("mysql:host=$this->host; dbname=$this->db", "$this->name", "$this->pass");
            return $conn;
        }

        catch(PDOException $e){
            echo "Erro de Conexão";
        }
    }

    private function bindValueExecute($query, $array, $read = null, $type = null){

        try{
            $stmt = $this->conectar()->prepare($query);

            for($i = 1; $i <= count($array); $i++){
    
                $keys = array_keys($array)[$i - 1];
    
                $stmt->bindValue($i, $array[$keys]);
            }
    
            if($read == 'read'){
                $stmt->execute();
                return $stmt->fetchAll($type);
            }else{
                return $stmt->execute();
            }
        }
        
        catch(PDOException $e){
            echo "Erro de Execução $e";
        }

    }

    public function create($table, $array){

        $values = null;

        for($i = 1; $i <= count($array); $i++){

            if($i == 1){
                $values .= '?';
            }else{
                $values .= ',?';
            }
        }

        return $this->bindValueExecute("insert into $table(". implode(",",array_keys($array)) . ")values($values)", $array);
    }

    public function read($columns, $table, $where = null, $array = [], $order = null, $limit = null){
        
        return $this->bindValueExecute("select $columns from $table $where $order $limit", $array, 'read');
    }

    public function update($table, $array, $campo){

        $values = null;

        $position = count($array) - 1;

        for ($i = 1; $i <= $position; $i++){
        
            if($i == 1){
                $values .= array_keys($array)[$i - 1] . ' = ? ';
            }else{
                $values .= ', ' . array_keys($array)[$i - 1] . ' = ? ';
            }
        
        }

        return $this->bindValueExecute("update $table set $values where $campo = ?", $array);
    }

    public function delete($table, $campo, $array){
        $this->bindValueExecute("delete from $table where $campo = ?", $array);
    }
}