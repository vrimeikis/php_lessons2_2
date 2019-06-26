<?php

declare(strict_types = 1);

session_start();

function credentials(): array
{
    return [
        'username' => 'petras',
        'pass' => 'petraitis',
    ];
}

function getInputData(): array
{
    return $_GET + $_POST;
}

function login()
{
    $inputData = getInputData();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        unset($_SESSION['errors']);
        if (isset($inputData['submit_login']) && $inputData['submit_login'] === 'Submit') {
            if (isCredentialsValid($inputData)) {
                $expireTime = time() + 3600;
                setcookie('logged_in', '1', $expireTime);
                $_SESSION['user'] = $inputData;
//                setcookie('username', $_POST['username'], $expireTime);

            } else {
                unset($inputData['password'], $inputData['submit_login']);
                $_SESSION['postData'] = $inputData;
                $_SESSION['errors']['username'] = 'Login credentials is not correct!';
            }

            header('Location: session.php', true, 302);
        }

        if (isset($inputData['logout']) && $inputData['logout'] === 'Logout') {

            /**
             * unset($_COOKIE['logged_in']);
             * unset($_COOKIE['username']);
             */
            setcookie('logged_in', '1', time()-1);
//            setcookie('username', '', time()-1);
            unset($_SESSION['user'], $_SESSION['errors']);

            header('Location: session.php');
        }
    }
}

function isCredentialsValid(array $postCredentials): bool
{
    $userCredentials = credentials();
    $isValid = false;

    if (
        $userCredentials['username'] === $postCredentials['username'] &&
        $userCredentials['pass'] === $postCredentials['password']
    ) {
        $isValid = true;
    }

    return $isValid;
}

if (isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] == 1) {
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        ?>
        <p style="color: green"><?= $_SESSION['user']['username'] ?? 'default'; ?></p>
        <?php
    }
    ?>

    <form action="" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>

    <?php
} else {

    ?>

    <form action="" method="POST">

        <em style="color: red;"><?= $_SESSION['errors']['username'] ?? '';?></em>
        <input style="<?= isset($_SESSION['errors']['username']) ? 'border-color: red;' : '' ?>" type="text" name="username" value="<?= $_SESSION['postData']['username'] ?? ''; ?>" placeholder="Username">
        <br>
        <input type="password" name="password" value="" placeholder="Password">
        <br>
        <input type="submit" name="submit_login" value="Submit">
    </form>

    <?php
}

unset($_SESSION['errors'], $_SESSION['postData']);

login();









