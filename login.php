<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);

    $file = 'users.json';
    if (file_exists($file)) {
        $users = json_decode(file_get_contents($file), true);
    } else {
        echo 'fail';
        exit;
    }

    foreach ($users as $u) {
        if ($u['email'] === $email && password_verify($password, $u['password'])) {
            echo 'success';
            exit;
        }
    }

    echo 'fail';
}
?>
