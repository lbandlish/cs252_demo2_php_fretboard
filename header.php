<?php 
    session_start();
?>

<html>
    <head>
        <title>FRETBOARD MASTERY</title>
        <!-- <title>FRETBOARD'S A BOILING PLATE</title> -->
        <link rel="stylesheet" type="text/css" href="styles/style1.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>

    <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <a class="navbar-brand" href="/index.php">FRETBOARD MASTERY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapsingNavbar"> -->


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/index.php">FRETBOARD MASTERY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <!-- <a class="nav-link" href="/users/learner.php">Home <span class="sr-only">(current)</span></a>
            </li>
            </ul> -->
            <!-- <form class="form-inline my-2 my-lg-0" action="/includes/dologout.php" method="post">
            <button class="btn btn-success" type="submit" name="logout-submit">Logout</button>
            </form> -->

            <!-- <form class="form-inline my-2 my-lg-0" action="/includes/dologin.php" method="post">

            <select name="role" class="nav-item dropdown">
            <option value="learner">Learner</option>
            <option value="maestro">Maestro</option>
            <option value="admin">Admin</option>
            </select> 

            <input class="form-control mr-sm-2" type="text" name="email" placeholder="Email">
            <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password"> 
            <button class="btn btn-success" type="submit" name="login-submit">Login</button> 
        
            </form>

            <form class="form-inline my-2 my-lg-0" action="signup.php" method="post" >
            <button class="btn btn-success" type="submit" name="signup-submit"> Signup </button>
            </form>

        </div>
        </nav> -->

    
        <?php 

        if (isset($_SESSION['uid'])) {

            echo '
            <a class="nav-link" href="/users/'.$_SESSION['role'].'.php">Home <span class="sr-only">(current)</span></a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/includes/dologout.php" method="post">
            <button class="btn btn-success" type="submit" name="logout-submit">Logout</button>
            </form>';
      
            // echo '<li class="nav-item active">
            // <a class="nav-link" href="/users/'.$_SESSION['role'].'.php">Home <span class="sr-only">(current)</span></a>
            // </li>
            // </ul>
            // <ul class="navbar-nav mr-auto>
            // <li class="nav-item active"><form class="form-inline my-2 my-lg-0" action="/includes/dologout.php" method="post">
            // <button class="btn btn-success" type="submit" name="logout-submit">Logout</button>
            // </form></li>';
        
        } else {
            
            echo '
            <a class="nav-link hidden" style="opacity: 0.0" href="/users/'.$_SESSION['role'].'.php">Home <span class="sr-only">(current)</span></a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/includes/dologin.php" method="post">

            <select name="role" class="nav-item dropdown">
            <option value="learner">Learner</option>
            <option value="maestro">Maestro</option>
            <option value="admin">Admin</option>
            </select> 

            <input class="form-control mr-sm-2" type="text" name="email" placeholder="Email">
            <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password"> 
            <button class="btn btn-success" type="submit" name="login-submit">Login</button> 
        
            </form>

            <pre> . </pre>
            OR
            <pre> . </pre>
 

            <form class="form-inline my-2 my-lg-0" action="signup.php" method="post" >
            <button class="btn btn-success" type="submit" name="signup-submit"> Signup </button>
            </form>';


            // echo '<li><form class="form-inline my-2 my-lg-0" action="/includes/dologin.php" method="post">

            // <select name="role" class="nav-item dropdown">
            // <option value="learner">Learner</option>
            // <option value="maestro">Maestro</option>
            // <option value="admin">Admin</option>
            // </select> 

            // <input class="form-control mr-sm-2" type="text" name="email" placeholder="Email">
            // <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password"> 
            // <button class="btn btn-success" type="submit" name="login-submit">Login</button> 
        
            // </form></li>
            
            // <li class="nav-item">OR</li>

            // <li><form class="form-inline" action="signup.php" method="post" ></li>
   
            // <li><button class="btn btn-success" type="submit" name="signup-submit"> Signup </button>
            // </form></li>';

        }
        
        ?>
        </div>
        </nav>
    <!-- <h1>FRETBOARD'S A BOILING PLATE</h1> -->


