<!DOCTYPE html>
<html>
<head>
<title>PANMASTI</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* BODY */
body{
    background:#f8f9fa;
}

/* NAVBAR */
.navbar{
    background:#000;
}

.navbar-brand{
    color:#ffc107 !important;
    font-size:24px;
    font-weight:bold;
    letter-spacing:2px;
}

/* TAGLINE */
h5{
    color:#dc3545;
}

/* CARD */
.card{
    border-left:5px solid #dc3545;
    transition:0.3s ease;
    cursor:pointer;
}

.card:hover{
    transform:translateY(-5px) scale(1.02);
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

.card:active{
    transform:scale(0.98);
}

/* BUTTON */
.btn{
    transition:0.2s;
}

.btn:hover{
    transform:scale(1.05);
}

.btn:active{
    transform:scale(0.95);
}

/* LINK */
a{
    transition:0.2s;
}

a:hover{
    color:#dc3545 !important;
}

/* BADGE */
.badge{
    font-size:13px;
}

/* FOOTER */
footer{
    background:#000;
    color:#ffc107;
}

/* ANIMASI MASUK */
.fade-in{
    animation:fadeIn 0.8s ease-in;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}
</style>

</head>

<body>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="dashboard.php">PANMASTI- Pengaduan Masyarakat Kalimati</a>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">

        <a class="nav-link" href="dashboard.php">Dashboard</a>
		<a class="nav-link" href="kirim_pengaduan.php">Kirim Pengaduan</a>
		<a class="nav-link" href="riwayat_pengaduan.php">Riwayat</a>
		<a class="nav-link" href="tracking.php">Cek Status</a>
		<a class="nav-link text-danger" href="../logout.php">Logout</a>
  
      </ul>
    </div>

  </div>
</nav>


<!-- TAGLINE -->
<div class="text-center mt-3">
<h5>Portal Pengaduan Masyarakat</h5>
<small class="text-muted">Cepat • Transparan • Terpercaya</small>
</div>

<div class="container mt-4">

<!-- SCRIPT EFEK KLIK -->
<script>
document.addEventListener("DOMContentLoaded", function(){
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', () => {
            card.classList.add('shadow-lg');
            setTimeout(() => {
                card.classList.remove('shadow-lg');
            }, 200);
        });
    });
});
</script>