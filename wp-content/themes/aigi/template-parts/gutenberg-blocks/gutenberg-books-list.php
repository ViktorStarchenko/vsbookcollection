<?php

$classname = 'books_list';
if (!empty($block['clasName'])) {
    $classname .= ' ' . $block['clasName'];
}
if (!empty($block['align'])) {
    $classname .= ' align' . $block['align'];
}
?>




<?php if (get_field('content')) :
    $content = get_field('content');

    if ($content['source_type'] == 'Auto') {

        if (is_admin()) {
            $numberposts = 4;
        } else {
            $numberposts = 9;
        }


        $paged = get_query_var('paged') ? get_query_var('paged') : 1;//Получаем текущую страницу
        $count_items = 3;//кол-во выводимых элементов

        $args = array(
            'posts_per_page' => $numberposts,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'paged'       => $paged,
            'post_type'   => 'book'
            );
        $query = new WP_Query($args);

        $posts = $query->get_posts();

//wp_die();
//        $posts = get_posts( array(
//            'numberposts' => $numberposts,
//            'orderby'     => 'date',
//            'order'       => 'DESC',
//            'post_type'   => 'book'
//        ) );
    } else if ($content['source_type'] == 'Manually') {
        if ($content['books']) {
            $posts = $content['books'];

        }

    }

endif ?>

<?php if (get_field('attributes')) :
    $attributes = get_field('attributes');
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
if ($attributes['wrappers']['section_wrapper']) {
    $classes .= ' ' . $attributes['wrappers']['section_wrapper'] . ' ';
}
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
    class="partners-tiles__section acf-section-<?php echo get_row_index() . ' '; ?>
acf-section-<?php echo $attributes['uniq_id']. ' '; ?><?php echo $classes ?><?= $background_texture; ?><?= $padding; ?><?= $border; ?> <?= $bg_color_preset; ?>" id="<?php  echo ($attributes['section_id'] ? $attributes['section_id'] :''); ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="content-wrapper  <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?>">
        <div class="rslider__header">
            <div class="rslider__heading fullwidth"><?= $content['heading']; ?></div>
            <div class="rslider__desc fullwidth"><?= $content['description'] ?></div>
        </div>
        <?php if ($posts) : ?>
            <div class="partners-tiles__list">
                <?php foreach ($posts as $post) : ?>
                    <div class="partners-tiles__item">
                        <div class="partners-tiles__img" data-height="partnersImage">
                            <?php if (get_field('post_info', $post->ID)['custom_partner_link']) {?>
                                <a class="partners-tiles__img_link" href="<?=  get_field('post_info', $post->ID)['custom_partner_link']['url']; ?>" target="_blank"></a>
                            <?php } ?>
                            <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="<?php echo $post->title ?>">
                        </div>
                        <div class="partners-tiles__body">
                            <div class="partners-tiles__title" data-height="partnersTitle"><?= $post->post_title; ?></div>
                            <div class="partners-tiles__description" data-height="partnersDescription"><?php echo get_custom_excerpt(get_the_excerpt($post->ID), 174, true);?></div>

                            <a href="<?=  get_the_permalink($post->ID) ?>">Learn more</a>

                        </div>
                    </div>
                <?php endforeach ?>
                <?php wp_reset_postdata(); ?>
            </div>

        <div class="posts_list__pagination">
            <?php $countcat = wp_count_posts( 'book', false ); //echo $countcat->publish; ?>
            <?php $current_count = intval($numberposts) * intval($paged);
            if ($current_count >= $countcat->publish) {
                $current_count = $countcat->publish;
            }  ?>
            <?php if  ( $numberposts < $countcat->publish ) { ?>
                <div class="pagination-wrap">
                    <div class="pagination-info">
                        You've viewed <?php echo $current_count; ?> of <?php echo $countcat->publish ; ?> items
                    </div>
                    <?php wp_pagenavi( array( 'query' => $query ) );//вывод пагинации по вашему запросу. Все четко:)) ?>
                </div>
            <?php } ?>
        </div>


        <?php endif ?>



    </div>

</section>


