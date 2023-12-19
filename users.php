<?php
    session_start();

    if (!isset($_SESSION["logged_in"])){
        header("location: login.php");
    }

    $background = "assets/img/up.jpg";
?>

<?php
    $conn = mysqli_connect("localhost", "root", "", "google");
    $data = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siakad UNJ</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <a href="users.php" class="bar a  home">
                <i class="fa fa-list-alt"></i>
                <p>Kelola Users</p>
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
            
            <div class="content">
                <h1 class="text-center">Database Mahasiswa/i UNJ</h1>
                <div class="table-container">
                <a class = "create" href="createdata.php" style="float: right; margin-right: 20px;">Create</a>
                    <table border="1" cellspacing="0" cellpadding="15">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Oauth_id</th>
                            <th>Last Login</th>
                            <th>Created At</th>
                        </tr>
                        <?php
                        while ($baris = mysqli_fetch_assoc($data)):
                        ?>
                            <tr>
                                <td><?= $baris["userid"]; ?></td>
                                <td><?= $baris["fullname"]; ?></td>
                                <td><?= $baris["email"]; ?></td>
                                <td><?= $baris["password"]; ?></td>
                                <td><?= $baris["oauth_id"]; ?></td>
                                <td><?= $baris["last_login"]; ?></td>
                                <td><?= $baris["created_at"]; ?></td>
                                <td>
                                    <a class ="button" href="javascript:void(0)" onclick="deleteRecord(<?= $baris["userid"]; ?>)">Hapus/</a> 
                                    <a class= "button" href="editdata.php?userid=<?= $baris["userid"]; ?>">Edit</a>
                                </td>
                            </tr>
                        <?php endwhile;
                        mysqli_close($conn);
                        ?>
                    </table>
                    <script>
                    function deleteRecord(id) {
                        if (confirm("Are you sure you want to delete this record?")) {
                            $.ajax({
                                url: 'deletedata.php',
                                type: 'POST',
                                data: { id: id },
                                success: function (response) {
                                    if (response === "success") {
                                        location.reload();
                                    } else {
                                        alert('Failed to delete the record. Try again.');
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.log(xhr.responseText);
                                    alert('Error occurred: ' + error);
                                }
                            });
                        }
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>