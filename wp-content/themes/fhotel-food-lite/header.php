<?php

/**
 * @package fhotel-food-lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    } else {
        do_action('wp_body_open');
    }
    ?>
    <a class="skip-link screen-reader-text" href="#contentdiv">
        <?php esc_html_e('Skip to content', 'fhotel-food-lite');
        ?></a>
    <div id="maintopdiv">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-9  col-sm-12 col-lg-9 text-left header-phone-email">
                        <ul class="list-inline top-headerphone-email">
                        <li class="headerphone">
                                <?php $fhotel_food_lite_phone = get_theme_mod('fhotel_food_lite_phone'); ?>
                                <?php if (!empty($fhotel_food_lite_phone)) { ?>
                                    <i class="fa fa-phone"></i>&nbsp;&nbsp;
                                    <a title="<?php echo esc_attr($fhotel_food_lite_phone); ?>" href="tel:<?php echo esc_attr($fhotel_food_lite_phone); ?>"><?php echo esc_html($fhotel_food_lite_phone); ?></a>
                                <?php } ?>
                            </li>
                            <li class="headeremail">
                                <?php $fhotel_food_lite_email = get_theme_mod('fhotel_food_lite_address'); ?>
                                <?php if (!empty($fhotel_food_lite_email)) { ?>
                                    <i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php echo '<a title="' . esc_attr($fhotel_food_lite_email) . '" href="mailto:' . esc_attr($fhotel_food_lite_email) . '">' . esc_html($fhotel_food_lite_email) . '</a>'; ?>
                                <?php } ?>
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!--col-md-9  col-sm-12 col-lg-9 text-right header-phone-email-->

                    <div class="col-md-3 col-lg-3 col-sm-12 ">
                        <ul class="list-inline header-social text-left">
                            <?php if (get_theme_mod('fhotel_food_lite_fb')) { ?>
                                <li><a title="<?php esc_attr_e('Facebook', 'fhotel-food-lite'); ?>" class="fa fa-facebook" target="_blank" href="<?php echo esc_url(get_theme_mod('fhotel_food_lite_fb')); ?>"></a> </li>
                            <?php } ?>
                            <?php if (get_theme_mod('fhotel_food_lite_twitter')) { ?>
                                <li><a title="<?php esc_attr_e('twitter', 'fhotel-food-lite'); ?>" class="fa fa-twitter" target="_blank" href="<?php echo esc_url(get_theme_mod('fhotel_food_lite_twitter')); ?>"></a></li>
                            <?php } ?>
                            <?php if (get_theme_mod('fhotel_food_lite_youtube')) { ?>
                                <li><a title="<?php esc_attr_e('youtube', 'fhotel-food-lite'); ?>" class="fa fa-youtube" target="_blank" href="<?php echo esc_url(get_theme_mod('fhotel_food_lite_youtube')); ?>"></a></li>
                            <?php } ?>
                            <?php if (get_theme_mod('fhotel_food_lite_in')) { ?>
                                <li><a title="<?php esc_attr_e('linkedin', 'fhotel-food-lite'); ?>" class="fa fa-linkedin" target="_blank" href="<?php echo esc_url(get_theme_mod('fhotel_food_lite_in')); ?>"></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!--col-md-4 col-lg-4 col-sm-12-->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-lg-4 logo logobox">
                        <?php if (display_header_text() == true) { ?>
                            <div class="logotxt">
                                <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                                <p><?php bloginfo('description'); ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <!--col-sm-3-->

                    <div class="col-md-8  col-lg-8  col-sm-12 header-box">
                        <section id="main_navigation">
                            <div class="main-navigation-inner rightmenu">
                                <div class="toggle">
                                    <a class="togglemenu" href="#"><?php esc_html_e('Menu', 'fhotel-food-lite'); ?></a>
                                </div><!-- toggle -->
                                <div class="sitenav">
                                    <div class="nav">
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location' => 'primary'
                                        ));
                                        ?>
                                    </div>
                                </div><!-- site-nav -->
                            </div>
                            <!--<div class=""main-navigation-inner">-->
                        </section>
                        <!--main_navigation-->
                    </div>
                    <!--col-md-4 header_middle-->
                    <div class="clearfix"></div>
                </div>
                <!--row-->
            </div>
            <!--container-->
        </div>
        <!--header -->
    </div>
    <!--maintopdiv-->

    <section id="banner" class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <?php if (is_front_page() || is_home()) { ?>
                        <?php if (get_header_image()) : ?>
                            <div class="homeslider">
                                <img class="img-responsive" src="<?php header_image(); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <?php
                                $fhotel_food_lite_banner_heading     = get_theme_mod('banner_heading');
                                $fhotel_food_lite_banner_sub_heading = get_theme_mod('banner_sub_heading');
                                if (!empty($fhotel_food_lite_banner_heading) || !empty($fhotel_food_lite_banner_sub_heading)) {
                                ?>
                                    <div class="container">
                                        <div class="carousel-caption hidden-xs">
                                            <div class="slide_info">
                                                <div class="banner_heading">
                                                    <h3><?php echo esc_html($fhotel_food_lite_banner_heading); ?></h3>
                                                </div>
                                                <!--banner_heading-->
                                                <div class="banner_sub_heading captiontext"><?php echo esc_html($fhotel_food_lite_banner_sub_heading); ?></div>
                                                <!--banner_heading-->
                                            </div>
                                            <!--slide_info-->
                                        </div>
                                        <!--carousel-caption hidden-xs-->
                                    <?php } ?>
                                    </div>
                            </div>
                            <!--homeslider-->
                        <?php endif; ?>
                    <?php } else { ?>
                        <img class="img-responsive" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/innerpage.jpg" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <?php } ?>
                </div>
                <!--row-->
            </div>
            <!--col-sm-12-->
        </div>
        <!--row-->
    </section>
    <!--banner-->
    <?php if (is_front_page() || is_home()) { ?>

        <?php get_template_part('template', 'home'); ?>

    <?php
    }
