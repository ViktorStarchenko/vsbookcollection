<?php

$classname = 'books_filter';
if (!empty($block['clasName'])) {
    $classname .= ' ' . $block['clasName'];
}
if (!empty($block['align'])) {
    $classname .= ' align' . $block['align'];
}
?>




<?php
$content = NULL;
if (get_field('content')) :
    $content = get_field('content');
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
        class=" search-page header-block acf-section-<?php echo get_row_index() . ' '; ?> acf-section-<?php echo $attributes['uniq_id']. ' '; ?><?php echo $classes ?><?= $background_texture; ?><?= $padding; ?><?= $border; ?> <?= $bg_color_preset; ?>"  style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> "
        id="<?php  echo ($attributes['section_id'] ? $attributes['section_id'] :''); ?>">
    <div class="content-wrapper <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?>">

        <div class="search-page__header wrapper-1245 content-wrapper">
            <div class="search-page__heading">
                <div class="search-page__heading-box">
                    <p class="search-page_title">Search Results</p>
                    <p class="search-page_desc"> <span class="search-bar__count"></span> search results for "<span class="search-bar__param"></span>"</p>
                </div>

            </div>
            <div class="search-page__sorting">
                <div class="filter-button">
                    <img class="filter-button__filter filter-button__img" src="/wp-content/themes/aigi/assets/images/filter.svg" alt="filter">
                    <img class="filter-button__close filter-button__img" src="/wp-content/themes/aigi/assets/images/close-blue.svg" alt="close">
                </div>
            </div>
        </div>


                <div class="wrapper-1245 content-wrapper">

                    <div class="has-sidebar  sidebar-left">
                        <!--preloader-->
                        <div class="col-sidebar">
                            <span class="search__filter-heading">Refine by</span>
                            <div class="tabs__content global-search__filter desktop" id="global-search__filter">

                                <!--News filter-->
                                <div class="tab tab-news global-search-tab is-active" data-post-type="news">
                                </div>


                                <!--                            Toolkit filter-->
                                <div class="tab tab-toolkit global-search-tab is-active" data-post-type="toolkit">
                                    <div class="search__filter-item">
                                        <?php echo do_shortcode('[searchandfilter id="2953"]'); ?>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-content">
                            <div class="has-sidebar__inner search">
                                

                                <div class="search-page__results">

                                    <?php

                                    if (is_admin()) {
                                        $numberposts = 4;
                                    } else {
                                        $numberposts = 10;
                                    }


                                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;//Get current page
                                    $count_items = 3;//кол-во выводимых элементов


                                    $args = array(
                                        'numberposts' => $numberposts,
                                        'orderby'     => 'date',
                                        'order'       => 'DESC',
                                        'paged'       => $paged,
                                        'post_type'   => 'book'
                                    );
                                    $args['search_filter_id'] = 2953;
                                    $query = new WP_Query($args);

                                    $posts = $query->get_posts();

                                    ?>

                                    <?php

                                    if ($posts) { ?>

                                        <?php foreach ($posts as $post) { ?>
                                            <?php    $post_type = get_post_type( $post->ID ); ?>
                                            <div class="post-tile__wrap  <?= $post_type; ?> post-<?php echo $post->ID; ?>  mob-style-2">
                                                <div class="post-tile__mob-header">
                                                    <div class="post-tile__tags">
                                                        <?php $term_list = wp_get_post_terms( $post->ID, 'content_tags', array('fields' => 'all') );
                                                        foreach ($term_list as $term) :
                                                            ?>
                                                            <a class="content-tags__item" href="/search?/?_content_tags=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
                                                        <?php endforeach ?>
                                                    </div>
                                                    <!--        <a href="#" class="add-to-calendar"></a>-->
                                                </div>
                                                <div class="post-tile__img-box">
                                                    <a href="<?=  get_the_permalink($post->ID) ?>" class="post-tile__img">
                                                        <img class="post-tile__thumb" src="<?= get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo $post->post_title; ?>">
                                                    </a>
                                                </div>

                                                <div class="post-tile__content">
                                                    <div class="post-tile__content-header">
                                                        <div class="post-tile__left">
                                                            <span class="post-tile__pub-date"><?php echo date("M d Y", strtotime($post->post_date)); ?></span>
                                                        </div>

                                                        <div class="post-tile__right">

                                                            <!--                <span>--><?php //echo do_shortcode('[favorite_button]') ?><!--</span>-->

                                                        </div>
                                                    </div>
                                                    <div class="post-tile__content-body">
                                                        <div class="post-tile__tags">
                                                            <?php $term_list = wp_get_post_terms( $post->ID, 'genre', array('fields' => 'all') );
                                                            foreach ($term_list as $term) : ?>
                                                                <a class="content-tags__item" href="?_sft_genre=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
                                                            <?php endforeach ?>
                                                        </div>

                                                        <a href="<?=  get_the_permalink($post->ID) ?>" class="post-tile__title">
                                                            <span><?php echo $post->post_title; ?></span>
                                                        </a>
                                                        <div class="post-tile__excerpt"><p><?php echo get_custom_excerpt($post->post_content, 213, true) ?></p></div>
                                                    </div>
                                                    <div class="post-tile__content-footer">
                                                        <a href="<?=  get_the_permalink($post->ID) ?>" target="" class="btn-body btn-transparent triangle after Between">
                                                            <span class="btn-inner">READ MORE</span>
                                                        </a>
                                                    </div>

                                                </div>
                                                <div class="post-tile__mob-footer">
                                                    <a href="<?=  get_the_permalink($post->ID) ?>" target="" class="  btn-body  btn-h-secondary-blue  triangle  after  Between " tabindex="0">
                                                        <span class="btn-inner">Read more</span>
                                                    </a>
                                                </div>
                                            </div>

                                        <?php } ?>



                                    <?php } ?>

                                </div>
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

                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>

</section>

