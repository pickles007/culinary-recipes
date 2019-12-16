<?php
if(isset($_SESSION["MyAdm"])){
    echo "<h1 style='text-align:center;'>Ви не маєте доступу до цієї сторінки!</h1>";
    include_once "layout/footer.php";
    exit;
}

$id=(int)$_SESSION['MyID'];
include_once "views/sql_include.php";
$MyData = new mysqli($host, $user, $pass, $database);
$MyData->query("SET NAMES 'utf8'");
$allnews = $MyData->query("SELECT * FROM `users` WHERE `id` = ".$id);
if($allnews->num_rows==0){
    echo "<h1 style='text-align:center;'>Такої сторінки не існує!</h1>";
    include_once "layout/footer.php";
    exit;
}
$row = $allnews->fetch_assoc();
$name=$row["name"];
$surname=$row["surname"];
$login=$row["login"];
$email=$row["email"];
$phone=$row["phone"];
$password=$row["password"];
$errorNewPassword = '';
$errorOldPassword = '';
$new_password = '';

$wasError = false;
$loginErr = $phoneErr = $passwordErr = $passwordErr1 = $emailErr = $surnameErr = $nameErr = "";

if(isset($_POST["send"])){


    if(!empty($_POST)) {
        //   /^[a-zA-Zа-яёА-ЯЁ\s\-]+$/u
        if(!preg_match("/^[a-zA-Zа-яА-Я]{1,}$/u", htmlspecialchars($_POST["surname"]))) {
            $surnameErr ="Тільки літери!";
            $wasError = true;
        }

        if(!preg_match("/^[a-zA-Zа-яА-Я]{1,}$/u", $_POST["name"])) {
            $nameErr ="Тільки літери!";
            $wasError = true;
        }

        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr="Некоректно введено email";
            $wasError = true;
        }

        if(!preg_match("/^\+380\d{3}\d{2}\d{2}\d{2}$/", $_POST["phone"])) {
            $phoneErr ="Тільки цифри, починати з +380";
            $wasError = true;
        }

        if(!preg_match("/^[-_0-9a-zA-Zа-яА-Я]{4,}$/", $_POST["login"])) {
            $loginErr ="Не менше 4 літер, може містити лише латинські та кириличні літери (великі та малі), цифри, нижнє підкреслення та дефіс";
            $wasError = true;
        }


        if ($wasError == false){
            if(empty($_POST["old_password"]) && empty($_POST["new_password"]) && empty($_POST["new_password1"])){
                $new_password = $row["password"];
            }else{
                if(!empty($_POST["old_password"]) ){
                    if(!empty($_POST["new_password"]) || !empty($_POST["new_password1"])){
                        // if(!empty($_POST["old_password"]) || !empty($_POST["new_password"]) || !empty($_POST["new_password1"])){
                        if($_POST["old_password"] == $password ){
                            if( preg_match("/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,})$/", $_POST["new_password"]) && $_POST["new_password"] == $_POST["new_password1"]){
                                $new_password = $_POST["new_password"];
                                $errorNewPassword = "Пароль змінено!";
                            }else{
                                $errorNewPassword = "Паролі не співпадають!";
                                $new_password = $row["password"];
                                // exit;
                            }

                        } else{
                            $errorOldPassword = "Старий пароль невірний!";
                            $new_password = $row["password"];
                            // exit;
                        }
                    }else{
                        $errorNewPassword = "Паролі не співпадають!";
                        $new_password = $row["password"];
                    }
                }else{
                    $errorOldPassword = "Старий пароль невірний!";
                    $new_password = $row["password"];
                }
            }

            // }

            $post_name=$_POST["name"];
            $post_surname=$_POST["surname"];
            $post_login=$_POST["login"];
            $post_email=$_POST["email"];
            $post_phone=$_POST["phone"];
            $post_password=$_POST["password"];

            $MyData->query("UPDATE `users` SET `name` = '$post_name', `surname` = '$post_surname', `login` = '$post_login', `email` = '$post_email', `phone` = '$post_phone', `password` = '$new_password' WHERE `users`.`id` = '$id'");
            echo "<script>location.assign('?action=myAccount')</script>";

        }
    }
}
$MyData->close();
?>

<section class="home-about-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h1 class="text-center">Профіль користувача</h1>
                <p class="lead">На даній сторінці Ви можете переглянути та редагувати власні дані.</p>
                <form id="contact-form" method="post" action="" role="form">
                    <div class="messages"></div>
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div style="color:red;" class="help-block with-errors"><?=$nameErr?></div>
                                    <label for="form_name">Ім`я</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Введіть ім`я" required="required" data-error="Firstname is required." value="<?=$name?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div style="color:red;" class="help-block with-errors"><?=$surnameErr?></div>
                                    <label for="form_surname">Прізвище</label>
                                    <input id="form_surname" type="text" name="surname" class="form-control" placeholder="Введіть прізвище" required="required" data-error="Lastname is required." value="<?=$surname?>">
                                    <div  class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div style="color:red;" class="help-block with-errors"><?=$loginErr?></div>
                                    <label for="form_login">Логін</label>
                                    <input id="form_login" type="text" name="login" class="form-control" placeholder="Введіть логін" required="required" data-error="Login is required." value="<?=$login?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div style="color:red;" class="help-block with-errors"><?=$emailErr?></div>
                                    <label for="form_email">Електронна пошта</label>
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Введіть e-mail" required="required" data-error="E-mail is required." value="<?=$email?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div style="color:red;" class="help-block with-errors"><?=$phoneErr?></div>
                                    <label for="form_phone">Телефон</label>
                                    <input id="form_phone" type="text" name="phone" class="form-control" placeholder="Введіть номер телефону" required="required" data-error="Phone is required." value="<?=$phone?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div style="color:red; font-size:16px;" class="help-block with-errors"> <?= $errorOldPassword ?> </div>
                                    <label for="form_oldpassword"> Старий пароль</label>
                                    <input id="form_oldpassword" type="password" name="old_password" class="form-control" placeholder="Введіть старий пароль"  data-error="Phone is required.">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_newpassword"> Новий пароль</label>
                                    <input id="form_newpassword" type="password" name="new_password" class="form-control" placeholder="Введіть новий пароль"  data-error="Phone is required.">
                                    <div class="help-block with-errors" style="color:red; font-size:16px;" ><?= $errorNewPassword ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_newpassword1"> Повторіть новий пароль</label>
                                    <input id="form_newpassword1" type="password" name="new_password1" class="form-control" placeholder="Повторіть новий пароль"  data-error="Phone is required.">

                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" name="send" class="btn btn-success btn-send" value="Зберегти">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.col-lg-8 col-lg-offset-2 -->
        </div> <!-- /.row-->
    </div>
</section>
