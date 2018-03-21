<?php
    session_start();
    require_once 'zaloguj.php';
    require_once 'post.php';
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>TiT</title>

	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style2.css" type="text/css" />
<style>
</style>
</head>
<body>
	<div class="mainHeader">
		<img class="banner" src="images/banner.jpg" alt="">
<div class="header">
	<div class="menu">
		<ul>
			<ul><a href="" class="menuBtns">Kategorie</a></ul>
			<li><a href="" class="menuBtns">Najnowsze</a></li>
			<li><a href="" class="menuBtns">Jebij posta</a></li>
                        <?php
                            if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==true)
                            {
                                echo ("<li><a href='logout.php' class='menuBtns'>Wyloguj</a></li>");
                            }
                        ?>
			<input type="text" name="search" placeholder="Wyszukaj" id=""><button type="button" class="btn-info btn searchBtn">XD</button>
		</ul>
	</div>
	<div class="profile">
		<ul>
			<ul><a id="profileBtn" href="#" class="menuBtns">Profil</a></ul>
		</ul>
	</div>
	<div class="loginForm">
            <form action="GotoweLogowanie.php" method="post">
                <?php
                    if(isset($_SESSION['error']) && $_SESSION['error']== true){
                    echo ('<div class="error">'.'Bledny login lub haslo'.'</div>');
                    }
                    unset($_SESSION['error']);
                    
                    if(isset($_SESSION['error']) && $_SESSION['error']== true){
                    echo ('<div class="error">'.'Bledny login lub haslo'.'</div>');
                    }
                    unset($_SESSION['error']);
                    ?>
                        <input type="text" name="login" placeholder="Login" id="">
			<input type="password" name="password" placeholder="Haslo" id="">
      <div class="btns">
            <input type="submit" class="btn-info btn loginBtn" value="Zaloguj">
                <a href="rejestracja.php" class="btn-info btn loginBtn"></a> 
      </div>
		</form>
	</div>
</div>
</div>
<div class="content">
    <?php
    switch ($_GET['id']) {
        case 1:
            include("content.php");
            break;
    }
    if(isset($_GET['id'])) {
        exit();
    }
    ?>
	<div class="postDiv">
		<div class="contentHeader">ELO</div>
		<div class="contentQuestion">
			<div class="contentQuestionInfo">
				<div class="infoImage">
					<div class="profileImage"></div>
					<div class="postInfo">XYZ doadal post: DD.MM.RR HH:MM w kategorii: HUI </div>
				</div>
				<div class="postLike"></div>
			</div>
			<div id="elo" class="contentInerQuestion">
                <?php
                    echo $_SESSION['a'];
                ?>
				</div>
			    <div class="tags">
				<ul>
					<li><a href="">HUI</a></li>
					<li><a href="">XD</a></li>
					<li><a href="">ELLO</a></li>
				</ul>
			</div></div>
			<div class="contentAnswares">
				<div class="contentAnswareHeader">#Wypierdalać</div>
				<div class="contentAnsware">
                    <?php
                    echo $_SESSION['b'];
                    ?>
                </div>
			</div>
		</div>

    <div class="postDiv">
        <div class="contentHeader">ELO</div>
        <div class="contentQuestion">
            <div class="contentQuestionInfo">
                <div class="infoImage">
                    <div class="profileImage"></div>
                    <div class="postInfo">XYZ doadal post: DD.MM.RR HH:MM w kategorii: HUI </div>
                </div>
                <div class="postLike"></div>
            </div>
            <div id="elo" class="contentInerQuestion">
                <?php
                echo $_SESSION['c'];
                ?>
            </div>
            <div class="tags">
                <ul>
                    <li><a href="">HUI</a></li>
                    <li><a href="">XD</a></li>
                    <li><a href="">ELLO</a></li>
                </ul>
            </div></div>
        <div class="contentAnswares">

            <div class="contentAnsware">
            </div>
        </div>
    </div>
	</div>
    <a href='?id=1'>
        <div class="contentAnswareHeader">nastepna strona
        </div>
    </a>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<script src="script.js"></script>
</body>
</html>


