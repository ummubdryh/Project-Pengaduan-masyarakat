<?php
session_start();
include "../koneksi.php";
include "../header.php";

$berhasil = false;

if(isset($_POST['kirim'])){

    $user_id = $_SESSION['id'];
    $judul   = $_POST['judul'];
    $isi     = $_POST['isi'];
    $tanggal = date("Y-m-d H:i:s");

    // upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "../upload/".$gambar);

    mysqli_query($conn, "INSERT INTO pengaduan (user_id, judul, isi, gambar, tanggal, status)
    VALUES ('$user_id','$judul','$isi','$gambar','$tanggal','Menunggu')");

    $berhasil = true;
}
?>

<div class="container mt-4">

<h3 class="mb-4">📢 Kirim Pengaduan</h3>

<?php if($berhasil){ ?>

    <div class="alert alert-success text-center">
        ✅ Pengaduan berhasil dikirim!
    </div>

    <div class="text-center">
        <a href="kirim_pengaduan.php" class="btn btn-primary">
            Kirim Pengaduan Lagi
        </a>

        <a href="riwayat.php" class="btn btn-secondary">
            Lihat Riwayat
        </a>
    </div>

<?php } else { ?>

    <div class="card shadow-sm rounded-4">
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Pengaduan</label>
                    <textarea name="isi" class="form-control" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>

                <button type="submit" name="kirim" class="btn btn-success">
                    Kirim Pengaduan
                </button>

                <a href="dashboard.php" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

<?php } ?>

</div>

<?php include "../footer.php"; ?>