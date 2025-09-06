<?php
try {
    $conn = mysqli_connect("localhost", "root", "", "blog_app_330");
    if (!$conn) {
        header("Location:../views/maintenance.php");
        exit;
    }
} catch (\Throwable $e) {
    header("Location:../views/maintenance.php");
    exit;
}
