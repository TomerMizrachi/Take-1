<?php
include 'db.php';

session_start();

//$_SESSION["user_id"] = NULL;


if (!empty($_GET["logout"])) {
    // echo "logout condition";
    
    $_SESSION["user_id"] = NULL;
}

if (!isset($_SESSION["user_id"])) {
    $varJs = 'out';
} else { $varJs = 'in';}

if (!empty($_POST["mail"])) {
    
    $query = "SELECT * FROM tbl_users_208 WHERE email='"
        . $_POST["mail"]
        . "' and password = '"
        . $_POST["psw"]
        . "'";


    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);


    if (is_array($row)) {
        $_SESSION["user_id"] = $row['user_id'];

        $_SESSION["type"] = $row['type'];
        $_SESSION["name"]= $row['name'];       
        header('Location:index.php');
    } else {
        $messase = "Invalid Username or password!";
    }
}


?>


<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./includes/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="icon" href="./images/favicon-16x16.png" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" action="index.php" method="post">
                            <div class="form-group">
                                <label for="email"></span> Email address</label>
                                <input type="email" class="form-control" name="mail" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="psw"></span> Password</label>
                                <input type="password" class="form-control" name="psw" placeholder="Enter password">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember" value="1" checked>Remember me</label>
                            </div>
                            <div class="error-message"><?php if (isset($messase)) {
                                                            echo $messase;
                                                        } ?></div>
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <p>Not a member? <a href="#">Sign Up</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a href="#" class="navbar-brand"><img class="logo" src="./images/take1.png" alt="take1" border="0"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <i class="fas fa-home"></i>
                    <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <i class="far fa-envelope"></i>
                    <a class="nav-link" href="#">Inbox</a>
                </li>
                <li class="nav-item">
                    <i class="fas fa-book-reader"></i>
                    <a class="nav-link" href="#">Library</a>
                </li>
                <li class="nav-item">
                    <i class="fas fa-upload"></i>
                    <a class="nav-link" href="./add-aud.php">Publish</a>
                </li>
                <li class="nav-item">
                    <i class="fas fa-cog"></i>
                    <a class="nav-link" href="#">Setting</a>
                </li>
                <li class="nav-item">
                    <i class="fas fa-door-open"></i>
                    <a class="nav-link" href="./index.php?logout=true">logout</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary btn-lg active" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="menu">
        <nav class="nav nav-pills nav-justified">
            <a class="nav-item nav-link active" href="#">TV</a>
            <a class="nav-item nav-link" href="#">MOVIES</a>
            <a class="nav-item nav-link" href="#">COMMERCIAL</a>
            <a class="nav-item nav-link" href="#">THEATER</a>
            <a class="nav-item nav-link" href="#">MUSICALS</a>
            <a class="nav-item nav-link" href="#">OTHER</a>
        </nav>
    </div>
    <main>
        <div class="wrapper">
            <h3 id="welcome">Hello <?php  echo $_SESSION["name"]; ?></h3>
            <?php

            $query_posts = "SELECT * FROM tbl_posts_208 WHERE publish_to='"
                . $_SESSION["type"] ."'";
            
            $model = mysqli_query($connection, $query_posts);
            

            if (!$model) {
                die("DB query_posts Failed");
            }

            echo "<ul class='list-unstyled'>";
            
            while ($row = mysqli_fetch_assoc($model)) {
                echo "<li class='media'>
                <div class= 'media-body'>
                <h5 clas s ='mt-0 mb-1'>".$row['publisher_name']." - ".$row['proj_name']."</h5>
                <p  class='mediaP'>
                ".$row['description']."
                </p>
                </div>
                <a href='./tomorow.php?post_id= ". $row['post_id']." ' id = 'ind-but' class='btn btn-secondary btn- l g active' rol e ='butto n ' aria - pressed='true'>More
                 Details</a>
                </li>";
                
            }

            echo "</ul>";


            mysqli_close($connection);

            
            ?>
        </div>
    </main>
     <footer>
    </footer>
    <?php

    if($varJs == "out"){
        echo '    <script>
    console.log("logout");
        $("#myModal").modal();
</script>';
    }
    ?>

</body>

</html>