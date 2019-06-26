<?php

declare(strict_types = 1);

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
        if (isset($inputData['submit_login']) && $inputData['submit_login'] === 'Submit') {
            if (isCredentialsValid($inputData)) {
                $expireTime = time() + 3600;
                setcookie('logged_in', '1', $expireTime);
                setcookie('username', $_POST['username'], $expireTime);

                header('Location: cookie.php');
            } else {
                echo 'Error: Login credentials is not correct!';
            }
        }

        if (isset($inputData['logout']) && $inputData['logout'] === 'Logout') {

            /**
             * unset($_COOKIE['logged_in']);
             * unset($_COOKIE['username']);
             */
            setcookie('logged_in', '1', time()-1);
            setcookie('username', '', time()-1);

            header('Location: cookie.php');
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

login();

if (isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] == 1) {
    echo $_COOKIE['username'];
    ?>

    <form action="" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>

    <?php
} else {

    ?>

    <form action="" method="POST">
        <input type="text" name="username" value="" placeholder="Username">
        <input type="password" name="password" value="" placeholder="Password">
        <input type="submit" name="submit_login" value="Submit">
    </form>

    <?php
}
?>









