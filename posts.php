<?php
require_once('post_controller.php');
if(isset($_SESSION['user_id']))
{
?>
<div class="formcontainer">
    <form method="POST" action="post_controller.php">
        <div class="mb-3">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name ="title">
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="body">Example textarea</label>
                <textarea class="form-control" id="body" name="body"></textarea>
            </div>
        </div>
        <button type="submit" name="action" value="create_post" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
}
?>