<?php
session_start();
include "koneksi.php";

$error = "";

// proses login
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];
    $password_input = $_POST['password'];
    $password_md5 = md5($password_input);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $d = mysqli_fetch_array($query);

    if($d){
        // cek password (md5 atau biasa)
        if($password_input == $d['password'] || $password_md5 == $d['password']){

            $_SESSION['id'] = $d['id'];
            $_SESSION['username'] = $d['username'];
            $_SESSION['role'] = $d['role'];

            if(strtolower($d['role']) == 'admin'){
                header("Location: admin/dashboard.php");
            } else {
                header("Location: user/dashboard.php");
            }
            exit;

        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login PANMASTI</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{ background:#f8f9fa; }

/* NAVBAR */
.navbar{
    background:#000;
    justify-content:center;
}

.navbar-brand{
    color:#ffc107 !important;
    font-weight:bold;
    font-size:24px;
}

/* CARD */
.card{
    border-left:5px solid #dc3545;
}

/* FOOTER */
footer{
    position:fixed;
    bottom:0;
    width:100%;
    background:#000;
    color:#ffc107;
    text-align:center;
    padding:10px;
}
</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark">
    <span class="navbar-brand">📰 PANMASTI</span>
</nav>

<!-- LOGIN -->
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-4">

<div class="card p-4 shadow">

<h3 class="text-center mb-3">Login</h3>

<?php if($error != ""){ ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php } ?>

<form method="POST">

    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-danger w-100">Login</button>

</form>

</div>

</div>
</div>
</div>

<!-- FOOTER -->
<footer>
    <small>© 2026 PANMASTI - Portal Pengaduan Masyarakat</small>
</footer>

</body>
</html>