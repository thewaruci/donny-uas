<?php  
include 'config.php';
error_reporting(0);
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: /UAS/index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    $cek_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
	if ($cek_user -> num_rows != 0) {
		echo "<script>alert('Usermame Anda Telah Terdaftar. Silakan masuk pada kolom Login!')</script>";
    } else {
        if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, pendaftaran Anda berhasil! Silakan login dan lakukan verifikasi untuk pengaktifan akun!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Maaf! Sepertinya Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Maaf! Email yang Anda masukkan telah terdaftar. Silakan masuk pada kolom Login atau lakukan registrasi kembali dengan Email yang berbeda!')</script>";
        }
        } else {
        echo "<script>alert('Konfirmasi Password yang Anda Masukkan Tidak Sesuai')</script>";
        }
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>DSP_Corp Registrasi</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registration Account</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Sign Up</button>
            </div>
            <p class="login-register-text">Already Have an Account? <a href="index.php">Login </a></p>
        </form>
    </div>
</body>
</html>