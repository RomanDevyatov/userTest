<?php
require "db.php";
$data = $_POST;

$data = $_POST;
if (isset($_POST['do_login'])) {
    $errors = array();
    $user = R::findOne('user', 'login=?', array($data['login']));

    if ($user) {
        //var_dump($user);
        //login exists]
        if (password_verify($data['password'], $user->password)) {
            $_SESSION['logged_user'] = $user;
            echo '<div style="color: green;">Вы авторизованы, 
            можете перейти на главную страницу</div><hr>';
        } else {
            $errors[] = 'Неверно введен пароль!';
        }
    } else {
        $errors[] = 'Пользователь с таким логином не найден!';
    }

    if (!empty($errors)) {
        echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
    }

}


// if (isset($_POST['on_main'])) {

// }

?>

<form action="login.php" method=POST>


    <style>
        .center {
            text-align: center;
        }
    </style>

    <div class="center">
        <p>
            <p><strong>Логин</strong>:</p>
            <input type="text" name="login" value="<?php echo @$data['login']; ?>">
        </p>

        <p>
            <p><strong>Пароль</strong>:</p>
            <input type="password" name="password" value="<?php echo @$data['password']; ?>">
        </p>

        <p>

            <button type="submit" name="do_login">Войти</button>


        </p>

        <p>
            <input type="button" value="На главную" onclick="location.href='index.php'" />
        </p>
    </div>



</form>