<?php
$conn = mysqli_connect("localhost", "root", "", "google");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = mysqli_prepare($conn, "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");

    mysqli_stmt_bind_param($stmt, 'sss', $fullname, $email, $password);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: users.php"); 
        exit();
    } else {
        $error_message = "Gagal menambahkan data. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
    body {
        background-color: yellow;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        font-size: 40px;
        text-align: center;
        font-weight: bold;
        padding: 20px 0;
        color: green;
    }

    a {
        background-color: #18392b;
        padding: 10px 20px;
        border-radius: 10px;
        color: #fff; 
        text-decoration: none; 
        font-weight: bold;
        text-align: center;
        display: block;
        margin: 10px auto;
    }

    a:hover {
        color: green;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        color: white;
    }

    label {
        color: #18392b;
        font-weight: bold;
        display: block;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="password"],
    input[type="file"],
    select {
        width: 80%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: none;
        border-radius: 8px;
    }

    select {
        background-color: #f4f4f4;
    }

    input[type="submit"] {
        padding: 10px 20px;
        border-radius: 10px;
        color: #fff; 
        text-decoration: none; 
        background-color: #18392b;
        width: 150px;
        font-weight: bold;
    }

    input[type="submit"]:hover {
        background-color: green;
    }

    .error-message {
        color: red;
        text-align: center;
    }
</style>

    <title>Tambah Data</title>
</head>
<body>
<h1>Tambah Data</h1>
<a href="users.php">Kembali</a>
<br>
<form method="post" enctype="multipart/form-data">
    <label for="fullname">Nama Lengkap:</label>
    <input type="text" id="fullname" name="fullname" required>

    <label for="email">email:</label>
    <input type="text" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Tambah Data">
</form>
<div class="error-message">
    <?php
    if (isset($error_message)) {
        echo $error_message;
    }
    ?>
</div>
</body>
</html>
