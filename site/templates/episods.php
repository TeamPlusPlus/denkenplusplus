<?php if(!r::is('ajax')) snippet('header') ?>
<?php snippet('menu') ?>

<?php
$newestID = Episodes::title(Episodes::newest(), 2);

$first = true;
foreach($page->children()->flip() as $p):
	if(Episodes::title($p, 2) > $newestID) continue;
?>

<?php if($first) {
	snippet('episode', array('p' => $p, 'link' => $p->url(), 'teaser' => true));
	$first = false;
} else {
	snippet('episode', array('p' => $p, 'link' => $p->url(), 'onlyimage' => true));
}
?>
<?php endforeach; ?>

<?php if(!r::is('ajax')) snippet('footer') ?>
