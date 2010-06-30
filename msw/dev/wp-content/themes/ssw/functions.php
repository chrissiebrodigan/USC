<?php

$post_types = array(
'Conversion',
'MSW',
'VAC',
'Ph.D.',
'Undergrad',
'Continuing Ed',
'Admissions',
'Academic',
'Events',
'Blog',
'About',
'Locations',
'Global',
'Students',
'Alumni & Friends',
'Misc.'
);

foreach ($post_types as $post_type) :
	register_post_type($post_type, array(
		'label' => __($post_type),
		'singular_label' => __($post_type),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => false,
		'query_var' => false,
		'supports' => array('title', 'editor', 'author', 'comments')
	));
endforeach;
?>