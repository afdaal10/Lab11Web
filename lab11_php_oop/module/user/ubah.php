<?php
$db = new Database();
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$user = $db->get('users', "id=$id");

if (!$user) {
    echo "<div class='alert alert-danger'>User tidak ditemukan!</div>";
    echo "<a href='/lab11_php_oop/user/index' class='btn'>← Kembali</a>";
    exit;
}

if ($_POST) {
    $hobi = isset($_POST['hobi']) ? implode(', ', $_POST['hobi']) : '';
    
    $data = [
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'agama' => $_POST['agama'],
        'hobi' => $hobi,
        'alamat' => $_POST['alamat']
    ];
    
    if (!empty($_POST['pass'])) {
        $data['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    }
    
    $update = $db->update('users', $data, "id=$id");
    
    if ($update) {
        echo "<div class='alert alert-success'>Data user berhasil diupdate! <a href='/lab11_php_oop/user/index'>Lihat daftar user</a></div>";
        $user = $db->get('users', "id=$id");
    } else {
        echo "<div class='alert alert-danger'>Gagal mengupdate data user.</div>";
    }
}

$hobi_array = explode(', ', $user['hobi']);
?>

<h2>Edit Data User</h2>
<a href="/lab11_php_oop/user/index" class="btn" style="margin-bottom: 20px;">← Kembali ke Daftar</a>

<form action="" method="POST">
    <table width="100%" border="0">
        <tr>
            <td align="right" valign="top">Nama Lengkap</td>
            <td><input type="text" name="nama" value="<?php echo htmlspecialchars($user['nama']); ?>" required></td>
        </tr>
        <tr>
            <td align="right" valign="top">Email</td>
            <td><input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required></td>
        </tr>
        <tr>
            <td align="right" valign="top">Password</td>
            <td><input type="password" name="pass" placeholder="Kosongkan jika tidak ingin mengubah password"></td>
        </tr>
        <tr>
            <td align="right" valign="top">Jenis Kelamin</td>
            <td>
                <label><input type="radio" name="jenis_kelamin" value="L" <?php echo $user['jenis_kelamin'] == 'L' ? 'checked' : ''; ?>> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="P" <?php echo $user['jenis_kelamin'] == 'P' ? 'checked' : ''; ?>> Perempuan</label>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Agama</td>
            <td>
                <select name="agama" required>
                    <option value="Islam" <?php echo $user['agama'] == 'Islam' ? 'selected' : ''; ?>>Islam</option>
                    <option value="Kristen" <?php echo $user['agama'] == 'Kristen' ? 'selected' : ''; ?>>Kristen</option>
                    <option value="Katolik" <?php echo $user['agama'] == 'Katolik' ? 'selected' : ''; ?>>Katolik</option>
                    <option value="Hindu" <?php echo $user['agama'] == 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                    <option value="Budha" <?php echo $user['agama'] == 'Budha' ? 'selected' : ''; ?>>Budha</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Hobi</td>
            <td>
                <label><input type="checkbox" name="hobi[]" value="Membaca" <?php echo in_array('Membaca', $hobi_array) ? 'checked' : ''; ?>> Membaca</label>
                <label><input type="checkbox" name="hobi[]" value="Coding" <?php echo in_array('Coding', $hobi_array) ? 'checked' : ''; ?>> Coding</label>
                <label><input type="checkbox" name="hobi[]" value="Traveling" <?php echo in_array('Traveling', $hobi_array) ? 'checked' : ''; ?>> Traveling</label>
                <label><input type="checkbox" name="hobi[]" value="Gaming" <?php echo in_array('Gaming', $hobi_array) ? 'checked' : ''; ?>> Gaming</label>
                <label><input type="checkbox" name="hobi[]" value="Olahraga" <?php echo in_array('Olahraga', $hobi_array) ? 'checked' : ''; ?>> Olahraga</label>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Alamat Lengkap</td>
            <td><textarea name="alamat" cols="30" rows="4" required><?php echo htmlspecialchars($user['alamat']); ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Update Data User"></td>
        </tr>
    </table>
</form>