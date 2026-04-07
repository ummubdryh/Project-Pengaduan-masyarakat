<?php
session_start();
include "../koneksi.php";
include "../header.php";

// cek login
if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
}

// statistik global
$total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pengaduan"));
$pending = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pengaduan WHERE status='Menunggu'"));
$proses = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pengaduan WHERE status='Diproses'"));
$selesai = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pengaduan WHERE status='Selesai'"));

// data per bulan
$bulan = [];
$jumlah = [];

for($i = 1; $i <= 12; $i++){
    $query = mysqli_query($conn, "
        SELECT COUNT(*) as total 
        FROM pengaduan 
        WHERE MONTH(tanggal)='$i'
    ");
    $data = mysqli_fetch_assoc($query);

    $bulan[] = date("F", mktime(0,0,0,$i,1));
    $jumlah[] = $data['total'];
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mt-4">

<h3 class="mb-4">📊 Dashboard Admin PANMASTI</h3>

<!-- STATISTIK -->
<div class="row text-center mb-4">

    <div class="col-md-3">
        <div class="card shadow p-3">
            <h5>Total</h5>
            <h3><?= $total ?></h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow p-3">
            <h5>Menunggu</h5>
            <h3><?= $pending ?></h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow p-3">
            <h5>Diproses</h5>
            <h3><?= $proses ?></h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow p-3">
            <h5>Selesai</h5>
            <h3><?= $selesai ?></h3>
        </div>
    </div>

</div>

<!-- DIAGRAM -->
<div class="row mb-4">

    <!-- BAR CHART -->
    <div class="col-md-6">
        <div class="card shadow p-3 h-100">
            <h5>📊 Pengaduan Per Bulan</h5>
            <div style="height:300px;">
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>

    <!-- PIE CHART -->
    <div class="col-md-6">
        <div class="card shadow p-3 h-100">
            <h5>🥧 Distribusi Pengaduan</h5>
            <div style="height:300px;">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

</div>

<!-- DESKRIPSI -->
<div class="card shadow mb-4">
    <div class="card-body">
        <h5 class="text-danger">Apa itu PANMASTI?</h5>
        <p>
            <b>PANMASTI (Pengaduan Masyarakat Kalimati)</b> adalah sistem layanan berbasis web yang digunakan untuk
            mengelola dan memantau pengaduan masyarakat Desa Kalimati secara terintegrasi.
        </p>

        <p>
            Sistem ini membantu pemerintah desa dalam menerima, memproses, dan menindaklanjuti laporan masyarakat
            dengan lebih cepat, transparan, dan terstruktur.
        </p>

        <h5 class="text-danger">Tujuan</h5>
        <ul>
            <li>Mempermudah pengelolaan pengaduan masyarakat</li>
            <li>Meningkatkan responsivitas pelayanan desa</li>
            <li>Menyediakan transparansi status pengaduan</li>
            <li>Mendukung pengambilan keputusan berbasis data</li>
            <li>Menjadi media komunikasi antara masyarakat dan pemerintah desa</li>
        </ul>
    </div>
</div>

</div>

<script>
const labels = <?= json_encode($bulan) ?>;
const dataJumlah = <?= json_encode($jumlah) ?>;

// BAR CHART
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Jumlah Pengaduan',
            data: dataJumlah
        }]
    }
});

// PIE CHART
new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: dataJumlah
        }]
    }
});
</script>

<?php include "../footer.php"; ?>