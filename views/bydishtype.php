<style type="text/css">
    .btn{
        border: white;
        background: white;
    }
</style>


<!-- Start blog Area -->
<?php
    $dishtype = $_GET['dishtype'];
    include_once "views/sql_include.php";
    $MyData = new mysqli($host, $user, $pass, $database);
    $MyData->query("SET NAMES 'utf8'");
    $allrecipes = $MyData->query("SELECT `recipe`.`id`, `recipe`.`name`, `recipe`.`photo`, `recipe`.`cooking_desc`, `recipe`.`date`, `dish_type`.`name` FROM `recipe` 
        INNER JOIN `dish_type` ON `recipe`.`dish_type_id`=`dish_type`.`id`
        WHERE `dish_type`.`name` = '".$dishtype."' ORDER BY `date` DESC");
    if($allrecipes->num_rows==0){
		echo "<div class='col-lg-3 col-md-6 col-sm-6 single-blog'>
		<h1 style='text-align:center;'>На жаль, таких рецептів у нас ще немає. Якщо ви бажаєте ви можете додати їх власноруч.</h1>
			<form method = 'get'>
                <button style='border: white; background: white;' type='submit' value='bydishtype' name='action'>Закуски</butston>
            </form></div>
			";
		exit;
	}

?>

<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10"></h1>
                    <p><?=$dishtype?></p>
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