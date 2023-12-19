<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

$conn = mysqli_connect("localhost", "root", "", "google") or die ("gagal terhubung");

require_once "vendor/autoload.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query_insert = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
    $run_query_insert = mysqli_query($conn, $query_insert);

    if ($run_query_insert) {
        echo "Registrasi berhasil!";
        header('location: login.php'); 
    } else {
        echo "Registrasi gagal!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siakad UNJ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        <?php include "style/style2.css" ?>
        h2 {
            text-align: center;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="https://fe.unj.ac.id/wp-content/uploads/2019/07/cropped-Logo-unj.png">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Register <span style="color: #478fca;">Siakad</span></h2>
                <h3>Universitas Negeri Jakarta</h3>
                <div class="center-box">
                    <div class="box bg-light p-8">
                        <div class="silakan">
                            <h4>Silakan Register</h4>
                        </div>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="fullname">Full Name:</label>
                                <input type="text" class="form-control" name="fullname" required/>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" required/>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" required/>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" class="form-control" name="confirm_password" required/>
                            </div>

                            <div class="masuk">
                                <div class="register">
                                    <button type="submit"><i class="fa fa-user-plus"></i> Register</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="d-flex justify-content-center links">
                            Already have an account? <a href="login.php" class="ml-2">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
