<?php

$role = $_SESSION['role'];

if ($role == 'maestro') {
    $table = 'maestro';
} else if ($role == 'learner') {
    $table = 'learner';
} else if ($role == 'admin') {
    $table = 'admin';
} else {
    header("Location: ../index.php?role=unidentified1");
    exit();
}

$sql = "SELECT * FROM {$table} WHERE uid=?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../index.php?error=sqlerror");
    exit();

} else {

    mysqli_stmt_bind_param($stmt, "s", $_SESSION['uid']);
    mysqli_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>Hello {$row['name']}!</h2>";
    } else {
        header("Location: ../index.php?error=usernotfound");
    }
}

?>
