<?php

class WC_Gateway_BPD extends WC_Payment_Gateway
{


    const TRANSLATION_ID = 'BPD';
    const GATEWAY_ID = 'bpd';

    /**
     * @var Logger
     */
    protected $_logger;
    public static $log_enabled = false;

    public static $log;

    protected $gateway;
    protected $notify_url;
    public $plugin_path;


    public function __construct()
    {


        $this->plugin_path = trailingslashit(plugin_dir_path(__FILE__));
        $this->gateway = $this;
        $this->notify_url = WC()->api_request_url('WC_Gateway_BPD');


        $this->id = 'bpd';
        $this->method_title = __('Pay with VISA/MasterCard card', 'woocommerce-gateway-bpd');
        $this->method_description = sprintf(__('Bilderlings Pay (Direct Post) plugin does not have additional dependencies. Check the %ssystem status%s page to check basic requirements and system health.', 'woocommerce-gateway-bpd'), '<a href="' . admin_url('admin.php?page=wc-status') . '">', '</a>');
        $this->supports = array(
            'products'
        );


        $this->has_fields = false;
        $this->order_button_text = __('Pay with card', 'woocommerce-gateway-bpd');
        $this->init_form_fields();
        $this->init_settings();

        foreach ($this->settings as $setting_key => $value) {
            $this->$setting_key = $value;
        }


        $this->title = $this->get_option('title');
        $this->description = $this->get_option('description');
        $this->testmode = 'yes' === $this->get_option('testmode', 'no');
        $this->debug = 'yes' === $this->get_option('debug', 'no');

        self::$log_enabled = $this->debug;


        //new Logger( self::GATEWAY_ID, $this->debug );


        if (is_admin()) {
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));

        }

        if (!$this->is_valid_for_use()) {
            $this->enabled = 'no';
        } else {
            add_action('woocommerce_receipt_' . $this->id, array($this, 'receipt_page'));
            //add_action( 'woocommerce_thankyou_' . $this->id, array( $this, 'check_response' ));
            add_action('woocommerce_api_' . $this->id, array($this, 'check_notification'));
            add_action('woocommerce_api_' . strtolower(get_class($this)), array(&$this, 'check_response'));


        }

//add_filter( 'init', array( $this, 'register_Iamnew_order_status' ));
//add_filter( 'wc_order_statuses', array( $this,'add_Iamnew_to_order_statuses' ));

        if (stripos(get_option('siteurl'), 'https://') === 0) {
            $_SERVER['HTTPS'] = 'on';

            // add JavaScript detection of page protocol, and pray!
            add_action('wp_print_scripts', array(&$this, 'force_ssl_url_scheme_script'));
        }

        add_action('init', array($this, 'load_textdomain'));

    } //construct ends


    public function load_textdomain()
    {

        load_plugin_textdomain('woocommerce-gateway-bpd', false, plugin_basename($this->plugin_path) . '/languages');

    }

    public function force_ssl_url_scheme_script()
    {
        ?>
        <script>
            if (document.location.protocol != "https:") {
                document.location = document.URL.replace(/^http:/i, "https:");
            }
        </script>
        <?php
    }


    function check_response2()
    {

        echo 111;

    }

    function mycart()
    {
        global $wpdb; // If this is not done in the function yet
        global $woocommerce;
//$this->log(var_dump($pageposts));

        $request = wp_unslash($_REQUEST);
        $this->log(json_encode($request));
        //  $this->log($this->cart_contents);


        $zz1 = $request['order_id'];

        $zz2 = substr($zz1, strpos($zz1, "-") + 1);

        $order = wc_get_order($zz2);
        $order_items = $order->get_items();

        foreach ($order_items as $values) {
            $id = $values['product_id'];
            $quant = $values['qty'];
            $woocommerce->cart->add_to_cart($id, $quant);
        }

//var_dump($order_items);


    }


    function mycart2($order_id)
    {
        global $wpdb; // If this is not done in the function yet
        global $woocommerce;
//$this->log(var_dump($pageposts));

        $request = wp_unslash($_REQUEST);
        $this->log(json_encode($request));
        //  $this->log($this->cart_contents);


        //$b2 = $request['order_id'];

        $order = wc_get_order($order_id);
        $order_items = $order->get_items();

        foreach ($order_items as $values) {
            $id = $values['product_id'];
            $quant = $values['qty'];
            $woocommerce->cart->add_to_cart($id, $quant);
        }


        $order->update_status('failed');
        $order->add_order_note('Bad Signature', 'woocommerce-gateway-bpd');

        wp_safe_redirect($order->get_cancel_order_url());

        var_dump($order_items);

    }


    function register_Iamnew_order_status()
    {
        register_post_status('wc-badsignature', array(
            'label' => 'Bad Signature',
            'public' => true,
            'exclude_from_search' => false,
            'show_in_admin_all_list' => true,
            'show_in_admin_status_list' => true,
            'label_count' => _n_noop('Bad Signature <span class="count">(%s)</span>', 'Bad Signature<span class="count">(%s)</span>')
        ));
    }

// Add to list of WC Order statuses
    function add_Iamnew_to_order_statuses($order_statuses)
    {

        $new_order_statuses = array();

        // add new order status after processing
        foreach ($order_statuses as $key => $status) {

            $new_order_statuses[$key] = $status;

            $new_order_statuses['badsignature'] = 'Bad Signature';

        }

        return $new_order_statuses;
    }


    public function is_valid_for_use()
    {
        return in_array(get_woocommerce_currency(), array('EUR', 'USD', 'GBP', 'AUD', 'RUB', 'UAH'));
    }

    public function get_notification_url()
    {
        return get_site_url() . '/?wc-api=' . $this->id;
    }

    public function init_form_fields()
    {
        $this->form_fields = include('includes/settings-bpd.php');
    }

    public function gettranurl()
    {
        $url = $this->testmode ? 'bpayprocessing.iamoffice.lv/direct/v1' : 'my2.bilderlingspay.com/direct/v1';

        $environment_url = 'https://' . $url;

        return $environment_url;
    }

    public function receipt_page($order_id)
    {
        echo "<p>" . __('', self::TRANSLATION_ID) . "</p>";
        try {
            echo $this->_get_payment_form($order_id);
        } catch (InvalidArgumentException $e) {
            $this->log($e->getMessage());
            wc_add_notice(__('An error occured while processing the order, if the problem persist please contact us.', 'woocommerce-gateway-bpd'), 'error');
        }
    }

    public function log($message)
    {
        if (self::$log_enabled) {
            if (empty(self::$log)) {
                self::$log = new WC_Logger();
            }
            self::$log->add('bpd', $message);
        }
    }


    protected function _get_orders2($order_id)
    {
        $order = wc_get_order($order_id);
        $order_items = $order->get_items();

        return $order_items;

    }


    private function makeRandomString($bits = 256)
    {
        $bytes = ceil($bits / 8);
        $return = '';
        for ($i = 0; $i < $bytes; $i++) {
            $return .= chr(mt_rand(0, 255));
        }
        return $return;
    }

    protected function _get_payment_form($order_id)
    {
        $order = wc_get_order($order_id);
        $order_items = $order->get_items();


//$prc = array_merge($prca, $prcb);

        //  $prc2 = htmlspecialchars(json_encode($prc));

        $order_nr = 'Order' . '-' . $order_id;
        $amount = number_format(get_post_meta($order->id, '_order_total', true), 2, '.', '');
        $currency = get_woocommerce_currency();
        $return_url = self::get_return_url($order);
        $nonce = substr(md5(uniqid(rand(), true)), 0, 32);
        // $aqr1 = $this->mid."|".$order_id."|".$amount."|".$currency."|".$return_url."|".$this->msign;

        $aqr1 = $order_nr . $amount . $currency . 'FD_SMS' . $this->mid . $nonce . $this->msign;

        $hash = hash("sha512", $aqr1);

        $params = array(
            'X-Shop-Name' => $this->mid,
            'X-Nonce' => $nonce,
            'X-Request-Signature' => $hash,
            'order_id' => $order_nr,
            'amount' => $amount,
            'currency' => $currency,
            'payment_method' => 'FD_SMS',
            'shop_name' => $this->mid,
            'customer.first_name' => $order->billing_first_name,
            'customer.last_name' => $order->billing_last_name,
            'customer.email' => $order->billing_email,
            'customer.zip' => $order->billing_postcode,
            'customer.city' => $order->billing_city,
            'customer.address' => substr($order->billing_address_1 . $order->billing_address_2, 0, 48),
            'customer.phone' => $order->billing_phone,
            'customer.country' => $order->billing_country,

            'customer.ip' => $_SERVER['REMOTE_ADDR'],

            "customer.additional_params['locale']" => get_locale()

        );


        $html = '<form id="bpay_form" method="post" action="' . $this->gettranurl() . '">';
        foreach ($params as $key => $field) {
            $html .= '<input type="hidden" name="' . $key . '" value="' . $field . '" style="display:none;">';
        }

        $i = 0;
        foreach ($order_items as $item) {


            $html .= '<input type="hidden" name="product[' . $i . '].name" value="' . $item['name'] . '" style="display:none;">';

            $html .= '<input type="hidden" name="product[' . $i . '].amount" value="' . $item['line_total'] . '" style="display:none;">';

            $i++;

        }


        if (1) {
            wc_enqueue_js('document.getElementById("bpay_form") && document.getElementById("bpay_form").submit();');
            $html .= '<p>' . __('You will be redirected to bilderlingspay shortly.', 'woocommerce-gateway-bpd') . '</p>';
        } else {
            $html .= '<input type="submit" class="button-alt" value="' . __('Pay with Bilderlings Pay (Direct Post)', 'woocommerce-gateway-bpd') . '" />';
            $html .= '<a class="button cancel" href="' . $order->get_cancel_order_url() . '">' . __('Cancel', 'woocommerce-gateway-bpd') . '</a>';
        }
        $html .= '</form>';


        return $html;

    }


    public function check_response($order_id)
    {
        global $woocommerce;
        $request = wp_unslash($_REQUEST);
//print_r( $request);
        $this->log(json_encode($request));
        //  $this->log($this->cart_contents);

        if (isset($request['invoice_ref'])) {


            $b1 = $request['invoice_ref'];


            $b2 = $request['order_id'];

            $b3 = $request['amount'];
            $b4 = $request['currency'];
            $b5 = $this->msign;
            $b6 = $request['status'];
            $b7 = $request['X-Nonce'];


            $h25 = hash("sha512", $b1 . $b6 . $b3 . $b4 . $b2 . $b7 . $b5);
            $zz1 = $request['order_id'];


            $zz2 = substr($zz1, strpos($zz1, "-") + 1);

            $c = $request['X-Request-Signature'];
            try {
                $order = wc_get_order($zz2);

//print_r( $order);
                echo $this->get_return_url($order);
//echo $order->needs_payment();


                if ($order->needs_payment() || isset($request['status'])) {
                    echo $request['status'];
                    //wp_safe_redirect('https://wordpress461.iamoffice.lv');
                    if ($request['status'] == 'SUCCEEDED') {

                        if ($h25 == $c) {
                            $order->add_order_note(sprintf(__('User has correctly returned from bilderlingspay website', 'woocommerce-gateway-bpd')));

                            $order->add_order_note(sprintf(__('Order has successfully been paid. Transaction id: %s', 'woocommerce-gateway-bpd'), $request['invoice_ref']));
//$this->process_payment($zz2);


                            $order->payment_complete($request['invoice_ref']);


                            wp_safe_redirect($this->get_return_url($order));
                            WC()->cart->empty_cart();
//$order->update_status('processing');

                        } else {

                            $order->update_status('failed');
                            $order->add_order_note(sprintf(__('Order Failed for order number %s, order id: %s', 'woocommerce-gateway-bpd'), $order->id));
                            add_filter('wc_add_to_cart_message', 'woocommrece_custom_add_to_cart_message');


                            //$this->mycart();
                            wp_safe_redirect($order->get_cancel_order_url());


                        }
                    } elseif (isset($request['error_code']) && $request['error_code'] == 'BAD_SIGNATURE') {


                        $order->add_order_note(sprintf(__('Order has failed due to bad signature. Transaction id: %s', 'woocommerce-gateway-bpd'), $request['invoice_ref']));

                        $order->update_status('failed');
                        add_filter('wc_add_to_cart_message', 'woocommrece_custom_add_to_cart_message2');
                        //$this->mycart();
                        wp_safe_redirect($order->get_cancel_order_url());

                    } else {


                        $order->update_status('cancelled');
                        $order->add_order_note(sprintf(__('Order cancelled for order id: %s', 'woocommerce-gateway-bpd'), $request['invoice_ref']));
                        add_filter('wc_add_to_cart_message', 'woocommrece_custom_add_to_cart_message');
                        //$this->mycart();

                        wp_safe_redirect($order->get_cancel_order_url());

                    }
                }
            } catch (Exception $e) {
                $this->log($e->getMessage());
                $this->log($e->getTraceAsString());
            }

        } else {
            add_action('woocommerce_checkout_order_processed', array($this, 'mycart2'));
            //$this->mycart2($order_id);
        }
        exit;
    }  //function ends


    function woocommrece_custom_add_to_cart_message2()
    {

        global $woocommerce;


        $message = __('Order failed due to bad signature!.', 'woocommerce-gateway-bpd');


        return $message;

    }

    function woocommrece_custom_add_to_cart_message()
    {

        global $woocommerce;


        $message = __('Order failed!.', 'woocommerce-gateway-bpd');


        return $message;

    }

    /**
     * Called when the gateway sends the notification to the server
     */
    public function check_notification($order_id)
    {

        global $woocommerce;
        $request = wp_unslash($_REQUEST);
//print_r( $request);
        $this->log(json_encode($request));
        //  $this->log($this->cart_contents);

        if (isset($request['invoice_ref'])) {


            $b1 = $request['invoice_ref'];


            $b2 = $request['order_id'];

            $b3 = $request['amount'];
            $b4 = $request['currency'];
            $b5 = $this->msign;
            $b6 = $request['status'];
            $b7 = $request['X-Nonce'];


            $h25 = hash("sha512", $b1 . $b6 . $b3 . $b4 . $b2 . $b7 . $b5);
            $zz1 = $request['order_id'];


            $zz2 = substr($zz1, strpos($zz1, "-") + 1);

            $c = $request['X-Request-Signature'];
            try {
                $order = wc_get_order($zz2);

//print_r( $order);
                echo $this->get_return_url($order);
//echo $order->needs_payment();


                if ($order->needs_payment() || isset($request['status'])) {
                    echo $request['status'];
                    //wp_safe_redirect('https://wordpress461.iamoffice.lv');
                    if ($request['status'] == 'SUCCEEDED') {

                        if ($h25 == $c) {
                            $order->add_order_note(sprintf(__('User has correctly returned from bilderlingspay website', 'woocommerce-gateway-bpd')));

                            $order->add_order_note(sprintf(__('Order has successfully been paid. Transaction id: %s', 'woocommerce-gateway-bpd'), $request['invoice_ref']));
//$this->process_payment($zz2);


                            $order->payment_complete($request['invoice_ref']);


                            // wp_safe_redirect($this->get_return_url($order ));
                            WC()->cart->empty_cart();
//$order->update_status('processing');

                        } else {

                            $order->update_status('failed');
                            $order->add_order_note(sprintf(__('Order Failed for order number %s, order id: %s', 'woocommerce-gateway-bpd'), $order->id));
                            add_filter('wc_add_to_cart_message', 'woocommrece_custom_add_to_cart_message');


                            //$this->mycart();
                            // wp_safe_redirect($order->get_cancel_order_url());


                        }
                    } elseif (isset($request['error_code']) && $request['error_code'] == 'BAD_SIGNATURE') {


                        $order->add_order_note(sprintf(__('Order has failed due to bad signature. Transaction id: %s', 'woocommerce-gateway-bpd'), $request['invoice_ref']));

                        $order->update_status('failed');
                        add_filter('wc_add_to_cart_message', 'woocommrece_custom_add_to_cart_message2');
                        //$this->mycart();
                        // wp_safe_redirect($order->get_cancel_order_url());

                    } else {


                        $order->update_status('cancelled');
                        $order->add_order_note(sprintf(__('Order cancelled for order id: %s', 'woocommerce-gateway-bpd'), $request['invoice_ref']));
                        add_filter('wc_add_to_cart_message', 'woocommrece_custom_add_to_cart_message');
                        //$this->mycart();

                        //wp_safe_redirect($order->get_cancel_order_url());

                    }
                }
            } catch (Exception $e) {
                $this->log($e->getMessage());
                $this->log($e->getTraceAsString());
            }

        } else {
            add_action('woocommerce_checkout_order_processed', array($this, 'mycart2'));
            //$this->mycart2($order_id);
        }
        exit;


    } //notif ends


    public function process_payment($order_id)
    {
        $order = wc_get_order($order_id);

        echo $order_id;
        return array(
            'result' => 'success',
            'redirect' => $order->get_checkout_payment_url(true)
        );
    }

    /**
     * @return bool
     */
    public function validate_fields()
    {
        return true;
    }


} //class ends