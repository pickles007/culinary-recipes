<!-- Start blog Area -->

<?php
$errorMsg = $button = '';

    if(isset($_SESSION["MyID"])){
        include_once "views/sql_include.php";
        $user_id = $_SESSION["MyID"];
        $MyData = new mysqli($host, $user, $pass, $database);
        $allnews = $MyData->query("SELECT * FROM `recipe` WHERE '$user_id' = `recipe`.`user_id` ORDER BY `date` DESC");
        $MyData->query("SET NAMES 'utf8'");

        if($allnews->num_rows == 0)
        {
            $errorMsg="Вами ще не додано жодного рецепту";
            $button = "<form><button type='submit' name='action' value='createRecipe' class='btn btn-outline-dark'>Додати новий рецепт</button></form>";
        }

?>

<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Мої рецепти</h1>
                    <p>Тут відображаються додані Вами рецепти.</p>
                    <?php
                        if(!isset($_SESSION["MyID"])){
                            echo "<p style='color:red;'>Зареєструйтесь для повноцінного користування всіма функціями нашого блогу!</p>";
                        }
                    ?>
                    <h1 class="mb-10"><?= $errorMsg ?></h1>
                    <?= $button ?>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
                    while(($row = $allnews->fetch_assoc())!=false){
                        echo "<div class='col-lg-3 col-md-6 col-sm-6 single-blog'>";
                        echo "<div class='thumb'><img class='img-fluid' src='".$row["photo"]."' alt=''></div>";
                        echo "<p class='date'>".date("d-m-Y", strtotime($row["date"]))."</p>";
                        // echo "<p class='date'><button class='btn btn-success btn-send'><img src='img/delete.png'></button></p>";
                        echo "<form method='get'>";
                        echo "<input name='id' type='text' value='".$row["id"]."' style='display:none;'>";
                        echo "<button type='submit' value='fullrecipe' name='action'><h4>".$row["name"]."</h4></button>";

                        //echo "<button type='submit' name='fav'><h4>Додати до улюблених</h4></button>";
                        echo "</form>";
                        echo "<form method='post'>";
                        echo "<button type='submit' value='".$row["id"]."' name='delete'><h4 style='color:red;'>Видалити</h4></button>";
                        echo "</form>";
                        echo "<form method='get'>";
                        echo "<input name='idRecipe' type='text' value='".$row["id"]."' style='display:none;'>";
                        echo "<button type='submit' value='editRecipe' name='action'><h4 style='color:red;'>Редагувати</h4></button>";
                        echo "</form>";
                        echo "<p>".mb_strimwidth($row["cooking_desc"], 0, 45, "...")."</p>";
                        echo "</div>";
                    }
                }
                if(isset($_POST['delete'])){
                    $idRecipe = $_POST['delete'];
                    $MyData->query("DELETE FROM `recipe` WHERE '$idRecipe' = `recipe`.`id`");
                    $MyData->close();
                    echo "<script>location.assign('?action=myRecipe')</script>";
                }
                //$MyData->close();
            ?>

        </div>
    </div>
</section>
<!-- End blog Area -->
