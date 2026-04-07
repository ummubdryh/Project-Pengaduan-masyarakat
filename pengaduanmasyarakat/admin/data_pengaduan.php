<?php
include "../koneksi.php";
include "../header.php";

$data = mysqli_query($conn, "
SELECT pengaduan.*, users.nama 
FROM pengaduan
JOIN users ON pengaduan.user_id = users.id
ORDER BY tanggal DESC
");
?>

<h3>Data Pengaduan</h3>

<table class="table table-bordered mt-3">
    <tr>
        <th>No</th>
        <th>Nama User</th>
        <th>Judul</th>
        <th>Tanggal Lapor</th>
        <th>Tanggal Selesai</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

<?php 
$no = 1;
while($d = mysqli_fetch_array($data)){
?>

<tr>
    <!-- NO HARUS DARI $no -->
    <td><?= $no++ ?></td>

    <!-- Nama user -->
    <td><?= $d['nama'] ?></td>

    <!-- Judul -->
    <td><?= $d['judul'] ?></td>

    <!-- Tanggal Lapor -->
    <td>
        <?= date('d M Y H:i', strtotime($d['tanggal'])) ?>
    </td>

    <!-- Tanggal Selesai -->
    <td>
        <?php 
        if(!empty($d['tanggal_selesai'])){
            echo date('d M Y H:i', strtotime($d['tanggal_selesai']));
        } else {
            echo "<span class='text-muted'>Belum selesai</span>";
        }
        ?>
    </td>

    <!-- Status -->
    <td>
	<?php
	if($d['status'] == 'menunggu'){
		echo "<span class='badge bg-secondary'>Menunggu</span>";
	} elseif($d['status'] == 'proses'){
		echo "<span class='badge bg-warning text-dark'>Proses</span>";
	} elseif($d['status'] == 'selesai'){
		echo "<span class='badge bg-success'>Selesai</span>";
	}
	?>
	</td>

    <!-- Aksi -->
    <td>
        <a href="proses_pengaduan.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Proses</a>
        <a href="edit_status.php?id=<?= $d['id'] ?>" class="btn btn-success btn-sm">Selesai</a>
    </td>
</tr>

<?php } ?>

</table>

<?php include "../footer.php"; ?>