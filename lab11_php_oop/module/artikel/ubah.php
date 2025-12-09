<?php
$db = new Database();
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$artikel = $db->get('artikel', "id=$id");

if (!$artikel) {
    echo "<div class='alert alert-danger'>Artikel tidak ditemukan!</div>";
    echo "<a href='/lab11_php_oop/artikel/index' class='btn'>← Kembali</a>";
    exit;
}

if ($_POST) {
    $data = [
        'judul' => $_POST['judul'],
        'isi' => $_POST['isi']
    ];
    
    $update = $db->update('artikel', $data, "id=$id");
    
    if ($update) {
        echo "<div class='alert alert-success'>Data artikel berhasil diupdate! <a href='/lab11_php_oop/artikel/index'>Lihat daftar artikel</a></div>";
        $artikel = $db->get('artikel', "id=$id");
    } else {
        echo "<div class='alert alert-danger'>Gagal mengupdate data artikel.</div>";
    }
}
?>

<h2>Edit Artikel</h2>
<a href="/lab11_php_oop/artikel/index" class="btn" style="margin-bottom: 20px;">← Kembali ke Daftar</a>

<form action="" method="POST">
    <table width="100%" border="0">
        <tr>
            <td align="right" valign="top">Judul Artikel</td>
            <td><input type="text" name="judul" value="<?php echo htmlspecialchars($artikel['judul']); ?>" required></td>
        </tr>
        <tr>
            <td align="right" valign="top">Isi Artikel</td>
            <td><textarea name="isi" cols="30" rows="10" required><?php echo htmlspecialchars($artikel['isi']); ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Update Artikel"></td>
        </tr>
    </table>
</form>