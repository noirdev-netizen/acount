<?php
// Koneksi database
$host = "localhost";
$user = "root";     
$pass = "";         
$db   = "data_diri"; // Nama database sudah diganti

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query ambil data
$sql = "SELECT * FROM nama_tabel"; // Ganti 'nama_tabel' sesuai tabel kamu
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tampil Data Kece</title>
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
            margin: auto;
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
            border-ra
