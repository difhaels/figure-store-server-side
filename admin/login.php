<?php
session_start();
require '../function/functions.php';
require '../function/functions-admin.php';

// set cookie | cek ada cookie atau tidak
if (isset($_COOKIE['key'])) {
    $_SESSION['login'] = true;
}

// jika login true pindah ke halaman index.html
if (isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

// jika login ditekan
if (isset($_POST["login"])) {

    // membuat variabel dari post agar lebih mudah
    $usernameAdmin = $_POST["username"];
    $password = $_POST["password"];

    // cek database, table admin, yang username sama dengan input
    $result  = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$usernameAdmin'");

    // jika ditemukan username yang sama
    if (mysqli_num_rows($result) === 1) {

        // mengubah hasil result menjadi array assoc
        $row = mysqli_fetch_assoc($result);

        // cek password
        if ($password == $row["password"]) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me di centang tidak
            if (isset($_POST['remember'])) {
                // memberi waktu 3600 detik jika di centang
                setcookie('key', $row['username'], time() + 3600);
            }

            // pindah ke halaman index
            header("Location: ../index.php");
            exit;
        } else {
            echo "
        <script>
            alert('Password Salah');
        </script>
        ";
        }
    } else {
        echo "
        <script>
            alert('Username tidak ditemukan');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Admin</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
        <button type="submit" name="login" class="bg-white text-teal-500 hover:text-teal-300">Login</button>
    </form>
</body>

</html>