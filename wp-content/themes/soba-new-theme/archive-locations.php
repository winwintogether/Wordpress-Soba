<?php while (have_posts()) : the_post();  ?>
	<?php if ($wp_query->current_post % 2 == 0): ?>
     <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
    <?php else: ?>
   	<?php get_template_part('templates/content-facility-right'); ?> 
	<?php endif ?>
<?php endwhile; ?>

<div class="facility-bottom">
	<div class="wrap-section">
	<div class="inner">
		<div class="heading">
			<?= img('our_amenities.png') ?>
		</div>
		<div class="text-box">
			<div class="left"><?= img('facility_luxury.png') ?></div>
			<div class="right">
				<h2>Elegant Living Space</h2>
				<p>
We offer our clients some of the best accommodations while healing from their addictions.  We have included a list of amenities below, feel free to call us if you have any question or to reserve your stay. </p>
			</div>
		</div>
		<div class="amenities-grid">
			<table class="stack">
				<tr>
				<td>Soaking Tubs</td>
				<td>Resort Style Pool</td>
				<td>Executive Chef Kitchen</td>
				</tr>
				
				<tr>
				<td>Zen Meditation Garden</td>
				<td>Fitness Center</td>
				<td>Steam Rooms</td>
				</tr>
				
				<tr>
				<td>Elegant Living Space</td>
				<td>Marble Entry Foyers</td>
				<td>Granite Fireplaces</td>
				</tr>
				
				<tr>
				<td>Flat Screen Televisions</td>
				<td>Glass & Marble Bathrooms</td>
				<td>Stainless Steel / Granite Kitchens</td>
				</tr>
				
				<tr>
				<td>Tennis Courts</td>
				<td>Basketball Courts</td>
				<td>2 Lushly Landscaped Acres</td>
				</tr>
				
				<tr>
				<td>Half-Acre Par Course</td>
				<td>Outdoor Barbecue</td>
				<td>The Beaches and Hills of Malibu</td>
				</tr>
			</table>
		</div>
	</div>
	</div>
</div>