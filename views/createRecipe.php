<?php
include_once "views/sql_include.php";
$MyData = new mysqli($host, $user, $pass, $database);
$MyData->query("SET NAMES 'utf8'");
$allcuisine = $MyData->query("SELECT * from `cuisine`");
$allcookingmethod = $MyData->query("SELECT * from `cooking_method`");
$alldishtype = $MyData->query("SELECT * from `dish_type`");
$allingredients = $MyData->query("SELECT * from `ingredient`");
$full_photo_path = $file_name = $file_tmp = '';
$wasError = false;
$photoErr = $nameErr = "";
// $type = '';

$optionErr = '';
if(isset($_POST["send"])){

    if(isset($_FILES['photo'])){
        $file_name = $_FILES['photo']['name'];
        $file_tmp = $_FILES['photo']['tmp_name'];

        // move_uploaded_file($file_tmp,"img/photo_recipes/".$file_name);
        // $full_photo_path = "img/photo_recipes/".$file_name;
        if($_FILES['photo']['size'] > 2097152){
            $photoErr = 'Фото повинно бути розміром менше 2 Мб';
            $wasError = true;
        }

        switch ($_FILES['photo']['type']) {
            case 'image/jpeg':
            //case 'image/jpg':
                $type = 'jpeg';
                break;

            case 'image/png':
                $type = 'png';
                break;

            default:
                $photoErr = "Фото повинно бути форматом jpeg або png та повинно бути розміром менше 2 Мб";
                $wasError = true;
                break;
        }



    }

    if(!preg_match("/^[a-zA-Zа-яА-ЯіІ\d]{1,}[a-zA-Zа-яА-ЯіІ\d\s]*$/u", htmlspecialchars($_POST["name"]))) {
        $nameErr ="Тільки літери та цифри!";
        $wasError = true;
    }

    if ($wasError == false){



        $name=htmlspecialchars ($_POST["name"]);
        $cooking_desc=htmlspecialchars ($_POST["cooking_desc"]);

        move_uploaded_file($file_tmp,"img/photo_recipes/".$file_name);
        $full_photo_path = "img/photo_recipes/".$file_name;

        $dish_type_id = $_POST["dish_type"];
        $cooking_method_id = $_POST["cooking_method"];
        $cuisine_id = $_POST["cuisine"];
        $user_id=$_SESSION['MyID'];

        if(($dish_type_id == 0) || ($cooking_method_id == 0) || ($cuisine_id == 0)) {
            $optionErr="Не всі поля були заповнені. Повторіть спробу";
        }else{
            $date=date("Y-m-d H:i:s");
            $MyData->query("INSERT INTO `recipe` (`name`, `cooking_desc`, `photo`, `date`, `dish_type_id`, `cooking_method_id`, `cuisine_id`, `user_id`) VALUES ('$name', '$cooking_desc', '$full_photo_path', '$date', '$dish_type_id', '$cooking_method_id', '$cuisine_id', '$user_id')");
            $recipe_id = $MyData->query("SELECT MAX(`id`) FROM `recipe`;");
            // $row_recipe = $recipe_id->fetch_assoc();
            $r_id = $recipe_id->fetch_row()[0];
            //$r_id = (int)$recipe_id;
            foreach ($_POST['ingredient'] as $ing ) {
                $MyData->query("INSERT INTO `composition_recipe` (`recipe_id`, `ingredient_id`) VALUES ('$r_id', '$ing')");
            }
            $MyData->close();
            include_once "views/main.php";
            include_once "layout/footer.php";
            exit;

        }
    }
    $MyData->close();
}
?>



<section class="home-about-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h1 class="text-center">Додавання нового рецепту</h1>
                <p class="lead">Тут ви повинні ввести всі дані про Ваш новий рецепт.</p>
                <form id="contact-form" method="post" action="" role="form" enctype="multipart/form-data">
                    <div class="messages"></div>
                    <div class="controls">
                        <div style="color:red;" class="help-block with-errors"><?=$optionErr?></div>
                        <div style="color:red;" class="help-block with-errors"><?=$nameErr?></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Назва рецепту *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Введіть назву рецепту *" required="required" data-error="Firstname is required.">
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

                        <div class="help-block with-errors" style='color:red;'><?=$photoErr?></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_photo">Фото *</label>
                                    <input id="form_photo" type="file" name="photo" class="form-control-file" placeholder="Виберіть інградієнти *" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_ingredients">Інгредієнт *</label>
                                    <select multiple required  class="form-control" name="ingredient[]" id="form_ingredients">
                                        <?php
                                        while(($row = $allingredients->fetch_assoc())!=false){
                                            echo "<option value='".$row['id']."'>".$row['name']."</option><br/>";
                                        }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <!--
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="form_unit_measure">Одиниця вимірювання *</label>
                                    <input id="form_unit_measure" type="text" name="unit_measure" class="form-control" placeholder="Введіть од. вим. *" required="required" data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="form_count">К-сть *</label>
                                    <input id="form_count" type="text" name="count" class="form-control" placeholder="Введіть к-сть *" required="required" data-error="Firstname is required."
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> -->

                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="form_message">Опис приготування *</label>
            <textarea maxlength="5000" id="form_message" name="cooking_desc" class="form-control" placeholder="Заповніть опис приготування страви *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <form class="" action="" method="get">
        <div class="col-md-12">
            <input type="submit" name="send" class="btn btn-success btn-send" value="Додати">
        </div>
    </form>

</div>
</div>
</form>
</div><!-- /.col-lg-8 col-lg-offset-2 -->
</div> <!-- /.row-->
</div>
</section>
