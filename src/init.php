<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package BS
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}
$block = 'block-bs-arrow-banner';

register_block_type('bonseo/' . $block,
	array(
		'attributes' => array(
			'title' => array(
				'type' => 'string',
			),
			'content' => array(
				'type' => 'string',
			),
			'cta' => array(
				'type' => 'string',
			),
			'url' => array(
				'type' => 'string',
			),
			'className' => array(
				'type' => 'string',
			)

		),
		'render_callback' => 'render_bs_arrow_banner',
	)
);

function bs_arrow_banner_assets()
{
	wp_enqueue_style(
		'bs_arrow_banner-style-css',
		plugins_url('dist/blocks.style.build.css', dirname(__FILE__)),
		array('wp-editor')
	);
}

add_action('enqueue_block_assets', 'bs_arrow_banner_assets');

function bs_arrow_banner_editor_assets()
{ // phpcs:ignore
	// Scripts.
	wp_enqueue_script(
		'bs_arrow_banner-block-js', // Handle.
		plugins_url('/dist/blocks.build.js', dirname(__FILE__)), // Block.build.js: We register the block here. Built with Webpack.
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'), // Dependencies, defined above.
		// filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: File modification time.
		true // Enqueue the script in the footer.
	);
}

function render_bs_arrow_banner($attributes)
{
	$title = isset($attributes['title']) ? $attributes['title'] : '';
	$content = isset($attributes['content']) ? $attributes['content'] : '';
	$cta = isset($attributes['cta']) ? $attributes['cta'] : '';
	$url = isset($attributes['url']) ? $attributes['url'] : '';
	$class = isset($attributes['className']) ? ' ' . $attributes['className'] : '';


	return '
		<section class="og-banner-arrow ' . $class . ' l-grid-column--full">
			<div class="og-banner-arrow__simple a-pad">
				<h2 class="a-text a-text--xl a-text--secondary a-text--center">
					' . $title . '
				</h2>
				<p class="a-text a-text--center a-text--secondary">
					' . $content . '
				</p>
			</div>
			<div class="og-banner-arrow__edge  l-flex l-flex--justify-center a-pad">
				<a href="' . $url . '" class="a-bg a-button a-button--rounded a-button--s a-button--secondary">'. $cta . '</a>
			</div>
		</section>';
}

add_action('enqueue_block_editor_assets', 'bs_arrow_banner_editor_assets');
