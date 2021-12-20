<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengujung My Website</title>
</head>

<body>
    <header>
        <h3>Nama Pengunjung My Website</h3>
    </header>

    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>Nama Pengunjung</th>
            <th>E-Mail</th>
            <th>No. Telp </th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM daftarpengunjung";
        $query = mysqli_query($db, $sql);

        while($sponsor = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$sponsor['namapengunjung']."</td>";
            echo "<td>".$sponsor['email']."</td>";
            echo "<td>".$sponsor['telepon']."</td>";
            echo "<td>".$sponsor['alamat']."</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    <a href="/UAS/DataSp/index.php"> Kembali Ke menu</a>
    </body>
</html>