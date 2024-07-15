<?php 

/**
 * Plugin Name: Botiga Force Classic Cart and Checkout Pages
 * Plugin URI: https://kharis.risbl.com/
 * Description: This plugin helps Botiga theme users to force classic cart and checkout pages upon WooCommerce page creation process.
 * Version: 1.0.0
 * Author: Kharis Sulistiyono
 * Author URI: https://kharis.risbl.com
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: botigafc3p
 * Domain Path: /languages
 */

function botigafc3p_is_force_classic_cc_pages() {

    $return = false;

    if( wc_current_theme_is_fse_theme() ) {
        $return = false;
    }

    $isBotiga = wp_get_theme( 'botiga' );

    if ( $isBotiga->exists() ) {
        $return = true;
    }

    return $return;

}
 
function botigafc3p_woocommerce_create_pages($pages) {

    if( botigafc3p_is_force_classic_cc_pages() ) {

        if (isset($pages['cart'])) {
            $pages['cart']['name']      = _x( 'cart', 'Page slug', 'botigafc3p' );
            $pages['cart']['title']     = _x( 'Cart', 'Page title', 'botigafc3p' );
            $pages['cart']['content']   = '[woocommerce_cart]';
        }

        if (isset($pages['checkout'])) {
            $pages['checkout']['name']      = _x( 'checkout', 'Page slug', 'botigafc3p' );
            $pages['checkout']['title']     = _x( 'Checkout', 'Page title', 'botigafc3p' );
            $pages['checkout']['content']   = '[woocommerce_checkout]';
        }

    }

    return $pages;
}

add_filter('woocommerce_create_pages', 'botigafc3p_woocommerce_create_pages');