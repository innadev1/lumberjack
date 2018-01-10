<?php

if (!defined('ABSPATH')) {
    exit;
}

return array(
    'enabled' => array(
        'title' => __('Enable/Disable', 'woocommerce-gateway-bpd'),
        'type' => 'checkbox',
        'label' => __('Enable Bilderlings Pay (Direct Post)', 'woocommerce-gateway-bpd'),
        'default' => 'yes'
    ),
    'title' => array(
        'title' => __('Title', 'gateway-BPD'),
        'type' => 'text',
        'description' => __('This controls the title which the user sees during checkout.', 'woocommerce-gateway-bpd'),
        'default' => __('Pay with VISA/MasterCard card', 'woocommerce-gateway-bpd'),
        'desc_tip' => true,
    ),
    'description' => array(
        'title' => __('Description', 'woocommerce-gateway-bpd'),
        'type' => 'text',
        'desc_tip' => true,
        'description' => __('This controls the description which the user sees during checkout.', 'woocommerce-gateway-bpd'),
        'default' => __('Bilderlings Pay', 'woocommerce-gateway-bpd')
    ),
    'email' => array(
        'title' => __('Merchant contact e-mail', 'woocommerce-gateway-bpd'),
        'type' => 'email',
        'description' => __('Please enter your customer support email address', 'woocommerce-gateway-bpd'),
        'default' => get_option('admin_email'),
        'desc_tip' => true,
        'placeholder' => 'you@youremail.com'
    ),

    'debug' => array(
        'title' => __('Debug Log', 'woocommerce-gateway-bpd'),
        'type' => 'checkbox',
        'label' => __('Enable logging', 'woocommerce-gateway-bpd'),
        'default' => 'no',
        'description' => sprintf(__('Log Bilderlings Pay (Direct Post) events inside <code>%s</code>', 'woocommerce-gateway-bpd'), wc_get_log_file_path('bild2'))
    ),
    'testmode' => array(
        'title' => __('Test mode', 'woocommerce-gateway-bpd'),
        'type' => 'checkbox',
        'label' => __('Test mode for Bilderlings Pay (Direct Post)', 'woocommerce-gateway-bpd'),
        'default' => 'no',
        'description' => 'Ask customer manager for Bilderlings Pay (Direct Post) Test server access',
    ),
    'advanced' => array(
        'title' => __('Advanced options', 'woocommerce-gateway-bpd'),
        'type' => 'title',
        'description' => '',
    ),

    'mid' => array(
        'title' => __('Merchant ID', 'woocommerce-gateway-bpd'),
        'type' => 'text',
        'description' => __('Merchant ID for Bilderlings Pay (Direct Post)', 'woocommerce-gateway-bpd'),
        'default' => '',
        'desc_tip' => true,
        'placeholder' => ''
    ),
    'msign' => array(
        'title' => __('Merchant Signature', 'woocommerce-gateway-bpd'),
        'type' => 'text',
        'description' => __('Merchant Signature for Bilderlings Pay (Direct Post)', 'woocommerce-gateway-bpd'),
        'default' => '',
        'desc_tip' => true,
    )


);