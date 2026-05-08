<?php
require_once 'Database.php';

class Inventory extends Database {
    
    public function getProduk() {
        return $this->conn->query("SELECT * FROM produk");
    }

    public function kurangiStok($id, $jumlah) {
        if ($jumlah < 0) {
            return "Gagal: Jumlah tidak boleh negatif!";
        }

        $sql = "UPDATE produk SET stok = stok - $jumlah WHERE id = $id AND stok >= $jumlah";
        if ($this->conn->query($sql) && $this->conn->affected_rows > 0) {
            $this->conn->query("INSERT INTO transaksi (produk_id, jumlah_keluar) VALUES ($id, $jumlah)");
            return "Berhasil memperbarui stok.";
        } else {
            return "Gagal: Stok tidak mencukupi.";
        }
    }

    public function cekStatus($stok) {
        if ($stok < 5) {
            return "<span style='color:red; font-weight:bold;'>Stok Menipis!</span>";
        }
        return "Tersedia";
    }
}