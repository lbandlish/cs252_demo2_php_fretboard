<?php 

require 'setup.php';

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
    header("Location: ../index.php?role=unidentified1");
    exit();
}

if (empty($email) || empty($pwd) || empty($role)) {
    echo "<h1> Dilbar </h1>";
    header("Location: ../index.php?error=emptyfields");
    exit();
}

else {
    $sql = "SELECT * FROM {$table} WHERE email=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    } else {

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $pwdCheck = password_verify($pwd, $row['pwd']);

            if ($pwdCheck == true) {
                session_start();
                $_SESSION['uid'] = $row['uid'];
                

                if ($role == 'learner') {

                    $_SESSION['role'] = 'learner';
                    header("Location: ../users/learner.php");
                
                } else if ($role == 'maestro') {

                    $_SESSION['role'] = 'maestro';
                    header("Location: ../users/maestro.php");
                
                } else if ($role == 'admin') {
                
                    $_SESSION['role'] = 'admin';
                    header("Location: ../users/admin.php");
                
                } else {

                    header("Location: ../index.php?role=unidentified2");
                }
                exit();

            } else {
                header("Location: ../index.php?error=wrongpwd");
                exit();
            }

        } else {
            header("Location: /index.php?error=unregisteredemail");
            exit();
        }
    }
}
