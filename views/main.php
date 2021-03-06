<!-- Start blog Area -->

<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Останнє з нашого блогу</h1>
                    <p>Тут відображено останні додані нашими користувачами нові рецепти.</p>
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
	include_once "views/sql_include.php";
    $MyData = new mysqli($host, $user, $pass, $database);
    $MyData->query("SET NAMES 'utf8'");
    $allnews = $MyData->query("SELECT * FROM `recipe` ORDER BY `date` DESC LIMIT 16");
    if(isset($_SESSION["MyID"])){
        while(($row = $allnews->fetch_assoc())!=false){
            echo "<div class='col-lg-3 col-md-6 col-sm-6 single-blog'>";
            echo "<div class='thumb'><img class='img-fluid' src='".$row["photo"]."' alt=''></div>";
            echo "<p class='date'>".date("d-m-Y", strtotime($row["date"]))."</p>";
            echo "<form method='get'>";
            echo "<input name='id' type='text' value='".$row["id"]."' style='display:none;'>";
            echo "<button type='submit' value='fullrecipe' name='action'><h4>".$row["name"]."</h4></button>";
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
            echo "<input name='id' type='text' value='".$row["id"]."' style='display:none;'>";
			echo "<button type='submit' value='fullrecipe' name='action'><h4>".$row["name"]."</h4></button>";
            echo "</form>";
			echo "<p>".mb_strimwidth($row["cooking_desc"], 0, 45, "...")."</p>";
            echo "</div>";
		}
    }

    // if(isset($_GET["fav"]) && isset($_SESSION["MyID"])){
    //     $user_id = $_SESSION['MyID'];
    //     $recipe_id = $_GET['id'];
    //     $MyData->query("INSERT INTO `favorite_recipe` (`user_id`, `recipe_id`) VALUES ('$user_id', '$recipe_id')");
    // }


	$MyData->close();
?>

        </div>
    </div>
</section>
<!-- End blog Area -->
