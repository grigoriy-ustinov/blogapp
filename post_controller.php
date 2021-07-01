<?php
require_once('database.php');

if($_POST){
    if($_POST['action'] == 'create_post'){
        create_post($pdo);
    }
}
//runs always, outputs all the posts in the database
$stmt =$pdo->prepare('SELECT title, body, time FROM posts');
$stmt->execute();
$posts = $stmt->fetchAll();
if(empty($posts)){
    echo    '<div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">The database is empty!</h4>
                <p>You can fix this by registrating and writing something.</p>
                <hr>
            </div>';
}else{
    foreach ($posts as $post){
        echo <<<EX
            <div class='postcontainer'>
                <h4>
                    {$post['title']}
                </h4>
                <div class='post'>
                    {$post['body']}
                </div>
                <div class='time'>
                    {$post['time']}
                </div>
            </div>
        EX;

    }
}
//called by submiting a form, creates new post and restarts the page
function create_post($pdo){
    if(!empty($_POST['title']) && !empty($_POST['body'])){
        $_POST['title'] = htmlspecialchars($_POST['title']);
        $_POST['body'] = htmlspecialchars($_POST['body']);
        $stmt = $pdo->prepare('INSERT INTO posts (title, body, author_id) VALUES (:title, :body, :author_id)');
        $stmt->execute(['title' => $_POST['title'], 'body' => $_POST['body'], 'author_id' => $_SESSION['user_id']]);

        header('Location:index.php');
        exit();
    }
}
