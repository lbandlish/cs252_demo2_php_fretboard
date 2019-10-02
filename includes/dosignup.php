<?php 

require 'setup.php';

$name = $_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$role = $_POST['role'];

if ($role == 'maestro') {
    $table = 'maestro';
} else if ($role == 'learner') {
    $table = 'learner';
} else if ($role == 'admin') {
    $table = 'admin';
} else {
    header("Location: ../signup.php?error=emptyrole");
}

if (empty($email) || empty($pwd) || empty($role)) {
    header("Location: ../signup.php?error=emptyfields");
    exit();
} /* else if () {

 }*/ else {
    $sql = "SELECT uid FROM {$table} WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck > 0) {
            header("Location: ../signup.php?error=usertaken");
            exit();
        } else {
            $sql = "INSERT INTO {$table}(name, email, pwd) VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();
            } else {
                $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hash_pwd);
                mysqli_stmt_execute($stmt);

                header("Location: ../index.php?signup=success");
                exit();
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}