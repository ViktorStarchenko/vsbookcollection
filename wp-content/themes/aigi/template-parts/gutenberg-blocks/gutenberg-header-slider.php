<?php
$classname = 'header_slider';
if (!empty($block['clasName'])) {
    $classname .= ' ' . $block['clasName'];
}
if (!empty($block['align'])) {
    $classname .= ' align' . $block['align'];
}
?>


<?php
$data = get_field('header_slider');
?>

<?php if ($data['header_type'] == 'custom_slider')  {
    $slider = $data['slider'];
} else if ($data['header_type'] == 'category_slider') {
    $slider = $data['category_slider']['category'];
}

$section_classes = '';

if ($data['section_class']) {
    $section_classes = $data['section_class'];
}
$section_id = '';
if ($data['section_id']) {
    $section_id = $data['section_id'];
}

?>
<?php
if ($slider): ?>

    <div class="header-slider__section <?php echo $section_classes; ?>"  id="<?php echo $section_id = $data['section_id']?>">


        <div class="header-slider slider" id="header-slider" data-init="true" data-autoplay="<?php echo $data['enable_autoplay'];?>">
            <?php foreach ($slider as $key=>$slide) :
                //set slide content
                if ( $data['header_type'] == 'custom_slider' ) {
                    $slides_counter = 1;
                    $title = '';
                    $short_text = '';
                    $char_limit = '';
                    $image_credit = '';
                    $small_image = '';
                    $small_image_type = '';
                    $button_group = '';
                    $classes = '';
                    $bg_color = '';
                    $bg_color_preset = '';
                    $bg_texture = '';
                    $terms = NULL;
                    $enable_overlay = false;
                    $tags = '';
                    $add_ellipsis = true;
//            if ($slide['section_class']) {
//                $classes .= ' ' . $slide['section_class'] . ' ';
//            }
                    if ($slide['background']['background_image']) {
                        $classes.= ' bg-image ';
                    }
                    if ($slide['background']['enable_overlay']) {
                        $enable_overlay = $slide['background']['enable_overlay'];
                    }

                    $bg_image = $slide['background']['background_image'];
                    if ($slide['background']['background_texture']) {
                        $bg_texture = $slide['background']['background_texture'];
                        $bg_texture = implode(" ", $bg_texture);
                    }
                    if ($slide['background']['background_color']) {
                        $bg_color = $slide['background']['background_color'];
                    }
                    if ($slide['background']['bg_color_preset']) {
                        $bg_color_preset = $slide['background']['bg_color_preset'];
                    }
//            if ($slide['section_class']) {
//                $classes .= ' ' . $slide['section_class'] . ' ';
//            }
                    if ($slide['background']['background_image']) {
                        $classes.= ' bg-image ';
                    }
                    if ($slide['background']['small_image']) {
                        $small_image = $slide['background']['small_image'];
                    }
                    if ($slide['background']['small_image_type']) {
                        $small_image_type = $slide['background']['small_image_type'];
                    }
                    if ($slide['background']['image_credit']) {
                        $image_credit = $slide['background']['image_credit'];
                    }


                    if ($slide['slide_type'] == 'custom') {
                        //content
                        $content_type_class = 'custom-content';
                        if ($slide['content']['title']) {
                            $title = $slide['content']['title'];
                        }
                        if ($slide['content']['short_text']) {
                            $short_text = $slide['content']['short_text'];
                        }

                        $add_ellipsis = $slide['content']['add_ellipsis'];

                        if ($slide['content']['tags']) {
                            $tags = $slide['content']['tags'];
                        }
                        if ($slide['button_group']) {
                            $button_group = $slide['button_group'];
                        }

                    } else if ($slide['slide_type'] == 'post') {
                        $post = $slide['post_object'][0];

                        //content
                        $content_type_class = 'post-content';
                        $title = $post->post_title;
                        $short_text = get_the_excerpt($post);

                        if ($slide['button_group']) {
                            $button_group = $slide['button_group'];
                        }

                        //content tags
                        $post_taxonomy = get_post_taxonomies($post);
                        if($post->post_type == 'people') {
                            $terms = get_the_terms($post->ID, 'people_group');
                        } else if ($post->post_type == 'partners') {
                            $terms = get_the_terms($post->ID, 'partners_group');

                        } else if ($post->post_type == 'event' || $post->post_type == 'news' || $post->post_type == 'resource'){
                            $terms =  get_the_terms( $post->ID, 'content_tags');
                        } else if ($post->post_type == 'post') {
                            $terms =  get_the_terms( $post->ID, 'category');
                        }
                    }
                } else if ($data['header_type'] == 'category_slider') {
                    $post = $slide;
                    $slides_counter = 1;
                    $title = '';
                    $short_text = '';
                    $image_credit = '';
                    $small_image = '';
                    $small_image_type = '';
                    $button_group = '';
                    $classes = '';
                    $bg_color = '';
                    $bg_color_preset = '';
                    $bg_texture = '';
                    $terms = NULL;
                    $enable_overlay = false;
                    $tags = '';
                    $add_ellipsis = true;
                    if ($data['category_slider']['background']['background_image']) {
                        $classes.= ' bg-image ';
                    }
                    $bg_image = $data['category_slider']['background']['background_image'];
                    if ($data['category_slider']['background']['enable_overlay']) {
                        $enable_overlay = $data['category_slider']['background']['enable_overlay'];
                    }
                    if ($data['category_slider']['background']['background_texture']) {
                        $bg_texture = $data['category_slider']['background']['background_texture'];
                        $bg_texture = implode(" ", $bg_texture);
                    }
                    if ($data['category_slider']['background']['background_color']) {
                        $bg_color = $data['category_slider']['background']['background_color'];
                    }
                    if ($data['category_slider']['background']['bg_color_preset']) {
                        $bg_color_preset = $data['category_slider']['background']['bg_color_preset'];
                    }
//                if ($data['category_slider']['section_class']) {
//                    $classes .= ' ' . $data['category_slider']['section_class'] . ' ';
//                }
                    if ($data['category_slider']['background']['background_image']) {
                        $classes.= ' bg-image ';
                    }
                    if ($data['category_slider']['background']['small_image']) {
                        $small_image = $data['category_slider']['background']['small_image'];
                    }
                    if ($data['category_slider']['background']['small_image_type']) {
                        $small_image_type = $data['category_slider']['background']['small_image_type'];
                    }
                    if ($data['category_slider']['background']['image_credit']) {
                        $image_credit = $data['category_slider']['background']['image_credit'];
                    }
                    if($data['category_slider']['slider_button']){
                        $check_button = $data['category_slider']['slider_button'];
                    }

                    $title = $post->post_title;
                    $short_text = get_the_excerpt($post);

                    //content tags
                    $content_type_class = 'post-content';
                    $post_taxonomy = get_post_taxonomies($post);
                    if($post->post_type == 'people' || $post->post_type == 'partners') {
                        $terms =  get_the_terms( $post->ID, 'people_group');
                    } else if ($post->post_type == 'event' || $slide->post_type == 'news' || $post->post_type == 'resource'){
                        $terms =  get_the_terms( $post->ID, 'content_tags');
                    } else if ($post->post_type == 'post') {
                        $terms =  get_the_terms( $post->ID, 'category');
                    } else if ($post->post_type == 'case_studies') {
                        $terms =  get_the_terms( $post->ID, 'content_tags');
                    }
                }


                ?>

                <div>
                    <div class="header-slider__item <?= $bg_texture; ?> <?= $bg_color_preset; ?> slide-<?php echo $key+1?> <?php echo $content_type_class; ?> <?php echo $classes ;?>" style="background-image: url(<?php echo $bg_image['url']?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
                        <div class="bg-overlay <?php  echo ($enable_overlay == true ?  ' active ' : ''); ?>"></div>
                        <div class="content-wrapper wrapper-1245 highlighted-content">
                            <div class="highlighted-text">
                                <?php
                                if($tags): ?>
                                    <div class="content-tags">
                                        <?php foreach ($tags as $tag) : ?>
                                            <div class="content-tags__item">
                                                <span><?php echo $tag['tag']; ?></span>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php endif ?>

                                <?php if($terms): ?>
                                    <div class="content-tags">
                                        <?php foreach ($terms as $cur_term) : ?>
                                            <div class="content-tags__item">
                                                <span href="<?php echo get_term_link( $cur_term->term_id, $cur_term->taxonomy ) ?>"><?php echo $cur_term->name; ?></span>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php endif ?>



                                <?php if ($title): ?>
                                    <div class="header-slider__title">
                                        <p><?php echo $title ?></p>
                                    </div>
                                <?php endif ?>

                                <?php if ($short_text): ?>
                                    <div class="header-slider__short-text">
                                        <p><?php echo $short_text; ?></p>
                                        <!--                                <p>--><?php //echo get_custom_excerpt($short_text, 315, $add_ellipsis) ?><!--</p>-->
                                    </div>
                                <?php endif ?>

                                <?php if ($data['header_type'] == 'category_slider') : ?>
                                    <?php if($data['category_slider']['slider_button']) :?>
                                        <div class="btn-group f-start m-center">

                                            <a href="<?php echo get_the_permalink($post->ID) ;?>" class="btn-body btn-body btn-m-blue Between ">
                                                <span class="btn-inner">Read More</span>
                                            </a>

                                        </div>
                                    <?php endif ?>
                                <?php endif ?>

                                <?php if ($button_group) : ?>

                                    <?php if ($slide['button_group']['link_to_post'] == true) : ?>

                                        <div class="btn-group f-start m-center">
                                            <a href="<?php echo get_the_permalink($post->ID) ;?>" class="btn-body btn-body btn-m-blue Between ">
                                                <span class="btn-inner">Read More</span>
                                            </a>

                                        </div>

                                    <?php elseif ($slide['button_group']['link_to_post'] == false) : ?>

                                        <?php if($button_group['buttons']) : ?>
                                            <div class="btn-group f-start m-center">
                                                <?php foreach($button_group['buttons'] as $button) : ?>

                                                    <?php
                                                    $classes = '';
                                                    if ($button['styling']['color']) {
                                                        $classes .= ' ' . $button['styling']['color'] . ' ';
                                                    }
                                                    if ($button['styling']['icon']) {
                                                        $classes .= ' ' . $button['styling']['icon'] . ' ';
                                                    }
                                                    if ($button['styling']['icon_position']) {
                                                        $classes .= ' ' . $button['styling']['icon_position'] . ' ';
                                                    }
                                                    if ($button['styling']['alignment']) {
                                                        $classes .= ' ' . $button['styling']['alignment'] . ' ';
                                                    }
                                                    if ($button['anchor'] == true) {
                                                        $classes .= ' ' . 'crane' . ' ';
                                                    }

                                                    ?>
                                                    <a href="<?php echo $button['button']['url'] ;?>" target="<?= $button['button']['target'] ?>" class="btn-<?php echo $button['id']; ?>  btn-body <?php echo $classes ?>">
                                                        <span class="btn-inner"><?php echo $button['button']['title'] ;?></span>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; //edif buttons ?>

                                    <?php endif ?>

                                <?php endif ?>

                                <?php if ($image_credit): ?>
                                    <div class="header-slider__image-credit">
                                        <p>Photo: <?php echo $image_credit ?></p>
                                    </div>
                                <?php endif ?>

                            </div>

                            <div class="highlighted-img__wrap <?php echo $small_image_type ; ?>">
                                <?php if (get_the_post_thumbnail_url($post->ID)) : ?>
                                    <div class="highlighted-img" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID); ?>);">
                                    </div>
                                <?php endif ?>

                            </div>


                        </div>
                    </div>
                </div>

            <?php endforeach ?>

        </div>

        <div class="slider__progress-bar wrapper-1245"></div>
        <div class="gallery-nav"></div>
    </div>
<?php endif ?>
<?php wp_reset_postdata(); ?>

<script>
    ////////////////////////  Header Slider
    jQuery(document).ready(function(){

        let header_slider__el = document.getElementById('header-slider');

        if (header_slider__el) {
            let header_slider = jQuery('.header-slider');
            $header_slider = jQuery('.header-slider');
            let data_autoplay = jQuery('#header-slider').attr('data-autoplay');


            var reinitSlick = function(header_slider) {
                console.log('reinitSlick')
                // jQuery(header_slider).slick('slickSetOption', 'autoplay', false);
                jQuery(header_slider).slick('slickPause');
            }

            jQuery(header_slider).slick({
                autoplay: true,
                adaptiveHeight: true,
                autoplaySpeed: 2000,
                speed: 1000,
                fade: true,
                cssEase: 'linear',
                appendArrows:'.gallery-nav',
                prevArrow:'<span class="slider-arrow prev"></span>',
                nextArrow:'<span class="slider-arrow next"></span>'
            }).slick('slickPause');
            // .on('setPosition', function (event, slick) {
            //     slick.$slides.css('height', slick.$slideTrack.height() + 'px');
            // });

            // A function that start autoplay when entering the viewport
            function triggerScroll(targetObj) {
                let targetName = targetObj.attr("id"); //for console.log
                let targetFlag = false;
                let scrollTop = jQuery(window).scrollTop();
                let scrollBottom = scrollTop + jQuery(window).height();
                let targetTop = targetObj.offset().top;
                let targetBottom = targetTop + targetObj.height();
                // while loading
                if (scrollBottom > targetTop && scrollTop < targetBottom) {
                    if (!targetFlag) {
                        console.log(targetName + ' is in sight'); //for console.log
                        targetObj.slick('slickPlay');
                        targetFlag = true;
                    }
                } else {
                    console.log(targetName + ' is not in sight'); //for console.log
                    targetObj.slick('slickPause');
                    targetFlag = false;
                }

                jQuery(window).on('scroll', function () {
                    scrollTop = jQuery(window).scrollTop();
                    scrollBottom = scrollTop + jQuery(window).height();
                    targetTop = targetObj.offset().top;
                    targetBottom = targetTop + targetObj.height();
                    if (scrollBottom > targetTop && scrollTop < targetBottom) {
                        // Start autoplay when entering the viewport
                        if (!targetFlag) {
                            console.log(targetName + ' is in sight');//確認用
                            targetObj.slick('slickPlay');
                            targetFlag = true;
                        }
                    } else {
                        // Stop autoplay when you get out of the viewport
                        if (targetFlag) {
                            console.log(targetName + ' is not in sight');//for console.log
                            targetObj.slick('slickPause');
                            targetFlag = false;
                        }
                    }
                });
            }
            // Execute function
            if (data_autoplay == 1) {
                triggerScroll(jQuery('#header-slider'));
            }
        }


    });
    jQuery('.header-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        initProgressBar(nextSlide)
    });
    jQuery('.header-slider').on('init', function(event, slick, direction) {
        initProgressBar()
        console.log(jQuery('.header-slider .slick-slide').length)
        // check to see if there are one or less slides
        if (jQuery('.header-slider .slick-slide').length <= 1) {

            // remove arrows
            jQuery('.header-slider__section .slider__progress-bar').hide();
            jQuery('.header-slider__section .gallery-nav').hide();

        }
    })

    function initProgressBar(nextSlide = 0){
        jQuery('.slider__progress-bar').empty();
        let current_slide = jQuery('.slick-current.slick-active').attr('data-slick-index')
        let slider_items = jQuery('.header-slider__item')
        let total_slider = slider_items.length;
        let progress_bar_width = jQuery('.slider__progress-bar').width();
        for(i=0; i<total_slider; i++ ) {
            jQuery('.slider__progress-bar').append('<div class="slider__progress-item" style="width: '+ progress_bar_width/total_slider +'px" data-slick-index="'+ i +'"><div class="slider__progress-inner"></div></div>');
            if (i == nextSlide) {
                jQuery('.slider__progress-inner').removeClass('animate');
                jQuery('.slider__progress-item[data-slick-index="'+i+'"] .slider__progress-inner').addClass('animate');
            }
        }
    }
</script>
