
<style>

/* ==========================================================================
#FONT
========================================================================== */
.font-robo {
    font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
}

/* ==========================================================================
#GRID
========================================================================== */
.row {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}

.row-space {
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

.col-2 {
    width: -webkit-calc((100% - 60px) / 2);
    width: -moz-calc((100% - 60px) / 2);
    width: calc((100% - 60px) / 2);
}

@media (max-width: 767px) {
    .col-2 {
        width: 100%;
    }
}

/* ==========================================================================
#BOX-SIZING
========================================================================== */
/**
* More sensible default box-sizing:
* css-tricks.com/inheriting-box-sizing-probably-slightly-better-best-practice
*/
html {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

* {
    padding: 0;
    margin: 0;
}

*, *:before, *:after {
    -webkit-box-sizing: inherit;
    -moz-box-sizing: inherit;
    box-sizing: inherit;
}

/* ==========================================================================
#RESET
========================================================================== */
/**
* A very simple reset that sits on top of Normalize.css.
*/
body,
h1, h2, h3, h4, h5, h6,
blockquote, p, pre,
dl, dd, ol, ul,
figure,
hr,
fieldset, legend {
    margin: 0;
    padding: 0;
}

/**
* Remove trailing margins from nested lists.
*/
li > ol,
li > ul {
    margin-bottom: 0;
}

/**
* Remove default table spacing.
*/
table {
    border-collapse: collapse;
    border-spacing: 0;
}

/**
* 1. Reset Chrome and Firefox behaviour which sets a `min-width: min-content;`
*    on fieldsets.
*/
fieldset {
    min-width: 0;
    /* [1] */
    border: 0;
}

button {
    outline: none;
    background: none;
    border: none;
}

/* ==========================================================================
#PAGE WRAPPER
========================================================================== */
.page-wrapper {
    min-height: 100vh;
}

body {
    font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
    font-weight: 400;
    font-size: 14px;
}

h1, h2, h3, h4, h5, h6 {
    font-weight: 400;
}

h1 {
    font-size: 36px;
}

h2 {
    font-size: 30px;
}

h3 {
    font-size: 24px;
}

h4 {
    font-size: 18px;
}

h5 {
    font-size: 15px;
}

h6 {
    font-size: 13px;
}

/* ==========================================================================
#BACKGROUND
========================================================================== */
.bg-blue {
    background: #2c6ed5;
}

.bg-red {
    background: #fa4251;
}

/* ==========================================================================
#SPACING
========================================================================== */
.p-t-100 {
    padding-top: 100px;
}

.p-t-180 {
    padding-top: 180px;
}

.p-t-20 {
    padding-top: 20px;
}

.p-t-30 {
    padding-top: 30px;
}

.p-b-100 {
    padding-bottom: 100px;
}

/* ==========================================================================
#WRAPPER
========================================================================== */
.wrapper {
    margin: 0 auto;
}

.wrapper--w960 {
    max-width: 960px;
}

.wrapper--w680 {
    max-width: 680px;
}

/* ==========================================================================
#BUTTON
========================================================================== */
.btn {
    line-height: 40px;
    display: inline-block;
    padding: 0 25px;
    cursor: pointer;
    color: #fff;
    font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
    font-size: 14px;
    font-weight: 700;
}

.btn--radius {
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}

.btn--green {
    background: #57b846;
}

.btn--green:hover {
    background: #4dae3c;
}

/* ==========================================================================
#DATE PICKER
========================================================================== */
td.active {
    background-color: #2c6ed5;
}

input[type="date" i] {
    padding: 14px;
}

.table-condensed td, .table-condensed th {
    font-size: 14px;
    font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
    font-weight: 400;
}

.daterangepicker td {
    width: 40px;
    height: 30px;
}

.daterangepicker {
    border: none;
    -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    display: none;
    border: 1px solid #e0e0e0;
    margin-top: 5px;
}

.daterangepicker::after, .daterangepicker::before {
    display: none;
}

.daterangepicker thead tr th {
    padding: 10px 0;
}

.daterangepicker .table-condensed th select {
    border: 1px solid #ccc;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    font-size: 14px;
    padding: 5px;
    outline: none;
}

/* ==========================================================================
#FORM
========================================================================== */
input {
    outline: none;
    margin: 0;
    border: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    width: 100%;
    font-size: 14px;
    font-family: inherit;
}

/* input group 1 */
/* end input group 1 */
.input-group {
    position: relative;
    margin-bottom: 32px;
    border-bottom: 1px solid #e5e5e5;
}

.input-icon {
    position: absolute;
    font-size: 18px;
    color: #ccc;
    right: 8px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    cursor: pointer;
}

.input--style-2 {
    padding: 9px 0;
    color: #666;
    font-size: 16px;
    font-weight: 500;
}

.input--style-2::-webkit-input-placeholder {
    /* WebKit, Blink, Edge */
    color: #808080;
}

.input--style-2:-moz-placeholder {
    /* Mozilla Firefox 4 to 18 */
    color: #808080;
    opacity: 1;
}

.input--style-2::-moz-placeholder {
    /* Mozilla Firefox 19+ */
    color: #808080;
    opacity: 1;
}

.input--style-2:-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: #808080;
}

.input--style-2:-ms-input-placeholder {
    /* Microsoft Edge */
    color: #808080;
}

/* ==========================================================================
#SELECT2
========================================================================== */
.select--no-search .select2-search {
    display: none !important;
}

.rs-select2 .select2-container {
    width: 100% !important;
    outline: none;
}

.rs-select2 .select2-container .select2-selection--single {
    outline: none;
    border: none;
    height: 36px;
}

.rs-select2 .select2-container .select2-selection--single .select2-selection__rendered {
    line-height: 36px;
    padding-left: 0;
    color: #808080;
    font-size: 16px;
    font-family: inherit;
    font-weight: 500;
}

.rs-select2 .select2-container .select2-selection--single .select2-selection__arrow {
    height: 34px;
    right: 4px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -moz-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

.rs-select2 .select2-container .select2-selection--single .select2-selection__arrow b {
    display: none;
}

.rs-select2 .select2-container .select2-selection--single .select2-selection__arrow:after {
    font-family: "Material-Design-Iconic-Font";
    content: '\f2f9';
    font-size: 18px;
    color: #ccc;
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.rs-select2 .select2-container.select2-container--open .select2-selection--single .select2-selection__arrow::after {
    -webkit-transform: rotate(-180deg);
    -moz-transform: rotate(-180deg);
    -ms-transform: rotate(-180deg);
    -o-transform: rotate(-180deg);
    transform: rotate(-180deg);
}

.select2-container--open .select2-dropdown--below {
    border: none;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    border: 1px solid #e0e0e0;
    margin-top: 5px;
    overflow: hidden;
}

/* ==========================================================================
#TITLE
========================================================================== */

.title {
    text-transform: uppercase;
    font-weight: 700;
    margin-bottom: 37px;
}

/* ==========================================================================
#CARD
========================================================================== */
.card {
    overflow: hidden;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    background: #fff;
}

.card-2 {
    -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    width: 100%;
    display: table;
}

.card-2 .card-heading {
    background: url("../images/bg-heading-02.jpg") top left/cover no-repeat;
    width: 29.1%;
    display: table-cell;
}

.card-2 .card-body {
    display: table-cell;
    padding: 80px 90px;
    padding-bottom: 88px;
}

@media (max-width: 767px) {
    .card-2 {
        display: block;
    }
    .card-2 .card-heading {
        width: 100%;
        display: block;
        padding-top: 300px;
        background-position: left center;
    }
    .card-2 .card-body {
        display: block;
        padding: 60px 50px;
    }
}

</style>


<?php

$wasError = false;
$loginErr = $phoneErr = $passwordErr = $passwordErr1 = $emailErr = $surnameErr = $nameErr = "";
if(isset($_POST["send"])){
    if(!empty($_POST)) {
        //   /^[a-zA-Zа-яёА-ЯЁ\s\-]+$/u
        if(!preg_match("/^[a-zа-я\d]{1}[a-zа-я\d\s]*[a-zа-я\d]{1}$/i", $_POST["surname"])) {
            $surnameErr ="Тільки літери!";
            $wasError = true;
        }


        if(!preg_match("/^[a-zа-я\d]{1}[a-zа-я\d\s]*[a-zа-я\d]{1}$/i", $_POST["name"])) {
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



        if(!preg_match("/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,})$/", $_POST["password"])) {
            $passwordErr="Не менше 7 літер, обов’язково має містити великі та малі літери, а також цифри";
            $wasError = true;
        }



        if ($_POST["password"]!=$_POST["password1"]) {
            $passwordErr1="Паролі не співпадають.";
            $wasError = true;
        }

        include_once "views/sql_include.php";
        $MyData = new mysqli($host, $user, $pass, $database);
        $MyData->query("SET NAMES 'utf8'");
        $check_Login = $MyData->query("SELECT login FROM users");
        while(($row = $check_Login->fetch_assoc())!=false){
            if($row["login"]==$_POST["login"]){
                $loginErr="Користувач з таким логіном вже існує!";
                $wasError=true;
            }
        }
        $check_Email = $MyData->query("SELECT email FROM users");
        while(($row = $check_Email->fetch_assoc())!=false){
            if($row["email"]==$_POST["email"]){
                $emailErr="Ця e-mail адреса вже зареєстрована!";
                $wasError=true;
            }
        }
        $MyData->close();


        if ($wasError == false){
            $surname = $_POST['surname'];
            $name = $_POST['name'];
            $email=$_POST["email"];
            $phone = $_POST["phone"];
            $login=$_POST['login'];
            //$pass_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $pass_hash = $_POST["password"];
            //$country=$_POST["country"];
            //---------MySQL-----------
            include_once "views/sql_include.php";
            $MyData = new mysqli($host, $user, $pass, $database);
            $MyData->query("SET NAMES 'utf8'");
            $res = $MyData->query("INSERT INTO `users` (`surname`, `name`, `email`, `phone`, `login`, `password`) VALUES ('$surname', '$name', '$email', '$phone', '$login', '$pass_hash')");
            $MyData->close();
            if($res){
                echo "<script>location.assign('index.php')</script>";
                // echo "<p class = 'done'>Ви успішно зареєструвались. <br> <a href='?action=main'>На головну.</a></p>";
            } else{
                echo "<p>ERROR REGISTRATION</p>";
            }
            include_once 'layout/footer.php';
            exit();
        }

    }
}

?>


<div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
    <div class="wrapper wrapper--w960">
        <div class="card card-2">
            <!-- <div class="card-heading"></div> -->
            <div class="card-body">
                <h2 class="title">Реєстрація</h2>
                <form method="POST" >

                    <div style="color:red;" class="help-block with-errors"><?=$surnameErr?></div>
                    <div class="input-group">
                        <!-- <label for="name" class="bmd-label-floating is-focused">Прізвище</label> -->
                        <input id="name" required class="input--style-2" type="text" placeholder="Прізвище" name="surname">
                    </div>

                    <div style="color:red;" class="help-block with-errors"><?=$nameErr?></div>
                    <div class="input-group">
                        <input required class="input--style-2" type="text" placeholder="Ім'я" name="name">
                    </div>

                    <div style="color:red;" class="help-block with-errors"><?=$emailErr?></div>
                    <div class="input-group">
                        <input required class="input--style-2" type="text" placeholder="Email" name="email">
                    </div>

                    <div style="color:red;" class="help-block with-errors"><?=$phoneErr?></div>
                    <div class="input-group">
                        <input required class="input--style-2" type="text" placeholder="Телефон" name="phone">
                    </div>

                    <div style="color:red;" class="help-block with-errors"><?=$loginErr?></div>
                    <div class="input-group">
                        <input required class="input--style-2" type="text" placeholder="Логін" name="login">
                    </div>

                    <div style="color:red;" class="help-block with-errors"><?=$passwordErr?></div>
                    <div class="input-group">
                        <input required class="input--style-2" type="password" placeholder="Пароль" name="password">
                    </div>

                    <div style="color:red;" class="help-block with-errors"><?=$passwordErr1?></div>
                    <div class="input-group">
                        <input required class="input--style-2" type="password" placeholder="Повторіть пароль" name="password1">
                    </div>

                    <div class="p-t-30">
                        <button class="btn btn--radius btn--green" type="submit" name="send">Реєстрація</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
