
<?php

// Show the selected front page content.
if( have_rows('before_content_blocks') ): ?>
    <?php while( have_rows('before_content_blocks') ) : the_row(); ?>

        <?php if(get_row_layout() == 'hero_slider'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'hero-slider'); ?>

        <?php endif; // end get_row_layout (hero_slider) if ?>

        <?php if(get_row_layout() == 'text_block'): ?>

            <?php get_template_part('template-parts/content-blocks/content', 'text-block'); ?>

        <?php endif; // end get_row_layout (hero_slider) if ?>

    <?php endwhile; // end have_rows while ?>

<?php endif; // end have_rows if ?>