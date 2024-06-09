<?php 
session_start();
require_once('./Handler/Handler.php');
require_once './config/conn.php'; // Memasukkan file koneksi database
final class session_logic
{

    private $conn;
    public function __construct() {
        $config = new Conn();
        $this->conn = $config->getConnection();
    }

    public function isAdminOrUser($data){
        if($data['level'] == 1){
            return ["isAdmin"=>1];
        }
        if($data['level'] == 0){
            return ["isAdmin"=>0];
        }
    }
    public function isUserAlreadyLogin(){
        if(isset($_SESSION['id'])){
            $data = $this->getDataBySession($_SESSION['id']);
            if($data->num_rows > 0){
                return $this->isAdminOrUser($data->fetch_assoc());         
            }else{
                return false;
            }
            return false;
        }
        
    }
    private function getDataBySession($id){
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id_user=?"); // Menyiapkan pernyataan SQL untuk mencari pengguna berdasarkan username
        $stmt->bind_param("s", $id); // Mengikat parameter pada pernyataan SQL
        $stmt->execute(); // Menjalankan pernyataan SQL
        $result = $stmt->get_result(); // Mendapatkan hasil query
        return $result; // Mengembalikan hasil query
    }
    
}


?>