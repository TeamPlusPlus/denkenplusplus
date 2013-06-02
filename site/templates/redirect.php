<?php if(!r::is('ajax')) {
	go($page->link());
} else {
	echo 'Redirect: ' . $page->link();
}
?>
