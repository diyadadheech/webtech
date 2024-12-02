<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    $user = array(
        'name' => $name,
        'email' => $email,
        'password' => $password
    );

    $file = 'users.json';
    if (file_exists($file)) {
        $users = json_decode(file_get_contents($file), true);
    } else {
        $users = array();
    }

    foreach ($users as $u) {
        if ($u['email'] === $email) {
            echo 'User already exists';
            exit;
        }
    }

    $users[] = $user;
    file_put_contents($file, json_encode($users));

    echo 'success';
}
?>
