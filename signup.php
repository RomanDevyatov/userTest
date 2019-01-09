<?php
require "db.php";

$data = $_POST;
if (isset($_POST['do_signup'])) {
        // registration is here
    $errors = array();
    if (trim($data['login']) == '') {
        $errors[] = "Введите логин!";
    }
    if (trim($data['email']) == '') {
        $errors[] = "Введите email!";
    }
    if ($data['password'] == '') {
        $errors[] = "Введите password!";
    }
    if ($data['password_2'] != $data['password']) {
        $errors[] = "Повторный password введен неверно!";
    }

    if (R::count(
        'user',
        "login=?",
        array($data['login'])
    ) > 0) {
        $errors[] = 'Пользоваель с таким логином уже существует!';
    }
    if (R::count(
        'user',
        "email=?",
        array($data['email'])
    ) > 0) {
        $errors[] = 'Пользоваель с таким email уже существует!';
    }
}

if (empty($errors)) {
    $user = R::dispense("user");//bean creating 
    $user->login = $data['login'];
    $user->email = $data['email'];
    $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
    R::store($user);//save in DB
    echo '<div style="color: green;">Вы успешно зарегигистрированы </div><hr>';
} else {
    echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
}





?>

<!-- <hr>
<a href="/index.php">Выйти</a> -->

<a href="https://bloggood.ru">ССЫЛКА на BLOGGOOD.RU</a>


<form action="/signup.php" method="POST">

    <style>
        .center {
            text-align: center;
        }
    </style>

    <div class="center">

        <p>
            <p><strong>Ваш логин</strong>:</p>
            <input type="text" name="login" value="<?php echo @$data['login']; ?>">
        </p>

        <p>
            <p><strong>Ваш email</strong>:</p>
            <input type="email" name="email" value="<?php echo @$data['email']; ?>">
        </p>

        <p>
            <p><strong>Ваш пароль</strong>:</p>
            <input type="password" name="password" value="<?php echo @$data['password']; ?>">
        </p>

        <p>
            <p><strong>Введите ваш пароль еще раз</strong>:</p>
            <input type="password" name="password_2" value="<?php echo @$data['password']; ?>">
        </p>

        <p>
            <button type="submit" name="do_signup">Зарегистрироваться</button>
        </p>

        <p>
            <input type="button" value="На главную" onclick="location.href='index.php'" />
        </p>
    </div>
</form>