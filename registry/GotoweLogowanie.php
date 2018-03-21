<?php
    session_start();
    require_once 'zaloguj.php';
    if(isset($_SESSION['zalogowany']))
        {
            header('Location: index.php');
        }
    else{
        zaloguj();
    }
?>

                
                        