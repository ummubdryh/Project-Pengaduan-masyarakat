<?php
session_start();
include "../header.php";
include "../koneksi.php";

if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
}

/* HITUNG DATA USER */
$id = $_SESSION['id'];

$total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pengaduan WHERE user_id='$id'"));
$pending = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pengaduan WHERE user_id='$id' AND status='pending'"));
$proses = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pengaduan WHERE user_id='$id' AND status='proses'"));
$selesai = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pengaduan WHERE user_id='$id' AND status='selesai'"));
$last = mysqli_fetch_array(mysqli_query($conn, 
    "SELECT * FROM pengaduan WHERE user_id='$id' ORDER BY id DESC LIMIT 1"
));
?>

<h3 class="mb-4">👋 Selamat Datang di PANMASTI</h3>

<!-- STATISTIK -->
<div class="row text-center mb-4">

    <div class="col-md-3">
        <div class="card shadow p-3 fade-in">
            <h5>Total</h5>
            <h3><?= $total ?></h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow p-3 fade-in">
            <h5>Pending</h5>
            <h3><?= $pending ?></h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow p-3 fade-in">
            <h5>Proses</h5>
            <h3><?= $proses ?></h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow p-3 fade-in">
            <h5>Selesai</h5>
            <h3><?= $selesai ?></h3>
        </div>
    </div>

</div>

<!-- DESKRIPSI -->
<div class="card shadow mb-4 fade-in">
    <div class="card-body">
        <h5 class="text-danger">Apa itu PANMASTI?</h5>
        <p>
            <b>PANMASTI (Pengaduan Masyarakat Kalimati)</b> adalah sebuah sistem layanan berbasis web yang digunakan untuk
            menampung dan mengelola pengaduan dari masyarakat Desa Kalimati. Sistem ini memudahkan warga dalam
            menyampaikan laporan, keluhan, maupun aspirasi tanpa harus datang langsung ke kantor desa.
        </p>

        <p>
            Melalui PANMASTI, setiap pengaduan yang dikirim akan diterima oleh pihak terkait dan dapat dipantau
            perkembangannya secara transparan mulai dari status <b>menunggu</b>, <b>diproses</b>, hingga <b>selesai</b>.
        </p>
    </div>
</div>

<!-- TUJUAN -->
<div class="card shadow mb-4 fade-in">
    <div class="card-body">
       <h5 class="text-danger">Tujuan</h5>
       <p>
            PANMASTI dibuat untuk memberikan kemudahan bagi masyarakat dalam menyampaikan pengaduan secara cepat dan efisien,
            serta membantu pemerintah Desa Kalimati dalam mengelola dan menindaklanjuti laporan secara lebih terstruktur.
        </p>

        <ul>
            <li>Mempermudah masyarakat dalam menyampaikan pengaduan secara online</li>
            <li>Meningkatkan pelayanan dan responsivitas pemerintah Desa Kalimati</li>
            <li>Mewujudkan transparansi dalam penanganan laporan masyarakat</li>
            <li>Membantu pemerintah desa dalam mengelola dan menindaklanjuti permasalahan secara terstruktur</li>
            <li>Menjadi media komunikasi yang efektif antara masyarakat dan pihak desa</li>
        </ul>
    </div>
</div>

<!-- LAYANAN -->
<div class="card shadow mb-4 fade-in">
    <div class="card-body">
        <h5 class="text-danger">🛠️ Layanan</h5>

        <div class="row text-center mt-3">

    <!-- KIRIM -->
    <div class="col-md-4">
        <div class="card p-3 shadow fade-in" onclick="window.location='kirim_pengaduan.php'">
            📩
            <h5>Kirim Pengaduan</h5>
            <p class="small">Laporkan masalah Anda</p>
        </div>
    </div>

    <!-- STATUS -->
	<div class="col-md-4">
		<div class="card p-3 shadow fade-in" 
		onclick="window.location='<?= ($last) ? 'tracking.php?id='.$last['id'] : '#' ?>'">
			📊
			<h5>Tracking/Cek Status</h5>
			<p class="small">Pantau perkembangan</p>
		</div>
	</div>
	
    <!-- RIWAYAT -->
    <div class="col-md-4">
        <div class="card p-3 shadow fade-in" onclick="window.location='riwayat.php'">
            📄
            <h5>Riwayat</h5>
            <p class="small">Lihat semua laporan</p>
        </div>
    </div>

</div>

<?php if(!$last){ ?>
    <div class="alert alert-warning mt-2 text-center">
        Belum ada pengaduan untuk ditrack
    </div>
	<?php } ?>

<!-- PANDUAN -->
<div class="card shadow mb-4 fade-in">
    <div class="card-body">
        <h5 class="text-danger">📖 Panduan Penggunaan</h5>

        <ol>
            <li>Klik <b>Kirim Pengaduan</b></li>
            <li>Isi judul & isi laporan</li>
            <li>Upload bukti (opsional)</li>
            <li>Klik <b>Kirim</b></li>
            <li>Cek status di menu <b>Riwayat</b></li>
        </ol>

        <div class="alert alert-info">
            💡 Gunakan deskripsi jelas agar laporan cepat diproses
        </div>
    </div>
</div>


<?php include "../footer.php"; ?>