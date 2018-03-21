<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../dbconnect.php';

$conn = new mysqli($host, $user, $password, $database);
$nr = $_GET["category"];
$nr =  (string)$nr;
$elo = "Gry";
$result = $conn->query('SELECT * FROM movies WHERE movie_category="'.$nr.'"');

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"movieId":"'. $rs["movie_id"]. '",';
    $outp .= '"name":"'. $rs["name"]. '",';
    $outp .= '"category":"'. $rs["movie_category"]. '",';
    $outp .= '"info":"'.$nr.'",';
    $outp .= '"userId":"'. $rs["user_id"]. '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
