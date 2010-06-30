<?php
register_post_type('MAT', array(
	'label' => __('MAT'),
	'singular_label' => __('MAT'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => false,
	'query_var' => false,
	'rewrite' => array("slug" => "MAT"), // Permalinks
	'query_var' => "MAT", // This goes to the WP_Query schema
	'supports' => array('title', 'editor', 'author', 'comments')
));

register_post_type('MSW', array(
	'label' => __('MSW'),
	'singular_label' => __('MSW'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => false,
	'query_var' => false,
	'rewrite' => array("slug" => "MSW"),
	'query_var' => "MSW",
	'supports' => array('title', 'editor', 'author', 'comments')
));
?>