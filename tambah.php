<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

</html>
<?php

include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $nomor = $_POST['nomor'];
    $jurusan_id = $_POST['jurusan_id'];

    $query = "INSERT INTO mhs (nama, nim, email, nomor, jurusan_id) VALUES ('$nama', '$nim', '$email', '$nomor', '$jurusan_id')";
    if ($koneksi->query($query)) {
        echo "<script>Swal.fire('Berhasil!', 'Data berhasil ditambahkan', 'success').then(() => { window.location.href = 'tables.php'; })</script>";
    } else {
        echo "<script>Swal.fire('Gagal!', 'Data gagal ditambahkan', 'error')</script>";
    }
}


// tambahkan kode ini di bagian form

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #2196F3;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Tambah Data Mahasiswa</h2>
        <form method="POST">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="email" name="email" placeholder="Email">
            <input type="number" name="nomor" placeholder="Nomor">
            <select name="jurusan_id"
                style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px;">
                <?php
                $query = "SELECT * FROM jurusan2";
                $result = $koneksi->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nama_jurusan'] . "</option>";
                }
                ?>
            </select>
            <button type="submit" name="simpan">Simpan</button>
            <a href="tables.php">Kembali</a>
        </form>
    </div>
</body>

</html>