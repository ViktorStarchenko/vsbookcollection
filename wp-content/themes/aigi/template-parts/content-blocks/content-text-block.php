


<?php if (get_sub_field('content')) :
    $content = get_sub_field('content');
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
?>

<?php if ($attributes) : ?>
    <style>
        .acf-section-<?php echo $attributes['uniq_id']; ?> {
        <?php if ($attributes['background']['background_color']) : ?>
            background-color: <?php echo $attributes['background']['background_color']; ?>;
        <?php endif ?>
        <?php if ($attributes['background']['background_image']) : ?>
            background-image: url(<?php echo $attributes['background_image']['url']; ?>);
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
        class=" acf-section-<?php echo get_row_index() . ' '; ?>
acf-section-<?php echo $attributes['uniq_id']. ' '; ?>
<?php echo $classes ?>
<?= $background_texture; ?><?= $padding; ?>"
        id="<?php  echo ($attributes['section_id'] ? $attributes['section_id'] :''); ?>">
    <div class="content-wrapper <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?>">
<!--        <div class="highlighted-content">-->
<!--            <div class="highlighted-text">-->
<!--                --><?//= $data['content'];?>
<!--                --><?php
//                if ($data['button_group']['buttons']) {
//                    get_template_part('template-parts/content-blocks/content', 'button-group');
//                }
//                ?>
<!--            </div>-->
<!--            <div class="highlighted-img">-->
<!---->
<!--            </div>-->
<!--        </div>-->
        <?= $content;?>
        <?php if (get_sub_field('button_group')['buttons']) {
            get_template_part('template-parts/content-blocks/content', 'button-group');
        } ?>

    </div>
</section>
