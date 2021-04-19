<?php

if (! function_exists('get_field')) {
	return;
}

echo '<div class="locations">';

$locations = get_field('home_locations', 'options');
foreach ($locations as $location) {
	$bg_url = image_url($location['image']);
	?>
	<div id="<?php echo sanitize_title($location['name']); ?>" class="locations__item collapsed" style="background-image: url('<?php echo $bg_url; ?>');">
		<div class="container">
			<div class="locations__title">
				<div class="dates"><?php echo $location['dates']; ?></div>
				<h3><?php echo $location['name']; ?></h3>
			</div>
			<div class="locations__content">
				<?php echo $location['content']; ?>
			</div>
			<br class="clear">
		</div>
	</div>
	<?php
}

echo '</div>';
