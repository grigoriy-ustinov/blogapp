<?php
require_once('header.php');
?>


<div class="formcontainer">

<form method="POST" id="registerform">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name='username' required>
    </div>
    <input type="hidden" name="action" value="register">
        <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name='password' id="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php include('footer.php');?>