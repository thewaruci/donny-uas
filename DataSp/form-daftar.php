<!DOCTYPE html>
<html>
<head>
    <title>Form Data Pengujung My Website</title>
</head>

<body>
    <header>
        <h3>Form Data Pengujung My Website</h3>
    </header>

    <form action="proses-pendaftaran.php" method="POST">

        <fieldset>

        <p>
            <label for="namapengunjung">Nama Pengunjung: </label>
            <input type="text" name="namapengunjung" placeholder="Nama Pengunjung" />
        </p>
        <p>
            <label for="email">E-mail : </label>
            <input type="text" name="email" placeholder="E-mail Pengunjung" />
        </p>
        <p>
            <label for="telepon">No. Telepon: </label>
            <input name="telepon" placeholder="No. Telp Pengunjung">
        </p>
        <p>
            <label for="alamat">Alamat: </label>
            <textarea type="text" name="alamat" placeholder="Alamat Pengunjung"></textarea>
        </p>
        <p>
            <input type="submit" value="Daftar" name="daftar" />
            
        </p>

        </fieldset>

    </form>
    <a href="/UAS/DataSp/index.php">Batal</a>
    </body>
</html>