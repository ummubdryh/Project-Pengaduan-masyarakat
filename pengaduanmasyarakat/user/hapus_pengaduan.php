<?php
session_start();
include "../koneksi.php";
include "../header.php";

$id = $_GET['id'];

// hapus data
mysqli_query($conn, "DELETE FROM pengaduan WHERE id='$id' AND user_id='".$_SESSION['id']."'");

?>

<div class="container mt-4">
    <div class="alert alert-success text-center">
        Data berhasil dihapus
    </div>

    <div class="text-center">
        <a href="riwayat.php" class="btn btn-primary">
            Kembali ke Riwayat
        </a>
    </div>
</div>

<?php include "../footer.php"; ?>