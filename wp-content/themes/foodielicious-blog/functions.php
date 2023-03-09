<?php
add_action('wp_enqueue_scripts', 'foodielicious_blog_enqueue_styles');
function foodielicious_blog_enqueue_styles()
{
  wp_enqueue_style('foodielicious-blog-parent-style', get_template_directory_uri() . '/style.css');
}

function foodielicious_blog_customize_preview_js() {
  wp_enqueue_script( 'foodielicious-blog-customizer', get_stylesheet_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '999', true );
}
add_action( 'customize_preview_init', 'foodielicious_blog_customize_preview_js' );


function foodielicious_blog_google_fonts()
{
  wp_enqueue_style('foodielicious-blog-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap', false);
}
add_action('wp_enqueue_scripts', 'foodielicious_blog_google_fonts');


/**
 * Post Layout for Archives
 */
if ( ! function_exists( 'foodielicious_blog_archive_post' ) ) {
    /**
     * Display a post of specific layout.
     * 
     * @param string $layout
     */
    function foodielicious_blog_archive_post( $layout = '' ) { 
     ?>
     <article class="post excerpt">

       <?php if ( has_post_thumbnail() ) { ?>
        <div class="post-blogs-container-thumbnails">
        <?php } else { ?>
          <div class="post-blogs-container">
          <?php } ?>

          <?php if ( empty($customizable_blogily_full_posts) ) : ?>


            <?php if ( has_post_thumbnail() ) { ?>
              <div class="featured-thumbnail-container">
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
                  <?php  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');  
                  echo '<div class="blog-featured-thumbnail" style="background-image:url('.esc_url($featured_img_url).')"></div>';
                  ?>
                </a>
              </div>
              <div class="thumbnail-post-content">
              <?php } else { ?>
               <div class="nothumbnail-post-content">
               <?php } ?>


               <h2 class="title">
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
              </h2>

              <span class="entry-meta">
                <?php echo get_the_date(); ?>
                <?php
                if ( is_sticky() && is_home() && ! is_paged() ) {
                  printf( ' / <span class="sticky-text">%s</span>', __( 'Featured', 'foodielicious-blog' ) );
                } ?>
              </span>
              <div class="post-content">
                <?php echo customizable_blogily_excerpt(50); ?>...
                <div>
                  <a class="readmore-button" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php esc_html_e('Read More', 'foodielicious-blog'); ?> </a>
                </div>
              </div>
            <?php else : ?>
              <?php if (customizable_blogily_post_has_moretag()) : ?>
                <?php customizable_blogily_readmore(); ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endif; ?>

      </article>
    <?php }
  }



  require get_stylesheet_directory() . '/inc/custom-header.php';

  function foodielicious_blog_customize_register($wp_customize) {
   $wp_customize->add_section('foodielicious_blog_section', array(
    'title'      => __('Foodielicious Blog Settings', 'foodielicious-blog'),
    'priority'   => 1,
    'capability' => 'edit_theme_options',

  ));

   $wp_customize->add_setting('foodielicious_blog_show_about_the_author', array(
    'default' => 0,
    'sanitize_callback' => 'sanitize_text_field',
  ));

   $wp_customize->add_control('foodielicious_blog_show_about_the_author', array(
    'label'    => __('Show About The Author Section', 'foodielicious-blog'),
    'section'  => 'foodielicious_blog_section',
    'priority' => 0,
    'settings' => 'foodielicious_blog_show_about_the_author',
    'type'     => 'checkbox',
  ));

   $wp_customize->add_setting('foodielicious_blog_show_related_posts', array(
    'default' => 0,
    'sanitize_callback' => 'sanitize_text_field',
  ));

   $wp_customize->add_control('foodielicious_blog_show_related_posts', array(
    'label'    => __('Hide related posts section', 'foodielicious-blog'),
    'section'  => 'foodielicious_blog_section',
    'priority' => 0,
    'settings' => 'foodielicious_blog_show_related_posts',
    'type'     => 'checkbox',
  ));


   $wp_customize->add_setting('foodielicious_blog_show_tags', array(
    'default' => 0,
    'sanitize_callback' => 'sanitize_text_field',
  ));

   $wp_customize->add_control('foodielicious_blog_show_tags', array(
    'label'    => __('Hide post tags', 'foodielicious-blog'),
    'section'  => 'foodielicious_blog_section',
    'priority' => 0,
    'settings' => 'foodielicious_blog_show_tags',
    'type'     => 'checkbox',
  ));



 }
 add_action('customize_register', 'foodielicious_blog_customize_register');

 if (! function_exists('foodielicious_blog_color_choice')):
  function foodielicious_blog_color_choice()
  {
    ?>

    <style type="text/css">
    <?php if (get_theme_mod('foodielicious_blog_show_tags') == '1') : ?>   
      .tags {
        display:none !important;
      }
    <?php endif; ?>
    <?php if (get_theme_mod('foodielicious_blog_show_related_posts') == '1') : ?>   
      .related-posts {
        display:none !important;
      }
    <?php endif; ?>
    <?php if (get_theme_mod('foodielicious_blog_show_about_the_author') == '1') : ?>   
      .postauthor {
        display:block;
      }
    <?php endif; ?>

    a.readmore-button, a.readmore-button:hover{ background: <?php echo esc_attr(get_theme_mod('primary_theme_color')); ?>; }
    <?php if (get_theme_mod('center_header_text') == '0') : ?>.site-branding, .site-branding * {text-align: center;}<?php endif; ?>
    .related-posts .related-posts-no-img h5.title.front-view-title, #tabber .inside li .meta b,footer .widget li a:hover,.fn a,.reply a,#tabber .inside li div.info .entry-title a:hover, #navigation ul ul a:hover,.single_post a, a:hover, .sidebar.c-4-12 .textwidget a, #site-footer .textwidget a, #commentform a, #tabber .inside li a, .copyrights a:hover, a, .sidebar.c-4-12 a:hover, .top a:hover, footer .tagcloud a:hover,.sticky-text { color: <?php echo esc_attr(get_theme_mod('primary_theme_color')); ?>; }
    .total-comments span:after, span.sticky-post, .nav-previous a:hover, .nav-next a:hover, #commentform input#submit, #searchform input[type='submit'], .home_menu_item, .currenttext, .pagination a:hover, .readMore a, .customizableblogily-subscribe input[type='submit'], .pagination .current, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-product-search input[type="submit"], .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, #sidebars h3.widget-title:after, .postauthor h4:after, .related-posts h3:after, .archive .postsby span:after, .comment-respond h4:after, .single_post header:after, #cancel-comment-reply-link, .upper-widgets-grid h3:after  { background-color: <?php echo esc_attr(get_theme_mod('primary_theme_color')); ?>; }
    #sidebars .widget h3, #sidebars .widget h3 a { border-left-color: <?php echo esc_attr(get_theme_mod('primary_theme_color')); ?>; }
    .related-posts-no-img, #navigation ul li.current-menu-item a, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus, .pagination .current, .tagcloud a { border-color: <?php echo esc_attr(get_theme_mod('primary_theme_color')); ?>; }
    .corner { border-color: transparent transparent <?php echo esc_attr(get_theme_mod('primary_theme_color')); ?> transparent;}
    .pagination a, .pagination2, .pagination .dots, .post.excerpt { background: <?php echo esc_attr(get_theme_mod('all_blog_posts_bg')); ?>; }
    #content, #comments, #commentsAdd, .related-posts, .single-post .post.excerpt, .postauthor { background: <?php echo esc_attr(get_theme_mod('post_page_background')); ?>; }
    #sidebars .widget { background: <?php echo esc_attr(get_theme_mod('sidebar_background_color')); ?>; }
    .upper-widgets-grid { background: <?php echo esc_attr(get_theme_mod('upper_widgets_background_color')); ?>; }
    footer { background: <?php echo esc_attr(get_theme_mod('footer_bg_color')); ?>; }
    .copyrights { background: <?php echo esc_attr(get_theme_mod('footer_copyright_bg_color')); ?>; }
    #site-header { background-color: <?php echo esc_attr(get_theme_mod('top_header_background_color')); ?>; }
    .primary-navigation, .primary-navigation, #navigation ul ul li { background-color: <?php echo esc_attr(get_theme_mod('navigation_background_color')); ?>; }
    a#pull, #navigation .menu a, #navigation .menu a:hover, #navigation .menu .fa > a, #navigation .menu .fa > a, #navigation .toggle-caret, #navigation span.site-logo a, #navigation.mobile-menu-wrapper .site-logo a, .primary-navigation.header-activated #navigation ul ul li a { color: <?php echo esc_attr(get_theme_mod('navigation_link_color')); ?> }
    #sidebars .widget h3, #sidebars .widget h3 a, #sidebars h3 { color: <?php echo esc_attr(get_theme_mod('sidebar_headline_color')); ?>; }
    #sidebars .widget a, #sidebars a, #sidebars li a { color: <?php echo esc_attr(get_theme_mod('sidebar_link_color')); ?>; }
    #sidebars .widget, #sidebars, #sidebars .widget li { color: <?php echo esc_attr(get_theme_mod('sidebar_text_color')); ?>; }
    .post.excerpt .post-content, .pagination a, .pagination2, .pagination .dots { color: <?php echo esc_attr(get_theme_mod('all_blog_posts_text')); ?>; }
    .post.excerpt h2.title a { color: <?php echo esc_attr(get_theme_mod('all_blog_posts_headline')); ?>; }
    .pagination a, .pagination2, .pagination .dots { border-color: <?php echo esc_attr(get_theme_mod('all_blog_posts_text')); ?>; }
    span.entry-meta{ color: <?php echo esc_attr(get_theme_mod('all_blog_posts_date')); ?>; }
    .article h1, .article h2, .article h3, .article h4, .article h5, .article h6, .total-comments, .article th{ color: <?php echo esc_attr(get_theme_mod('post_page_headline')); ?>; }
    .article, .article p, .related-posts .title, .breadcrumb, .article #commentform textarea  { color: <?php echo esc_attr(get_theme_mod('post_page_text')); ?>; }
    .article a, .breadcrumb a, #commentform a { color: <?php echo esc_attr(get_theme_mod('post_page_link')); ?>; }
    #commentform input#submit, #commentform input#submit:hover{ background: <?php echo esc_attr(get_theme_mod('post_page_link')); ?>; }
    .post-date-customizable, .comment time { color: <?php echo esc_attr(get_theme_mod('post_page_date')); ?>; }
    .footer-widgets #searchform input[type='submit'],  .footer-widgets #searchform input[type='submit']:hover{ background: <?php echo esc_attr(get_theme_mod('footer_link_color')); ?>; }
    .footer-widgets h3:after{ background: <?php echo esc_attr(get_theme_mod('footer_headline_color')); ?>; }
    .footer-widgets h3, footer .widget.widget_rss h3 a{ color: <?php echo esc_attr(get_theme_mod('footer_headline_color')); ?>; }
    .footer-widgets .widget li, .footer-widgets .widget, #copyright-note, footer p{ color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>; }
    footer .widget a, #copyright-note a, #copyright-note a:hover, footer .widget a:hover, footer .widget li a:hover{ color: <?php echo esc_attr(get_theme_mod('footer_link_color')); ?>; }
    .top-column-widget a, .top-column-widget a:hover, .top-column-widget a:active, .top-column-widget a:focus { color: <?php echo esc_attr(get_theme_mod('upper_widgets_link_color')); ?>; }
    .top-column-widget, .upper-widgets-grid { color: <?php echo esc_attr(get_theme_mod('upper_widgets_content_color')); ?>; }
    .top-column-widget .widget.widget_rss h3 a, .upper-widgets-grid h3, .top-column-widget h3{ color: <?php echo esc_attr(get_theme_mod('upper_widgets_headlinke_color')); ?>; }
    @media screen and (min-width: 865px) {.primary-navigation.header-activated #navigation a { color: <?php echo esc_attr(get_theme_mod('navigation_frontpage_link_color')); ?>; }}
    @media screen and (max-width: 865px) {#navigation.mobile-menu-wrapper{ background-color: <?php echo esc_attr(get_theme_mod('navigation_background_color')); ?>; }}
    <?php if ( get_theme_mod( 'toggle_header_frontpage' ) == '1' ) : ?>.single #site-header,.page #site-header { margin-bottom:0; }<?php endif; ?>
  </style>
  <?php
}
add_action('wp_head', 'foodielicious_blog_color_choice');
endif;




/* Sanitizers */
function foodielicious_blog_sanitize_select($input, $setting)
{
    // Ensure input is a slug.
  $input = sanitize_key($input);

    // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control($setting->id)->choices;

    // If the input is a valid key, return it; otherwise, return the default.
  return (array_key_exists($input, $choices) ? $input : $setting->default);
}



/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for child theme Foodielicious Blog for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_stylesheet_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'foodielicious_blog_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function foodielicious_blog_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

    array(
      'name'      => 'Tables',
      'slug'      => 'superb-tables',
      'required'  => false,
    ),

    array(
      'name'      => 'Social Share and Follow Buttons',
      'slug'      => 'superb-social-share-and-follow-buttons',
      'required'  => false,
    ),

  );

  /*
   * Array of configuration settings. Amend each line as needed.
   *
   * TGMPA will start providing localized text strings soon. If you already have translations of our standard
   * strings available, please help us make TGMPA even better by giving us access to these translations or by
   * sending in a pull-request with .po file(s) with the translations.
   *
   * Only uncomment the strings in the config array if you want to customize the strings.
   */
  $config = array(
    'id'           => 'foodielicious-blog',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.

  );

  tgmpa( $plugins, $config );
}
