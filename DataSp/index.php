<!DOCTYPE html>
<html>
<head>
    <title>Form Data Pengujung My Website</title>
</head>

<body>
    <header>
        <h3>Form Pendataan</h3>
        <h1>Pengunjung My Website</h1>
    </header>

    <h4>Menu</h4>
    <nav>
        <ul>
            <li><a href="form-daftar.php">Daftar Baru</a></li>
            <li><a href="list-pengunjung.php">Daftar Nama Pengunjung</a></li>
            <li><a href="/UAS/index.php">Homepage</a></li>
        </ul>
    </nav>

    <?php if(isset($_GET['status'])): ?>
    <p>
        <?php
            if($_GET['status'] == 'sukses'){
                echo "Pendaftaran berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
        ?>
    </p>
<?php endif; ?>

    </body>
</html>