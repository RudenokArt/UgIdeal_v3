<?php
$page = 'modular';
$is_admin = current_user_can('administrator');
$category = get_category_by_slug($page);
get_header(); 
?>

<div class="row">
	<div class="col-lg-3 col-md-4 col-sm-6 col-12">
		<?php include_once 'components/sidebar_menu.php'; ?>
	</div>
	<div class="col-lg-9 col-md-8 col-6 col-12">
		<?php if ($is_admin): ?>
			<div class="p-2">
				<a href="/modular_add/" class="btn btn-outline-info">
					<i class="fa fa-plus-circle" aria-hidden="true"></i>
					Добавить изображение
				</a>
			</div>
		<?php endif ?>
	</div>
</div>

<?php get_footer(); ?>