<?php
$classname = 'posts_list';
if (!empty($block['clasName'])) {
    $classname .= ' ' . $block['clasName'];
}
if (!empty($block['align'])) {
    $classname .= ' align' . $block['align'];
}
?>

<?php
if (get_field('content')) {
    $content = get_field('content');
}
if (get_field('attributes')) {
    $attributes = get_field('attributes');
}


if ($content['resource_type'] == 'post_type') {

if (is_admin()) {
    $numberpost = 6;
} else {
    $numberpost = 9;
}
    $posts = get_posts( array(
        'numberposts' => $numberpost,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'book'
    ) );
} else {
    $posts = $content['select_posts'];
}
?>

<?php
$padding = '';
//if ($attributes['padding']) :
//    foreach ($attributes['padding'] as $key=>$value) {
//        $padding .=' ' . strval($value) . ' ';
//    }
//endif;
?>

<?php
$border = '';
//if ($attributes['border']) :
//    foreach ($attributes['border'] as $key=>$value) {
//        $border .=' ' . strval($value) . ' ';
//    }
//endif;
?>

<?php
$classes = '';
//if ($attributes['wrappers']['section_wrapper']) {
//    $classes .= ' ' . $attributes['wrappers']['section_wrapper'] . ' ';
//}
//if ($attributes['section_class']) {
//    $classes .= ' ' . $attributes['section_class'] . ' ';
//}
//if ($attributes['margin']['margin_top']) {
//    $classes.= ' ' . $attributes['margin']['margin_top'] . ' ';
//}
//if ($attributes['margin']['margin_bottom']) {
//    $classes.= ' ' . $attributes['margin']['margin_bottom'] . ' ';
//}
//if ($attributes['background']['background_image']) {
//    $classes.= '  bg-image ';
//}
//$bg_color = '';
//if ($attributes['background']['background_color']) {
//    $bg_color =  $attributes['background']['background_color'];
//}

$section_wrapper = '';
if ($attributes['wrappers']['section_wrapper']) {
    $section_wrapper =  $attributes['wrappers']['section_wrapper'];
}
$content_wrapper = '';
if ($attributes['wrappers']['content_wrapper']) {
    $content_wrapper =  $attributes['wrappers']['content_wrapper'];
}

$bg_color_preset = '';
if ($attributes['background']['bg_color']) {
    $bg_color_preset =  $attributes['background']['bg_color'];
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
acf-section-<?php echo $attributes['uniq_id']. ' '; ?><?php echo $section_wrapper ?><?= $background_texture; ?><?= $padding; ?><?= $border; ?> <?= $bg_color_preset; ?>" id="<?php  echo ($attributes['section_id'] ? $attributes['section_id'] :''); ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="content-wrapper  <?php echo $content_wrapper; ?>">
        <div class="rslider__header">
            <div class="rslider__heading fullwidth"><?= $content['heading']; ?></div>
            <div class="rslider__desc fullwidth"><?= $content['description'] ?></div>
        </div>
        <?php if ($posts) : ?>
            <div class="partners-tiles__list">
                <?php foreach ($posts as $post) : ?>
                    <div class="partners-tiles__item">
                        <div class="partners-tiles__img" data-height="partnersImage">
                            <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="<?php echo $post->title; ?>">
                        </div>
                        <div class="partners-tiles__body">
                            <div class="partners-tiles__title" data-height="partnersTitle"><?= $post->post_title; ?></div>
                            <div class="partners-tiles__description" data-height="partnersDescription"><?php the_excerpt();?></div>
                            <a href="<?=  get_the_permalink($post->ID) ?>">Learn more</a>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif ?>



    </div>

</section>


