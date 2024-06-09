<?php
// require 'config/Conn.php';

final class Logic
{
    private $conn;
    public function __construct()
    {
        $config = new Conn();
        $this->conn = $config->getConnection();
    }

    public function getAllCategory(){
        $query = "SELECT * FROM kategori_pooling";
        $result = $this->conn->query($query);
        return $result;
    }

    public function getPooling( $id = NULL){
        $query = "SELECT kategori_pooling.*, users.*, pooling.id_user AS user_id, pooling.id_kategori, pooling.visi, pooling.misi, pooling.status, pooling.deadline , pooling.id_pooling FROM (pooling INNER JOIN users ON pooling.id_user = users.id_user) INNER JOIN kategori_pooling ON pooling.id_kategori = kategori_pooling.id_category";
        if($id != NULL){
            $query =  $query = "SELECT kategori_pooling.*, users.*, pooling.id_user AS user_id, pooling.id_kategori, pooling.visi, pooling.misi, pooling.status, pooling.deadline , pooling.id_pooling FROM (pooling INNER JOIN users ON pooling.id_user = users.id_user) INNER JOIN kategori_pooling ON pooling.id_kategori = kategori_pooling.id_category WHERE pooling.id_pooling='$id'";
        }
        $result = $this->conn->query($query);
        return $result;
    
    }
    
    Public function createPooling ($id_user, $visi, $misi,$kategori , $status, $deadline){
        $stmt = $this->conn->prepare("INSERT INTO pooling (id_user,id_kategori, visi, misi , status, deadline) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("sissss", $id_user, $kategori, $visi, $misi, $status, $deadline);
        if($stmt->execute()){
            return customSuccess(200, "Berhasil Input");
        }else{
            return customError(400, "Gagal Input");
        }
    }

    Public Function updatePooling($id_user, $visi, $misi,$kategori , $status, $deadline){
        $stmt = $this->conn->prepare("UPDATE pooling SET id_user=?, id_kategori=?, visi=?, misi=?, status=?, deadline=? WHERE id_pooling=?");
        $stmt->bind_param("sissssi", $id_user, $kategori, $visi, $misi, $status, $deadline, $id);
        if($stmt->execute()){
            return customSuccess(200, "Berhasil Update");
        }else{
            return customError(400, "Gagal Update");
        }
    }

    Public function deletePooling($id){
        $stmt = $this->conn->prepare("DELETE FROM pooling WHERE id_pooling=?");
        $stmt->bind_param("i", $id);
        if($stmt->execute()){
            return customSuccess(200, "Berhasil Delete");
        }else{
            return customError(400, "Gagal Delete");
        }
    }
    // public function deleteKalkulatorLog($id){

    //     $stmt = $this->conn->prepare("DELETE FROM log_kalkulator WHERE Id_kalkulator=?");
    //     $stmt->bind_param("s",$id);
    //     if($stmt->execute()){ // Jika pernyataan SQL berhasil dieksekusi
    //         return customSuccess(200,"Berhasil Delete"); // Mengembalikan respons sukses
    //     }else{
    //         return customError(400,"Gagal Delete"); // Mengembalikan pesan kesalahan
    //     }
    // }
    
    // public function deleteBeratLog($id){

    //     $stmt = $this->conn->prepare("DELETE FROM log_berat WHERE id_berat=?");
    //     $stmt->bind_param("s",$id);
    //     if($stmt->execute()){ // Jika pernyataan SQL berhasil dieksekusi
    //         return customSuccess(200,"Berhasil Delete"); // Mengembalikan respons sukses
    //     }else{
    //         return customError(400,"Gagal Delete"); // Mengembalikan pesan kesalahan
    //     }
    // }
    // public function getRiwayatKalkulator( $id = NULL){
    //     $query = "SELECT log_kalkulator.*, users.username FROM log_kalkulator INNER JOIN users ON log_kalkulator.id_user = users.id_user";
    //     if($id != NULL){
    //         $query = "SELECT log_kalkulator.*, users.username FROM log_kalkulator INNER JOIN users ON log_kalkulator.id_user = users.id_user WHERE log_kalkulator.id_user='$id'";
    //     }
    //     $result = $this->conn->query($query);
    //     return $result;
    
    // }
}
