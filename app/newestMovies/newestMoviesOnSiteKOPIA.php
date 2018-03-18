<?php
ini_set("display_errors", 0);
require_once '../dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_query($polaczenie, "SET CHARSET utf8");
mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
mysqli_select_db($polaczenie, $database);

// get the parameter from URL
$nr = $_GET["post"];
$nr = intval($nr);
$i = $nr;
while ($i < 3)
{
  if($i==0){
  $zapytanietxt = "SELECT *
  FROM movies, users
  WHERE movies.user_id = users.user_id
  AND movie_id=(
      SELECT max(movie_id) FROM movies
    )
   ";
  }
  else{
  $zapytanietxt = "SELECT *
  FROM movies, users
  WHERE movies.user_id = users.user_id
  AND movie_id=(
      SELECT max(movie_id) FROM movies
    )".-$i."";
}

$rezultatUsers = mysqli_query($polaczenie, $zapytanietxt);
		$row = mysqli_fetch_assoc($rezultatUsers);
    $movie_id = $row['movie_id'];
    $user_id = $row['user_id'];
    $userName = $row['nick'];
    $name = $row['name'];
    $date = $row['date'];

echo<<<END
<div class="miniMovie">
  <div class="miniMovieHeader">
  <span class="mainTit">$name</span>
  <span class="secondTit">$userName</span>
  </div>
</div>
END;

$i++;
}

?>
