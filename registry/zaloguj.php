<?php 
    function zaloguj(){
        
        if(!isset($_POST['login']) || !isset($_POST['password'])){
            $_SESSION['error'] = true;
            header('Location: index.php');
        }
        
         $_SESSION['error'] = false;
        if(isset($_SESSION['zalogowany']))
        {
            header('Location: index.php');
        }
        require_once 'daneSerwera.php';
    
        $polaczenie = @new mysqli($host, $user, $password, $db);
        if($polaczenie->connect_errno!=0){                                              //problem z polaczeniem
            echo "Error: ".$polaczenie->connect_errno;
        }
        else{
            $login = $_POST['login'];
            $passwordZPosta = $_POST['password'];

            //ZABEZPIECZENIE PRZECIW SQL INJECTION
                                                                                        //encje HTML
            $login = htmlentities($login, ENT_QUOTES, "UTF-8");                         // funkcja zamiast tekstu wstawia w to miejsce %s


                                                                                        //zabezpiecza     sprawdza pod katem -- i '
            if($rezultat = @$polaczenie->query(
                    sprintf("SELECT * FROM users WHERE user_id='%s'",
                    mysqli_real_escape_string($polaczenie,$login)))
               )
            {
                $ileRekordow = $rezultat->num_rows;
                if($ileRekordow==0)
                {
                    $_SESSION['error'] = true;
                    header('Location: index.php');
                }
                else{
                    $_SESSION['error'] = false;
                    $wiersz = $rezultat->fetch_assoc();
                                                                                    //hashe sa dobre
                    if(password_verify($passwordZPosta, $wiersz['password_hash']) == true)   
                    {
                    $_SESSION['User'] = $wiersz['login'];
                    $rezultat->close();
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['error'] = false;
                    header('Location: index.php');
                    }
                    else{
                        header('Location: index.php');
                    }


                }
            }
            $polaczenie->close();
            }
    }
?>