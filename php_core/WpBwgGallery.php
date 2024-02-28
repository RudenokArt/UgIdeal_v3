<?php
/**
 * 
 */
class WpBwgGallery {

	public static $img_folder = '/wp-content/uploads/photo-gallery';
	
	public static $table = 'wp_bwg_gallery';

	public static function getList () {
		global $wpdb;
		return $wpdb->get_results(
			'SELECT `id`, `name`, `preview_image`, `random_preview_image`, `slug` FROM `'.self::$table.'`'
		);
	}
}