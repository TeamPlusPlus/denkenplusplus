<!DOCTYPE html>
<html lang="de" prefix="og: http://ogp.me/ns#">
	<head>
		<meta charset="utf-8">
		<title><?php echo $site->title(); ?> » <?php echo Episodes::title($page); ?></title>
		
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<meta property="og:title" content="<?php echo Episodes::title($page); ?>">
		<meta property="og:type" content="audio.podcast">
		<meta property="og:url" content="<?php echo $page->url(); ?>">
		<?php if(Episodes::infos($page)->image): ?>
		<meta property="og:image" content="<?php echo Episodes::infos($page)->image['url'] ?>">
		<meta property="og:image:type" content="image/jpeg">
		<?php else: ?>
		<meta property="og:image" content="http://stuff.plusp.lu/Images/<?php echo $site->title(); ?>/profile.png">
		<meta property="og:image:type" content="image/png">
		<?php endif; ?>
		<meta property="og:image:width" content="1000">
		<meta property="og:image:height" content="1000">
		<?php if(Episodes::infos($page)->mp3): ?>
		<meta property="og:audio" content="<?php echo Episodes::infos($page)->mp3['url'] ?>">
		<meta property="og:audio:type" content="audio/mpeg">
		<?php endif; ?>
		<?php if($page->subtitle()): ?>
		<meta property="og:description" content="<?php echo $page->subtitle() ?>">
		<?php endif; ?>
		<meta property="og:determiner" content="the">
		<meta property="og:locale" content="de_DE">
		<meta property="og:site_name" content="<?php echo $site->title() ?>">
		
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
		
		<link rel="shortcut icon" href="http://stuff.plusp.lu/Images/<?php echo $site->title(); ?>/favicon.ico">
		<link rel="apple-touch-icon" sizes="144x144" href="http://stuff.plusp.lu/Images/<?php echo $site->title(); ?>/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="114x114" href="http://stuff.plusp.lu/Images/<?php echo $site->title(); ?>/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="http://stuff.plusp.lu/Images/<?php echo $site->title(); ?>/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" href="http://stuff.plusp.lu/Images/<?php echo $site->title(); ?>/apple-touch-icon.png">
	</head>
	<body>
		<div class="wrapper">
			<header>
				<div class="center">
					<h1><a href="<?php echo url('/'); ?>"><img src="http://stuff.plusp.lu/Images/<?php echo $site->title(); ?>/logo.png" alt="<?php echo $site->title(); ?>"></a></h1>
				</div>
