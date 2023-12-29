<?php

remove_action('wp_head',             'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles',     'print_emoji_styles');
remove_action('admin_print_styles',  'print_emoji_styles');

remove_action('wp_head', 'wp_resource_hints', 2); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head'); // remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

// add_filter('show_admin_bar', '__return_false');
add_theme_support('post-thumbnails');
add_filter('use_block_editor_for_post', '__return_false', 10);
add_theme_support('title-tag');

add_action('wp_enqueue_scripts', 'add_scripts_and_styles');
add_action('after_setup_theme', 'add_menu');

function add_scripts_and_styles()
{
    wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), null, 'footer');
    wp_enqueue_style('style',  get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('script',  get_template_directory_uri() . '/assets/js/script.js', array(), null, 'footer');
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
}

function add_menu()
{
    register_nav_menu('top', 'Меню');
    register_nav_menu('bottom', 'Нижнее меню');
}


if (function_exists('acf_add_options_page')) {

    $option_page = acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'     => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'     => 'edit_posts',
        'redirect'     => false
    ));
}


// add_filter('wp_pagenavi', 'abeta_pagination', 10, 2);
// function abeta_pagination($html)
// {
//     $out = '';
//     $out = str_replace('<div', '', $html);

//     $out = str_replace('class=\'wp-pagenavi\' role=\'navigation\'>', '', $out);
//     $out = str_replace('<a', '<a class="pagination__page-item"', $out);
//     $out = str_replace('</a>', '</a>', $out);
//     $out = str_replace('<span aria-current=\'page\' class=\'current\'>', '<span class="pagination__page-item active">', $out);
//     $out = str_replace('</div>', '', $out);
//     $out = str_replace('?paged=', '', $out);
//     return '<div class="pagination__page">' . $out . '</div>';
// }

// add_action('wp_ajax_loadmore_restaurants', 'loadmore_restaurants_action');
// add_action('wp_ajax_nopriv_loadmore_restaurants', 'loadmore_restaurants_action');



class main_service_mobile_menu_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if ($depth == 0) {
            if ($args->has_children && $item->current) {
                $output .= '<li class="menu__item active"><a href="' . $item->url . '" class="menu__link">' . $item->title . '</a><span class="menu__item-svg-block" onclick="openMenu(this);"><svg class="menu__item-svg"><use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#arrowMenu"></use></svg></span>';
            } else if ($args->has_children) {
                $output .= '<li class="menu__item"><a href="' . $item->url . '" class="menu__link">' . $item->title . '</a><span class="menu__item-svg-block" onclick="openMenu(this);"><svg class="menu__item-svg"><use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#arrowMenu"></use></svg></span>';
            } else if ($item->current) {
                $output .= '<li class="menu__item active"><a href="' . $item->url . '" class="menu__link">' . $item->title . '</a>';
            } else {
                $output .= '<li class="menu__item"><a href="' . $item->url . '" class="menu__link">' . $item->title . '</a>';
            }
        }
        if ($depth == 1) {
            if ($item->current) {
                $output .= '<li class="menu__sub-item"><a href="' . $item->url . '" class="menu__sub-link menu__sub-link_active">' . $item->title . '</a>';
            } else {
                $output .= '<li class="menu__sub-item"><a href="' . $item->url . '" class="menu__sub-link">' . $item->title . '</a>';
            }
        }
    }
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $output .= '<ul class="menu__sub">';
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $output .= '</ul>';
    }
    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {

        $id_field = $this->db_fields['id'];
        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}


if (function_exists('acf_add_options_page')) {

    $option_page = acf_add_options_page(array(
        'page_title'     => 'Сайт',
        'menu_title'     => 'Сайт',
        'menu_slug'     => 'theme-general-settings',
        'capability'     => 'edit_posts',
        'redirect'     => false
    ));
}
