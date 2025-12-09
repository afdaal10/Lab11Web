<?php
$db = new Database();
$form = new Form("", "Simpan Artikel");

if ($_POST) {
    $data = [
        'judul' => $_POST['judul'],
        'isi' => $_POST['isi'],
        'tanggal' => date('Y-m-d')
    ];
    
    $simpan = $db->insert('artikel', $data);
    
    if ($simpan) {
        echo "<div class='alert alert-success'>Data artikel berhasil disimpan! <a href='/lab11_php_oop/artikel/index'>Lihat daftar artikel</a></div>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menyimpan data artikel.</div>";
    }
}
?>

<h2>Tambah Artikel Baru</h2>
<a href="/lab11_php_oop/artikel/index" class="btn" style="margin-bottom: 20px;">← Kembali ke Daftar</a>

<?php
$form->addField("judul", "Judul Artikel");
$form->addField("isi", "Isi Artikel", "textarea");
$form->displayForm();
?>