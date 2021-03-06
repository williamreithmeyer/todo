<?php
global $page, $user;

$list = new _List();
$list->set($page->get(0));

$page->head();

echo "<input data-list=\"{$list->listID}\" class=\"w-100 mb-4 form-control-lg\" id=\"list_title_input\" value=\"{$list->name}\">";

echo "<div id=\"todo-list-items\">";
$list->display();
echo "</div>";
?>

<div class="input-group mb-3">
  <input type="text" id="list_item_input_add" class="form-control" placeholder="Todo Item">
  <div class="input-group-append">
    <button data-list="<?php echo $list->listID; ?>" id="list_item_button_add" class="btn btn-outline-secondary" type="button" id="button-addon2">Add</button>
  </div>
</div>

<button class="btn btn-danger" id="list_delete" data-list="<?php echo $list->listID; ?>">Delete</button>

<?php
$page->footer();
