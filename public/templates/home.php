<?php
global $page, $user;

$page->head();
?>
<h1>Welcome back, <?php echo $user->name; ?></h1>

<?php
    // add list of list here
    // $lists = new _Lists();

    // foreach ($lists as $todolist){
    //     $list = new _List($todolist);
    //     $list->display_short();
    // }
?>

<a href="add" class="btn btn-primary" type="button">Create List</a>

<?php
$page->footer();
