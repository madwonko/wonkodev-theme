<?php
/**
 * Wonkodev Theme Functions
 * 
 * @package Wonkodev
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function wonkodev_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 675, true);
    
    // Add custom image sizes
    add_image_size('wonkodev-featured', 800, 450, true);
    add_image_size('wonkodev-thumbnail', 400, 225, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'wonkodev'),
        'footer' => esc_html__('Footer Menu', 'wonkodev'),
    ));
    
    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 300,
        'flex-height' => true,
        'flex-width' => true,
    ));
    
    // Add theme support for custom backgrounds
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    
    // Add support for wide and full alignment
    add_theme_support('align-wide');
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'wonkodev_setup');

/**
 * Set content width
 */
function wonkodev_content_width() {
    $GLOBALS['content_width'] = apply_filters('wonkodev_content_width', 1200);
}
add_action('after_setup_theme', 'wonkodev_content_width', 0);

/**
 * Register Widget Areas
 */
function wonkodev_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'wonkodev'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here to appear in your sidebar.', 'wonkodev'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Column 1', 'wonkodev'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here to appear in footer column 1.', 'wonkodev'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Column 2', 'wonkodev'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here to appear in footer column 2.', 'wonkodev'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Column 3', 'wonkodev'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here to appear in footer column 3.', 'wonkodev'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'wonkodev_widgets_init');

/**
 * Enqueue Scripts and Styles
 */
function wonkodev_scripts() {
    // Main stylesheet
    wp_enqueue_style('wonkodev-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Google Fonts - Fira Code
    wp_enqueue_style('wonkodev-fonts', 'https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Main JavaScript
    wp_enqueue_script('wonkodev-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true);
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'wonkodev_scripts');

/**
 * Custom Post Type: Plugins
 */
function wonkodev_register_plugin_post_type() {
    $labels = array(
        'name' => 'Plugins',
        'singular_name' => 'Plugin',
        'menu_name' => 'Plugins',
        'add_new' => 'Add New Plugin',
        'add_new_item' => 'Add New Plugin',
        'edit_item' => 'Edit Plugin',
        'new_item' => 'New Plugin',
        'view_item' => 'View Plugin',
        'search_items' => 'Search Plugins',
        'not_found' => 'No plugins found',
        'not_found_in_trash' => 'No plugins found in trash',
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-plugins',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'plugins'),
        'show_in_rest' => true,
    );
    
    register_post_type('wonko_plugin', $args);
}
add_action('init', 'wonkodev_register_plugin_post_type');

/**
 * Custom Post Type: Documentation
 */
function wonkodev_register_docs_post_type() {
    $labels = array(
        'name' => 'Documentation',
        'singular_name' => 'Doc',
        'menu_name' => 'Documentation',
        'add_new' => 'Add New Doc',
        'add_new_item' => 'Add New Documentation',
        'edit_item' => 'Edit Documentation',
        'new_item' => 'New Doc',
        'view_item' => 'View Doc',
        'search_items' => 'Search Docs',
        'not_found' => 'No documentation found',
        'not_found_in_trash' => 'No documentation found in trash',
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-book',
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'rewrite' => array('slug' => 'docs'),
        'show_in_rest' => true,
        'hierarchical' => true,
    );
    
    register_post_type('wonko_docs', $args);
}
add_action('init', 'wonkodev_register_docs_post_type');

/**
 * Custom Taxonomy: Plugin Categories
 */
function wonkodev_register_plugin_taxonomy() {
    $labels = array(
        'name' => 'Plugin Categories',
        'singular_name' => 'Plugin Category',
        'search_items' => 'Search Categories',
        'all_items' => 'All Categories',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
        'menu_name' => 'Categories',
    );
    
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'plugin-category'),
        'show_in_rest' => true,
    );
    
    register_taxonomy('plugin_category', array('wonko_plugin'), $args);
}
add_action('init', 'wonkodev_register_plugin_taxonomy');

/**
 * Add Meta Boxes for Plugin Custom Fields
 */
function wonkodev_add_plugin_meta_boxes() {
    add_meta_box(
        'wonkodev_plugin_details',
        'Plugin Details',
        'wonkodev_plugin_details_callback',
        'wonko_plugin',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'wonkodev_add_plugin_meta_boxes');

function wonkodev_plugin_details_callback($post) {
    wp_nonce_field('wonkodev_plugin_details_nonce', 'wonkodev_plugin_details_nonce');
    
    $version = get_post_meta($post->ID, '_plugin_version', true);
    $download_url = get_post_meta($post->ID, '_plugin_download_url', true);
    $demo_url = get_post_meta($post->ID, '_plugin_demo_url', true);
    $docs_url = get_post_meta($post->ID, '_plugin_docs_url', true);
    $github_url = get_post_meta($post->ID, '_plugin_github_url', true);
    ?>
    <p>
        <label for="plugin_version"><strong>Version:</strong></label><br>
        <input type="text" id="plugin_version" name="plugin_version" value="<?php echo esc_attr($version); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="plugin_download_url"><strong>Download URL:</strong></label><br>
        <input type="url" id="plugin_download_url" name="plugin_download_url" value="<?php echo esc_attr($download_url); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="plugin_demo_url"><strong>Demo URL:</strong></label><br>
        <input type="url" id="plugin_demo_url" name="plugin_demo_url" value="<?php echo esc_attr($demo_url); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="plugin_docs_url"><strong>Documentation URL:</strong></label><br>
        <input type="url" id="plugin_docs_url" name="plugin_docs_url" value="<?php echo esc_attr($docs_url); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="plugin_github_url"><strong>GitHub URL:</strong></label><br>
        <input type="url" id="plugin_github_url" name="plugin_github_url" value="<?php echo esc_attr($github_url); ?>" style="width: 100%;">
    </p>
    <?php
}

/**
 * Save Plugin Meta Box Data
 */
function wonkodev_save_plugin_details($post_id) {
    if (!isset($_POST['wonkodev_plugin_details_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['wonkodev_plugin_details_nonce'], 'wonkodev_plugin_details_nonce')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['plugin_version'])) {
        update_post_meta($post_id, '_plugin_version', sanitize_text_field($_POST['plugin_version']));
    }
    
    if (isset($_POST['plugin_download_url'])) {
        update_post_meta($post_id, '_plugin_download_url', esc_url_raw($_POST['plugin_download_url']));
    }
    
    if (isset($_POST['plugin_demo_url'])) {
        update_post_meta($post_id, '_plugin_demo_url', esc_url_raw($_POST['plugin_demo_url']));
    }
    
    if (isset($_POST['plugin_docs_url'])) {
        update_post_meta($post_id, '_plugin_docs_url', esc_url_raw($_POST['plugin_docs_url']));
    }
    
    if (isset($_POST['plugin_github_url'])) {
        update_post_meta($post_id, '_plugin_github_url', esc_url_raw($_POST['plugin_github_url']));
    }
}
add_action('save_post', 'wonkodev_save_plugin_details');

/**
 * Excerpt Length
 */
function wonkodev_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'wonkodev_excerpt_length', 999);

/**
 * Excerpt More
 */
function wonkodev_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'wonkodev_excerpt_more');

/**
 * Custom Comments Template
 */
function wonkodev_comment($comment, $args, $depth) {
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <article class="comment-body">
            <div class="comment-author">
                <?php echo get_avatar($comment, 50); ?>
                <div class="comment-metadata">
                    <span class="comment-author-name"><?php comment_author_link(); ?></span>
                    <time datetime="<?php comment_time('c'); ?>">
                        <?php printf(__('%s ago', 'wonkodev'), human_time_diff(get_comment_time('U'), current_time('timestamp'))); ?>
                    </time>
                </div>
            </div>
            
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
            
            <?php
            comment_reply_link(array_merge($args, array(
                'depth' => $depth,
                'max_depth' => $args['max_depth'],
                'reply_text' => '→ Reply'
            )));
            ?>
        </article>
    <?php
}
