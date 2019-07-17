<?php 
include 'db.php';


// var_dump($_GET['post_id']);

if (isset($_GET['post_id'])) {
    $id = $_GET['post_id'];
    $to_show = "SELECT * FROM tbl_posts_208 WHERE post_id = " . $_GET['post_id'];
    $show_res = mysqli_query($connection,$to_show);
    $row_show = mysqli_fetch_assoc($show_res);
}
// var_dump($row_show);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Audition Deatiles</title>
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
    <main class="info-text">
    <h3><?php echo $row_show["proj_name"] ?></h3>
        <article class="audition-text">
            <?php echo $row_show["description"] ?>
            <br><br>
            DIRECTOR: <?php echo $row_show["publisher_name"] ?>
            <br><br>
        </article>
        <section id="options">
            <a href="./index.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">&nbsp;
                &nbsp; &nbsp; Back &nbsp; &nbsp; &nbsp;</a>
            <a href="./saved.php?post_id=<?php echo $id  ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Save
                audition</a>
            <a href="#" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Take audition</a>
        </section>
    </main>
    <footer>
    </footer>
</body>

</html>