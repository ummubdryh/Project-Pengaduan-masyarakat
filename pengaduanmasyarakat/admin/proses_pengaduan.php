<?php
include "../koneksi.php";
include "../header.php";

$id = $_GET['id'];

// ambil data pengaduan
$data = mysqli_query($conn, "
SELECT pengaduan.*, users.nama 
FROM pengaduan
JOIN users ON pengaduan.user_id = users.id
WHERE pengaduan.id='$id'
");

$d = mysqli_fetch_array($data);
?>

<div class="container mt-4">
    <h3 class="mb-4">Proses Pengaduan</h3>

    <div class="card">
        <div class="card-header bg-warning text-dark">
            Detail Pengaduan
        </div>

        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="200">Nama User</th>
                    <td>: <?= $d['nama'] ?></td>
                </tr>
                <tr>
                    <th>Judul</th>
                    <td>: <?= $d['judul'] ?></td>
                </tr>
                <tr>
                    <th>Isi Laporan</th>
                    <td>: <?= $d['isi'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>: <?= date('d M Y H:i', strtotime($d['tanggal'])) ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>: <b><?= $d['status'] ?></b></td>
                </tr>
            </table>

            <form method="POST" class="mt-4">
                <button name="proses" class="btn btn-warning">Proses Pengaduan</button>
                <a href="data_pengaduan.php" class="btn btn-secondary">Kembali</a>
            </form>

            <?php
            if(isset($_POST['proses'])){
                mysqli_query($conn, "UPDATE pengaduan SET status='proses' WHERE id='$id'");

                echo "<script>
                    alert('Pengaduan berhasil diproses');
                    window.location='data_pengaduan.php';
                </script>";
            }
            ?>
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>