<?php
    session_start();

    if (!isset($_SESSION["logged_in"])){
        header("location: login.php");
    }

    $background = "assets/img/up.jpg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siakad UNJ</title>
    <link rel="stylesheet" href="style/style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        <?php include "style/style3.css" ?>
    </style>
    <link rel="icon" type="image/x-icon" href="https://fe.unj.ac.id/wp-content/uploads/2019/07/cropped-Logo-unj.png">
</head>
<body>
    <!-- navbar start -->
    <nav>
        <div class="logo">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <h2>SIAKAD UNJ - Admin</h2>
        </div>

        <div class="container">
            <p>Welcome,<Br><span style="font-size: 13px;"><?= $_SESSION['uname']?></span></p>
            <a href="login.php" style="color: white;"><i class="fa fa-sign-out" style="font-size: 16px;" aria-hidden="true"></i></a>
        </div>
    </nav>
    <div class="content">
        <div class="left">
            <div class="bar shortcut">
                <div class="box hijau">
                    <i class="fa fa-signal"></i>
                </div>
                <div class="box biru">
                    <i class="fa fa-pencil"></i>
                </div>
                <div class="box jingga">
                    <i class="fa fa-users"></i>
                </div>
                <div class="box merah" style="background: ;">
                    <i class="fa fa-cogs"></i>
                </div>
            </div>
            <a href="index.php" class="bar a home">
                <i class="fa fa-home"></i>
                <p>Home</p>
                <i class="fa fa-caret-left"></i>
            </a>
            <a href="users.php" class="bar a">
                <i class="fa fa-list-alt"></i>
                <p>Kelola Users</p>
            </a>
            <div class="bar hide">
                <div class="line"></div>
                <div class="bulat">
                    <i class="fa fa-angle-double-left" style="text-align: left; font-size: 14px; padding-left: 3px;"></i>
                </div>
                <div class="line"></div>
            </div>
            <div class="bar empty"></div>
            <div>
                <form method="POST" action="logout.php">
                    <button type="submit" class="logoutbutton">Log Out</button>
                </form>
            </div>
        </div>

        <div class="right">
            <div class="location">
                <i class="fa fa-home"></i>
                <a href="#">Home</a>
                <i class="fa fa-angle-right"></i>
            </div>
            <div >
                <h1>Welcome, Adm.  <?= $_SESSION['uname']?></h1>
            </div>
        </div>
    </div>
</body>
</html>
