<?php
/**
 * 
 */
class WpBwgImage {

	public static $table = 'wp_bwg_image';

	public static function getList () {
		global $wpdb;
		return $wpdb->get_results(
			'SELECT `id`, `gallery_id`, `slug`, `image_url`, `thumb_url` FROM `'.self::$table.'`'
		);
	}
}