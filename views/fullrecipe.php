<?php
$id=(int)$_GET['id'];
include_once "views/sql_include.php";
$MyData = new mysqli($host, $user, $pass, $database);
$MyData->query("SET NAMES 'utf8'");
$allrecipes = $MyData->query("SELECT `recipe`.`id`, `recipe`.`name`, `recipe`.`cooking_desc`, `recipe`.`photo`, `cuisine`.`name`, `dish_type`.`name`, `cooking_method`.`name` FROM `recipe`
	INNER JOIN `cooking_method` ON `recipe`.`cooking_method_id` = `cooking_method`.`id`
	INNER JOIN `dish_type` ON `recipe`.`dish_type_id` = `dish_type`.`id`
	INNER JOIN `cuisine` ON `recipe`.`cuisine_id` = `cuisine`.`id`
	WHERE `recipe`.`id` = ".$id);
	if($allrecipes->num_rows==0){
		echo "<h1 style='text-align:center;'>Такої сторінки не існує!</h1>";
		exit;
	}
	$row = $allrecipes->fetch_row();
	$namerecipe=$row[1];
	$description=$row[2];
	$photo=$row[3];
	$cuisine = $row[4];
	$dishtype = $row[5];
	$cookingmethod = $row[6];

	$allingredients = $MyData->query("SELECT `ingredient`.`name`, `composition_recipe`.`count`, `composition_recipe`.`unit_measure` FROM `composition_recipe`
		INNER JOIN `ingredient` ON `composition_recipe`.`ingredient_id` = `ingredient`.`id`
		WHERE `composition_recipe`.`recipe_id` = ".$row[0]);
		$MyData->close();
		?>
		<section class="home-about-area section-gap">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 home-about-left">
						<dl class="row">
							<dt class="col-sm-3">Назва страви</dt>
							<dd class="col-sm-9"><?=$namerecipe?></dd>
							<dt class="col-sm-3">Кухня</dt>
							<dd class="col-sm-9"><?=$cuisine?></dd>
							<dt class="col-sm-3">Тип приготування</dt>
							<dd class="col-sm-9"><?=$cookingmethod?></dd>
							<dt class="col-sm-3">Тип страви</dt>
							<dd class="col-sm-9"><?=$dishtype?></dd>
							<dt class="col-sm-3">Інградієнти</dt>
							<dd class="col-sm-9">
								<?php
								while(($row = $allingredients->fetch_assoc())!=false){
									echo "<p>".$row['name']." ".$row['count']." ".$row['unit_measure']."</p>";
								}
								?>
							</dd>
							<dt class="col-sm-3">Опис страви</dt>
							<dd class="col-sm-9"><?=$description?></dd>
						</dl>
					</div>
					<div class="col-lg-6 home-about-right">
						<img class="img-fluid" src="<?=$photo?>" alt="">
					</div>
				</div>

				<?php
				$MyData = new mysqli($host, $user, $pass, $database);
				$MyData->query("SET NAMES 'utf8'");
				$recipes = $MyData->query("SELECT `recipe`.`id`, `favorite_recipe`.`recipe_id`, `recipe`.`user_id` FROM `recipe`
					INNER JOIN `favorite_recipe` ON `recipe`.`id` = `favorite_recipe`.`recipe_id`
					WHERE `favorite_recipe`.`recipe_id` = ".$id);
					$row_recipes = $recipes->fetch_assoc();

					if(isset($_SESSION["MyID"])){
						if($row_recipes['user_id'] != $_SESSION['MyID'] ){
							if($recipes->num_rows==0){
								echo "
								<div class='col-md-24'>
								<form method = 'get'>
								<input name='id' type='text' value='".$id."' style='display:none;'>
								<button type='submit' name='fav'  class='btn btn-outline-danger'>Додати до улюблених</button>
								</form>
								</div>";
							}
							else{
								echo "
								<div class='col-md-24'>
								<form method = 'post' action=''>
								<button type='submit' name='del' value='".$id."' class='btn btn-outline-danger'>Видалити з улюблених</button>
								</form>
								</div>";
							}

						}
					}
					if(isset($_GET["fav"]) && isset($_SESSION["MyID"])){
						$user_id = $_SESSION['MyID'];
						$recipe_id = $_GET['id'];
						$MyData->query("INSERT INTO `favorite_recipe` (`user_id`, `recipe_id`) VALUES ('$user_id', '$recipe_id')");
						//echo "<script>location.assign('?action=myFavorite')</script>";
					}


					if(isset($_POST["del"]) && isset($_SESSION["MyID"])){
						$user_id = $_SESSION['MyID'];
						//$recipe_id = $_GET['id'];
						$res = $MyData->query("DELETE FROM `favorite_recipe` WHERE `user_id` = '$user_id' AND `recipe_id` = '$id'");
						//echo "<script>location.assign('?action=myFavorite')</script>";
					}


					$MyData->close();
					?>

				</div>
			</section>
