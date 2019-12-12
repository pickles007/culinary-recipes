<?php
	$idRecipe=(int)$_GET['idRecipe'];
	include_once "views/sql_include.php";
    $MyData = new mysqli($host, $user, $pass, $database);
	$MyData->query("SET NAMES 'utf8'");
	$allnews = $MyData->query("SELECT * FROM `recipe` WHERE `id` = ".$idRecipe);
    $allcuisine = $MyData->query("SELECT * from `cuisine`");
    $allcookingmethod = $MyData->query("SELECT * from `cooking_method`");
    $alldishtype = $MyData->query("SELECT * from `dish_type`");
    $allingredients = $MyData->query("SELECT * from `ingredient`");



	$row = $allnews->fetch_assoc();
	$name=$row["name"];
	$cooking_desc=$row["cooking_desc"];
    $photo = $row["photo"];
    $dish_type_id = $row["dish_type_id"];
    $cooking_method_id = $row["cooking_method_id"];
    $cuisine_id = $row["cuisine_id"];
    $optionErr='';

    if(isset($_POST["send"])){
        if(isset($_FILES['photo'])){
            $file_name = $_FILES['photo']['name'];
            $file_tmp = $_FILES['photo']['tmp_name'];
            move_uploaded_file($file_tmp,"img/photo_recipes/".$file_name);
            $full_photo_path = "img/photo_recipes/".$file_name;
        }

        $name=htmlspecialchars ($_POST["name"]);
        $cooking_desc=htmlspecialchars ($_POST["cooking_desc"]);
        $photo;
        $dish_type_id = $_POST["dish_type"];
        $cooking_method_id = $_POST["cooking_method"];
        $cuisine_id = $_POST["cuisine"];

        //$time=time();
        include_once "views/sql_include.php";
        $MyData = new mysqli($host, $user, $pass, $database);
        $MyData->query("SET NAMES 'utf8'");

        if(($dish_type_id == 0) || ($cooking_method_id == 0) || ($cuisine_id == 0)) {
            $optionErr="Не всі поля були заповнені. Повторіть спробу";
        }else{
            $date=date("Y-m-d H:i:s");
            
            $MyData->query("UPDATE `recipe` SET `name` = '$name', `cooking_desc` = '$cooking_desc', `photo` = '$full_photo_path',  `dish_type_id` = '$dish_type_id', `cooking_method_id` = '$cooking_method_id', `cuisine_id` = '$cuisine_id' WHERE `id` = '$idRecipe'");
            $MyData->close();
            include_once "views/main.php";
            include_once "layout/footer.php";
            exit;

        }
        $MyData->close();

        // $MyData->query("UPDATE `site_news` SET `visible` = '$checked1' WHERE `site_news`.`news_id` = '$MyID1'");
        // $MyData->query("UPDATE `site_news` SET `title` = '$title' WHERE `site_news`.`news_id` = '$MyID1'");
        // $MyData->query("UPDATE `site_news` SET `main_text` = '$news' WHERE `site_news`.`news_id` = '$MyID1'");
        // $MyData->close();
        // include_once "views/main.php";
        // include_once "layout/footer.php";
        // exit;
    }

	$MyData->close();
?>


<section class="home-about-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h1 class="text-center">Редагування інформації про страву</h1>
                <p class="lead">Тут ви повинні ввести всі дані про Ваш рецепт.</p>
                <form id="contact-form" method="post" action="" role="form" enctype="multipart/form-data">
                    <div class="messages"></div>
                    <div class="controls">
                        <div style="color:red;" class="help-block with-errors"><?=$optionErr?></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Назва рецепту *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Введіть назву рецепту *" required="required" data-error="Firstname is required." value="<?=$name?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_cuisine">Кухня *</label>
                                    <select required="required" class="form-control" name="cuisine" id="form_cuisine">
                                        <option value="0">Оберіть кухню</option>
                                        <?php
                                        while(($row = $allcuisine->fetch_assoc())!=false){
                                            echo "<option value='".$row['id']."'>".$row['name']."</option><br/>";
  										}
                                        ?>
                                    </select>

                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cooking_method">Тип приготування *</label>
                                    <select required="required" class="form-control" name="cooking_method" id="form_cooking_method">
                                        <option value="0">Оберіть тип приготування</option>
                                        <?php
                                        while(($row = $allcookingmethod->fetch_assoc())!=false){
                                            echo "<option value='".$row['id']."'>".$row['name']."</option><br/>";
  										}
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_dish_type">Тип страви</label>
                                    <select required="required" class="form-control" name="dish_type" id="form_dish_type">
                                        <option value="0">Оберіть тип страви</option>
                                        <?php
                                        while(($row = $alldishtype->fetch_assoc())!=false){
                                            echo "<option value='".$row['id']."'>".$row['name']."</option><br/>";
                                        }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_photo">Фото *</label>
                                    <input id="form_photo" type="file" name="photo" class="form-control-file" placeholder="Виберіть інградієнти *" required="required" data-error="Valid email is required." value="<?=$photo?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Опис приготування *</label>
                                    <textarea maxlength="5000" id="form_message" name="cooking_desc" class="form-control" placeholder="Заповніть опис приготування страви *" rows="4" required="required" data-error="Please,leave us a message."><?=$cooking_desc?></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <form class="" action="" method="get">
                                <div class="col-md-12">
                                    <input type="submit" name="send" class="btn btn-success btn-send" value="Зберегти">
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-lg-8 col-lg-offset-2 -->
        </div> <!-- /.row-->
    </div>
</section>
