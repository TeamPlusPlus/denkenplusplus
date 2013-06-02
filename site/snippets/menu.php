<?php if(!r::is('ajax')): ?>
				<div class="nav">
					<span data-icon="r" class="feed">
						<span>
							<a href="<?php echo url('/feed/mp3') ?>">MP3</a>
							<a href="<?php echo url('/feed/m4a') ?>">M4A</a>
							<a href="<?php echo url('/feed/opus') ?>">Opus</a>
							<a href="<?php echo url('/feed/ogg') ?>">Ogg</a>
						</span>
					</span>
					<nav>
						<a href="<?php echo $site->teamurl(); ?>" class="logo"><img src="http://stuff.plusplus.serpens.uberspace.de/Images/Team/logo_mono.png" alt="<?php echo $site->title(); ?>"></a>
						<ul>
							<li data-icon="l"><a<?php if(Episodes::newest()->isActive()) { echo ' class="active"'; $active = true; } ?> href="<?php echo Episodes::newest()->url(); ?>">Aktuelle Folge</a></li>
<?php foreach($pages->visible() as $p): ?>
							<li<?php if($p->icon()) echo ' data-icon="' . $p->icon() . '"'; ?>><a<?php if($p->isActive() && !isset($active)) echo ' class="active"'; else if($p->isOpen() && !isset($active)) echo ' class="open"'; ?> href="<?php echo $p->url() ?>"><?php echo html($p->title()) ?></a></li>
<?php endforeach; ?>
						</ul>
					</nav>
				</div>
			</header>
			<aside>
				<a href="<?php echo url('/'); ?>/" class="logo"><img src="http://stuff.plusplus.serpens.uberspace.de/Images/Denken++/logo.png" alt="<?php echo $site->title(); ?>"></a>
				<?php $newestepisode = Episodes::newest(); ?>
				<div class="nomobile">
					<h2>Aktuelle Folge</h2>
					<?php $image = Episodes::infos($newestepisode)->image; ?>
					<a href="<?php echo $newestepisode->url(); ?>" class="episode">
						<span><?php echo Episodes::title($newestepisode, 1); ?></span>
						<img src="<?php echo $image['url']; ?>" height=200 width=200>
					</a>
				</div>
				
				<h2>Nächste Folge: <?php echo Episodes::next()->infos->number; ?></h2>
				<?php if(Episodes::next()->infos->state == STATE_LIVE) { ?>
				<a href="http://mixlr.com/team" data-icon="b" class="highlight">Live!</a>
				<?php } else if(Episodes::next()->infos->state == STATE_SOON) { ?>
				<span data-icon="b"><?php echo Episodes::next()->infos->live; ?></span>
				<?php } else if(Episodes::next()->infos->state == STATE_RECORDED) { ?>
				<a href="http://mixlr.com/team/showreel/denken-<?php echo Episodes::next()->infos->id; ?>" data-icon="b" class="highlight">ReLive hören</a>
				<?php } else { ?>
				<span data-icon="b">Nicht geplant</span>
				<?php } ?>
				
				<div class="nomobile">
					<h2>Kontakt</h2>
					<p>
						<span data-icon="m"><a href="mailto:&amp;#x68;&amp;#97;&amp;#108;&amp;#x6c;&amp;#x6f;&amp;#x40;&amp;#x70;&amp;#x6c;&amp;#x75;&amp;#x73;&amp;#112;&amp;#108;&amp;#x2e;&amp;#x75;&amp;#115;">hallo@pluspl.us</a></span><br>
						<span data-icon="t"><a href="https://twitter.com/TeamPlusPlus">@TeamPlusPlus</a></span>
					</p>
				
					<div class="donate">
						<iframe src="http://api.flattr.com/button/view/?uid=teamplusplus&amp;url=<?php echo rawurlencode($site->url()); ?>&amp;title=<?php echo rawurlencode(html($site->title())); ?>&amp;description=<?php echo rawurlencode(html($site->description())) ?>&amp;category=audio&amp;language=de_DE" style="width:55px; height:62px;" allowtransparency="true" frameborder="0" scrolling="no"></iframe>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="C3NZ6UJMANXSW">
							<input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.">
							<img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
						</form>
					</div>
				</div>
			</aside>
			<section class="main">
<?php else: 
	echo $site->title() . " » " . Episodes::title($page) . "\n";
	
	if(Episodes::newest()->isActive()) {
		echo Episodes::newest()->url() . " || active";
	} else {
		foreach($pages->visible() as $p) {
			if($p->isActive()) {
				echo $p->url() . " || active";
				break;
			} else if($p->isOpen()) {
				echo $p->url() . " || open";
				break;
			}
		}
	}
	
	echo "\nSEPARATOR----SEPARATOR\n";
endif; ?>
