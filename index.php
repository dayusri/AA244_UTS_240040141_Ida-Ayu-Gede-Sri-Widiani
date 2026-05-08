<?php
require_once 'Inventory.php';
$inv = new Inventory();

$pesan = "";
if (isset($_POST['kurangi'])) {
    $pesan = $inv->kurangiStok($_POST['id'], $_POST['jumlah']);
}

$data = $inv->getProduk();
?>

<!DOCTYPE html>
<html>
<head>
    <title>UTS Dayusri - Inventaris Toko</title>
</head>
<body>
    <h1>Dashboard Inventaris Produk</h1>
    
    <?php if($pesan) echo "<p><i>$pesan</i></p>"; ?>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = $data->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama_produk']; ?></td>
            <td><?= $row['jenis_produk']; ?></td>
            <td><?= $row['stok']; ?></td>
            <td><?= $inv->cekStatus($row['stok']); ?></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                    <input type="number" name="jumlah" placeholder="Jumlah keluar" required>
                    <button type="submit" name="kurangi">Kurangi</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>