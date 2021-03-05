<?php
global $page;

$page->head();
?>

<form method="POST">
  <div class="form-group">
    <label for="exampleInputUsername1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputUsername1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <input type="submit" name="login_submit" class="btn btn-primary" value="Submit">
</form>

<?php
$page->footer();
