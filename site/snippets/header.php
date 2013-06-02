<!DOCTYPE html>
<html lang="<?php echo $site->language(); ?>">
	<head>
		<meta charset="utf-8">
		<title><?php echo $site->title(); ?> » <?php echo Episodes::title($page); ?></title>
		
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<link href="<?php echo url('/feed/mp3') ?>" rel="alternate" type="application/rss+xml" title="Podcast-Feed (MP3)">
		<link href="<?php echo url('/feed/m4a') ?>" rel="alternate" type="application/rss+xml" title="Podcast-Feed (M4A)">
		<link href="<?php echo url('/feed/ogg') ?>" rel="alternate" type="application/rss+xml" title="Podcast-Feed (Ogg)">
		<link href="<?php echo url('/feed/opus') ?>" rel="alternate" type="application/rss+xml" title="Podcast-Feed (Opus)">
		
		<meta name="description" content="<?php echo $site->description(); ?>">
		<link rel="index" title="<?php echo $site->title(); ?>" href="<?php echo url('/'); ?>">
		
		<?php echo css('assets/css/main.css'); ?>
		
		<?php echo css('assets/vendor/podlove/podlove-web-player/static/podlove-web-player.css'); ?>
		
		<?php echo js('assets/vendor/podlove/podlove-web-player/libs/html5shiv.js'); ?>
		<?php echo js('assets/js/jquery.vendor.js#1.9.1'); ?>
		<?php echo js('assets/js/prefixfree.vendor.js#1.0.7'); ?>
		
		<?php echo js('assets/vendor/podlove/podlove-web-player/static/podlove-web-player.js'); ?>
		
		<?php echo js('assets/js/main.js'); ?>
		
		<link rel="shortcut icon" href="http://stuff.plusplus.serpens.uberspace.de/Images/Denken++/favicon.ico">
		<link rel="apple-touch-icon" sizes="144x144" href="http://stuff.plusplus.serpens.uberspace.de/Images/Denken++/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="114x114" href="http://stuff.plusplus.serpens.uberspace.de/Images/Denken++/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="http://stuff.plusplus.serpens.uberspace.de/Images/Denken++/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" href="http://stuff.plusplus.serpens.uberspace.de/Images/Denken++/apple-touch-icon.png">
	</head>
	<body>
		<div class="wrapper">
			<header>
				<div class="center">
					<h1><a href="<?php echo url('/'); ?>"><img src="http://stuff.plusplus.serpens.uberspace.de/Images/Denken++/logo.png" alt="<?php echo $site->title(); ?>"></a></h1>
				</div>
