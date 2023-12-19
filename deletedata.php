<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $conn = mysqli_connect("localhost", "root", "", "google");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "DELETE FROM users WHERE userid = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "success";
    } else {
        echo "error";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "ID not provided.";
}
?>
