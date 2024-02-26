<form
action=""
method="post"
data-action="delete_category_form"
data-message="Удалить категорию <?php echo $delete_category->name; ?>?"
method="post" class="d-inline">
<input name="delete_category" type="hidden" value="<?php echo $delete_category->cat_ID; ?>">
<button class="button-small-icon text-danger" title="Удалить">
	<i class="fa fa-trash-o" aria-hidden="true"></i>
</button></form>