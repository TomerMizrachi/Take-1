<?php
include 'db.php';


session_start();

$_SESSION["name"] = $_POST["p_n"];
$_SESSION["p_name"] = $_POST["pro_n"];
$_SESSION["publish_to"] = $_POST["Publish_to"];
$_SESSION["des"] = $_POST["description"];

$fn =  $_SESSION["name"];
$pn = $_SESSION["p_name"];
$p_t = $_SESSION["publish_to"];
$des = $_SESSION["des"];

$q_insert_post = "INSERT INTO `tbl_posts_208` (`post_id`, `publisher_name`, `publish_to`, `proj_name`, `description`) VALUES (NULL, '$fn', '$p_t', '$pn', '$des')";
var_dump($q_insert_post);

$p_res = mysqli_query($connection, $q_insert_post);
  var_dump($p_res);

if (!isset($p_res)) {
    die("DB query_posts Failed");
}


$id_query = "SELECT * FROM tbl_posts_208 WHERE publisher_name='$fn' AND proj_name = '$pn' ";

$id_q_res = mysqli_query($connection, $id_query);

if (!$id_q_res) {
    die("DB query_posts Failed");
}

$row = mysqli_fetch_assoc($id_q_res);

$id = $row['post_id'];

// $delete_q = "DELETE FROM tbl_posts_208 WHERE id_post = '$id'";

// $delete_res =  mysqli_query($connection,$delete_q);


mysqli_close($connection);





?>
<!DOCTYPE html>
<html>

<head>
    <title>Added</title>
    <link rel="stylesheet" href="./includes/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="icon" href="./images/favicon-16x16.png" type="image/x-icon">

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

    <main class="info-text">
        <h3><?php echo $pn ?></h3>
        <article class="audition-text">
            <?php echo $des ?>
            <br><br>
            DIRECTOR: <?php echo $fn ?>
            <br><br>
        </article>
        <section id="options">
            
            <a href="./edit.php?edit_id=<?php echo $id  ?>" class=" btn btn-secondary btn-lg active" role="button" aria-pressed="true">Edit audition</a>
            <a href="./delete_aud_db.php" class=" btn btn-secondary btn-lg active" role="button" aria-pressed="true">delete</a>
        </section>
    </main>

    <footer></footer>


</body>

</html>