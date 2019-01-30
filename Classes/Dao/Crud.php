<?php
require_once 'Database.php';

	class Crud{

		public function insert($data){
		
		$sql = "INSERT INTO ". $this->db_table ."(data) VALUES(:data)";	
		$pdo = Database::conexao();
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':data', json_encode($data));
		$rs = $stmt->execute();
		return $rs;
	}
	public function readById($id){
		
			$sql = "SELECT * FROM ". $this->db_table . " WHERE id = :id ";
		
		
		$pdo = Database::conexao();
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$result = $stmt->fetchObject();
       
		return $result;
	}

	public function readByAtributes($collum,$value){
		if(is_int($value)){
			$sql = "SELECT * FROM ". $this->db_table . " WHERE JSON_EXTRACT(data , '$.{$collum}') = {$value} ";
		} else {
			$sql = "SELECT * FROM ". $this->db_table . " WHERE JSON_EXTRACT(data , '$.{$collum}') = '{$value}' ";
		}
		
		$pdo = Database::conexao();
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':value', $value);
		$stmt->execute();
		$result = $stmt->fetchObject();
       
		return $result;
	}

	public function readAllWhere($collum,$value){
		if(is_int($value)){
			$sql = "SELECT * FROM ". $this->db_table . " WHERE JSON_EXTRACT(data , '$.{$collum}') = {$value} ";
		} else {
			$sql = "SELECT * FROM ". $this->db_table . " WHERE JSON_EXTRACT(data , '$.{$collum}') = '{$value}' ";
		}
		
		$pdo = Database::conexao();
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':value', $value);
		$stmt->execute();
		$results = array();
        while ($result = $stmt->fetchObject()) {
            $results[] = $result;
        }
        
		return $results;
	}

	public function readAll(){
		$sql = "SELECT * FROM ". $this->db_table;
		$pdo = Database::conexao();
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$results = array();
        while ($result = $stmt->fetchObject()) {
            $results[] = $result;
        }
        
		return $results;
	}
	public function readLast(){
		$sql = "SELECT MAX(id) FROM ". $this->db_table;
		$pdo = Database::conexao();
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();

		return $result;
	}

	public function update($id, $data){
	
		$sql = "UPDATE ". $this->db_table . " SET data = :data WHERE id = :id ";
		$pdo = Database::conexao();
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':data', json_encode($data));
		$stmt->bindValue(':id', $id);
		$result = $stmt->execute();
		var_dump($result);
		return $result;
	}

	public function delete($id){
		$sql = "DELETE FROM ". $this->db_table . " WHERE id = :id";
		$pdo = Database::conexao();
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id', $id);
		$result = $stmt->execute();

		return $result;
	}
	
	
	}
?>