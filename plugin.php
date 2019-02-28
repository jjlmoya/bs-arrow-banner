<?php
/**
 * Plugin Name: Banner Arrow [BonSeo Block]
 * Plugin URI: https://www.bonseo.es/wordpress-gutenberg-blocks/arrow-banner
 * Description: Un banner simple en forma de flecha
 * Author: jjlmoya
 * Author URI: https://www.bonseo.es/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * @package BS
 */


if (!defined('ABSPATH')) {
	exit;
}


if (!function_exists('bs_create_block_category')) {
	function bs_create_block_category($categories, $post)
	{
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'bonseo-blocks',
					'title' => __('BonSeo', 'bonseo-blocks'),
				),
			)
		);
	}

	add_filter('block_categories', 'bs_create_block_category', 10, 2);
}


function bs_register_publisher_post_type()
{

	/**
	 * Post Type: Autores.
	 */

	$labels = array(
		"name" => __("Autores", "custom-post-type-ui"),
		"singular_name" => __("Autor", "custom-post-type-ui"),
	);

	$args = array(
		"label" => __("Autores", "custom-post-type-ui"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array("slug" => "publisher", "with_front" => true),
		"query_var" => true,
		"supports" => array("title", "editor", "thumbnail", "custom-fields"),
	);

	register_post_type("publisher", $args);
}

add_action('init', 'bs_register_publisher_post_type');


require_once plugin_dir_path(__FILE__) . 'src/init.php';
