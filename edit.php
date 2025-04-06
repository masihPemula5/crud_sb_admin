<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

</html>
<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = $koneksi->query("SELECT * FROM mhs WHERE id = $id");
$data = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $nomor = $_POST['nomor'];
    $jurusan = $_POST['jurusan_id'];

    $query = "UPDATE mhs SET nama='$nama', nim='$nim', email='$email', nomor='$nomor', jurusan_id='$jurusan' WHERE id=$id";
    if ($koneksi->query($query)) {
        echo "<script>Swal.fire('Berhasil!', 'Data berhasil diperbarui', 'success').then(() => { window.location.href = 'tables.php'; })</script>";
    } else {
        echo "<script>Swal.fire('Gagal!', 'Data gagal diperbarui', 'error')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
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
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1e87d4;
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
        <h2>Edit Data Mahasiswa</h2>
        <form method="POST">
            <input type="text" name="nama" value="<?= $data['nama'] ?>" required >
            <input type="text" name="nim" value="<?= $data['nim'] ?>" required >
            <input type="email" name="email" value="<?= $data['email'] ?>" >
            <input type="number" name="nomor" value="<?= $data['nomor'] ?>" >
            <select name="jurusan_id"
                style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px;">
                <?php
                $result_jurusan = $koneksi->query("SELECT * FROM jurusan2");
                while ($jurusan = $result_jurusan->fetch_assoc()) {
                    if ($jurusan['id'] == $data['jurusan']) {
                        echo "<option value='" . $jurusan['id'] . "' selected>" . $jurusan['nama_jurusan'] . "</option>";
                    } else {
                        echo "<option value='" . $jurusan['id'] . "'>" . $jurusan['nama_jurusan'] . "</option>";
                    }
                }
                ?>
            </select>
            <button type="submit" name="update">Update</button>
            <a href="tables.php">Kembali</a>
        </form>
    </div>
</body>

</html>