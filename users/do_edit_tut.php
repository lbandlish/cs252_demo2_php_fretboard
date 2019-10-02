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

$uid = $_POST['uid'];
$maestro_uid = $_SESSION['uid'];
$title = $_POST['title'];
$style = $_POST['style'];
$link = $_POST['link'];

if (empty($link)) {
    header("Location: maestro.php?error=emptylink");
    exit();
    
} else {
    $sql = "UPDATE tutorials SET title=?, style=?, link=? WHERE uid = ? AND maestro_uid = ?";
    // $sql = "UPDATE tutorials SET title=?, style=?, link=? WHERE uid = ?";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: edit_tut.php?error=sqlerror");
        exit();

    } else {
        mysqli_stmt_bind_param($stmt, "sssss", $title, $style, $link, $uid, $maestro_uid);
        // mysqli_stmt_bind_param($stmt, "ssss", $title, $style, $link, $uid);

        mysqli_stmt_execute($stmt);

        header("Location: edit_tut.php?edit_tut=success&uid={$uid}");
        exit();    
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}