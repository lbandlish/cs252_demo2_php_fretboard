<?php

require '../includes/setup.php';
session_start();

if ($_SESSION['role'] != 'admin') {
    header("Location: /index.php?error=rolenotmaestro");
    exit();
}

if (!isset($_SESSION['uid'])) {
    header("Location: /index.php?error=uidnotset");
    exit();
}

$uid = $_POST['uid'];
$rating = $_POST['rating'];

$sql = "UPDATE maestro SET rating=? WHERE uid = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: admin.php?error=sqlerror");
    exit();

} else {
    mysqli_stmt_bind_param($stmt, "ss", $rating, $uid);
    // mysqli_stmt_bind_param($stmt, "ssss", $title, $style, $link, $uid);

    mysqli_stmt_execute($stmt);

    header("Location: admin.php?edit_rating=success&uid={$uid}&rating={$rating}");
    exit();    
}

mysqli_stmt_close($stmt);
mysqli_close($conn);