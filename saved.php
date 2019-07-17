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
$auditions = file_get_contents("./includes/service.json");
$auditions = json_decode($auditions, true);
//  print_r( $auditions['My_Aud'][0]['name']);
// print_r(sizeof($auditions['My_Aud']));
?>
<!DOCTYPE html>
<html>

<head>
    <title>Your Auditions</title>
    <link rel="stylesheet" href="./includes/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
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
        <h3>YOUR AUDITIONS</h3>
        <div id="my-aud" class="list-group">
            <a href="./tomorow.php?id_post=<?php echo $id ?>" class="list-group-item list-group-item-action flex-column align-items-start active">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $row_show["proj_name"] ?></h5>
                    <small>now</small>
                </div>
                <p class="mb-1"><?php echo $row_show["description"] ?> </p>
                <small><?php echo $row_show["publisher_name"] ?></small>
            </a>
            <?php 
            
            for($i=0 ; 2 > $i; $i++ ){
                echo " <a href='#' class='list-group-item list-group-item-action flex-column align-items-start'>
                <div class='d-flex w-100 justify-content-between'>
                    <h5 class='mb-1'>". $auditions['My_Aud'][$i]['name'] ."</h5>
                    <small class='text-muted'>1 day ago</small>
                </div>
                <p class='mb-1'>". $auditions['My_Aud'][$i]['des']."</p>
                <small class='text-muted'> ". $auditions['My_Aud'][$i]['director']."</small>
            </a> ";
            }
            for($i=2 ; sizeof($auditions['My_Aud']) > $i; $i++ ){
                echo " <div class='hide'> <a  href='#' class='list-group-item list-group-item-action flex-column align-items-start'>
                <div class='d-flex w-100 justify-content-between'>
                    <h5 class='mb-1'>". $auditions['My_Aud'][$i]['name'] ."</h5>
                    <small class='text-muted'>1 day ago</small>
                </div>
                <p class='mb-1'>". $auditions['My_Aud'][$i]['des']."</p>
                <small class='text-muted'> ". $auditions['My_Aud'][$i]['director']."</small>
            </a> </div> ";
            }
            
            ?>
            <!-- <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $auditions['My_Aud'][0]['name'] ?></h5>
                    <small class="text-muted">1 day ago</small>
                </div>
                <p class="mb-1"><?php echo $auditions['My_Aud'][0]['des']?></p>
                <small class="text-muted"><?php echo $auditions['My_Aud'][0]['director']?></small>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $auditions['My_Aud'][1]['name'] ?></h5>
                    <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-1"><?php echo $auditions['My_Aud'][1]['des']?></p>
                <small class="text-muted"><?php echo $auditions['My_Aud'][1]['director']?></small>
            </a>
            <a id="duplicate" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $auditions['My_Aud'][2  ]['name']?></h5>
                    <small class="text-muted">1 week ago</small>
                </div>
                <p class="mb-1"><?php echo $auditions['My_Aud'][2]['des']?></p>
                <small class="text-muted"><?php echo $auditions['My_Aud'][2]['director']?></small>
            </a> -->
        </div>
        <section class="show-more">
            <i class="fas fa-chevron-down" onclick="expose()"></i>
            <span class="tooltiptext">See More...</span>
        </section>
    </main>
    <footer>
    </footer>
    <script src="./includes/main.js"></script>
</body>

</html>