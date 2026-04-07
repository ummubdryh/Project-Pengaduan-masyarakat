<?php
include "../koneksi.php";
include "../header.php";

$data = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<div class="container mt-4">
    <h3 class="mb-3">Kelola User</h3>

    <a href="tambah_user.php" class="btn btn-primary mb-3">+ Tambah User</a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['nama'] ?></td>
            <td><?= $d['username'] ?></td>
            <td><?= $d['no_hp'] ?></td>
            <td>
                <a href="edit_user.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus_user.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin hapus user?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php include "../footer.php"; ?>