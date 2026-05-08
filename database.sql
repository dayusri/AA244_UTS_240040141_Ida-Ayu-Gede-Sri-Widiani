CREATE DATABASE IF NOT EXISTS toko_retail;
USE toko_retail;

CREATE TABLE produk (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_produk VARCHAR(100),
    jenis_produk ENUM('Laptop', 'Smartphone'),
    stok INT DEFAULT 0,
    harga DECIMAL(10,2)
);

CREATE TABLE transaksi (
    id INT PRIMARY KEY AUTO_INCREMENT,
    produk_id INT,
    jumlah_keluar INT,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (produk_id) REFERENCES produk(id)
);

INSERT INTO produk (nama_produk, jenis_produk, stok, harga) VALUES 
('MacBook Air M2', 'Laptop', 10, 15000000.00),
('Samsung A24', 'Smartphone', 3, 3000000.00);