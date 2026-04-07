<?php
include "koneksi.php";
include "header.php";

if(isset($_POST['submit'])){
    mysqli_query($conn,"INSERT INTO users(nama,username,password,role)
    VALUES('$_POST[nama]','$_POST[username]',md5('$_POST[password]'),'user')");

    echo "<div class='alert alert-success text-center'>Berhasil daftar</div>";
}
?>

<div class="col-md-5 mx-auto">
<div class="card p-3 shadow">
<h4 class="text-center">Register</h4>

<form method="POST">
<input class="form-control mb-2" name="nama" placeholder="Nama">
<input class="form-control mb-2" name="username" placeholder="Username">
<input class="form-control mb-2" type="password" name="password" placeholder="Password">
<button class="btn btn-warning w-100" name="submit">Daftar</button>
</form>

</div>
</div>

<?php include "footer.php"; ?>