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
    <link rel="stylesheet" href="style/style4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        <?php include "style/style4.css" ?>
    </style>
    <link rel="icon" type="image/x-icon" href="https://fe.unj.ac.id/wp-content/uploads/2019/07/cropped-Logo-unj.png">
</head>
<body>
    <!-- navbar start -->
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
            <a href="khs.php" class="bar a home">
                <i class="fa fa-university"></i>
                <p>Kartu Hasil Studi</p>
                <i class="fa fa-caret-left"></i>
            </a>
            <a href="biodata.php" class="bar a">
                <i class="fa fa-book"></i>
                <p>Biodata</p>
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

        <!-- right -->
        <div class="right">
            <div class="location">
                <i class="fa fa-home"></i>
                <a href="#">Home</a>
                <i class="fa fa-angle-right"></i>
            </div>
            
            <div class="content">
                <h1 class="text-center">Kartu Hasil Studi</h1>
                <div class="table-container">
                    <table border="1" cellspacing="0" cellpadding="15">
                        <tr>
                            <th>No</th>
                            <th>KELAS</th>
                            <th>KODE MK</th>
                            <th>NAMA MK</th>
                            <th>SKS</th>
                            <th>NILAI</th>
                            <th>BOBOT</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1000000009</td>
                            <td>00051122</td>
                            <td>Pendidikan Pancasila</td>
                            <td>2</td>
                            <td>B+</td>
                            <td>6.6</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>1000000233</td>
                            <td>00051142</td>
                            <td>Bahasa Indonesia</td>
                            <td>2</td>
                            <td>A</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>1313600001</td>
                            <td>31451033</td>
                            <td>Kalkulus Differensial</td>
                            <td>3</td>
                            <td>B+</td>
                            <td>9.9</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>1313600002</td>
                            <td>30050052</td>
                            <td>Bahasa Inggris</td>
                            <td>2</td>
                            <td>A-</td>
                            <td>7.4</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>1313600003</td>
                            <td>31451133</td>
                            <td>Dasar-dasar Pemrograman</td>
                            <td>3</td>
                            <td>B</td>
                            <td>9</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>1313600004</td>
                            <td>30051121</td>
                            <td>Olimpisme</td>
                            <td>1</td>
                            <td>A</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>1313600005</td>
                            <td>31451143</td>
                            <td>Matematika Diskrit</td>
                            <td>3</td>
                            <td>C+</td>
                            <td>6.9</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>1313600007</td>
                            <td>31451122</td>
                            <td>Pengantar TIK</td>
                            <td>2</td>
                            <td>A</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>1313600006</td>
                            <td>31451113</td>
                            <td>Statistika dan Probabilitas</td>
                            <td>3</td>
                            <td>B-</td>
                            <td>8.1</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>