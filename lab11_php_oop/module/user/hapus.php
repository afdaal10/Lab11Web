<?php
$db = new Database();
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$hapus = $db->delete('artikel', "id=$id");

if ($hapus) {
    echo "<div class='alert alert-success'>Data artikel berhasil dihapus!</div>";
} else {
    echo "<div class='alert alert-danger'>Gagal menghapus data artikel.</div>";
}

echo "<a href='index.php?mod=artikel&page=index' class='btn'>← Kembali ke Daftar Artikel</a>";