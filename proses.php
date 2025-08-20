<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";   
$password = "";       
$dbname = "data_diri"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah form sudah dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $password_user = $_POST['password'] ?? '';
    $hp = $_POST['hp'] ?? '';
    $alamat = $_POST['alamat'] ?? '';

    // Hash password
    $password_hash = password_hash($password_user, PASSWORD_DEFAULT);

    // Prepare statement (aman dari SQL Injection)
    $stmt = $conn->prepare("INSERT INTO users (nama, email, password, hp, alamat) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $email, $password_hash, $hp, $alamat);

    if ($stmt->execute()) {
        echo "✅ Data berhasil disimpan!";
        echo "<br><a href='index.html'>Kembali ke Halaman Utama</a>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
