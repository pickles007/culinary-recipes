<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Culinary blog</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <header id="header">
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-center">
                          <div id="logo">
                            <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
                          </div>
                    </div>
                </div>
            </div>
            <div class="container main-menu">
                <div class="row align-items-center justify-content-center d-flex">
                  <nav id="nav-menu-container">
                    <ul class="nav-menu">
                      <li><a href="index.php">Головна</a></li>
                      <li><a href="?action=about">Про нас</a></li>
                      <li class="menu-has-children"><a href="">Категорії</a>
                        <ul>
                              <li class="menu-has-children"><a href="">За кухнею </a>
                                <ul>
                                  <li><a href="#">Російська</a></li>
                                  <li><a href="#">Французька</a></li>
                                  <li><a href="#">Італійська</a></li>
                                  <li><a href="#">Українська</a></li>
                                  <li><a href="#">Азіатська</a></li>
                                </ul>
                              </li>

                              <li class="menu-has-children"><a href="">За типом страви </a>
                                <ul>
                                  <li><a href="#">Закуски</a></li>
                                  <li><a href="#">Салати</a></li>
                                  <li><a href="#">Перші страви</a></li>
                                  <li><a href="#">Другі страви</a></li>
                                  <li><a href="#">Десерти</a></li>
                                </ul>
                              </li>

                              <li class="menu-has-children"><a href="">За способом приготування </a>
                                <ul>
                                  <li><a href="#">Смажені</a></li>
                                  <li><a href="#">Варені</a></li>
                                  <li><a href="#">Тушені</a></li>
                                  <li><a href="#">Печені</a></li>
                                  <li><a href="#">Різані</a></li>
                                </ul>
                              </li>
                        </ul>
                      </li>
                      <?php
                          if(isset($_SESSION["MyID"])){
                              //echo "<a href='?action=create_news' class='aaa aaa1'>Додати новину</a> <br> <br>";
                              echo "<li><a href='?action=createRecipe'>Додати рецепт</a></li>";
                              echo "<li><a href='?action=myRecipe'>Мої рецепти</a></li>";
                              echo "<li><a href='?action=myFavorite'>Улюблені</a></li>";
                              echo "<li><a href='?action=myAccount'>Профіль</a></li>";
                              echo "<li><a href='?action=sessionEnd'>Вийти</a></li>";
                          }
                          else{
                              echo "<li><a href='?action=registration'>Зареєструватись</a></li>";
                              echo "<li><a href='?action=login'>Увійти</a></li>";
                          }
                      ?>


                    </ul>
                  </nav><!-- #nav-menu-container -->
                </div>
            </div>
        </header><!-- #header -->
