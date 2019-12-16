<!-- Start blog Area -->

<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Мої улюблені рецепти</h1>
                    <p>Тут відображаються рецепти, які Вам до вподоби.</p>
                    <?php
                        if(!isset($_SESSION["MyID"])){
                            echo "<p style='color:red;'>Зареєструйтесь для повноцінного користування всіма функціями нашого блогу!</p>";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">

<?php        

    if(isset($_SESSION["MyID"])){
	    include_once "views/sql_include.php";
        $user_id = $_SESSION["MyID"]; 
        $MyData = new mysqli($host, $user, $pass, $database);
        $MyData->query("SET NAMES 'utf8'");
        $allnews = $MyData->query("SELECT * FROM `recipe`, `favorite_recipe` WHERE `favorite_recipe`.`user_id` = '$user_id'  and `favorite_recipe`.`recipe_id` = `recipe`.`id`  ORDER BY `recipe`.`date` DESC");


        while(($row = $allnews->fetch_assoc())!=false){
            echo "<div class='col-lg-3 col-md-6 col-sm-6 single-blog'>";
            echo "<div class='thumb'><img class='img-fluid' src='".$row["photo"]."' alt=''></div>";
            echo "<p class='date'>".date("d-m-Y", strtotime($row["date"]))."</p>";
            // echo $row["favorite_recipe.id"];
            echo "<form method='get'>";
            echo "<input name='id' type='text' value='".$row["recipe_id"]."' style='display:none;'>";
            echo "<button type='submit' value='fullrecipe' name='action'><h4>".$row["name"]."</h4></button>";
            echo "<button type='submit' name='delete'><h4>Видалити з улюблених</h4></button>";
            echo "</form>";
            echo "<p>".mb_strimwidth($row["cooking_desc"], 0, 45, "...")."</p>";
            echo "</div>";
        }
    } else {
        while(($row = $allnews->fetch_assoc())!=false){
            echo "<div class='col-lg-3 col-md-6 col-sm-6 single-blog'>";
            echo "<div class='thumb'><img class='img-fluid' src='".$row["photo"]."' alt=''></div>";
			echo "<p class='date'>".date("d-m-Y", strtotime($row["date"]))."</p>";
            echo "<form method='get'>";
            echo "<input name='id' type='text' value='".$row["recipe_id"]."' style='display:none;'>";
			echo "<button type='submit' value='fullrecipe' name='action'><h4>".$row["name"]."</h4></button>";
            echo "</form>";
			echo "<p>".mb_strimwidth($row["cooking_desc"], 0, 45, "...")."</p>";
            echo "</div>";
		}
    }
    if(isset($_GET["delete"]) && isset($_SESSION["MyID"])){
        $user_id = $_SESSION['MyID'];
        $recipe_id = $_GET['id'];
        $MyData->query("DELETE FROM `favorite_recipe` WHERE `recipe_id` = ".$recipe_id);
    }
    //
    // if(isset($_GET["fav"]) && isset($_SESSION["MyID"])){
    //     $user_id = $_SESSION['MyID'];
    //     $recipe_id = $_GET['idRecipe'];
    //     $MyData->query("INSERT INTO `favorite_recipe` (`user_id`, `recipe_id`) VALUES ('$user_id', '$recipe_id')");
    // }

	$MyData->close();
?>

        </div>
    </div>
</section>
<!-- End blog Area -->
