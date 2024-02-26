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
</div>

<?php get_footer(); ?>