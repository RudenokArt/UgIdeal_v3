<?php 

if ($_POST['delete_category']) {

	$delete_category_alert = false;

	$category_has_subcategory = get_categories([
		'parent' => $_POST['delete_category'],
		'hide_empty' => false,
	]);

	$category_has_posts = get_category($_POST['delete_category'])->category_count;

	if ($category_has_subcategory or $category_has_posts) {
		$delete_category_alert = true;
	} else {
		wp_delete_category($_POST['delete_category']);
	}

}

if ($_POST['add_category']) {
	wp_create_category($_POST['add_category'], $category->cat_ID);
}

if ($_POST['add_subcategory']) {
	wp_create_category($_POST['add_subcategory'], $_POST['parent']);
}

$categories_list = get_categories([
	'chil_of' => $category->cat_ID,
	'hide_empty' => false,
]);
?>

<?php if ($delete_category_alert): ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		Категория содержит элеметы или подкатегории. Удаление невозможно.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif ?>

<div class="sidebar-menu">
	<ul>
		<?php foreach ($categories_list as $key => $value): ?>
			<?php if ($value->parent == $category->cat_ID): ?>
				<li class="sidebar-menu-category text-secondary bg-light mt-1 ps-2">
					<a href="?category=<?php echo $value->cat_ID; ?>"  class="text-decoration-none text-secondary">
						<b class=""><?php echo $value->name; ?></b>
					</a>
					<?php if ($is_admin) {
						$delete_category = $value;
						include 'sidebar_delete_category.php';
					} ?>
					<ul data-target="subcategories_list" data-value="<?php echo $value->cat_ID; ?>" class="d-none">
						<?php $subcategory_flag = false; ?>
						<?php foreach ($categories_list as $key1 => $value1): ?>
							<?php if ($value->cat_ID == $value1->parent): ?>
								<?php $subcategory_flag = true; ?>
								<li>
									<a href="?category=<?php echo $value1->cat_ID ?>" class="text-decoration-none text-body">
										<?php echo $value1->name; ?>
									</a>
									<?php if ($is_admin) {
										$delete_category = $value1;
										include 'sidebar_delete_category.php';
									} ?>
								</li>
							<?php endif ?>
						<?php endforeach ?>
						<?php if ($is_admin): ?>
							<form action="" method="post">
								<div class="card">
									<div class="card-header">
										Добавить подкатегорию
									</div>
									<div class="card-body">
										<input type="text" name="add_subcategory" class="form-control">
										<input type="hidden" name="parent" value="<?php echo $value->cat_ID; ?>">
									</div>
									<div class="card-footer">										
										<button class="btn btn-sm btn-outline-secondary">
											Сохранить
										</button>
									</div>
								</div>
							</form>			
						<?php endif ?>						
					</ul>
					<?php if ($subcategory_flag): ?>
						<span
						data-value="<?php echo $value->cat_ID; ?>"
						class="sidebar-menu-category-angle ps-2 pe-2 text-body"
						data-trigger="subcategories_list"
						><span class="d-none">
							<i class="fa fa-angle-up" aria-hidden="true"></i>
						</span>
						<span>
							<i class="fa fa-angle-down" aria-hidden="true"></i>
						</span></span>
					<?php endif ?>					
				</li>
			<?php endif ?>					
		<?php endforeach ?>				
	</ul>
	<?php if ($is_admin): ?>
		<form action="" method="post">
			<div class="card">
				<div class="card-header">
					Добавить категорию:
				</div>
				<div class="card-body">
					<input type="text" class="form-control" name="add_category">
				</div>
				<div class="card-footer">
					<button class="btn btn-sm btn-outline-secondary">
						Сохранить
					</button>
				</div>						
			</div>					
		</form>				
	<?php endif ?>
</div>

<script>
	$(document).ready(function () {

		$('span[data-trigger="subcategories_list"]').click(function () {
			$('ul[data-target="subcategories_list"]ul[data-value="'+$(this).attr('data-value')+'"]')
			.toggleClass('d-none');
			$(this).find('span').toggleClass('d-none');
		});

		$('form[data-action="delete_category_form"]').submit(function (e) {
			e.preventDefault();
			if (confirm($(this).attr('data-message'))) {
				this.submit();
			}
		});
	});
</script>