<?php 

require '../header.php';
require '../includes/setup.php';
require 'usersheader.php';

?>

<br><br>

<h1> Add new Tutorial </h1>

<form action="do_add_tut.php" method="post">
<input type="text" name="title" placeholder="Title of Tutorial">
<input type="text" name="style" placeholder="Style/Technique">
<input type="url" name="link" placeholder="Tutorial url">
<button type="submit">Submit</button>
</form>

<br><br>

<h1> Edit previous tutorials </h1>

<form action="edit_tut.php" method="post">
<button type="submit">Edit tutorials</button>
</form>

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
        echo "<table class=' table table-condensed table-bordered table-striped '><tr><th></th><th>Title</th><th>Style</th><th>Link</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td></td><td>".$row['title']."</td><td>".$row['style']."</td><td><a href = ".$row['link'].">".$row['link']."</a></td></tr>";
        };
        echo "</table";



    } else {
        echo "No maestro data available";
    }
}
    require '../footer.php';
?>