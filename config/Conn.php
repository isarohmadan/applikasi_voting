<?php
final class Conn {
    private $dbHost;
    private $dbUsername;
    private $dbPassword;
    private $dbName;

    public function __construct() {
        $this->dbHost = 'localhost';
        $this->dbUsername = 'root';
        $this->dbPassword = '';
        $this->dbName = 'voting';
    }

    public function getConnection() {
        $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        return $conn;
    }
}
?>