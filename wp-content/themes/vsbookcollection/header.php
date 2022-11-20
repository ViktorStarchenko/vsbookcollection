<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php $main_menu = get_field('header_settings', 'option'); ?>


<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">
    <header id="header" role="banner" >
        <div class="screen-shadow"></div>
        <div class="header__wrap">
            <div class="header_top_wrap">
                <div id="mobile_user_menu_wrapper">
                    <div id="burger"></div>
                    <div id="mobile_user_icon"></div>
                </div>
                <div id="branding">
                    <div id="site-logo">
                        <a href="/">
                            <?php if (!empty($logo)) : ?>
                                <img src="<?= $logo['url'] ?>" alt="<?= get_option( 'blogname' ); ?>">
                            <?php endif; ?>
                        </a>
                    </div>
                </div>


                <div id="mobile_login-menu" class="mobile_login-menu">
                    <?php if (is_user_logged_in()) : ?>
                        <?php  $current_user = wp_get_current_user();

                        if( $current_user->exists() ){ ?>
                            <div class="main_menu_item">
                                <a href="<?php echo $bottom_menu['useraccount_link']['link']['url']; ?>" target="" class="main_menu_top account-dropdown__link" tabindex="0"><?php echo $bottom_menu['useraccount_link']['link']['title']; ?></a>
                            </div>
                            <?php if (!empty($bottom_menu['header_bottom_menu_right']['logged'])) : ?>

                                <?php foreach($bottom_menu['header_bottom_menu_right']['logged'] as $item) : ?>
                                    <div class="main_menu_item">
                                        <div class="main_menu_icon">
                                            <?php if (!empty($item['icon'])) : ?>
                                                <img class="header_bottom_menu_icon" src="<?= $item['icon']['url'] ?>" alt="<?= $item['link']['title'] ?>">
                                            <?php endif; ?>
                                        </div>

                                        <a class="main_menu_top" href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a>
                                    </div>
                                <?php endforeach; endif; ?>

                            <div class="main_menu_item">
                                <div class="main_menu_icon">

                                </div>
                                <a href="<?php echo wp_logout_url('/'); ?>" target="" class="main_menu_top" tabindex="0">Logout</a>
                            </div>

                        <?php  } ?>

                    <?php else : ?>

                        <?php if (!empty($bottom_menu['header_bottom_menu_right']['unlogged'])) :
                            foreach($bottom_menu['header_bottom_menu_right']['unlogged'] as $item) : ?>
                                <div class="main_menu_item">
                                    <div class="main_menu_icon">
                                        <?php if (!empty($item['icon'])) : ?>
                                            <img class="header_bottom_menu_icon" src="<?= $item['icon']['url'] ?>" alt="<?= $item['link']['title'] ?>">
                                        <?php endif; ?>
                                    </div>
                                    <a class="main_menu_top" href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a>
                                </div>
                            <?php endforeach; endif; ?>


                    <?php endif ?>
                </div>


                <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                    <?php if (!empty($main_menu)) : ?>
                        <?php foreach($main_menu as $item) : ?>
                            <div class="main_menu_item <?php if (!empty($item['submenu'])) : ?>has_sub has_sub_mobile<?php endif; ?>">
                                <a class="main_menu_top <?php if (!empty($item['submenu'])) : ?>has_sub<?php endif; ?>" href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a>
                                <!--                      --><?php //if (!empty($item['submenu'])) {?>
                                <!--                          <span class="main-menu__link-arrow hide"><img src="/wp-content/themes/aigi/assets/images/Triangle-white.svg" alt="triangle"></span>-->
                                <!--                      --><?php //}?>

                                <?php if (!empty($item['submenu'])) : ?>
                                    <div class="main_menu_submenu_overlay">
                                        <div class="main_menu_submenu wrapper-1245">
                                            <div class="submenu_items_wrapper <?php if (!empty($item['image'])) : ?>has_image<?php endif; ?> <?php if (!empty($item['border_disable'])) : ?>border_disable<?php endif; ?>">
                                                <div>
                                                    <p class="main_menu_submenu_title"><?= $item['link']['title'] ?></p>
                                                    <div class="submenu_item_blocks_wrapper">
                                                        <?php foreach($item['submenu'] as $subitem) : ?>
                                                            <div class="submenu_item_block">
                                                                <p class="main_menu_sub" ><a href="<?= $subitem['link']['url'] ?>"><?= $subitem['title'] ?></a></p>
                                                                <p class="main_menu_sub_descr"><?= $subitem['description'] ?></p>
                                                                <a class="main_menu_sub_link" href="<?= $subitem['link']['url'] ?>"><?= $subitem['link']['title'] ?></a>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <?php if (!empty($item['image'])) : ?>
                                                    <div class="submenu_img_wrapper">
                                                        <div style="background: url(<?= $item['image']['url'] ?>);" class="submenu_img">
                                                            <?php if (!empty($item['image_title'])) : ?>
                                                                <p style="color: <?= $item['text_color'] ?>;" class="submenu_img_title"><?= $item['image_title'] ?></p>
                                                            <?php endif; ?>
                                                            <?php if (!empty($item['image_title'])) : ?>
                                                                <p style="color: <?= $item['text_color'] ?>;" class="image_description"><?= $item['image_description'] ?></p>
                                                            <?php endif; ?>
                                                            <?php if (!empty($item['image_link'])) : ?>
                                                                <a class="btn-body btn-m-blue" href="<?= $item['image_link']['url'] ?>"><span class="btn-inner"><?= $item['image_link']['title'] ?></span></a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </nav>
                <div id="header_button_wrapper">
                    <?php if (!empty($button)) : ?>
                        <!--                  <a class="btn-body custom-dbox-popu" href="--><?//= $button['url'] ?><!--"><span class="btn-inner">--><?//= $button['title'] ?><!--</span></a>-->
                        <a class="custom-dbox-popup btn-body" href="<?= $button['url'] ?>">Donate</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if(function_exists('bcn_display') && !is_front_page() &&!is_home()){ ?>
            <div class="breadcrumb-container">
                <div class="wrapper-1245">
                    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                        <?php bcn_display($return = false, $linked = true, $reverse = false, $force = false); ?>
                    </div>
                </div>
            </div>
        <?php } ?>

    </header>
<div id="container">
<main id="content" role="main">