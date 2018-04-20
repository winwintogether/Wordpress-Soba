<?php
	$article_title = get_post_meta( get_the_ID(), '_soba_article_title', true );
	$article_link = get_post_meta( get_the_ID(), '_soba_article_link', true );
	$artilce_pub = get_post_meta( get_the_ID(), '_soba_press_pub', true );
?>
<div class="article-item">
	<div class="article-company">
		<?=$artilce_pub?>
	</div>
	<div class="article-title">
		<a href="<?=$article_link?>"><?=wp_trim_words( $article_title, 10, '...' );?></a>
	</div>
	<div class="article-date">
		<?=get_the_date()?>
	</div>
</div>