<!-- DELETE FROM `tbl_posts_208` WHERE `tbl_posts_208`.`post_id` = 13 LIMIT 1; --><?php
include 'db.php';

session_start();

$fn =  $_SESSION["name"];
$pn = $_SESSION["p_name"];
$p_t = $_SESSION["publish_to"];
$des = $_SESSION["des"];

$id_query = "SELECT * FROM tbl_posts_208 WHERE proj_name = '$pn' ";

$id_q_res = mysqli_query($connection,$id_query);
var_dump($id_q_res);
if (!$id_q_res) {
    die("DB query_posts Failed");
}

$row = mysqli_fetch_assoc($id_q_res);

var_dump($row);

$id = $row['post_id'];

var_dump($id);

$delete_q = "DELETE FROM tbl_posts_208 WHERE post_id = '$id'";

$delete_res =  mysqli_query($connection,$delete_q);

if (!$delete_res) {
    die("DB query_posts Failed again");
}else{
    header('Location: ./add-aud.php');
}

mysqli_close($connection);


?>
