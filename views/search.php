<?php

include_once "views/sql_include.php";
$MyData = new mysqli($host, $user, $pass, $database);
$MyData->query("SET NAMES 'utf8'");
$allingredients = $MyData->query("SELECT * from `ingredient`");
$err = '';


//$ingredient = $_POST['ingredient'];
if(isset($_POST["send"])){
    if(empty($_POST['name']) && empty($_POST['ingredient'])  && empty($_POST['desc'])){
        $err = 'Для пошуку рецептів заповніть хоча б одне поле';
    }else{

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

                <div class="row">



                </div>

            </div><!-- /.col-lg-8 col-lg-offset-2 -->
        </div> <!-- /.row-->
    </div>
</section>
