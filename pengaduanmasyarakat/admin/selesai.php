<?php
include "../koneksi.php";
mysqli_query($conn,"UPDATE pengaduan SET status='selesai' WHERE id='$_GET[id]'");
header("Location: data_pengaduan.php");
?>