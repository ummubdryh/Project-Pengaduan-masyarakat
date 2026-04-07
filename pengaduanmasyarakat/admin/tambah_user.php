<?php
include "../koneksi.php";
include "../header.php";

if(isset($_POST['simpan'])){
    mysqli_query($conn, "
        INSERT INTO users (nama, username, password, no_hp)
        VALUES ('$_POST[nama]', '$_POST[username]', '$_POST[password]', '$_POST[no_hp]')
    ");

    echo "<script>
    alert('User berhasil ditambahkan');
    window.location='data_user.php';
    </script>";
}
?>

<div class="container mt-4">
    <h3 class="mb-3">Tambah User</h3>

    <form method="POST">
        <div class="mb-2">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Password</label>
            <input type="text" name="password" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control">
        </div>

        <button name="simpan" class="btn btn-primary">Simpan</button>
        <a href="data_user.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include "../footer.php"; ?>