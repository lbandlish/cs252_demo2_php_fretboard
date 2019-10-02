<?php 

require '../header.php';
require '../includes/setup.php';
require 'usersheader.php';

?>

<h2> Set Maestro Ratings </h2>

<?php 

$sql = "SELECT * FROM maestro";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../index.php?error=sqlerror");
    exit();

} else {

    // echo "<h2> Maestro list </h2>";
    mysqli_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        echo "
        <style>
            table, th, td {
            border: 1px solid black;
        }
        </style>
        ";
        echo "<table class=' table table-condensed table-bordered table-striped '><tr><th></th><th>Name</th><th>Email</th><th>homepage</th><th>rating</th><th>Submit</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr><form action='do_edit_rating.php' method='post'>
            <td><input type='hidden' name='uid' value='".$row['uid']."' >
            </td><td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['homepage']."</td>
            <td><input type='number' name='rating' value='".$row['rating']."'>
            <td><button type='submit'>Submit</button></form></tr>";
        };
        echo "</table>";

    } else {
        echo "No maestro data currently present.";
    }
}

require '../footer.php';
?>
