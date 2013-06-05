				<section class="episode<?php if(isset($onlyimage)) echo " float"; ?>">
					<?php if(isset($link) && $link) {
						$linkTag = "<a href=\"$link\">";
						$linkCloseTag = "</a>";
					} else {
						$linkTag = "";
						$linkCloseTag = "";	
					} ?>
					
					<?php if(!isset($onlyimage)) { ?>
					<h2><?php echo $linkTag; ?><?php echo Episodes::title($p, 0); ?><?php echo $linkCloseTag; ?></h2>
					<?php } ?>
					
<?php $image = Episodes::infos($p)->image['url']; ?>
<?php if($image): ?>
					<?php echo $linkTag; ?><img src="<?php echo $image; ?>" height=200 width=200 class="episodelogo"><?php echo $linkCloseTag; ?>
<?php endif; ?>
					<?php if(!isset($onlyimage)) { ?>
					<?php if(!isset($teaser)) { ?><iframe src="http://api.flattr.com/button/view/?uid=teamplusplus&amp;url=<?php echo rawurlencode($p->url()); ?>&amp;title=<?php echo rawurlencode(html(Episodes::title($p, 4))); ?>&amp;description=<?php echo rawurlencode(html($p->text())) ?>&amp;category=audio&amp;language=de_DE" style="width:55px; height:62px;" allowtransparency="true" frameborder="0" scrolling="no" class="flattrtop"></iframe><?php } ?>
					<span data-icon="d"><?php echo $p->date('d.m.Y H:i'); ?></span>
					<div class="intro">
					<?php echo kirbytext($p->text()); ?>
					</div>
					
					<?php if(!isset($teaser)) { ?>
					<div class="player">
						<?php $infos = Episodes::infos(Episodes::newest()); ?>
						<audio controls preload="metadata" id="podloveplayer">
							<?php if($infos->mp3) { ?><source src="<?php echo $infos->mp3['url']; ?>" type="audio/mpeg"></source><?php } ?>
							<?php if($infos->m4a) { ?><source src="<?php echo $infos->m4a['url']; ?>" type="audio/mp4"></source><?php } ?>
							<?php if($infos->ogg) { ?><source src="<?php echo $infos->ogg['url']; ?>" type="audio/ogg; codecs=vorbis"></source><?php } ?>
							<?php if($infos->opus) { ?><source src="<?php echo $infos->opus['url']; ?>" type="audio/ogg; codecs=opus"></source><?php } ?>
						</audio>
						<script>
							$('#podloveplayer').podlovewebplayer({
								poster: '<?php echo Episodes::infos($p)->image['url']; ?>',
								title: '<?php echo Episodes::title($p, 4); ?>',
								permalink: '<?php echo $p->url(); ?>',
								subtitle: '<?php echo html($p->subtitle()); ?>',
								duration: '<?php echo gmdate('H:i:s', $infos->infos['duration']); ?>',
								downloads: [
									<?php
									$first = true;
									foreach($infos->media as $format => $data) {
										if(!$first) {
											echo ',';
										}
										$first = false; ?>
										{'name': '<?php echo $format; ?>', 'url': '<?php echo $data['url']; ?>?listen', 'dlurl': '<?php echo $data['url']; ?>', 'size': '<?php echo $data['size']; ?>'}
									<?php } ?>
								]
							});
						</script>
					</div>
					
					<div class="shownotes">
					<?php echo kirbytext($p->shownotes()); ?>
					</div>
					<?php } ?>
					<?php } ?>
				</section>
