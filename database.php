<?php

class Database {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function create($table, $data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function read($table, $conditions = []) {
        $sql = "SELECT * FROM $table";
        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $column => $value) {
                $where[] = "$column = :$column";
            }
            $sql .= " WHERE " . implode(" AND ", $where);
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($conditions);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($table, $data, $conditions) {
        $set = [];
        foreach ($data as $column => $value) {
            $set[] = "$column = :$column";
        }
        $where = [];
        foreach ($conditions as $column => $value) {
            $where[] = "$column = :$column";
        }
        $sql = "UPDATE $table SET " . implode(", ", $set) . " WHERE " . implode(" AND ", $where);
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(array_merge($data, $conditions));
    }

    public function delete($table, $conditions) {
        $where = [];
        foreach ($conditions as $column => $value) {
            $where[] = "$column = :$column";
        }
        $sql = "DELETE FROM $table WHERE " . implode(" AND ", $where);
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($conditions);
    }
}

$db = new Database("localhost", "root", '', 'savdo');

