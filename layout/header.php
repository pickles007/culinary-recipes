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


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script> -->

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script> -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css"> --> -


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
    <!-- <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css"> -->
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
                                                <a href="?cuisinename=Російська&action=bycuisine" name="action" value="Російська">Російська</a>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <a href="?cuisinename=Французька&action=bycuisine" name="action" value="Французька">Французька</a>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <a href="?cuisinename=Італійська&action=bycuisine" name="action" value="Італійська">Італійська</a>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <a href="?cuisinename=Українська&action=bycuisine" name="action" value="Українська">Українська</a>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <a href="?cuisinename=Азіатська&action=bycuisine" name="action" value="Азіатська">Азіатська</a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-has-children"><a href="">За типом страви </a>
                                    <ul>
                                        <li>
                                            <form method = "get">
                                                <a href="?dishtype=Закуски&action=bydishtype" name="action" value="Закуски">Закуски</a>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <a href="?dishtype=Салати&action=bydishtype" name="action" value="Салати">Салати</a>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <a href="?dishtype=Перші страви&action=bydishtype" name="action" value="Перші страви">Перші страви</a>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <a href="?dishtype=Другі Страви&action=bydishtype" name="action" value="Другі Страви">Другі Страви</a>
                                            </form>
                                        </li>
                                        <li>
                                            <form method = "get">
                                                <a href="?dishtype=Десерти&action=bydishtype" name="action" value="Десерти">Десерти</a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-has-children"><a href="">За способом приготування </a>
                                    <ul>
                                        <li>
                                            <form method = "get">
                                                <a href="?cookingtype=Смажені&action=bycookingmethod" name="cookingtype" value="Смажені">Смажені</a>
                                            </form>
                                        </li>
                                        <li><form method = "get">
                                            <a href="?cookingtype=Варені&action=bycookingmethod" name="cookingtype" value="Варені">Варені</a>
                                        </form>
                                    </li>
                                    <li><form method = "get">
                                        <a href="?cookingtype=Тушені&action=bycookingmethod" name="cookingtype" value="Тушені">Тушені</a>
                                    </form>
                                </li>
                                <li><form method = "get">
                                    <a href="?cookingtype=Печені&action=bycookingmethod" name="cookingtype" value="Печені">Печені</a>
                                </form>
                            </li>
                            <li><form method = "get">
                                <a href="?cookingtype=Різані&action=bycookingmethod" name="cookingtype" value="Різані">Різані</a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <?php
        if(isset($_SESSION["MyID"])){
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
        <li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>
        <li><a href='?action=search'>Пошук</a></li>

</ul>
</nav><!-- #nav-menu-container -->
</div>
</div>
</header><!-- #header -->
</div>
