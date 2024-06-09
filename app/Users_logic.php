<?php
require_once './Auth/Auth.php';
require_once './Handler/Handler.php';

class Users_logic
{   
    private $conn;
    public function __construct() {
        $config = new Conn();
        $this->conn = $config->getConnection();
    }

    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $result = $this->conn->query($query);
        
        return $result;
    }

    public function getSingleUser($id){
        $query = "SELECT * FROM users WHERE id_user= '$id'";
        $result = $this->conn->query($query);
        return $result;
    }
    private function isAnyUser($username,$id){
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username=? AND id_user != ?"); // Menyiapkan pernyataan SQL untuk mencari pengguna berdasarkan username
        $stmt->bind_param("ss", $username,$id); // Mengikat parameter pada pernyataan SQL
        $stmt->execute(); // Menjalankan pernyataan SQL
        $result = $stmt->get_result(); // Mendapatkan hasil query
        return $result; // Mengembalikan hasil query
    }


    public function inputUsers($username, $password, $email, $isAdmin) {
        $username = htmlspecialchars($username); // Menghindari serangan XSS dengan mengubah karakter khusus HTML menjadi entitas HTML
        $password = htmlspecialchars($password); // Menghindari serangan XSS dengan mengubah karakter khusus HTML menjadi entitas HTML
        $email = htmlspecialchars($email); // Menghindari serangan XSS dengan mengubah karakter khusus HTML menjadi entitas HTML
        $registerData = new UserService();
        return $registerData->register($username,$password, $email, $isAdmin);
    }

    public function updateUsers($id, $username, $password, $email, $isAdmin) {
        $username = htmlspecialchars($username); // Menghindari serangan XSS dengan mengubah karakter khusus HTML menjadi entitas HTML
        $password = htmlspecialchars($password); // Menghindari serangan XSS dengan mengubah karakter khusus HTML menjadi entitas HTML
        $email = htmlspecialchars($email); // Menghindari serangan XSS dengan mengubah karakter khusus HTML menjadi entitas HTML
        $isAdmin = htmlspecialchars($isAdmin);

        $validateUsername = $this->isAnyUser($username,$id);
        if($validateUsername->num_rows > 0){
            return customError(400,"username sudah ada");
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT); // Menghash kata sandi pengguna menggunakan algoritma hash yang aman
        $stmt = $this->conn->prepare("UPDATE `users` SET `username`=?,`password`=?,`email`=?,`level`=? WHERE id_user = ?"); // Menyiapkan pernyataan SQL untuk memasukkan data pengguna baru ke dalam database
        $stmt->bind_param("sssss",$username,$password_hash, $email,$isAdmin,$id); // Mengikat parameter pada pernyataan SQL    
        if(empty($password)){
            $stmt = $this->conn->prepare("UPDATE `users` SET `username`=?,`email`=?,`level`=? WHERE id_user = ?"); // Menyiapkan pernyataan SQL untuk memasukkan data pengguna baru ke dalam database
            $stmt->bind_param("ssss",$username, $email,$isAdmin,$id); // Mengikat parameter pada pernyataan SQL    
        }
        
        if($stmt->execute()){ // Jika pernyataan SQL berhasil dieksekusi
            return customSuccess(200,"Berhasil Register"); // Mengembalikan respons sukses
        }else{
            return customError(400,"Gagal Register"); // Mengembalikan pesan kesalahan
        }


        return;
    }
    public function deleteUsers($id){
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id_user=?");
        $stmt->bind_param("s",$id);
        if($stmt->execute()){ // Jika pernyataan SQL berhasil dieksekusi
            return customSuccess(200,"Berhasil Delete"); // Mengembalikan respons sukses
        }else{
            return customError(400,"Gagal Delete"); // Mengembalikan pesan kesalahan
        }
    }
}
