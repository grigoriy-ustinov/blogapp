<?php
include('header.php');
?>


<div class="formcontainer">

<form method="POST" id='loginform'>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name='username' required>
    </div>
    <input type="hidden" name="action" value="login">
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name='password' id="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <p>Or if you don't have an accout <a class="link-primary" href="register.php">Sign up</a></p>
</form>
</div>

<?php include('footer.php');?>