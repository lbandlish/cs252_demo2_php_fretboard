<?php

    require 'header.php';

?>

<html>
    <head>
        <title> Signup </title>
    <body style="text-align: center">
        <h1> Signup </h1>
        <form action="includes/dosignup.php" method="post">

            <select name="role">
            <option value="learner">Learner</option>
            <option value="maestro">Maestro</option>
                <!-- <option value="admin">Admin</option> -->
            </select>

            <input type="text" name="name" placeholder="Full Name">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="signup-submit">Signup</button>
        </form>
</body>
</html> 