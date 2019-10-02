<?php

require '../includes/setup.php';
session_start();

if ($_SESSION['role'] != 'maestro') {
    header("Location: /index.php?error=rolenotmaestro");
    exit();
}

if (!isset($_SESSION['uid'])) {
    header("Location: /index.php?error=uidnotset");
    exit();
}

$maestro_uid = $_SESSION['uid'];
$title = $_POST['title'];
$style = $_POST['style'];
$link = $_POST['link'];

if (empty($link)) {
    header("Location: maestro.php?error=emptylink");
    exit();
} else {
    $sql = "INSERT INTO tutorials(maestro_uid, title, style, link) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: maestro.php?error=sqlerror");
        exit();

    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $maestro_uid, $title, $style, $link);
        mysqli_stmt_execute($stmt);

        header("Location: maestro.php?add_tut=success");
        exit();    
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}