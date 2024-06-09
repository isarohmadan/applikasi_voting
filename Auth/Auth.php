<?php

require_once './config/conn.php'; // Memasukkan file koneksi database
require_once './Handler/Handler.php'; // Memasukkan file handler untuk menangani respon
require_once './vendor/autoload.php'; // Memasukkan file autoload dari composer untuk memuat kelas Ramsey\Uuid\Uuid
require_once './Auth/session/Session_logic.php';

use Ramsey\Uuid\Uuid; // Menggunakan namespace Uuid dari kelas Ramsey\Uuid

class UserService {
    private $conn; // Properti untuk menyimpan koneksi ke database

    public function __construct() {
        $config = new Conn(); // Membuat objek kelas Conn untuk mendapatkan koneksi database
        $this->conn = $config->getConnection(); // Mendapatkan koneksi dan menyimpannya di properti $conn
        new session_logic();
    }

    // Metode untuk login pengguna
    public function login($username, $password) {
        $username = htmlspecialchars($username); // Menghindari serangan XSS dengan mengubah karakter khusus HTML menjadi entitas HTML
        $password = htmlspecialchars($password); // Menghindari serangan XSS dengan mengubah karakter khusus HTML menjadi entitas HTML
        $result = $this->isAnyUser($username,$password); // Memeriksa apakah pengguna ada dalam database

        if ($result->num_rows > 0) { // Jika pengguna ditemukan
            $user = $result->fetch_assoc(); // Mendapatkan data pengguna dari hasil query
            if (password_verify($password,$user['password'])) { // Memverifikasi kata sandi pengguna dengan hash yang disimpan di database
                $_SESSION['id'] = $user['id_user'];
                return customSuccess(200,"berhasil login"); // Jika verifikasi berhasil, mengembalikan respons sukses
            } else {
                return customError(500,"Password Not Match"); // Jika kata sandi tidak cocok, mengembalikan pesan kesalahan
            }
        } else {
            return customError(500,"There are no accounts"); // Jika pengguna tidak ditemukan, mengembalikan pesan kesalahan
        }
    }

    // Metode untuk memeriksa apakah pengguna ada dalam database
    private function isAnyUser($username){
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username=?"); // Menyiapkan pernyataan SQL untuk mencari pengguna berdasarkan username
        $stmt->bind_param("s", $username); // Mengikat parameter pada pernyataan SQL
        $stmt->execute(); // Menjalankan pernyataan SQL
        $result = $stmt->get_result(); // Mendapatkan hasil query
        return $result; // Mengembalikan hasil query
    }

    // Metode untuk mendaftarkan pengguna baru
    public function register($username,  $password,$email, $level="0") {
        $username = htmlspecialchars($username); // Menghindari serangan XSS dengan mengubah karakter khusus HTML menjadi entitas HTML
        $password = htmlspecialchars($password); // Menghindari serangan XSS dengan mengubah karakter khusus HTML menjadi entitas HTML
        $email = htmlspecialchars($email); // Menghindari serangan XSS dengan mengubah karakter khusus HTML menjadi entitas HTML
        $result = $this->isAnyUser($username); // Memeriksa apakah username sudah digunakan

        if ($result->num_rows > 0) { // Jika username sudah digunakan
            $err = customError(400,"The Username Already Taken"); // Mengembalikan pesan kesalahan
            return $err; // Mengembalikan pesan kesalahan
        }

        $uuid = Uuid::uuid4()->toString(); // Menghasilkan UUID untuk ID pengguna baru
        $password_hash = password_hash($password, PASSWORD_DEFAULT); // Menghash kata sandi pengguna menggunakan algoritma hash yang aman
        $stmt = $this->conn->prepare("INSERT INTO users (id_user,username,email, password, level) VALUES (?,?,?,?,?)"); // Menyiapkan pernyataan SQL untuk memasukkan data pengguna baru ke dalam database
        $stmt->bind_param("sssss", $uuid,$username,$email,$password_hash,$level); // Mengikat parameter pada pernyataan SQL
        if($stmt->execute()){ // Jika pernyataan SQL berhasil dieksekusi
            return customSuccess(200,"Berhasil Register"); // Mengembalikan respons sukses
        }else{
            return customError(400,"Gagal Register"); // Mengembalikan pesan kesalahan
        }
    }
}
?>
