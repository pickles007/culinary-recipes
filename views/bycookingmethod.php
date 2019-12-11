<style type="text/css">
    .btn{
        border: white;
        background: white;
    }
</style>


<!-- Start blog Area -->
<?php
    $cookingtype = $_GET['cookingtype'];
    include_once "views/sql_include.php";
    $MyData = new mysqli($host, $user, $pass, $database);
    $MyData->query("SET NAMES 'utf8'");
    $allrecipes = $MyData->query("SELECT `recipe`.`id`, `recipe`.`name`, `recipe`.`photo`, `recipe`.`cooking_desc`, `recipe`.`date`, `cooking_method`.`name` FROM `recipe`
        INNER JOIN `cooking_method` ON `recipe`.`cooking_method_id`=`cooking_method`.`id`
        WHERE `cooking_method`.`name` = '".$cookingtype."' ORDER BY `date` DESC");
    if($allrecipes->num_rows==0){
    echo "<section class='blog-area section-gap' id='blog'>
        <div class='container'>
        <div class='row d-flex justify-content-center'>
        <div class='menu-content pb-70 col-lg-8'>
        <div class='title text-center'>
        <p>На жаль, таких рецептів у нас ще немає. Якщо ви бажаєте ви можете додати їх власноруч.</p>
        <form method='get'>
        <button type='submit' name='action' value='createRecipe' class='btn btn-outline-dark'>Додати новий рецепт</button>
        </form>
            </div></div></div>
            </div></section>
        ";
        include_once "layout/footer.php";
    exit;
    }

?>

<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10"><?=$cookingtype?></h1>
                </div>
            </div>
        </div>
        <div class="row">


<?php
    if(isset($_SESSION["MyID"])){
        while(($row = $allrecipes->fetch_row())!=false){
            echo "<div class='col-lg-3 col-md-6 col-sm-6 single-blog'>";
            echo "<div class='thumb'><img class='img-fluid' src='".$row[2]."' alt=''></div>";
            echo "<p class='date'>".date("d-m-Y", strtotime($row[4]))."</p>";
            echo "<form method='get'>";
            echo "<input name='idRecipe' type='text' value='".$row[0]."' style='display:none;'>";
            echo "<button type='submit' value='fullrecipe' name='action'><h4>".$row[1]."</h4></button>";
            echo "<button type='submit' name='fav'><h4>Додати до улюблених</h4></button>";
            echo "</form>";
            echo "<p>".mb_strimwidth($row[3], 0, 45, "...")."</p>";
            //echo "<button type='submit' name='fullrecipe' value='".$row["id"]."'><h4>Додати до улюблених</h4></button>";
            echo "</div>";
        }
    } else {
        while(($row = $allrecipes->fetch_row())!=false){
            echo "<div class='col-lg-3 col-md-6 col-sm-6 single-blog'>";
            echo "<div class='thumb'><img class='img-fluid' src='".$row[2]."' alt=''></div>";
			echo "<p class='date'>".date("d-m-Y", strtotime($row[4]))."</p>";
            echo "<form method='get'>";
            echo "<input name='id' type='text' value='".$row[0]."' style='display:none;'>";
			echo "<button class='btn' type='submit' value='fullrecipe' name='action'><h4>".$row[1]."</h4></button>";
            echo "</form>";
			echo "<p>".mb_strimwidth($row[3], 0, 45, "...")."</p>";
            echo "</div>";
		}
    }

    if(isset($_GET["fav"]) && isset($_SESSION["MyID"])){
        $user_id = $_SESSION['MyID'];
        $recipe_id = $_GET['idRecipe'];
        $MyData->query("INSERT INTO `favorite_recipe` (`user_id`, `recipe_id`) VALUES ('$user_id', '$recipe_id')");
    }

	$MyData->close();
?>

        </div>
    </div>
</section>

<!-- End blog Area -->
