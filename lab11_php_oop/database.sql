-- Buat database
CREATE DATABASE IF NOT EXISTS latihan_oop;
USE latihan_oop;

-- Tabel artikel
CREATE TABLE IF NOT EXISTS artikel (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    isi TEXT NOT NULL,
    tanggal DATE NOT NULL
);

-- Tabel users
CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    agama VARCHAR(20) NOT NULL,
    hobi TEXT,
    alamat TEXT NOT NULL
);

-- Insert contoh data artikel
INSERT INTO artikel (judul, isi, tanggal) VALUES
('Pengenalan PHP OOP', 'PHP Object-Oriented Programming adalah paradigma pemrograman yang menggunakan objek dan kelas. OOP membantu membuat kode yang lebih terstruktur, mudah dipelihara, dan dapat digunakan kembali.', '2024-01-15'),
('Framework Modular', 'Framework modular adalah struktur aplikasi yang dibagi menjadi modul-modul terpisah. Setiap modul memiliki fungsi spesifik dan dapat dikembangkan secara independen.', '2024-01-16'),
('Routing di PHP', 'Routing adalah proses mengarahkan URL ke controller atau file yang sesuai. Dengan routing, kita dapat membuat URL yang lebih bersih dan SEO-friendly.', '2024-01-17');

-- Insert contoh data users
INSERT INTO users (nama, email, pass, jenis_kelamin, agama, hobi, alamat) VALUES
('Ahmad Fauzi', 'ahmad@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'L', 'Islam', 'Membaca, Coding', 'Jl. Merdeka No. 123, Jakarta'),
('Siti Nurhaliza', 'siti@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'P', 'Islam', 'Traveling, Olahraga', 'Jl. Sudirman No. 456, Bandung');