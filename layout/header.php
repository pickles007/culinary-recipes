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
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
</head>
<body>
    <header id="header">



        <div class="container main-menu">
            <div class="row align-items-center justify-content-center d-flex">

                <div class="header-top">
                    <div class="container">
                        <div class="row justify-content-left">
                            <div id="logo">
                                <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
                            </div>
                        </div>
                    </div>
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="index.php">Головна</a></li>
                        <li><a href="?action=about">Про нас</a></li>
                        <li class="menu-has-children"><a href="">Категорії</a>
                            <ul>
                                <li class="menu-has-children"><a href="">За кухнею </a>
                                    <ul class="nav-menu">
                                        <li>
                                            <form method = "get">
                                                <input name="cuisinename" type='text' value='Російська' style='display:none;'>
                                                <!-- <a href="?cuisinename=Російська&action=bycuisine">Російська</a> -->
                                                <button class='btn btn-outline-dark' type='submit' value='bycuisine' name='action'>Російська</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <input name="cuisinename" type='text' value='Французька' style='display:none;'>
                                                <button class='btn btn-outline-dark' type='submit' value='bycuisine' name='action'>Французька</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <input name="cuisinename" type='text' value='Італійська' style='display:none;'>
                                                <button class='btn btn-outline-dark' type='submit' value='bycuisine' name='action'>Італійська</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <!-- <a href="?cuisinename=Українська&action=bycuisine">Українська</a> -->
                                                <input name="cuisinename" type='text' value='Українська' style='display:none;'>
                                                <button class='btn btn-outline-dark' type='submit' value='bycuisine' name='action'>Українська</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <input name="cuisinename" type='text' value='Азіатська' style='display:none;'>
                                                <button class='btn btn-outline-dark' type='submit' value='bycuisine' name='action'>Азіатська</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-has-children"><a href="">За типом страви </a>
                                    <ul>
                                        <li>
                                            <form method = "get">
                                                <input name="dishtype" type='text' value='Закуски' style='display:none;'>
                                                <button class='btn btn-outline-dark' type='submit' value='bydishtype' name='action'>Закуски</butston>
                                                </form>
                                            </li>
                                            <li>
                                                <form method = "get">
                                                    <input name="dishtype" type='text' value='Салати' style='display:none;'>
                                                    <button class='btn btn-outline-dark' type='submit' value='bydishtype' name='action'>Салати</butston>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form method = "get">
                                                        <input name="dishtype" type='text' value='Перші Страви' style='display:none;'>
                                                        <button class='btn btn-outline-dark' type='submit' value='bydishtype' name='action'>Перші страви</butston>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form method = "get">
                                                            <input name="dishtype" type='text' value='Другі Страви' style='display:none;'>
                                                            <button class='btn btn-outline-dark' type='submit' value='bydishtype' name='action'>Другі страви</butston>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method = "get">
                                                                <input name="dishtype" type='text' value='Десерти' style='display:none;'>
                                                                <button class='btn btn-outline-dark' type='submit' value='bydishtype' name='action'>Десерти</butston>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li class="menu-has-children"><a href="">За способом приготування </a>
                                                        <ul>
                                  <li>
                                    <form method = "get">
                                      <input name="cookingtype" type='text' value='Смажені' style='display:none;'>
                                      <button class="btn btn-outline-dark" type='submit' value='bycookingmethod' name='action'>Смажені</button>
                                    </form>
                                  </li>
                                  <li><form method = "get">
                                      <input name="cookingtype" type='text' value='Варені' style='display:none;'>
                                      <button class="btn btn-outline-dark" type='submit' value='bycookingmethod' name='action'>Варені</button>
                                    </form>
                                  </li>
                                  <li><form method = "get">
                                      <input name="cookingtype" type='text' value='Тушені' style='display:none;'>
                                      <button class="btn btn-outline-dark" type='submit' value='bycookingmethod' name='action'>Тушені</button>
                                    </form>
                                  </li>
                                  <li><form method = "get">
                                      <input name="cookingtype" type='text' value='Печені' style='display:none;'>
                                      <button class="btn btn-outline-dark" type='submit' value='bycookingmethod' name='action'>Печені</button>
                                    </form>
                                  </li>
                                  <li><form method = "get">
                                      <input name="cookingtype" type='text' value='Різані' style='display:none;'>
                                      <button class="btn btn-outline-dark" type='submit' value='bycookingmethod' name='action'>Різані</button>
                                    </form>
                                  </li>
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
