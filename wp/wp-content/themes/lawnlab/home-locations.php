<?php

if (! function_exists('get_field')) {
	return;
}

echo '<div class="locations">';

$locations = get_field('home_locations', 'options');
foreach ($locations as $location) {
	$bg_url = image_url($location['image']);
	?>
	<div class="locations__item" style="background-image: url('<?php echo $bg_url; ?>');">
		<div class="container">
			<div class="dates"><?php echo $location['dates']; ?></div>
			<h3><?php echo $location['name']; ?></h3>
		</div>
	</div>
	<?php
}

echo '</div>';
