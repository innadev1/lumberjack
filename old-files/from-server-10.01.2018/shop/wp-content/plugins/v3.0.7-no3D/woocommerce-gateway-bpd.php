<?php
/**
 * Plugin Name: WooCommerce Bilderlings Pay (Direct Post)
 * Plugin URI: https://bilderlingspay.com/
 * Description: Bilderlings Pay Gateway Plugin for WooCommerce.
 * Version: 1.0.0
 * Author: bpay
 * Author URI: https://bilderlingspay.com/
 * Developer: bpay
 * Developer URI: https://bilderlingspay.com/
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *Text Domain: woocommerce-gateway-bpd
 *Domain Path: /languages/
 *
 */


add_action('plugins_loaded', 'woocommerce_BPD_init');
function woocommerce_BPD_init()
{
    if (!class_exists('WC_Payment_Gateway')) {
        return;
    }
    require_once(plugin_basename('classes/class-wc-gateway-BPD.php'));

}


function woocommerce_BPD_add_gateway($methods)
{
    $methods[] = 'WC_Gateway_BPD';
    return $methods;
}


add_filter('woocommerce_payment_gateways', 'woocommerce_BPD_add_gateway');