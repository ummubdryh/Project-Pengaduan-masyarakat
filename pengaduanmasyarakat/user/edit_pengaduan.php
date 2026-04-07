<?php
session_start();
include "../koneksi.php";
include "../header.php";

$id = $_GET['id'];

// ambil data
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM pengaduan WHERE id='$id'"));
?>

<div class="container mt-4">
    <h3 class="mb-4">✏️ Edit Pengaduan</h3>

    <div class="card shadow-sm rounded-4">
        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Pengaduan</label>
                    <textarea name="isi" class="form-control" rows="5" required><?= $data['isi'] ?></textarea>
                </div>

                <button type="submit" name="update" class="btn btn-primary">
                    Update
                </button>

                <a href="riwayat.php" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>
</div>

<?php
if(isset($_POST['update'])){
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    mysqli_query($conn, "UPDATE pengaduan SET judul='$judul', isi='$isi' WHERE id='$id'");

    echo "<script>alert('Berhasil diupdate'); window.location='riwayat.php';</script>";
}
?>

<?php include "../footer.php"; ?>