<?php
global $page, $user;

$page->head();
?>
<h1>Welcome back, <?php echo $user->name; ?></h1>

<?php
    // add list of list here
    $lists = new _Lists();

    $lists = $lists->toArray;
    echo "<ul class=\"list-group\">";
    foreach ($lists as $todolist){
        $list = new _List($todolist);
        $list->display_short();
    }
    echo "</ul>";
?>

<a href="add" class="btn btn-primary" type="button">Create List</a>

<?php
$page->footer();
