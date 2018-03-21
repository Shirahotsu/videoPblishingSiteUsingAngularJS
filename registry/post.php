<?php
    require_once 'daneSerwera.php';

    $l = 97;
    $polaczenie = @new mysqli($host, $user, $password, $db);
    if($polaczenie->connect_errno!=0) {
        $_SESSION['error'] = "Blad komunikacji z serwerem";
    }
    else{
        $zapytanie = $polaczenie->query("SELECT * FROM posts ORDER BY `id_post` DESC LIMIT 3");

        if($zapytanie->num_rows==3)
        {

            for($i=0;$i<3;$i++) {
                $s = chr($l);
                $wiersz = $zapytanie->fetch_assoc();
                $wiersz1 = $wiersz['content_post'];
                $_SESSION[$s] = $wiersz1;
                $l++;
            }



        }else{
            $_SESSION['error'] = "Blad zawartosci bazy";
        }


        $polaczenie->close();
    }

