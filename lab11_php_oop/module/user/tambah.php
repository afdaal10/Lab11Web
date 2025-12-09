<?php
$db = new Database();
$form = new Form("", "Simpan Data User");

if ($_POST) {
    $hobi = isset($_POST['hobi']) ? implode(', ', $_POST['hobi']) : '';
    
    $data = [
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'agama' => $_POST['agama'],
        'hobi' => $hobi,
        'alamat' => $_POST['alamat']
    ];
    
    $simpan = $db->insert('users', $data);
    
    if ($simpan) {
        echo "<div class='alert alert-success'>Data user berhasil disimpan! <a href='/lab11_php_oop/user/index'>Lihat daftar user</a></div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menyimpan data user.</div>";
    }
}
?>

<h2>Form Input User (OOP dengan Routing)</h2>
<a href="/lab11_php_oop/user/index" class="btn" style="margin-bottom: 20px;">← Kembali ke Daftar</a>

<?php
$form->addField("nama", "Nama Lengkap");
$form->addField("email", "Email");
$form->addField("pass", "Password", "password");
$form->addField("jenis_kelamin", "Jenis Kelamin", "radio", [
    'L' => 'Laki-laki',
    'P' => 'Perempuan'
]);
$form->addField("agama", "Agama", "select", [
    'Islam' => 'Islam',
    'Kristen' => 'Kristen',
    'Katolik' => 'Katolik',
    'Hindu' => 'Hindu',
    'Budha' => 'Budha'
]);
$form->addField("hobi", "Hobi", "checkbox", [
    'Membaca' => 'Membaca',
    'Coding' => 'Coding',
    'Traveling' => 'Traveling',
    'Gaming' => 'Gaming',
    'Olahraga' => 'Olahraga'
]);
$form->addField("alamat", "Alamat Lengkap", "textarea");
$form->displayForm();
?>