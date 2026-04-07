<?php
$conn = mysqli_connect("localhost","root","","pengaduanmasyarakat");

if(!$conn){
    die("Koneksi gagal: ".mysqli_connect_error());
}
?>