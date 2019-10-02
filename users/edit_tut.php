<?php 

require '../header.php';
require '../includes/setup.php';
require 'usersheader.php';

?>

<a href='maestro.php'>Back to maestro home</a>

<h1>Edit previous tutorials</h1>

<?php 
$sql = "SELECT tutorials.uid, title, style, link FROM maestro, tutorials WHERE maestro.uid = tutorials.maestro_uid AND maestro.uid = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: /index.php?error=sqlerror");
    exit();

} else {

    mysqli_stmt_bind_param($stmt, "s", $_SESSION['uid']);
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
        echo "<table class=' table table-condensed table-bordered table-striped '><tr><th></th><th>Title</th><th>Style</th><th>Link</th><th>Submit</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><form action='do_edit_tut.php' method='post'>
            <td><input type='hidden' name='uid' value='".$row['uid']."' >
            </td><td><input type='text' name='title' value='".$row['title']."'></td>
            <td><input type='text' name='style' value='".$row['style']."'></td>
            <td><input type='url' name='link' value='".$row['link']."'></td>
            <td><button type='submit'>Submit</button></form></tr>";
        };
        echo "</table";



    } else {
        echo "You haven't uploaded any tutorials";
    }
}
    require '../footer.php';
?>