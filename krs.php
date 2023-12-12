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
    <link rel="stylesheet" href="style/style5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        <?php include "style/style5.css" ?>
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
            <a href="krs.php" class="bar a home">
                <i class="fa fa-list-alt"></i>
                <p>Kartu Rencana Studi</p>
                <i class="fa fa-caret-left"></i>
            </a>
            <a href="khs.php" class="bar a">
                <i class="fa fa-university"></i>
                <p>Kartu Hasil Studi</p>
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

        <div class="right">
            <div class="location">
                <i class="fa fa-home"></i>
                <a href="#">Home</a>
                <i class="fa fa-angle-right"></i>
            </div>
            
            <div class="content">
                <h1 class="text-center">Kartu Rencana Studi</h1>
                <div class="table-container">
                    <table border="1" cellspacing="0" cellpadding="15">
                        <tr>
                            <th>No</th>
                            <th>KELAS</th>
                            <th>KODE MK</th>
                            <th>NAMA MK</th>
                            <th>SKS</th>
                            <th>DOSEN</th>
                            <th>LOKASI</th>
                            <th>WAKTU</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1000000009</td>
                            <td>00051122</td>
                            <td>Pendidikan Pancasila</td>
                            <td>2</td>
                            <td>Tjipto Sumadi</td>
                            <td>Ruang :<br>Ruang :</td>
                            <td>Selasa, Waktu : Jam VIII (15:00:00 sd 15:50:00),<br>Selasa, Waktu : Jam IX (16:00:00 sd 16:50:00)</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>1000000233</td>
                            <td>00051142</td>
                            <td>Bahasa Indonesia</td>
                            <td>2</td>
                            <td>Venus Khasanah</td>
                            <td>Ruang :<br>Ruang :</td>
                            <td>Rabu, Waktu : Jam I (08:00:00 sd 08:50:00)<br>Rabu, Waktu : Jam II (09:00:00 sd 09:50:00)</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>1313600001</td>
                            <td>31451033</td>
                            <td>Kalkulus Differensial</td>
                            <td>3</td>
                            <td>Tri Murdiyanto<br>Anny Sovia</td>
                            <td>RA. Sartika Ruang : GDS608<br>RA. Sartika Ruang : GDS608<br>RA. Sartika Ruang : GDS608</td>
                            <td>Senin, Waktu : Jam III (10:00:00 sd 10:50:00)<br>Senin, Waktu : Jam IV (11:00:00 sd 11:50:00)<br>Senin, Waktu : Jam V (12:00:00 sd 12:50:00)</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>1313600002</td>
                            <td>30050052</td>
                            <td>Bahasa Inggris</td>
                            <td>2</td>
                            <td>Meiliasari</td>
                            <td>RA. Sartika Ruang : GDS608<br>RA. Sartika Ruang : GDS608</td>
                            <td>Senin, Waktu : Jam VI (13:00:00 sd 13:50:00)<br>Senin, Waktu : Jam VII (14:00:00 sd 14:50:00)</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>1313600003</td>
                            <td>31451133</td>
                            <td>Dasar-dasar Pemrograman</td>
                            <td>3</td>
                            <td>Ari Hendarno</td>
                            <td>RA. Sartika Ruang : GDS514-Lab Komputer<br>RA. Sartika Ruang : GDS514-Lab Komputer<br>RA. Sartika Ruang : GDS514-Lab Komputer</td>
                            <td>Selasa, Waktu : Jam III (10:00:00 sd 10:50:00)<br>Selasa, Waktu : Jam IV (11:00:00 sd 11:50:00)<br>Selasa, Waktu : Jam V (12:00:00 sd 12:50:00)</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>1313600004</td>
                            <td>30051121</td>
                            <td>Olimpisme</td>
                            <td>1</td>
                            <td>Lukman El Hakim</td>
                            <td>RA. Sartika Ruang : GDS507</td>
                            <td>Rabu, Waktu : Jam V (12:00:00 sd 12:50:00)</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>1313600005</td>
                            <td>31451143</td>
                            <td>Matematika Diskrit</td>
                            <td>3</td>
                            <td>Ria Arafiyah</td>
                            <td>RA. Sartika Ruang : GDS508<br>RA. Sartika Ruang : GDS508<br>RA. Sartika Ruang : GDS508</td>
                            <td>Rabu, Waktu : Jam VI (13:00:00 sd 13:50:00)<br>Rabu, Waktu : Jam VII (14:00:00 sd 14:50:00)<br>Rabu, Waktu : Jam VIII (15:00:00 sd 15:50:00)</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>1313600007</td>
                            <td>31451122</td>
                            <td>Pengantar TIK</td>
                            <td>2</td>
                            <td>Med Irzal</td>
                            <td>RA. Sartika Ruang : GDS515-Lab Komputer<br>RA. Sartika Ruang : GDS515-Lab Komputer</td>
                            <td>Jum'at, Waktu : Jam IV (11:00:00 sd 11:50:00)<br>Jum'at, Waktu : Jam V (12:00:00 sd 12:50:00)</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>1313600006</td>
                            <td>31451113</td>
                            <td>Statistika dan Probabilitas</td>
                            <td>3</td>
                            <td>Suyono<br>Fariani Hermin Indiyah</td>
                            <td>RA. Sartika Ruang : GDS507<br>RA. Sartika Ruang : GDS507<br>RA. Sartika Ruang : GDS507</td>
                            <td>Jum'at, Waktu : Jam I (08:00:00 sd 08:50:00)<br>Jum'at, Waktu : Jam II (09:00:00 sd 09:50:00)<br>Jum'at, Waktu : Jam III (10:00:00 sd 10:50:00)</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>