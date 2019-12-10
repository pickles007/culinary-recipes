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
if(isset($_POST["send"])){
    if(empty($_POST["old_password"]) && empty($_POST["new_password"]) && empty($_POST["new_password1"])){
        $new_password = $row["password"];
    }else{
        if(!empty($_POST["old_password"]) ){
            if(!empty($_POST["new_password"]) || !empty($_POST["new_password1"])){
    // if(!empty($_POST["old_password"]) || !empty($_POST["new_password"]) || !empty($_POST["new_password1"])){
            if($_POST["old_password"] == $password ){
                if($_POST["new_password"] == $_POST["new_password1"]){
                    $new_password = $_POST["new_password"];
                }else{
                    $errorNewPassword = "Паролі не співпадають!";
                    // exit;
                }

            } else{
                $errorOldPassword = "Старий пароль невірний!";
                // exit;
            }
        }else{
            $errorNewPassword = "Паролі не співпадають!";
        }
    }else{
        $errorOldPassword = "Старий пароль невірний!";
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
// echo "<script>location.assign('views/myAccount.php')</script>";
include_once "views/myAccount.php";
// include_once "layout/footer.php";
//exit;

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
                                    <label for="form_name">Ім`я</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Введіть ім`я" required="required" data-error="Firstname is required." value="<?=$name?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Прізвище</label>
                                    <input id="form_name" type="text" name="surname" class="form-control" placeholder="Введіть прізвище" required="required" data-error="Lastname is required." value="<?=$surname?>">
                                    <div  class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="form_name">Логін</label>
                                    <input id="form_name" type="text" name="login" class="form-control" placeholder="Введіть логін" required="required" data-error="Login is required." value="<?=$login?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="form_name">Електронна пошта</label>
                                    <input id="form_name" type="email" name="email" class="form-control" placeholder="Введіть e-mail" required="required" data-error="E-mail is required." value="<?=$email?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="form_photo">Телефон</label>
                                    <input id="form_photo" type="text" name="phone" class="form-control" placeholder="Введіть номер телефону" required="required" data-error="Phone is required." value="<?=$phone?>">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_photo"> Старий пароль</label>
                                    <input id="form_photo" type="password" name="old_password" class="form-control" placeholder="Введіть старий пароль"  data-error="Phone is required.">
                                    <div style="color:red; font-size:16px;" class="help-block with-errors"> <?=$errorOldPassword?> </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_photo"> Новий пароль</label>
                                    <input id="form_photo" type="password" name="new_password" class="form-control" placeholder="Введіть новий пароль"  data-error="Phone is required.">
                                    <div style="color:red; font-size:16px;" class="help-block with-errors"><?=$errorNewPassword?></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_photo"> Повторіть новий пароль</label>
                                    <input id="form_photo" type="password" name="new_password1" class="form-control" placeholder="Повторіть новий пароль"  data-error="Phone is required.">
                                    <div class="help-block with-errors"></div>
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
