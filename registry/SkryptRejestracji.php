<?php
    session_start();
    $wszystkoOK = true;
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2=$_POST['password2'];
    //SPRAWDZANIE FORMULARZA + LOGIN
    
//    if(empty($login) || empty($email) || empty($password) || empty($password2))
//    {
//        $wszystkoOK = false;
//        $_SESSION['error'] = "Wype�nij wszystko!";
//        header('Location: rejestracja.php');
//        exit();
//    }elseif (strlen($login)<3 || strlen($login >20))
//    {
//        $wszystkoOK = false;
//        $_SESSION['error'] = "Podaj login od 3 do 20 znakow!";
//        header('Location: rejestracja.php');
//    }elseif(ctype_alnum($login)==false)
//    {
//        $wszystkoOK = false;
//        $_SESSION['error'] = "Login moze zawierac tylko litery i cyfry i nie moze zawierac samych cyfr!";
//        header('Location: rejestracja.php');
//    }
//
//    //SPRAWDZANIE EMAILA
//    $emailPodKatemZnakowSpecjalnych = filter_var($email, FILTER_SANITIZE_EMAIL);
//
//    if((filter_var($emailPodKatemZnakowSpecjalnych,FILTER_VALIDATE_EMAIL)==false) || $emailPodKatemZnakowSpecjalnych!=$email){
//        $wszystkoOK = false;
//        $_SESSION['error'] = "Podaj poprawny email!";
//        header('Location: rejestracja.php');
//    }
    
//    //SPRAWDZANIE HASLA
//
//    if(strlen($password)<8 || strlen($password)>20){
//        $wszystkoOK = false;
//        $_SESSION['error'] = "Podaj haslo od 8 do 20 znakow!";
//        header('Location: rejestracja.php');
//    }else if($password!=$password2){
//        $wszystkoOK = false;
//        $_SESSION['error'] = "Hasla nie sa identyczne!";
//        header('Location: rejestracja.php');
//        exit();
//    }
    
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    
    require_once 'daneSerwera.php';
    
    $polaczenie = @new mysqli($host, $user, $password, $db);
        if($polaczenie->connect_errno!=0){                                              //problem z polaczeniem
            $_SESSION['error'] = "Error: ".$polaczenie->connect_errno;
            $wszystkoOK = false;
        }else{
            
            //CZY EMAIL JEST ZAJETY?
            
            $rezultat = $polaczenie->query("SELECT id from userdata WHERE email='$email'");
            if($rezultat==true)
            {
                $ileJestMaili = $rezultat->num_rows;
                if($ileJestMaili>0)
                {
                    $wszystkoOK = false;
                    $_SESSION['error'] = "Podany email jest juz zajety";
                    header('Location: rejestracja.php');
                    $polaczenie->close();
                }
            }            
            
            //CZY LOGIN JEST ZAJETY?
           $rezultat = $polaczenie->query("SELECT id from userdata WHERE user='$login'");
            if($rezultat==true)
            {
                $ileJestUserow = $rezultat->num_rows;
                if($ileJestUserow>0)
                {
                    $wszystkoOK = false;
                    $_SESSION['error'] = "Podany login jest juz zajety";
                    header('Location: rejestracja.php');
                    $polaczenie->close();
                }
            }
        }
        if($wszystkoOK == true)
        {
            if(($polaczenie->query("INSERT INTO userdata VALUES(NULL, '$login', '$password2', '$password_hash', '$email')")) == true)
            {
                $_SESSION['zalogowany'] = true;
            }else{
                $_SESSION['error'] = "Blad krytyczny! Sprobuj ponownie!";
            }
            header('Location: index.php');
            
        }
        
        
?>
    