<?php
// Koneksi database
$host = "localhost";
$user = "root";     
$pass = "";         
$db   = "data_diri"; // Nama database dan tabel sama

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Tambah data
if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $sql = "INSERT INTO data_diri (nama, email) VALUES ('$nama', '$email')";
    mysqli_query($conn, $sql);
    header("Location: tampil.php");
}

// Hapus data
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM data_diri WHERE id='$id'");
    header("Location: tampil.php");
}

// Ambil data untuk ditampilkan
$result = mysqli_query($conn, "SELECT * FROM data_diri");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pengguna Kece</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #6c63ff;
            color: #fff;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            padding: 6px 12px;
            margin: 2px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
        }
        .edit { background-color: #28a745; }
        .hapus { background-color: #dc3545; }
        .tambah { background-color: #007bff; display: inline-block; margin: 20px auto; padding: 10px 20px; }
        form { width: 50%; margin: 0 auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input[type=text], input[type=email] { width: 100%; padding: 10px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px; }
        input[type=submit] { background-color: #6c63ff; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #5750d4; }
    </style>
</head>
<body>
    <h2>Data Pengguna</h2>

    <!-- Form Tambah Data -->
    <form method="post" action="">
        <h3>Tambah Data Baru</h3>
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" name="tambah" value="Tambah Data">
    </form>

    <!-- Tabel Data -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['nama']."</td>
                        <td>".$row['email']."</td>
                        <td>
                            <a class='btn edit' href='edit.php?id=".$row['id']."'>Edit</a>
                            <a class='btn hapus' href='tampil.php?hapus=".$row['id']."' onclick=\"return confirm('Yakin mau dihapus?')\">Hapus</a>
                        </td>
                      </tr
