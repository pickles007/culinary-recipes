<?php
    include_once "views/sql_include.php";
    $MyData = new mysqli($host, $user, $pass, $database);
    $MyData->query("SET NAMES 'utf8'");
    $allingredients = $MyData->query("SELECT * from `ingredient`");
    $err = '';
 ?>


<section class="home-about-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-2">
                <h1 class="text-center">Пошук рецептів</h1>
                <p class="lead">На даній сторінці Ви можете шукати рецепти за різними критеріями.</p>
                <form id="contact-form" method="post" action="" role="form">
                    <div class="messages"><div style="color:red;" class="help-block with-errors"><?=$err?></div></div>
                    <div class="controls">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="form_name">Назва страви</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Назва страви"  >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="form_name">Інгредієнт</label>
                                    <select multiple class="form-control" name="ingredient[]" id="form_ingredients">
                                        <?php
                                        while(($row = $allingredients->fetch_assoc())!=false){
                                            echo "<option value='".$row['id']."'>".$row['name']."</option><br/>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Опис страви</label>
                                    <input id="form_name" type="text" name="desc" class="form-control" placeholder="Опис страви" >
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" name="send" class="btn btn-success btn-send" value="Шукати">
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row" style="margin-top:40px;">

                    <?php

                    if(isset($_POST["send"])){
                        if(empty($_POST['name']) && empty($_POST['ingredient'])  && empty($_POST['desc'])){
                            $err = 'Для пошуку рецептів заповніть хоча б одне поле';
                        }else{
                            // коли тільки введена НАЗВА СТРАВИ  +++
                            if(!empty($_POST['name']) && empty($_POST['ingredient'])  && empty($_POST['desc'])){
                                $search = explode(" ", $_POST['name']);
                                $count = count($search);
                                $str = array();
                                $i = 0;
                                foreach ($search as $key) {
                                    $i++;
                                    if($i < $count){
                                        $str[] = "name LIKE '%".$key."%' OR ";
                                    }else{
                                        $str[] = "name LIKE '%".$key."%'";
                                    }
                                }
                                $sql = "SELECT * FROM `recipe` WHERE ".implode("", $str);
                                $allRecipe = $MyData->query("$sql");
                                if($allRecipe->num_rows==0){
                                    echo "
                                        <div class='container'>
                                        <div class='row d-flex justify-content-center'>
                                        <div class='menu-content pb-70 col-lg-8'>
                                        <div class='title text-center'>
                                        <h1>На жаль, рецептів не знайдено.</h1>
                                            </div></div></div>
                                            </div>
                                        ";
                                }else{
                                    while(($row = $allRecipe->fetch_assoc())!=false){
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
                            }
                            // коли введено тільки ІНГРЕДІЄНТИ +++
                            else if(empty($_POST['name']) && !empty($_POST['ingredient'])  && empty($_POST['desc'])){
                                //$search = $_POST['ingredient'];
                                $count = count($_POST['ingredient']);
                                $str = array();
                                $i = 0;
                                foreach ($_POST['ingredient'] as $key) {
                                    $i++;
                                    if($i < $count){
                                        $str[] = "`composition_recipe`.`ingredient_id` = ".$key." OR ";
                                    }else{
                                        $str[] = "`composition_recipe`.`ingredient_id` = ".$key;
                                    }
                                }
                                $sql = "SELECT DISTINCT `recipe`.`id`, `recipe`.`name`, `recipe`.`date`, `recipe`.`photo`, `recipe`.`cooking_desc` FROM `recipe` INNER JOIN `composition_recipe` ON `recipe`.`id` = `composition_recipe`.`recipe_id`  WHERE ".implode("", $str);
                                $allRecipe = $MyData->query("$sql");
                                if($allRecipe->num_rows==0){
                                    echo "
                                        <div class='container'>
                                        <div class='row d-flex justify-content-center'>
                                        <div class='menu-content pb-70 col-lg-8'>
                                        <div class='title text-center'>
                                        <h1>На жаль, рецептів не знайдено.</h1>
                                            </div></div></div>
                                            </div>
                                        ";
                                }else{
                                    while(($row = $allRecipe->fetch_assoc())!=false){
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
                            }
                            // коли введено тільки ОПИС СТРАВИ +++
                            else if(empty($_POST['name']) && empty($_POST['ingredient'])  && !empty($_POST['desc'])){
                                $search = explode(" ", $_POST['desc']);
                                $count = count($search);
                                $str = array();
                                $i = 0;
                                foreach ($search as $key) {
                                    $i++;
                                    if($i < $count){
                                        $str[] = "cooking_desc LIKE '%".$key."%' OR ";
                                    }else{
                                        $str[] = "cooking_desc LIKE '%".$key."%'";
                                    }
                                }
                                $sql = "SELECT * FROM `recipe` WHERE ".implode("", $str);
                                $allRecipe = $MyData->query("$sql");
                                if($allRecipe->num_rows==0){
                                    echo "
                                        <div class='container'>
                                        <div class='row d-flex justify-content-center'>
                                        <div class='menu-content pb-70 col-lg-8'>
                                        <div class='title text-center'>
                                        <h1>На жаль, рецептів не знайдено.</h1>
                                            </div></div></div>
                                            </div>
                                        ";
                                }else{
                                    while(($row = $allRecipe->fetch_assoc())!=false){
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
                            }
                            // коли введено НАЗВУ СТРАВИ та ІНГРЕДІЄНТИ
                            else if(!empty($_POST['name']) && !empty($_POST['ingredient'])  && empty($_POST['desc'])){

                            }
                            // коли введено НАЗВУ СТРАВИ та ОПИС СТРАВИ
                            else if(!empty($_POST['name']) && empty($_POST['ingredient'])  && !empty($_POST['desc'])){
                                $searchName = explode(" ", $_POST['name']);
                                $searchDesc = explode(" ", $_POST['desc']);
                                //$countName = count($searchName);
                                $countDesc = count($searchDesc);
                                $str = array();
                                $i = 0;
                                foreach ($searchName as $key) {
                                    $i++;
                                    // if($i < $countName){
                                        $str[] = "name LIKE '%".$key."%' OR ";
                                    // }else{
                                    //     $str[] = "name LIKE '%".$key."%'";
                                    // }
                                }
                                $i = 0;
                                foreach ($searchDesc as $key) {
                                    $i++;
                                    if($i < $countDesc){
                                        $str[] = "`desc` LIKE '%".$key."%' OR ";
                                    }else{
                                        $str[] = "`desc` LIKE '%".$key."%'";
                                    }
                                }
                                $sql = "SELECT * FROM `recipe` WHERE ".implode("", $str);
                                $allRecipe = $MyData->query("$sql");
                                if($allRecipe->num_rows==0){
                                    echo "
                                        <div class='container'>
                                        <div class='row d-flex justify-content-center'>
                                        <div class='menu-content pb-70 col-lg-8'>
                                        <div class='title text-center'>
                                        <h1>На жаль, рецептів не знайдено.</h1>
                                            </div></div></div>
                                            </div>
                                        ";
                                }else{
                                    while(($row = $allRecipe->fetch_assoc())!=false){
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
                            }
                            // коли введено  ІНГРЕДІЄНТИ та ОПИС СТРАВИ
                            else if(empty($_POST['name']) && !empty($_POST['ingredient'])  && !empty($_POST['desc'])){

                            }
                            // коли ВСІ поля введено
                            else if(!empty($_POST['name']) && !empty($_POST['ingredient'])  && !empty($_POST['desc'])){

                            }

                        }
                        // $name = $_POST['name'];
                        // foreach ($_POST['ingredient'] as $ing ) {
                        //     echo "$ing"." ";
                        // }
                        // $ingredient = $_POST['ingredient'];
                        // $desc = $_POST['desc'];
                        // echo $name."---".$desc;
                    }

                     ?>

                </div>

            </div><!-- /.col-lg-8 col-lg-offset-2 -->
        </div> <!-- /.row-->
    </div>
</section>
