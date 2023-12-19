<?php
use Google\Auth\AccessToken;
session_start();
date_default_timezone_set("Asia/Jakarta");

if (isset($_SESSION["logged_in"])){
    header("location: index.php");
}

//koneksi database
$conn = mysqli_connect("localhost", "root", "", "google") or die ("gagal terhubung");

//panggil library
require_once "vendor/autoload.php";

//tampung clientID, clientSecret, dan redirect uri
$client_id = "1030386779660-gom58vklbqf1a6cuhqhj8t1h8lkrj2u9.apps.googleusercontent.com";
$client_secret = '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';
$redirect_uri = "http://localhost/admin/login.php";

//inisiasi google client
$client = new Google_Client();

//konfigurasi google client
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);

$client->addScope("email");
$client->addScope("profile");

if(isset($_GET["code"])){
    $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if(!isset($token["error"])){
        $client->setAccessToken($token["access_token"]);
        //menginisiasikan google service oauth2
        $service = new Google_Service_Oauth2($client);
        $profile = $service->userinfo->get();

        //menampung data respon dari akun google
        $g_name     = $profile["name"];
        $g_email    = $profile["email"];
        $g_id       = $profile["id"];
        $currtime   = date('y-m-d h:i:s');

        //mengupdate data ke database jika data sudah ada, kalau belum maka akan ditambahkan
        $query_check = 'select * from users where oauth_id = "'.$g_id.'"';
        $run_query_check = mysqli_query($conn, $query_check);
        $d = mysqli_fetch_object($run_query_check);

        if($d){
            $query_update = 'update users set fullname = "'.$g_name.'", email = "'.$g_email.'", last_login = "'.$currtime.'" where oauth_id = "'.$g_id.'"';
            $run_query_update = mysqli_query($conn, $query_update);
        }else{
            $query_insert = 'insert into users (fullname, email, oauth_id, last_login) value("'.$g_name.'", "'.$g_email.'", "'.$g_id.'", "'.$currtime.'")';
            $run_query_insert = mysqli_query($conn, $query_insert);
        }

        //daftarkan session
        $_SESSION['logged_in'] = true;
        $_SESSION['access_token'] = $token["access_token"];
        $_SESSION['uname'] = $g_name;
        $_SESSION['email'] = $g_email;
        $_SESSION['lastlogin'] = $currtime;

        header('location: index.php');
        exit(); 
    } else {
        echo "Login gagal";
    }
}

// Handle form submission
$error_message = ''; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $captchaAnswer = $_POST['jawaban'];
    $correctAnswer = $_POST['firstnum'] + $_POST['secondnum'];

    // Validate captcha
    if ($captchaAnswer != $correctAnswer) {
        $error_message = "Jawaban captcha salah. Silakan coba lagi.";
    } else {
        // Validate NIM and password
        $query_check = 'SELECT * FROM users WHERE fullname = "'.$fullname.'" AND password = "'.$password.'"';
        $run_query_check = mysqli_query($conn, $query_check);
        $user = mysqli_fetch_object($run_query_check);

        if ($user) {
            $_SESSION['logged_in'] = true;
            $_SESSION['uname'] = $user->fullname;
            $_SESSION['email'] = $user->email;
            $_SESSION['lastlogin'] = $user->last_login;

            header('location: index.php');
            exit(); 
        } else {
            $error_message = "Login gagal. Fullname atau password salah.";
        }
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
        <?php include "style/style.css" ?>
    </style>
    <link rel="icon" type="image/x-icon" href="https://fe.unj.ac.id/wp-content/uploads/2019/07/cropped-Logo-unj.png">
</head>
<body>
    <div class="container mt-5 container-left">
        <div class="row">
            <div class="col-md-0">
                <h2>Login <span style="color: #478fca;">Siakad</span></h2>
                <h3>Universitas Negeri Jakarta</h3>
                <div class="box bg-light p-8">
                    <div class="silakan">
                        <h4>Silakan Login</h4>
                    </div>
                    <?php
                        $minnum = 1;
                        $maxnum = 9;
                        $randnum1 = mt_rand($minnum, $maxnum);
                        $randnum2 = mt_rand($minnum, $maxnum);
                    ?>
                    <form method="POST" action="">
                        <div class="user Fullname">
                            <input type="text" placeholder="Fullname" name="fullname">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="user">
                            <input type="text" placeholder="Password" name="password">
                            <i class="fa fa-lock"></i>
                        </div>
                        <p>Pertanyaan keamanan <span style="color: rgb(198, 0, 0)">*</span></p>
                        
                        <div class="soal" style="text-align: left; color: white;">
                            <?php
                                echo 'Hitung ' . $randnum1 . '+' . $randnum2 . '?';
                            ?>
                            <input type="hidden" name="firstnum" value="<?php echo $randnum1;?>"/>
                            <input type="hidden" name="secondnum" value="<?php echo $randnum2;?>"/>
                        </div>
                        <div class="user captcha">
                            <input type="text" placeholder="Jawaban" name="jawaban" id="jawaban">
                            <i class="fa fa-pencil"></i>
                        </div>
                        <div class="masuk">
                            <div class="login">
                                <button type="submit" id="loginbtn"><i class="fa fa-key"></i>Login</button>
                            </div>
                            <a href="<?php echo $client->createAuthUrl();?>">
                                <img src="assets/img/google_btn.png" alt="button google" width="184px">
                            </a>
                        </div>
                    </form>
                    <?php
                    if (!empty($error_message)) {
                        echo '<div class="error-message">' . $error_message . '</div>';
                    }
                    ?>
                    <br>
                    <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="register.php" class="ml-2">Sign Up</a>
                    </div>
                </div>
                <div class="forgot mt-0">
                    <a><i class="fa fa-arrow-left"></i> Lupa Password?</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 container-right">
        <div class="row">
        <div class="col-md-12">
            <h2><i class="fa fa-bullhorn"></i> <span style="color: #478fca;">Info akademik:</span></h2>
            <h3>Sistem Informasi Akademik (SIAKAD)</h3>
            <div class="info">
                <div class="kalender">
                    <embed src="assets/kalenderakademik.pdf" type="application/pdf" width="100%" height="800">
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
