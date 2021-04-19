<?php

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
		if (is_front_page()) {
			get_template_part('home', 'intro');
			get_template_part('home', 'about');
			get_template_part('home', 'locations');
			get_template_part('home', 'media');
		} else {
			?>
			<div class="container">
				<?php the_title('<h2 class="page-title">', '</h2>'); ?>
				<div id="content" class="main">
					<?php the_content(); ?>
				</div>
			</div>
			<?php
		}
	}
}

get_footer();
