<?php
include 'koneksi.php';

//tambah
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_jurusan = $_POST['nama_jurusan'];
    $query = "INSERT INTO jurusan2 (nama_jurusan) VALUES ('$nama_jurusan')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Jurusan berhasil ditambahkan!'); window.location.href='jurusan.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

//edit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $query = "UPDATE jurusan2 SET nama_jurusan='$nama_jurusan' WHERE id=$id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Jurusan berhasil diupdate!'); window.location.href='jurusan.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

//hapus
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM jurusan2 WHERE id=$id";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Jurusan berhasil dihapus!'); window.location.href='jurusan.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <title>Jurusan</title>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include 'tamplate.php';
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="container mt-5">
                <h2 class="text-center">Manajemen Jurusan</h2>
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah
                    Jurusan</button>
                <a href="mhs.php" class="btn btn-primary mb-3">Kembali</a>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM jurusan2";
                        $result = mysqli_query($koneksi, $query);
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama_jurusan']}</td>
                        <td>
                            <button class='btn btn-warning btn-sm btn-aksi' onclick='editJurusan({$row['id']}, \"{$row['nama_jurusan']}\")' data-bs-toggle='modal' data-bs-target='#modalEdit'>Edit</button>
                            <button class='btn btn-danger btn-sm btn-aksi' onclick='hapusJurusan({$row['id']})'>Hapus</button>
                        </td>
                    </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="modalTambah" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Jurusan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <label>Nama Jurusan:</label>
                                <input type="text" name="nama_jurusan" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Jurusan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="edit_id">
                                <label>Nama Jurusan:</label>
                                <input type="text" name="nama_jurusan" id="edit_nama" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div id="content">






            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Rendy Irawan 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->




</body>

</html>