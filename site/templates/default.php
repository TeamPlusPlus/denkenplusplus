<?php if(!r::is('ajax')) snippet('header') ?>
<?php snippet('menu') ?>

				<?php if(!$page->showtitle() or $page->showtitle() != 'No'): ?><h2><?php echo $page->title(); ?></h2><?php endif; ?>
				<?php echo kirbytext($page->text()); ?>

<?php if(!r::is('ajax')) snippet('footer') ?>
