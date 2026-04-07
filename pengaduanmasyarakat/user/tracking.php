<?php
include "../koneksi.php";
include "../header.php";

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM pengaduan WHERE id='$id'"));
$status = strtolower($data['status']);
?>

<style>
.timeline {
    display: flex;
    justify-content: space-between;
    margin-top: 40px;
    position: relative;
}

.timeline::before {
    content: "";
    position: absolute;
    top: 20px;
    left: 5%;
    width: 90%;
    height: 4px;
    background: #ccc;
    z-index: 0;
}

.step {
    text-align: center;
    width: 25%;
    position: relative;
    z-index: 1;
}

.circle {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: #ccc;
    margin: auto;
    line-height: 45px;
    color: white;
    font-weight: bold;
}

.active-green { background: #28a745; }
.active-orange { background: #fd7e14; }
.active-blue { background: #0d6efd; }
.active-red { background: #dc3545; }

.label {
    margin-top: 10px;
    font-weight: bold;
}
</style>

<h3 class="text-center">Tracking Pengaduan</h3>

<div class="card p-4 shadow mt-4">

    <p><b>Judul:</b> <?= $data['judul']; ?></p>
    <p><b>Status:</b> <?= $data['status']; ?></p>

    <div class="timeline">

        <!-- DIKIRIM -->
        <div class="step">
            <div class="circle <?= ($status == 'dikirim' || $status == 'diproses' || $status == 'selesai') ? 'active-green' : '' ?>">
                ✔
            </div>
            <div class="label">Dikirim</div>
        </div>

        <!-- DIPROSES -->
        <div class="step">
            <div class="circle <?= ($status == 'diproses' || $status == 'selesai') ? 'active-orange' : '' ?>">
                ⏳
            </div>
            <div class="label">Diproses</div>
        </div>

        <!-- SELESAI -->
        <div class="step">
            <div class="circle <?= ($status == 'selesai') ? 'active-blue' : '' ?>">
                ✓
            </div>
            <div class="label">Selesai</div>
        </div>

    </div>

</div>

<div class="mt-3">
    <a href="riwayat.php" class="btn btn-secondary">← Kembali</a>
</div>

<?php include "../footer.php"; ?>