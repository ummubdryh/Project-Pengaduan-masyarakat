<?php
include "../koneksi.php";
include "../header.php";

$d=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM pengaduan WHERE id='$_GET[id]'"));
?>

<span class="badge bg-danger">Breaking News</span>

<h3><?= $d['judul'] ?></h3>

<p class="text-muted">
<?= date('d M Y H:i', strtotime($d['tanggal'])) ?>
</p>

<img src="../upload/<?= $d['gambar'] ?>" width="100%" class="mb-3">

<p><?= $d['isi'] ?></p>

<p>Status: <?= $d['status'] ?></p>

<?php include "../footer.php"; ?>