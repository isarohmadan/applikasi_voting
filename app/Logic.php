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
        $query = "SELECT kategori_pooling.*, users.*, pooling.id_user AS user_id, pooling.id_kategori, pooling.visi, pooling.misi, pooling.id_pooling FROM (pooling INNER JOIN users ON pooling.id_user = users.id_user) INNER JOIN kategori_pooling ON pooling.id_kategori = kategori_pooling.id_category";
        if($id != NULL){
            $query =  $query = "SELECT kategori_pooling.*, users.*, pooling.id_user AS user_id, pooling.id_kategori, pooling.visi, pooling.misi, pooling.id_pooling FROM (pooling INNER JOIN users ON pooling.id_user = users.id_user) INNER JOIN kategori_pooling ON pooling.id_kategori = kategori_pooling.id_category WHERE pooling.id_pooling=$id";
        }
        $result = $this->conn->query($query);
        return $result;
    }

    public function getPemilih( $id){
        $query = "SELECT * FROM pemilih where id_user='$id'";
        $result = $this->conn->query($query);
        return $result;
    }
    public function getPemilihWherePooling($id){
        $query = "SELECT pemilih.id_user as user_id ,pemilih.* , users.*  FROM pemilih INNER JOIN users ON pemilih.id_user = users.id_user where id_pooling='$id'";
        $result = $this->conn->query($query);
        return $result;
    }
    public function getPoolingByCategory($id){
        $stmt = $this->conn->prepare("SELECT pooling.id_user AS user_id, pooling.* , users.* FROM pooling INNER JOIN users ON pooling.id_user = users.id_user WHERE id_kategori=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
    
    Public function createPooling ($id_user, $visi, $misi,$kategori){
        $stmt = $this->conn->prepare("INSERT INTO pooling (id_user,id_kategori, visi, misi) VALUES (?,?,?,?)");
        $stmt->bind_param("siss", $id_user, $kategori, $visi, $misi,);
        if($stmt->execute()){
            return customSuccess(200, "Berhasil Input");
        }else{
            return customError(400, "Gagal Input");
        }
    }

    Public Function updatePooling($id_user, $visi, $misi,$kategori , $id){
        $stmt = $this->conn->prepare("UPDATE pooling SET id_user=?, id_kategori=?, visi=?, misi=? WHERE id_pooling=?");
        $stmt->bind_param("sissi", $id_user, $kategori, $visi, $misi, $id);
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


    public function getAllCateogries($id = null){
        $query = "SELECT * FROM kategori_pooling";
        if($id != NULL){
            $query =  $query = "SELECT * FROM kategori_pooling WHERE id_category='$id'";
        }
        $result = $this->conn->query($query);
        return $result;
    }
    
    Public Function createCategory($nama_category , $deskripsi,$deadline,$status){
        $stmt = $this->conn->prepare("INSERT INTO `kategori_pooling`(`nama_kategori`, `deskripsi`,`deadline` , `status`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $nama_category,$deskripsi,$deadline,$status);
        if($stmt->execute()){
            return customSuccess(200, "Berhasil Update");
        }else{
            return customError(400, "Gagal Update");
        }
    }
    Public Function updateCategory($nama_category , $deskripsi ,$deadline ,$status,$id){
        $stmt = $this->conn->prepare("UPDATE kategori_pooling SET nama_kategori=?, deskripsi=? , deadline=? , status=? WHERE id_category=?");
        $stmt->bind_param("ssssi", $nama_category,$deskripsi,$deadline,$status,$id);
        if($stmt->execute()){
            return customSuccess(200, "Berhasil Update");
        }else{
            return customError(400, "Gagal Update");
        }
    }
    
    Public function deleteCategory($id){
        $stmt = $this->conn->prepare("DELETE FROM kategori_pooling WHERE id_category=?");
        $stmt->bind_param("i", $id);
        if($stmt->execute()){
            return customSuccess(200, "Berhasil Delete");
        }else{
            return customError(400, "Gagal Delete");
        }
    }

    Public function getJumlahPemilih($id){
        $query = "SELECT * FROM pemilih WHERE id_pooling='$id'";
        $result = $this->conn->query($query);
        return $result->num_rows;
    }

    public function memilihPooling($id_pool, $komentar){
        $isItListed = $this->getPemilih($_SESSION['id']);
        foreach($isItListed as $list){
            if($list['id_pooling'] == $id_pool){
                return customError(400, "Anda Sudah Memilih");
            }
        }
        $stmt = $this->conn->prepare("INSERT INTO pemilih (id_user, id_pooling, komentar) VALUES (?,?,?)");
        $stmt->bind_param("sis", $_SESSION['id'], $id_pool, $komentar);
        if($stmt->execute()){
            return customSuccess(200, "Berhasil Memilih");
        }else{
            return customError(400, "Gagal Memilih");
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
