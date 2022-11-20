

<?php if (get_sub_field('content')) :
    $content = get_sub_field('content');


    if ($content['slider_type'] == 'all') {

        $numberposts = 10;
        if ($content['posts_count_limit']) {
            $numberposts = $content['posts_count_limit'];
        }
        $posts = get_posts( array(
            'numberposts' => $numberposts,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'post_type'   => 'case_studies',
        ) );
    } else if ($content['slider_type'] == 'custom') {
        if ($content['resources']) {
            $posts = $content['resources'];

        }

    }

endif ?>

<?php if (get_sub_field('attributes')) :
    $attributes = get_sub_field('attributes');
endif ?>

<?php
$background_texture = '';
if ($attributes['background']['background_texture']) :
    $background_texture_classes = $attributes['background']['background_texture'];
    $background_texture = implode(" ", $background_texture_classes);
endif;
?>

<?php
$padding = '';
if ($attributes['padding']) :
    foreach ($attributes['padding'] as $key=>$value) {
        $padding .=' ' . strval($value) . ' ';
    }
endif;
?>

<?php
$border = '';
if ($attributes['border']) :
    foreach ($attributes['border'] as $key=>$value) {
        $border .=' ' . strval($value) . ' ';
    }
endif;
?>

<?php
$classes = '';
//if ($attributes['wrappers']['section_wrapper']) {
//    $classes .= ' ' . $attributes['wrappers']['section_wrapper'] . ' ';
//}
if ($attributes['section_class']) {
    $classes .= ' ' . $attributes['section_class'] . ' ';
}
if ($attributes['margin']['margin_top']) {
    $classes.= ' ' . $attributes['margin']['margin_top'] . ' ';
}
if ($attributes['margin']['margin_bottom']) {
    $classes.= ' ' . $attributes['margin']['margin_bottom'] . ' ';
}
if ($attributes['background']['background_image']) {
    $classes.= '  bg-image ';
}

$bg_color = '';
if ($attributes['background']['background_color']) {
    $bg_color =  $attributes['background']['background_color'];
}

$bg_color_preset = '';
if ($attributes['background']['bg_color_preset']) {
    $bg_color_preset =  $attributes['background']['bg_color_preset'];
}
?>


<?php if ($attributes) : ?>
    <style>
        .acf-section-<?php echo $attributes['uniq_id']; ?> {
        <?php if ($attributes['background']['background_color']) : ?>
            /*background-color: */<?php //echo $attributes['background']['background_color']; ?>/*;*/
        <?php endif ?>
        <?php if ($attributes['background']['background_image']) : ?>
            /*background-image: url(*/<?php //echo $attributes['background']['background_image']['url']; ?>/*);*/
        <?php endif ?>
        <?php if ($attributes['section_height']['height_numbers']) : ?>
            height: <?php echo $attributes['section_height']['height_numbers']; ?><?php echo $attributes['section_height']['height_value']; ?>
        <?php endif ?>

        }
        @media (max-width: 767px) {
            .acf-section-<?php echo $attributes['uniq_id']; ?> {
            <?php if ($attributes['section_height']['height_numbers_mobile']) : ?>
                height: <?php echo $attributes['section_height']['height_numbers_mobile']; ?><?php echo $attributes['section_height']['height_value_mobile']; ?>
            <?php endif ?>
            }
        }
    </style>
<?php endif // end padding styles ?>


<section
    class="rslider-section resources-slider wrapper-full-width acf-section-<?php echo get_row_index() . ' '; ?>
acf-section-<?php echo $attributes['uniq_id']. ' '; ?><?php echo $classes ?><?= $background_texture; ?><?= $padding; ?><?= $border; ?> <?= $bg_color_preset; ?>" id="<?php  echo ($attributes['section_id'] ? $attributes['section_id'] :''); ?> " style="<?php  echo ($attributes['background']['background_image']['url'] ?  'background-image: url(' . $attributes['background']['background_image']['url'] . ');' :''); ?> <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="wrapper-1245 content-wrapper">
        <div class="rslider__header">
            <div class="rslider__header-top">
                <div class="rslider__heading"><?= $content['heading']; ?></div>
                <div class="rslider_nav rslider_nav-<?php echo $attributes['uniq_id'];?> slider-arrows"></div>
            </div>
            <div class="rslider__desc"><?= $content['description'] ?></div>
        </div>
    </div>
    <div class="rslider__outter wrapper-1245 stick-right">
        <div class="rslider__inner content-wrapper wrapper-full-width">

            <div class="rslider__wrapper">
                <div class="slider rslider rslider-<?php echo $attributes['uniq_id'];?> rslider__resources">
                    <?php foreach( $posts as $post ) :
                        setup_postdata( $post ); ?>
                        <?php $post_type = get_post_type( $post->ID ); ?>
                        <div>
                            <div class="rslider__item rslider__resource-item  <?php echo $post_type; ?>">
                                <div class="rslider__item-header">
                                    <a class="rslider__item-header-link" href="<?=  get_the_permalink($post->ID) ?>">
                                        <img src="/wp-content/themes/aigi/assets/images/elements-resource.svg" alt="elements-resource">
                                    </a>
                                    <div class="rslider__date"><?php echo date("M d Y", strtotime($post->post_date)); ?></div>
                                    <div class="rslider__type content-tags__item">case studies</div>
                                </div>
                                <div class="rslider__item-body">
                                    <a class="rslider__title" href="<?=  get_the_permalink($post->ID) ?>" data-height="CaseStudiesrsliderTitle"><?= $post->post_title; ?></a>

                                    <?php

                                    $excerpt = '';
                                    if (get_field('td_resource_teaser')) {
                                        $excerpt = get_field('td_resource_teaser');
                                    } else if (get_field('add_text')) {
                                        $excerpt = get_field('add_text');
                                    } else if ($post->post_excerpt){
                                        $excerpt = $post->post_excerpt;
                                    } else if ($post->post_content) {
                                        $excerpt = $post->post_content;
                                    } else {
                                        $excerpt = '';
                                    }
                                    ?>
                                    <div class="rslider__excerpt"><?php //echo substr($excerpt, 0,94) ?></div>
                                    <div class="rslider__excerpt"  data-height="CaseStudiesrsliderDesc"><?php echo get_custom_excerpt($excerpt, 94, true) ?></div>

                                    <div class="rslider__tags" data-height="CaseStudiesrsliderTags">
                                        <?php $term_list = wp_get_post_terms( $post->ID, 'resource_type', array('fields' => 'all') );
                                        foreach ($term_list as $term) : ?>
                                            <a class="rslider__tags-item" href="/search?_resource_type=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a> <span class="coma">,</span>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="rslider__item-footer">
                                    <div class="rslider__link">
                                        <a href="<?=  get_the_permalink($post->ID) ?>">Read more</a>
                                    </div>
                                    <?php if (get_field('time_to_read', $post->ID)): ?>
                                        <span class="rslider__time-read post-tile__time"><?php echo get_field('time_to_read', $post->ID); ?> read</span>
                                    <?php endif ?>

                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>

        </div>
    </div>

</section>

<script>
    // Sticky to right sliders

    $('.rslider-<?php echo $attributes['uniq_id'];?>').slick({
        // variableWidth: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: <?php echo json_encode($content['enable_autoplay']);?>,
        autoplaySpeed: 2000,
        centerMode: true,
        // centerPadding: '16px',
        adaptiveHeight: true,
        arrows: true,
        appendArrows:'.rslider_nav-<?php echo $attributes['uniq_id'];?>.slider-arrows',
        prevArrow:'<span class="slider-arrow prev"></span>',
        nextArrow:'<span class="slider-arrow next"></span>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: true,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: false,
                    centerPadding: false,
                }
            },
            {
                breakpoint: 580,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false,
                    centerPadding: false,
                }
            }

        ]
    });
</script>
