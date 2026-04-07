<?php
include "../koneksi.php";
include "../header.php";

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    mysqli_query($conn, "
        UPDATE users SET
        nama='$_POST[nama]',
        username='$_POST[username]',
        no_hp='$_POST[no_hp]'
        WHERE id='$id'
    ");

    echo "<script>
    alert('User berhasil diupdate');
    window.location='data_user.php';
    </script>";
}
?>

<div class="container mt-4">
    <h3 class="mb-3">Edit User</h3>

    <form method="POST">
        <div class="mb-2">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $d['nama'] ?>" class="form-control">
        </div>

        <div class="mb-2">
            <label>Username</label>
            <input type="text" name="username" value="<?= $d['username'] ?>" class="form-control">
        </div>

        <div class="mb-2">
            <label>No HP</label>
            <input type="text" name="no_hp" value="<?= $d['no_hp'] ?>" class="form-control">
        </div>

        <button name="update" class="btn btn-success">Update</button>
        <a href="data_user.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include "../footer.php"; ?>