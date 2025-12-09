<?php
$db = new Database();
$result = $db->query("SELECT * FROM artikel ORDER BY id DESC");
?>

<h2>Daftar Artikel</h2>
<a href="/lab11_php_oop/artikel/tambah" class="btn btn-success" style="margin-bottom: 20px;">+ Tambah Artikel Baru</a>

<?php if ($result && $result->num_rows > 0): ?>
<table class="data-table">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th width="25%">Judul</th>
            <th width="40%">Isi</th>
            <th width="15%">Tanggal</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo substr($row['isi'], 0, 100) . '...'; ?></td>
            <td><?php echo date('d/m/Y', strtotime($row['tanggal'])); ?></td>
            <td>
                <a href="/lab11_php_oop/artikel/ubah?id=<?php echo $row['id']; ?>" class="btn" style="font-size: 12px; padding: 5px 10px;">Edit</a>
                <a href="/lab11_php_oop/artikel/hapus?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="font-size: 12px; padding: 5px 10px;" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
<div class="alert alert-danger">
    Belum ada data artikel. <a href="/lab11_php_oop/artikel/tambah">Tambah artikel sekarang</a>
</div>
<?php endif; ?>