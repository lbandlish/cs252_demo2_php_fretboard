<?php 

require '../header.php';
require '../includes/setup.php';
require 'usersheader.php';

$sql = "SELECT * FROM maestro";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../index.php?error=sqlerror");
    exit();

} else {

    echo "<h2> Maestro list </h2>";
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
        echo "<table class=' table table-condensed table-bordered table-striped '><tr><th>Name</th><th>Email</th><th>homepage</th><th>rating</th><th>Tutorials</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['homepage']."</td><td>".$row['rating']."</td><td><form method='post' action='show_maestro_tut.php'><button type='submit' name='show_maestro_tut' value='".$row['uid']."' >Show tutorials</button></form></tr>";
        };
        echo "</table>";

    } else {
        echo "No maestro data currently present.";
    }
}

$sql2 = "SELECT * FROM tutorials, maestro WHERE tutorials.maestro_uid = maestro.uid";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql2)) {
    header("Location: ../index.php?error=sqlerror");
    exit();

} else {

    mysqli_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2><h2> Tutorial List </h2></h2>";

        echo "
        <style>
            table, th, td {
            border: 1px solid black;
        }
        </style>
        ";
        echo "
        <table class=' table table-condensed table-bordered table-striped '><tr><th>Maestro Name</th><th>Title</th><th>Style</th><th>Link</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['name']."</td><td>".$row['title']."</td><td>".$row['style']."</td><td><a href = ".$row['link'].">".$row['link']."</a></td></tr>";
        };
        echo "</table>";

    } else {
        echo "No maestro data currently present.";
    }
}


?>


<?php
    require '../footer.php';
?>