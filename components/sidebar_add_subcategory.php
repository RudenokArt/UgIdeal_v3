
<!-- Button trigger modal -->
<button
title="Добавить подкатегорию"
class="button-small-icon text-info"
data-bs-target="#Modal_<?php echo $value->cat_ID;?>"
data-bs-toggle="modal">
<i class="fa fa-plus-circle" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div
class="modal fade"
id="Modal_<?php echo $value->cat_ID;?>"
tabindex="-1"
aria-labelledby="Modal_<?php echo $value->cat_ID;?>_ModalLabel"
aria-hidden="true">
<form method="post" action="" class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="Modal_<?php echo $value->cat_ID;?>_ModalLabel">
        Добавить подкатегорию
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <input type="text" name="add_subcategory" class="form-control">
      <input type="hidden" name="parent" value="<?php echo $value->cat_ID; ?>">
    </div>
    <div class="modal-footer">
      <button class="btn btn-sm btn-outline-secondary">
        Сохранить
      </button>
    </div>
  </div>
</form>
</div>