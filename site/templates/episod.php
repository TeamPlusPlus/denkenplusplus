<?php if(!r::is('ajax')) snippet('header') ?>
<?php snippet('menu') ?>

<?php echo snippet('episode', array('p' => $page)); ?>

<?php if(!r::is('ajax')) snippet('footer') ?>
