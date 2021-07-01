<?php
require_once('database.php');
require_once('functions.php');

//call functions depending on form
if($_POST){
    if($_POST['action'] == 'login'){
        login($pdo);
    }elseif($_POST['action'] == 'register'){
        createUser($pdo);
    }
}

//logout button
if(isset($_GET['logout']))
{
    logout();
}

//find user if exists, verify password, display error message otherwise
function login($pdo)
{
    $stmt =$pdo->prepare('SELECT * FROM users WHERE username=:username');
    $stmt->execute(['username' => $_POST['username']]);
    $user = $stmt->fetch();
    if($user){
        //create session
        if(password_verify($_POST['password'], $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo json_encode(['err' => 'false', 'msg' => 'Success']);
        }
        else{
            echo json_encode(['err' => 'true', 'msg' => 'Incorrect username or password']);
        }
    }else{
        echo json_encode(['err' => 'true', 'msg' => 'Incorrect username or password']);
    }
}


function logout()
{

    session_destroy();
    header('Location:index.php');
    exit();
}


function createUser($pdo)
{
    //check if user already exists
    $stmt =$pdo->prepare('SELECT id FROM users WHERE email = :email OR username=:username');
    $stmt->execute(['email' => $_POST['email'], 'username' => $_POST['username']]);
    $user = $stmt->fetch();
    //display error message 
    if($user){
        echo json_encode(['err' => 'true', 'msg' => 'User already exists']);
    }else{
        //create new user and start the session
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt =$pdo->prepare('INSERT INTO users (username, email, password) VALUES (:username,:email,:password)');
        $stmt->execute(['email' => $_POST['email'], 'username' => $_POST['username'], 'password' => $hash]);
        $id = $pdo->lastInsertId();

        
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $_POST['username'];
        echo json_encode(['err' => 'false', 'msg' => 'Success']);
    }
}

?>