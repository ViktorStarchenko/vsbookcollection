

<?php
$content = NULL;
if (get_sub_field('content')) :
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
    $classes.= ' ' . $attributes['margin']['margin_top'] . ' ';
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
    class="header-block acf-section-<?php echo get_row_index() . ' '; ?> acf-section-<?php echo $attributes['uniq_id']. ' '; ?><?php echo $classes ?><?= $background_texture; ?><?= $padding; ?><?= $border; ?> <?= $bg_color_preset; ?>"  style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> "
    id="<?php  echo ($attributes['section_id'] ? $attributes['section_id'] :''); ?>">
    <div class="content-wrapper <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?>">
        <div class="header-block__inner">
            <div class="header-block__content">
                <?php if ($content) : ?>
                <?php foreach ($content as $content_item) : ?>
                    <?php if ($content_item['content_type'] == 'text') : ?>
                <div class="text_item <?php echo $content_item['type'] ?> <?php echo $content_item['alighnment']; ?>  <?php echo $content_item['alighnment_mobile']; ?>">
                    <?php echo $content_item['text'] ?>
                </div>
                    <?php elseif ($content_item['content_type'] == 'image') : ?>
                            <div class="header-block__content-item text_item image <?php echo $content_item['alighnment']; ?> <?php echo $content_item['alighnment_mobile']; ?>">
                                <img src="<?php echo $content_item['image']['url'] ?>" alt="<?php echo $content_item['image']['title'] ?>">
                            </div>
                    <?php endif ?>
                <?php endforeach ?>
                <?php endif ?>
            </div>
            <?php if (get_sub_field('button_group')['buttons']) {
                get_template_part('template-parts/content-blocks/content', 'button-group');
            } ?>
        </div>
    </div>
</section>
