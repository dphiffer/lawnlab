<?php

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
		if (is_front_page()) {
			get_template_part('home', 'intro');
		}
		?>
		<div class="container">
			<div id="content" class="main">
				<?php the_content(); ?>
			</div>
		</div>
		<?php
	}
}

get_footer();
