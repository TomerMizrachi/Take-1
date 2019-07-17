<?php
include 'db.php';

session_start();

// var_dump($_GET['edit_id']);

if (isset($_GET['edit_id'])) {
    $to_edit_q = "SELECT * FROM tbl_posts_208 WHERE post_id = " . $_GET['edit_id'];
    $edit_res = mysqli_query($connection, $to_edit_q);
    $row = mysqli_fetch_assoc($edit_res);
}
if (isset($_POST['update'])) {
    $_SESSION["name"] = $_POST["p_n"];
    $_SESSION["p_name"] = $_POST["pro_n"];
    $_SESSION["publish_to"] = $_POST["Publish_to"];
    $_SESSION["des"] = $_POST["description"];

    $fn =  $_SESSION["name"];
    $pn = $_SESSION["p_name"];
    $p_t = $_SESSION["publish_to"];
    $des = $_SESSION["des"];

    $update ="UPDATE tbl_posts_208 SET 
    publisher_name = '$fn' ,
    publish_to = '$p_t',
    proj_name = '$pn' ,
    description = '$des' WHERE post_id = ". $_GET['edit_id'];

    $up = mysqli_query($connection, $update);
}


if (!isset($to_edit_q)) {
    die("DB query_posts Failed". mysqli_connect_error());
} 


// $fn =  $_SESSION["name"];
// $pn = $_SESSION["p_name"];
// $p_t = $_SESSION["publish_to"];
// $des = $_SESSION["des"];
// $q_insert_post = "INSERT INTO tbl_posts_208 (
//         `post_id` ,
//         `publisher_name` ,
//         `publish_to` ,
//         `proj_name` ,
//         `description`
//         )
//         VALUES (
//         NULL ,  '$fn' ,  '$p_t' ,  '$pn' ,  '$des'
//         )";


// $p_res = mysqli_query($connection, $q_insert_post);
// //  var_dump($p_res);

// if (!$p_res) {
//     die("DB query_posts Failed");
// }




mysqli_close($connection);


?>
<!DOCTYPE html>
<html>

<head>
    <title>edit</title>
    <link rel="stylesheet" href="./includes/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="icon" href="./images/favicon-16x16.png" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("input").focus(function() {
                $(this).css("background-color", "#cccccc");
            });
            $("input").blur(function() {
                $(this).css("background-color", "#ffffff");
            });
        });
    </script>

</head>

<body>
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
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary btn-lg active" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <main class="my-form">
        <form action="get_params_audition.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Publisher Name</label>
                    <input type="text" required class="form-control" placeholder="Publisher Name" name="p_n" value="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Project Name</label>
                    <input type="text" required class="form-control" placeholder="Project Name" name="pro_n" value="">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Publish To:</label>
                    <select id="inputState" class="form-control" name="Publish_to">
                        <option selected>Choose...</option>
                        <option>Actors</option>
                        <option>Directors</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Description</label>
                    <textarea class="form-control" required rows="5" cols="20" placeholder="Description" name="description" value=""></textarea>
                </div>
            </div>
            <!-- <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Deadline</label>
                    <input type="date" required class="form-control" placeholder="Deadline" name="deadline" value="">
                </div>
            </div> -->
            <input class="btn btn-secondary btn-lg active" type="submit" name="update" value="Edit Audition">
        </form>
    </main>
    <footer></footer>
</body>

</html>