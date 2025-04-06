<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
</html>

<?php
include 'koneksi.php';
// Cek apakah ada parameter ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query hapus data
    $query = "DELETE FROM mhs WHERE id = $id";
    if ($koneksi->query($query)) {
        echo "<script>
            Swal.fire('Berhasil!', 'Data berhasil dihapus', 'success')
            .then(() => { window.location.href = 'tables.php'; });
        </script>";
    } else {
        echo "<script>
            Swal.fire('Gagal!', 'Data gagal dihapus', 'error')
            .then(() => { window.location.href = 'tables.php'; });
        </script>";
    }
} else {
    echo "<script>
        Swal.fire('Gagal!', 'ID tidak ditemukan', 'error')
        .then(() => { window.location.href = 'tables.php'; });
    </script>";
}
?>

