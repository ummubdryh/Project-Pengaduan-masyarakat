<?php
include "../koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "
UPDATE pengaduan 
SET status='selesai', tanggal_selesai=NOW() 
WHERE id='$id'
");

if($query){
    echo "<script>
    alert('Pengaduan berhasil diselesaikan');
    window.location='data_pengaduan.php';
    </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>