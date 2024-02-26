
<!-- Button trigger modal -->
<button
title="Редактировать"
class="button-small-icon text-success"
data-bs-target="#Edit_<?php echo $edit_category->cat_ID;?>"
data-bs-toggle="modal">
<i class="fa fa-pencil" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div
class="modal fade"
id="Edit_<?php echo $edit_category->cat_ID;?>"
tabindex="-1"
aria-labelledby="Edit_<?php echo $edit_category->cat_ID;?>_ModalLabel"
aria-hidden="true">
<form method="post" action="" class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="Edit_<?php echo $edit_category->cat_ID;?>_ModalLabel">
        Редактировать:
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <input type="text" name="category_name" value="<?php echo $edit_category->name; ?>" class="form-control">
      <input type="hidden" name="edit_category" value="<?php echo $edit_category->cat_ID; ?>">
    </div>
    <div class="modal-footer">
      <button class="btn btn-sm btn-outline-secondary">
        Сохранить
      </button>
    </div>
  </div>
</form>
</div>