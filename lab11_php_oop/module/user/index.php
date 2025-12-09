<?php
$db = new Database();
$result = $db->query("SELECT * FROM users ORDER BY id DESC");
?>

<h2>Daftar User</h2>
<a href="/lab11_php_oop/user/tambah" class="btn btn-success" style="margin-bottom: 20px;">+ Tambah User Baru</a>

<?php if ($result && $result->num_rows > 0): ?>
<table class="data-table">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th width="20%">Nama</th>
            <th width="20%">Email</th>
            <th width="10%">Jenis Kelamin</th>
            <th width="15%">Agama</th>
            <th width="20%">Alamat</th>
            <th width="10%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
            <td><?php echo $row['agama']; ?></td>
            <td><?php echo substr($row['alamat'], 0, 50); ?>...</td>
            <td>
                <a href="/lab11_php_oop/user/ubah?id=<?php echo $row['id']; ?>" class="btn" style="font-size: 12px; padding: 5px 10px;">Edit</a>
                <a href="/lab11_php_oop/user/hapus?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="font-size: 12px; padding: 5px 10px;" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
<div class="alert alert-danger">
    Belum ada data user. <a href="/lab11_php_oop/user/tambah">Tambah user sekarang</a>
</div>
<?php endif; ?>