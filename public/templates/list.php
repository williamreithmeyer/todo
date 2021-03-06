<?php
global $page, $user;

$list = new _List();
$list->set($page->get(0));

$page->head();

echo "<input data-list=\"{$list->listID}\" class=\"form-control-lg\" id=\"list_title_input\" value=\"{$list->name}\">";

$list->display(); ?>

<div class="input-group mb-3">
  <input type="text" id="list-item-input-add" class="form-control" placeholder="Todo Item">
  <div class="input-group-append">
    <button id="list-item-button-add" class="btn btn-outline-secondary" type="button" id="button-addon2">Add</button>
  </div>
</div>

<button class="btn btn-danger" id="list_delete" data-list="<?php echo $list->listID; ?>">Delete</button>

<?php
$page->footer();
