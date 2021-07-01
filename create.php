<?php
require_once('database.php');
require_once('functions.php');

echo($_POST['form_action']);
if(!$_POST['username'] || !$_POST['email'] || !$_POST['password'])
{
    header('register.php');
}

//check if user already exists
$stmt =$pdo->prepare('SELECT id FROM users WHERE email = :email OR username=:username');
$stmt->execute(['email' => $_POST['email'], 'username' => $_POST['username']]);
$user = $stmt->fetch();
if($user){
    sendError('User already exists');
}else{
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt =$pdo->prepare('INSERT INTO users (username, email, password) VALUES (:username,:email,:password)');
    $stmt->execute(['email' => $_POST['email'], 'username' => $_POST['username'], 'password' => $hash]);
    header('Location:', $basedir.'/index.php');
    exit();
}

?>