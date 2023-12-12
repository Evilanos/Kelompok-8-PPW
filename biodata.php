<?php
    session_start();

    if (!isset($_SESSION["logged_in"])) {
        header("location: login.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['noreg'] = $_POST['noreg'];
        $_SESSION['dob'] = $_POST['dob'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['phone'] = $_POST['phone'];

        header("location: index.php");
    }

    $background = "assets/img/up.jpg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siakad UNJ - Biodata</title>
    <link rel="stylesheet" href="style/style6.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        <?php include "style/style6.css" ?>
    </style>
    <link rel="icon" type="image/x-icon" href="https://fe.unj.ac.id/wp-content/uploads/2019/07/cropped-Logo-unj.png">
</head>
<body>
    <nav>
        <div class="logo">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <h2>SIAKAD UNJ - Mahasiswa</h2>
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
            <a href="index.php" class="bar a">
                <i class="fa fa-home"></i>
                <p>Home</p>
            </a>
            <a href="krs.php" class="bar a">
                <i class="fa fa-list-alt"></i>
                <p>Kartu Rencana Studi</p>
            </a>
            <a href="khs.php" class="bar a">
                <i class="fa fa-university"></i>
                <p>Kartu Hasil Studi</p>
            </a>
            <a href="biodata.php" class="bar a home">
                <i class="fa fa-book"></i>
                <p>Biodata</p>
                <i class="fa fa-caret-left"></i>
            </a>
            <div class="bar hide">
                <div class="line"></div>
                <div class="bulat">
                    <i class="fa fa-angle-double-left" style="text-align: left; font-size: 14px; padding-left: 3px;"></i>
                </div>
                <div class="line"></div>
            </div>
            <div class="bar empty">
            </div>
        </div>

        <div class="right">
            <div class="location">
                <i class="fa fa-home"></i>
                <a href="#">Home</a>
                <i class="fa fa-angle-right"></i>
            </div>

            <div>
                <h1>Complete Your Biodata</h1>
                <form method="POST" action="">
                    <label for="name">Name:</label>
                    <input type="text" name="name" required>

                    <label for="noreg">No. Registration:</label>
                    <input type="text" name="noreg" required>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" required>

                    <label for="email">Email:</label>
                    <input type="email" name="email" required>

                    <label for="phone">Phone:</label>
                    <input type="tel" name="phone" required>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
