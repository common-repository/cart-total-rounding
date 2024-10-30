<?php
/**
 * Plugin Name: Cart Total Rounding
 * Plugin URI: http://parishkaar.com/
 * Description: Round off Woocommerce Cart Total to nearest 5 cents.
 * Version: 1.0
 * Author: Naveen Chand K
 * Author URI: http://www.parishkaar.com
 * Woo: 12345:342928dfsfhsf8429842374wdf4234sfd
 * WC requires at least: 4.4
 * WC tested up to: 4.4.1
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

// filter the woocommerce cart total with rounding off to nearest 5 cent
    add_filter( 'woocommerce_calculated_total', 'kncctr_custom_roundoff' );
    function kncctr_custom_roundoff( $total ) {
        $round_num = round($total / 0.05) * 0.05;
        $total = number_format($round_num, 2); 
        // this is required for showing zero in the last decimal
        return $total;
    }

}