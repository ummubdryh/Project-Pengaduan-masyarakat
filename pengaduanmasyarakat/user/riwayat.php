<?php
session_start();
include "../koneksi.php";
include "../header.php";

$id = $_SESSION['id'];

$data = mysqli_query($conn, "SELECT * FROM pengaduan WHERE user_id='$id' ORDER BY tanggal DESC");
?>

<div class="container mt-4">

	<a href="dashboard.php" class="btn btn-secondary mb-3">
        ⬅️ Kembali ke Dashboard
    </a>
	
    <h3 class="mb-4">📰 Riwayat Pengaduan</h3>

    <?php if(mysqli_num_rows($data) == 0){ ?>

        <div class="alert alert-info text-center">
            Belum ada pengaduan.
        </div>

    <?php } else { ?>

    <div class="row">

        <?php while($d = mysqli_fetch_array($data)) { ?>

        <div class="col-md-6">
            <div class="card mb-4 shadow-sm rounded-4">

                <img src="../upload/<?= $d['gambar'] ?>" 
                     class="card-img-top" 
                     style="height:200px;object-fit:cover;">

                <div class="card-body">

                    <span class="badge bg-danger mb-2">Breaking News</span>

                    <h5>
                        <a href="detail.php?id=<?= $d['id'] ?>" 
                           class="text-dark text-decoration-none">
                            <?= $d['judul'] ?>
                        </a>
                    </h5>

                    <small class="text-muted">
                        <?= date('d M Y H:i', strtotime($d['tanggal'])) ?>
                    </small>

                    <p class="mt-2">
                        <?= substr($d['isi'], 0, 100) ?>...
                    </p>

                    <p>
                        Status:
                        <span class="badge bg-warning text-dark">
                            <?= $d['status'] ?>
                        </span>
                    </p>

                    <!-- tombol -->
                    <div class="d-flex gap-2">

                        <a href="tracking.php?id=<?= $d['id'] ?>" class="btn btn-info btn-sm">
                            Tracking
                        </a>

                        <a href="edit_pengaduan.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="hapus_pengaduan.php?id=<?= $d['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus?')">
                            Hapus
                        </a>

                    </div>

                </div>
            </div>
        </div>

        <?php } ?>

    </div>

    <?php } ?>

</div>

<?php include "../footer.php"; ?>