<?php 

require '../header.php';
require '../includes/setup.php';
require 'usersheader.php';

// $_SESSION['maestro_uid'] = $_POST['show_maestro_tut'];


echo "<a href='learner.php'>Back to learner home</a><br>";


$sql = "SELECT name FROM maestro WHERE uid = ?";
$stmt = mysqli_stmt_init($conn);



if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: /index.php?error=sqlerror");
} else {
    mysqli_stmt_bind_param($stmt, "s", $_POST['show_maestro_tut']);
    mysqli_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>{$row['name']}'s tutorials</h2>";
    } else {
        header("Location: ../index.php?error=usernotfound");
    }
}


$sql = "SELECT tutorials.uid, title, style, link FROM maestro, tutorials WHERE maestro.uid = tutorials.maestro_uid AND maestro.uid = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: /index.php?error=sqlerror");
    exit();

} else {

    mysqli_stmt_bind_param($stmt, "s", $_POST['show_maestro_tut']);
    mysqli_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        // echo "
        // <style>
        //     table, th, td {
        //     border: 1px solid black;
        // }
        // </style>
        // ";
        echo "<table class=' table table-condensed table-bordered table-striped '><tr><th>Title</th><th>Style</th><th>Link</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['title']."</td><td>".$row['style']."</td><td><a href = ".$row['link'].">".$row['link']."</a></td></tr>";
        };
        echo "</table";

    } else {
        echo "<h4>This maestro hasn't posted any tutorials yet.</h4>";

        // header("Location: learner.php?error={$_POST['show_maestro_tut']}");
    }
}
