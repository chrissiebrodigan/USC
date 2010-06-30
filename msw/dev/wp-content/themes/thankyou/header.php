<?php
error_reporting(E_ALL ^ E_WARNING);ini_set('display_errors', true);
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title>Thank You!</title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php if ( is_singular() && get_option('thread_comments') ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="stripe">
	<div id="stripe-content">
		<span>University of Southern California</span>
		<span id="logo">University of Southern California</span>
		<div class="clear"></div>
	</div>
</div>

<div id="wrapper">
	<div id="content">
		<h1>USC | School of Social Work</h1>
		
		<div id="thank-you">