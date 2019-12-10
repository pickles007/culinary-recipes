<?php
    include_once "views/sql_include.php";
    $MyData = new mysqli($host, $user, $pass, $database);
    $MyData->query("SET NAMES 'utf8'");
    $allcuisine = $MyData->query("SELECT * from `cuisine`");
    $allcookingmethod = $MyData->query("SELECT * from `cooking_method`");
    $alldishtype = $MyData->query("SELECT * from `dish_type`");
    $allingredients = $MyData->query("SELECT * from `ingredient`");

    if(isset($_POST["send"])){
        $name=htmlspecialchars ($_POST["name"]);
        $cooking_desc=htmlspecialchars ($_POST["cooking_desc"]);
        $photo;
        $dish_type_id = $_POST["dish_type"];
        $cooking_method_id = $_POST["cooking_method"];
        $cuisine_id = $_POST["cuisine"];
        $user_id=$_SESSION['MyID'];
        //echo "$cooking_desc";
        $date=date("Y-m-d H:i:s");
        $MyData->query("INSERT INTO `recipe` (`name`, `cooking_desc`, `date`, `dish_type_id`, `cooking_method_id`, `cuisine_id`, `user_id`) VALUES ('$name', '$cooking_desc', '$date', '$dish_type_id', '$cooking_method_id', '$cuisine_id', '$user_id')");
        $MyData->close();
        include_once "views/main.php";
        include_once "layout/footer.php";
        exit;
    }
?>
<script>
    function newIng() {
        let divControls = document.getElementsByClassName('controls');
        let divRow = document.createElement("div");
        divRow.setAttribute("class", "row");
        divControls.append(divRow);
        let divCol = document.createElement("div");
        divCol.setAttribute("class", "col-md-3");
        divRow.append(divCol);
        let divForm = document.createElement("div");
        divForm.setAttribute("class", "form-group");

        divCol.append(divForm);

        // var ing = document.getElementById('ing');
        // var unit_measure = document.getElementById('unit_measure');
        // var count = document.getElementById('count');
        var ing_html = "<label for='form_ingredients'>Інгредієнт *</label> <select required  class='form-control' name='dish_type' id='form_ingredients'>  </select>";
        divForm.append(ing_html);
        // newEl.innerHTML = ing_html;
        var unit_measure_html = "<label for='form_unit_measure'>Одиниця вимірювання *</label> <input id='form_unit_measure' type='text' name='unit_measure' class='form-control' placeholder='Введіть од. вим. *' required='required' data-error='Firstname is required.'>";
        // newEl.innerHTML = unit_measure_html;
        divForm.append(unit_measure_html);
        var count_html = "<label for='form_count'>К-сть *</label>s<input id='form_count' type='text' name='count' class='form-control' placeholder='Введіть к-сть *' required='required' data-error='Firstname is required.'>";
        // newEl.innerHTML = count_html;
        divForm.append(count_html);


        //      <div class="col-md-3">
        //    <div id="ing" class="form-group">
        // var blockItem = document.createElement('div');
        // blockItem.setAttribute("id", id);
        //
        // var item = document.createElement('span');
        // //item.className = "todo-container";
        //
        // var newListElem = document.createElement('input');
        // newListElem.innerHTML = "todo-text";
        //
        // var check = document.createElement("input");
        // check.setAttribute('type', 'checkbox');
        // check.className = "todo-checkbox";
        // check.setAttribute("onClick", "checkItem()");
        //
        // var del = document.createElement("button");
        // del.innerHTML = "DELETE";
        // del.setAttribute("onClick", "delItem("+id+")");
        // del.className = "todo-delete";
        //
        // var enter = document.createElement('br');
        //
        // itemCount++;
        //
        // itemCountSpan.innerHTML = itemCount;
        //
        // id++;
        // itemCountSpan.appendChild(item);
        // blockItem.appendChild(item);
        // blockItem.appendChild(newListElem);
        // blockItem.appendChild(check);
        // blockItem.appendChild(del);
        // //blockItem.appendChild(enter);
        //
        // list.appendChild(blockItem);
    }
</script>

<section class="home-about-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h1 class="text-center">Додавання нового рецепту</h1>
                <p class="lead">Тут ви повинні ввести всі дані про Ваш новий рецепт.</p>
                <form id="contact-form" method="post" action="" role="form">
                    <div class="messages"></div>
                    <div class="controls">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="form_ingredients">Інгредієнт *</label>
                                    <select required  class="form-control" name="dish_type" id="form_ingredients">
                                        <?php
                                        while(($row = $allingredients->fetch_assoc())!=false){
                                            echo "<option value='".$row['id']."'>".$row['name']."</option><br/>";
                                        }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

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
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div id="ing" class="form-group">
                                    <!-- <label for="form_ingredients">Інгредієнт *</label>
                                    <select required  class="form-control" name="dish_type" id="form_ingredients">
                                        <?php
                                        // while(($row = $allingredients->fetch_assoc())!=false){
                                        //     echo "<option value='".$row['id']."'>".$row['name']."</option><br/>";
                                        // }
                                        ?>
                                    </select> -->
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div id="unit_measure" class="form-group">
                                    <!-- <label for="form_unit_measure">Одиниця вимірювання *</label>
                                    <input id="form_unit_measure" type="text" name="unit_measure" class="form-control" placeholder="Введіть од. вим. *" required="required" data-error="Firstname is required."> -->
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div id="count" class="form-group">
                                    <!-- <label for="form_count">К-сть *</label>
                                    <input id="form_count" type="text" name="count" class="form-control" placeholder="Введіть к-сть *" required="required" data-error="Firstname is required."> -->
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button onClick="newIng()" type="button" name="send" class="form-control btn btn-success btn-send" value="Додати інгредієнт">Додати інгредієнт</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Опис приготування *</label>
                                    <textarea maxlength="5000" id="form_message" name="cooking_desc" class="form-control" placeholder="Заповніть опис приготування страви *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <input type="submit" name="send" class="btn btn-success btn-send" value="Додати">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-lg-8 col-lg-offset-2 -->
        </div> <!-- /.row-->
    </div>
</section>
