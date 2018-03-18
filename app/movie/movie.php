<?php
ini_set("display_errors", 0);
require_once '../dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_query($polaczenie, "SET CHARSET utf8");
mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
mysqli_select_db($polaczenie, $database);

// get the parameter from URL
$nr = $_GET["movie"];
$nr = intval($nr);
  $zapytanietxt = "SELECT *
  FROM movies, users
  WHERE movies.user_id = users.user_id
  AND movie_id=".$nr;

$rezultatUsers = mysqli_query($polaczenie, $zapytanietxt);
		$row = mysqli_fetch_assoc($rezultatUsers);
    $movie_id = $row['movie_id'];
    $user_id = $row['user_id'];
    $userName = $row['nick'];
    $name = $row['name'];
    $movieDate = $row['movie_date'];
    $movieCategory = $row['movie_category'];
    $outp = '{
      "movieId":"'.$movie_id.'",
      "movieTitle":"'.$name.'",
      "movieUser":"'.$userName.'",
      "movieDate":"'.$movieDate.'",
      "movieCategory":"'.$movieCategory.'"

    }';

echo($outp);




// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// require_once '../dbconnect.php';
//
// $conn = new mysqli($host, $user, $password, $database);
// $nr = $_GET["movie"];
//  $nr = intval($nr);
// $result = $conn->query("SELECT * FROM movies WHERE movie_id = ".$nr);
//
// $outp = "";
// while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
//     if ($outp != "") {$outp .= ",";}
//     $outp .= '{"movieId":"'  . $rs["movie_id"] . '",';
//     $outp .= '"name":"'   . $rs["name"]        . '",';
//     $outp .= '"userId":"'. $rs["user_id"]     . '"}';
// }
// $outp ='{"records":['.$outp.']}';
// $conn->close();
//
// echo($outp);
?>
