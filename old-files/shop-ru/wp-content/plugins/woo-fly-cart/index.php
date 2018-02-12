<?php
/*
Plugin Name: WooCommerce Fly Cart
Plugin URI: https://wpclever.net/
Description: WooCommerce interaction mini cart with many styles and effects.
Version: 1.3.2
Author: WPclever.net
Author URI: https://wpclever.net
Text Domain: woofc
Domain Path: /languages/
WC requires at least: 3.0
WC tested up to: 3.2.6
*/

if ( ! defined( 'ABSPATH' ) && ! class_exists( 'WooCommerce' ) ) {
	exit;
}

define( 'WOOFC_VERSION', '1.3.2' );
define( 'WOOFC_URI', plugin_dir_url( __FILE__ ) );
if ( ! defined( 'WPC_URI' ) ) {
	define( 'WPC_URI', WOOFC_URI );
}

include( 'includes/wpc-menu.php' );
include( 'includes/wpc-dashboard.php' );

if ( ! class_exists( 'WPcleverWoofc' ) ) {
	class WPcleverWoofc {
		function __construct() {
			add_action( 'plugins_loaded', array( $this, 'woofc_load_textdomain' ) );
			add_action( 'wp_footer', array( $this, 'woofc_wp_footer' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'woofc_wp_enqueue_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'woofc_admin_enqueue_scripts' ) );
			add_action( 'wp_ajax_woofc_get_cart', array( $this, 'woofc_get_cart' ) );
			add_action( 'wp_ajax_nopriv_woofc_get_cart', array( $this, 'woofc_get_cart' ) );
			add_action( 'wp_ajax_woofc_update_qty', array( $this, 'woofc_update_qty' ) );
			add_action( 'wp_ajax_nopriv_woofc_update_qty', array( $this, 'woofc_update_qty' ) );
			add_action( 'wp_ajax_woofc_remove_item', array( $this, 'woofc_remove_item' ) );
			add_action( 'wp_ajax_nopriv_woofc_remove_item', array( $this, 'woofc_remove_item' ) );
			add_action( 'admin_menu', array( $this, 'woofc_settings_page' ) );
			add_filter( 'plugin_action_links', array( $this, 'woofc_settings_link' ), 10, 2 );
		}

		function woofc_load_textdomain() {
			load_plugin_textdomain( 'woofc', false, basename( dirname( __FILE__ ) ) . '/languages/' );
		}

		function woofc_wp_enqueue_scripts() {
			// perfect srollbar
			wp_enqueue_style( 'perfect-scrollbar', WOOFC_URI . 'assets/perfect-scrollbar/css/perfect-scrollbar.min.css' );
			wp_enqueue_style( 'perfect-scrollbar-woofc', WOOFC_URI . 'assets/perfect-scrollbar/css/custom-theme.css' );
			wp_enqueue_script( 'perfect-scrollbar', WOOFC_URI . 'assets/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js', array( 'jquery' ), WOOFC_VERSION, true );
			// main
			wp_enqueue_style( 'woofc-fonts', WOOFC_URI . 'assets/css/fonts.css' );
			wp_enqueue_style( 'woofc-frontend', WOOFC_URI . 'assets/css/frontend.css' );
			wp_enqueue_script( 'woofc-frontend', WOOFC_URI . 'assets/js/frontend.js', array( 'jquery' ), WOOFC_VERSION, true );
			wp_localize_script( 'woofc-frontend', 'woofcVars', array(
					'ajaxurl'             => admin_url( 'admin-ajax.php' ),
					'nonce'               => wp_create_nonce( 'woofc-security' ),
					'auto_show'           => get_option( '_woofc_auto_show_ajax', 'yes' ),
					'manual_show'         => get_option( '_woofc_manual_show', '' ),
					'reload'              => get_option( '_woofc_reload', 'no' ),
					'hide_count_empty'    => get_option( '_woofc_count_hide_empty', 'no' ),
					'hide_count_checkout' => get_option( '_woofc_count_hide_checkout', 'no' ),
				)
			);
		}

		function woofc_admin_enqueue_scripts( $hook ) {
			wp_enqueue_style( 'woofc-backend', WOOFC_URI . 'assets/css/backend.css' );
			if ( $hook == 'wpclever_page_wpclever-woofc' ) {
				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_style( 'woofc-fonts', WOOFC_URI . 'assets/css/fonts.css' );
				wp_enqueue_script( 'woofc-backend', WOOFC_URI . 'assets/js/backend.js', array(
					'jquery',
					'wp-color-picker'
				) );
			}
		}

		function woofc_settings_page() {
			add_submenu_page( 'wpclever', esc_html__( 'Woo Fly Cart', 'woofc' ), esc_html__( 'Woo Fly Cart', 'woofc' ), 'manage_options', 'wpclever-woofc', array(
				&$this,
				'woofc_settings_page_content'
			) );
		}

		function woofc_settings_link( $links, $file ) {
			static $plugin;
			if ( ! isset( $plugin ) ) {
				$plugin = plugin_basename( __FILE__ );
			}
			if ( $plugin == $file ) {
				$settings_link = '<a href="' . admin_url( 'admin.php?page=wpclever-woofc&tab=settings' ) . '">' . esc_html__( 'Settings', 'woofc' ) . '</a>';
				$links[]       = '<a href="' . admin_url( 'admin.php?page=wpclever-woofc&tab=premium' ) . '">' . esc_html__( 'Premium Version', 'woofc' ) . '</a>';
				array_unshift( $links, $settings_link );
			}

			return $links;
		}

		function woofc_settings_page_content() {
			$page_slug  = 'wpclever-woofc';
			$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'settings';
			?>
			<div class="wpclever_settings_page wrap">
				<h1 class="wpclever_settings_page_title"><?php echo esc_html__( 'Woo Fly Cart', 'woofc' ) . ' ' . WOOFC_VERSION; ?></h1>
				<div class="wpclever_settings_page_desc about-text">
					<p>
						<?php esc_html_e( 'WooCommerce interaction mini cart with many styles and effects.', 'woofc' ); ?>
					</p>
				</div>
				<div class="wpclever_settings_page_nav">
					<h2 class="nav-tab-wrapper">
						<a href="?page=<?php echo $page_slug; ?>&amp;tab=settings"
						   class="nav-tab <?php echo $active_tab == 'settings' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Settings', 'woofc' ); ?></a>
						<a href="?page=<?php echo $page_slug; ?>&amp;tab=premium"
						   class="nav-tab <?php echo $active_tab == 'premium' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Premium Version', 'woofc' ); ?></a>
					</h2>
				</div>
				<div class="wpclever_settings_page_content">
					<?php if ( $active_tab == 'settings' ) { ?>
						<form method="post" action="options.php">
							<?php wp_nonce_field( 'update-options' ) ?>
							<h2><?php esc_html_e( 'Main Cart', 'woofc' ); ?></h2>
							<p><?php esc_html_e( 'Settings for main fly cart', 'woofc' ); ?></p>
							<table class="form-table">
								<tr>
									<th scope="row"><?php esc_html_e( 'Show on AJAX add to cart', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_auto_show_ajax">
											<option
												value="yes" <?php echo( get_option( '_woofc_auto_show_ajax', 'yes' ) == 'yes' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Yes', 'woofc' ); ?>
											</option>
											<option
												value="no" <?php echo( get_option( '_woofc_auto_show_ajax', 'yes' ) == 'no' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'No', 'woofc' ); ?>
											</option>
										</select>
										<span class="description">
											<?php printf( esc_html__( 'The mini cart will be show up immediately after whenever click to AJAX Add to cart buttons? See %s "Add to cart behaviour" setting %s', 'woofc' ), '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=products&section=display' ) . '" target="_blank">', '</a>' ); ?>
										</span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Show on normal add to cart', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_auto_show_normal">
											<option
												value="yes" <?php echo( get_option( '_woofc_auto_show_normal', 'yes' ) == 'yes' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Yes', 'woofc' ); ?>
											</option>
											<option
												value="no" <?php echo( get_option( '_woofc_auto_show_normal', 'yes' ) == 'no' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'No', 'woofc' ); ?>
											</option>
										</select>
										<span class="description">
											<?php esc_html_e( 'The mini cart will be show up immediately after whenever click to normal Add to cart buttons (AJAX is not enable) or Add to cart button in single product page?', 'woofc' ); ?>
										</span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Manual show up button', 'woofc' ); ?></th>
									<td>
										<input type="text" name="_woofc_manual_show"
										       value="<?php echo get_option( '_woofc_manual_show', '' ); ?>"
										       placeholder="<?php esc_html_e( 'button class or id', 'woofc' ); ?>"/>
										<span class="description">
											<?php printf( esc_html__( 'The class or id of the button, when click to this button the mini cart will be show up. Example %s or %s', 'woofc' ), '<code>.mini-cart-btn</code>', '<code>#mini-cart-btn</code>' ); ?>
										</span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Position', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_position">
											<option
												value="01" <?php echo( get_option( '_woofc_position', '05' ) == '01' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Right', 'woofc' ); ?>
											</option>
											<option
												value="02" <?php echo( get_option( '_woofc_position', '05' ) == '02' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Left', 'woofc' ); ?>
											</option>
											<option
												value="03" <?php echo( get_option( '_woofc_position', '05' ) == '03' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Top', 'woofc' ); ?>
											</option>
											<option
												value="04" <?php echo( get_option( '_woofc_position', '05' ) == '04' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Bottom', 'woofc' ); ?>
											</option>
											<option
												value="05" <?php echo( get_option( '_woofc_position', '05' ) == '05' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Center', 'woofc' ); ?>
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Style', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_style">
											<option
												value="01" <?php echo( get_option( '_woofc_style', '01' ) == '01' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Color background', 'woofc' ); ?>
											</option>
											<option
												value="02" <?php echo( get_option( '_woofc_style', '01' ) == '02' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'White background', 'woofc' ); ?>
											</option>
											<option
												value="03" <?php echo( get_option( '_woofc_style', '01' ) == '03' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Color background, no thumbnail', 'woofc' ); ?>
											</option>
											<option
												value="04" <?php echo( get_option( '_woofc_style', '01' ) == '04' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'White background, no thumbnail', 'woofc' ); ?>
											</option>
											<option
												value="05" <?php echo( get_option( '_woofc_style', '01' ) == '05' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Background image', 'woofc' ); ?>
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Color', 'woofc' ); ?></th>
									<td>
										<input type="text" name="_woofc_color" id="_woofc_color"
										       value="<?php echo get_option( '_woofc_color', '#cc6055' ); ?>"
										       class="woofc_color_picker"/>
										<span class="description">
											<?php printf( esc_html__( 'Background & text color, default %s', 'woofc' ), '<code>#cc6055</code>' ); ?>
										</span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Background image', 'woofc' ); ?></th>
									<td>
										<?php wp_enqueue_media(); ?>
										<div class="woofc_image_preview" id="woofc_image_preview">
											<?php if ( get_option( '_woofc_bg_image', '' ) != '' ) {
												echo '<img src="' . wp_get_attachment_url( get_option( '_woofc_bg_image', '' ) ) . '"/>';
											} ?>
										</div>
										<input id="woofc_upload_image_button" type="button" class="button"
										       value="<?php _e( 'Upload image' ); ?>"/>
										<input type="hidden" name="_woofc_bg_image" id="woofc_image_attachment_url"
										       value="<?php echo get_option( '_woofc_bg_image', '' ); ?>"/>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'The cart heading', 'woofc' ); ?></th>
									<td>
										<input type="text" name="_woofc_cart_heading"
										       value="<?php echo get_option( '_woofc_cart_heading', esc_html__( 'Shopping Cart', 'woofc' ) ); ?>"/>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Show close button', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_close">
											<option
												value="yes" <?php echo( get_option( '_woofc_close', 'yes' ) == 'yes' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Yes', 'woofc' ); ?>
											</option>
											<option
												value="no" <?php echo( get_option( '_woofc_close', 'yes' ) == 'no' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'No', 'woofc' ); ?>
											</option>
										</select>
										<span
											class="description"><?php esc_html_e( 'Show the close button on the mini-cart?', 'woofc' ); ?></span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Show attributes', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_attributes">
											<option
												value="yes" <?php echo( get_option( '_woofc_attributes', 'no' ) == 'yes' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Yes', 'woofc' ); ?>
											</option>
											<option
												value="no" <?php echo( get_option( '_woofc_attributes', 'no' ) == 'no' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'No', 'woofc' ); ?>
											</option>
										</select>
										<span class="description">
											<?php esc_html_e( 'Show attributes of variation product under product title on the list?', 'woofc' ); ?>
										</span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Show total price', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_total">
											<option
												value="yes" <?php echo( get_option( '_woofc_total', 'yes' ) == 'yes' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Yes', 'woofc' ); ?>
											</option>
											<option
												value="no" <?php echo( get_option( '_woofc_total', 'yes' ) == 'no' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'No', 'woofc' ); ?>
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Show action buttons', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_buttons">
											<option
												value="01" <?php echo( get_option( '_woofc_buttons', '01' ) == '01' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Cart & Checkout', 'woofc' ); ?>
											</option>
											<option
												value="02" <?php echo( get_option( '_woofc_buttons', '01' ) == '02' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Cart only', 'woofc' ); ?>
											</option>
											<option
												value="03" <?php echo( get_option( '_woofc_buttons', '01' ) == '03' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Checkout only', 'woofc' ); ?>
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Show continue shopping', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_continue">
											<option
												value="yes" <?php echo( get_option( '_woofc_continue', 'yes' ) == 'yes' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Yes', 'woofc' ); ?>
											</option>
											<option
												value="no" <?php echo( get_option( '_woofc_continue', 'yes' ) == 'no' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'No', 'woofc' ); ?>
											</option>
										</select>
										<span class="description">
											<?php esc_html_e( 'Show the continue shopping button at the end of mini-cart?', 'woofc' ); ?>
										</span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Reload the cart', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_reload">
											<option
												value="yes" <?php echo( get_option( '_woofc_reload', 'no' ) == 'yes' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Yes', 'woofc' ); ?>
											</option>
											<option
												value="no" <?php echo( get_option( '_woofc_reload', 'no' ) == 'no' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'No', 'woofc' ); ?>
											</option>
										</select>
										<span class="description">
											<?php esc_html_e( 'The cart will be reloaded when opening the page? If you use the cache for your site, please turn on this option.', 'woofc' ); ?>
										</span>
									</td>
								</tr>
							</table>
							<h2><?php esc_html_e( 'Cart Button', 'woofc' ); ?></h2>
							<p style="color: red">
								This feature just available for Premium Version. Click <a
									href="https://wpclever.net/downloads/woocommerce-fly-cart" target="_blank">here</a>
								to buy, just $19.
							</p>
							<table class="form-table">
								<tr>
									<th scope="row"><?php esc_html_e( 'Show cart button', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_count">
											<option
												value="yes" <?php echo( get_option( '_woofc_count', 'yes' ) == 'yes' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Yes', 'woofc' ); ?>
											</option>
											<option
												value="no" <?php echo( get_option( '_woofc_count', 'yes' ) == 'no' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'No', 'woofc' ); ?>
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Cart button position', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_count_position">
											<option
												value="top-left" <?php echo( get_option( '_woofc_count_position', 'bottom-left' ) == 'top-left' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Top Left', 'woofc' ); ?>
											</option>
											<option
												value="top-right" <?php echo( get_option( '_woofc_count_position', 'bottom-left' ) == 'top-right' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Top Right', 'woofc' ); ?>
											</option>
											<option
												value="bottom-left" <?php echo( get_option( '_woofc_count_position', 'bottom-left' ) == 'bottom-left' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Bottom Left', 'woofc' ); ?>
											</option>
											<option
												value="bottom-right" <?php echo( get_option( '_woofc_count_position', 'bottom-left' ) == 'bottom-right' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Bottom Right', 'woofc' ); ?>
											</option>
										</select>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Cart button icon', 'woofc' ); ?></th>
									<td>
										<select id="woofc_count_icon" name="_woofc_count_icon">
											<?php
											for ( $i = 1; $i <= 16; $i ++ ) {
												if ( get_option( '_woofc_count_icon', 'woofc-icon-cart7' ) == 'woofc-icon-cart' . $i ) {
													echo '<option value="woofc-icon-cart' . $i . '" selected>woofc-icon-cart' . $i . '</option>';
												} else {
													echo '<option value="woofc-icon-cart' . $i . '">woofc-icon-cart' . $i . '</option>';
												}
											}
											?>
										</select>
										<span class="description"><span id="woofc_count_icon_view"></span></span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Hide if empty', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_count_hide_empty">
											<option
												value="yes" <?php echo( get_option( '_woofc_count_hide_empty', 'no' ) == 'yes' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Yes', 'woofc' ); ?>
											</option>
											<option
												value="no" <?php echo( get_option( '_woofc_count_hide_empty', 'no' ) == 'no' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'No', 'woofc' ); ?>
											</option>
										</select>
										<span class="description">
											<?php esc_html_e( 'Hide the cart button if the cart empty?', 'woofc' ); ?>
										</span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Hide in Cart & Checkout', 'woofc' ); ?></th>
									<td>
										<select name="_woofc_count_hide_checkout">
											<option
												value="yes" <?php echo( get_option( '_woofc_count_hide_checkout', 'no' ) == 'yes' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'Yes', 'woofc' ); ?>
											</option>
											<option
												value="no" <?php echo( get_option( '_woofc_count_hide_checkout', 'no' ) == 'no' ? 'selected' : '' ); ?>>
												<?php esc_html_e( 'No', 'woofc' ); ?>
											</option>
										</select>
										<span class="description">
											<?php esc_html_e( 'Hide the cart button in the Cart & Checkout page?', 'woofc' ); ?>
										</span>
									</td>
								</tr>
								<tr>
									<th scope="row">
										<input type="submit" name="submit" class="button button-primary"
										       value="<?php esc_html_e( 'Update Options', 'woofc' ); ?>"/>
										<input type="hidden" name="action" value="update"/>
										<input type="hidden" name="page_options"
										       value="_woofc_auto_show_ajax,_woofc_auto_show_normal,_woofc_manual_show,_woofc_position,_woofc_style,_woofc_color,_woofc_bg_image,_woofc_cart_heading,_woofc_close,_woofc_attributes,_woofc_total,_woofc_buttons,_woofc_continue,_woofc_reload,_woofc_count,_woofc_count_position,_woofc_count_icon,_woofc_count_hide_empty,_woofc_count_hide_checkout"/>
									</th>
									<td>&nbsp;</td>
								</tr>
							</table>
						</form>
					<?php } elseif ( $active_tab == 'premium' ) { ?>
						Get the Premium Version just $19! <a
							href="https://wpclever.net/downloads/woocommerce-fly-cart" target="_blank">https://wpclever.net/downloads/woocommerce-fly-cart</a>
						<br/>
						<br/>
						<strong>Extra features for Premium Version</strong>
						<ul>
							<li>- Enable cart button with count</li>
							<li>- Get lifetime update & premium support</li>
						</ul>
					<?php } ?>
				</div>
			</div>
			<?php
		}

		function woofc_update_qty() {
			if ( ! isset( $_POST['security'] ) || ( ! wp_verify_nonce( $_POST['security'], 'woofc-security' ) && ( $_POST['security'] != $_POST['nonce'] ) ) ) {
				die( '<div class="woofc-error">' . esc_html__( 'Permissions check failed!', 'woofc' ) . '</div>' );
			}
			if ( isset( $_POST['cart_item_key'] ) && isset( $_POST['cart_item_qty'] ) ) {
				WC()->cart->set_quantity( $_POST['cart_item_key'], intval( $_POST['cart_item_qty'] ) );
				$cart             = array();
				$cart['count']    = WC()->cart->get_cart_contents_count();
				$cart['subtotal'] = WC()->cart->get_cart_subtotal();
				echo json_encode( $cart );
				die();
			}
		}

		function woofc_remove_item() {
			if ( ! isset( $_POST['security'] ) || ( ! wp_verify_nonce( $_POST['security'], 'woofc-security' ) && ( $_POST['security'] != $_POST['nonce'] ) ) ) {
				die( '<div class="woofc-error">' . esc_html__( 'Permissions check failed!', 'woofc' ) . '</div>' );
			}
			if ( isset( $_POST['cart_item_key'] ) ) {
				WC()->cart->remove_cart_item( $_POST['cart_item_key'] );
				$cart             = array();
				$cart['count']    = WC()->cart->get_cart_contents_count();
				$cart['subtotal'] = WC()->cart->get_cart_subtotal();
				echo json_encode( $cart );
				die();
			}
		}

		function woofc_get_cart() {
			if ( ! isset( $_POST['security'] ) || ( ! wp_verify_nonce( $_POST['security'], 'woofc-security' ) && ( $_POST['security'] != $_POST['nonce'] ) ) ) {
				die( '<div class="woofc-error">' . esc_html__( 'Permissions check failed!', 'woofc' ) . '</div>' );
			}
			$cart          = array();
			$cart['count'] = WC()->cart->get_cart_contents_count();
			$cart['html']  = self::woofc_get_cart_items( esc_attr( get_option( '_woofc_style', '01' ) ) );
			echo json_encode( $cart );
			die();
		}

		function woofc_show_cart() {
			$cart_html = self::woofc_get_cart_items( esc_attr( get_option( '_woofc_style', '01' ) ) );

			return $cart_html;
		}

		function woofc_get_cart_items( $style = '01' ) {
			$cart_html = '';
			$cart_html .= '<div class="woofc-area-top"><span>' . get_option( '_woofc_cart_heading', esc_html__( 'Shopping Cart', 'woofc' ) ) . '</span>';
			if ( get_option( '_woofc_close', 'yes' ) == 'yes' ) {
				$cart_html .= '<div class="woofc-close"><i class="woofc-icon-icon10"></i></div>';
			}
			$cart_html .= '</div>';
			$items = WC()->cart->get_cart();
			if ( sizeof( $items ) > 0 ) {
				$items = array_reverse( $items );
				$cart_html .= '<div class="woofc-area-mid woofc-items">';
				foreach ( $items as $cart_item_key => $cart_item ) {
					$_product          = $cart_item['data'];
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					if ( apply_filters( 'woocommerce_widget_cart_item_visible', $_product->is_visible(), $cart_item, $cart_item_key ) ) {
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input( array(
								'input_name'  => "{$cart_item_key}",
								'input_value' => $cart_item['quantity'],
								'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
								'min_value'   => '0',
							), $_product, false );
						}
						$cart_item_class = 'woofc-item';
						if ( isset( $cart_item['woosb_ids'] ) ) {
							$cart_item_class .= ' woofc-item-woosb';
						}
						if ( isset( $cart_item['woosb_parent_id'] ) ) {
							$cart_item_class .= ' woofc-item-woosb-child';
						}
						$cart_html .= '<div data-key="' . $cart_item_key . '" class="' . esc_attr( $cart_item_class ) . '"><div class="woofc-item-inner">';
						if ( ( $style == '03' ) || ( $style == '04' ) ) {
							$cart_html .= '<div class="woofc-item-qty"><div class="woofc-item-qty-inner"><span class="woofc-item-qty-plus">+</span>' . apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ) . '<span class="woofc-item-qty-minus">-</span></div></div>';
							$cart_html .= '<div class="woofc-item-info">';
							$cart_html .= '<span class="woofc-item-title">';
							if ( ! $product_permalink ) {
								$cart_html .= apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								$cart_html .= apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
							}
							$cart_html .= '</span>';
							if ( ( get_option( '_woofc_attributes', 'no' ) == 'yes' ) && $_product->is_type( 'variation' ) && is_array( $cart_item['variation'] ) ) {
								if ( count( $_product->get_variation_attributes() ) > 0 ) {
									$cart_html .= '<span class="woofc-item-data">';
									foreach ( $_product->get_variation_attributes() as $key => $value ) {
										$cart_html .= '<span class="woofc-item-data-attr">' . wc_attribute_label( str_replace( 'attribute_', '', $key ), $_product ) . ': ' . $value . '</span>';
									}
									$cart_html .= '</span>';
								}
							}
							$cart_html .= '</div>';
							$cart_html .= '<div class="woofc-item-price">' . apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ) . '</div>';
						} else {
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$cart_html .= '<div class="woofc-item-thumb">';
							if ( ! $product_permalink ) {
								$cart_html .= $thumbnail;
							} else {
								$cart_html .= sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
							}
							$cart_html .= '</div>';
							$cart_html .= '<div class="woofc-item-info">';
							$cart_html .= '<span class="woofc-item-title">';
							if ( ! $product_permalink ) {
								$cart_html .= apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								$cart_html .= apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
							}
							$cart_html .= '</span>';
							if ( ( get_option( '_woofc_attributes', 'no' ) == 'yes' ) && $_product->is_type( 'variation' ) && is_array( $cart_item['variation'] ) ) {
								if ( count( $_product->get_variation_attributes() ) > 0 ) {
									$cart_html .= '<span class="woofc-item-data">';
									foreach ( $_product->get_variation_attributes() as $key => $value ) {
										$cart_html .= '<span class="woofc-item-data-attr">' . wc_attribute_label( str_replace( 'attribute_', '', $key ), $_product ) . ': ' . $value . '</span>';
									}
									$cart_html .= '</span>';
								}
							}
							$cart_html .= '<span class="woofc-item-price">' . $_product->get_price_html() . '</span>';
							$cart_html .= '</div>';
							$cart_html .= '<div class="woofc-item-qty"><div class="woofc-item-qty-inner"><span class="woofc-item-qty-plus">+</span>' . apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ) . '<span class="woofc-item-qty-minus">-</span></div></div>';
						}
						$cart_html .= '<span class="woofc-item-remove" data-key="' . $cart_item_key . '"></span>';
						$cart_html .= '</div></div>';
					}
				}
				$cart_html .= '</div>';
				$cart_html .= '<div class="woofc-area-bot">';
				if ( get_option( '_woofc_total', 'yes' ) == 'yes' ) {
					$cart_html .= '<div class="woofc-total"><div class="woofc-total-inner"><div class="woofc-total-left">' . esc_html__( 'Total', 'woofc' ) . '</div><div id="woofc-subtotal" class="woofc-total-right">' . WC()->cart->get_cart_subtotal() . '</div></div></div>';
				}
				if ( get_option( '_woofc_buttons', '01' ) == '01' ) {
					$cart_html .= '<div class="woofc-action"><div class="woofc-action-inner"><div class="woofc-action-left"><a href="' . wc_get_cart_url() . '">' . esc_html__( 'Cart', 'woofc' ) . '</a></div><div class="woofc-action-right"><a href="' . wc_get_checkout_url() . '">' . esc_html__( 'Checkout', 'woofc' ) . '</a></div></div></div>';
				} else {
					if ( get_option( '_woofc_buttons', '01' ) == '02' ) {
						$cart_html .= '<div class="woofc-action"><div class="woofc-action-inner"><div class="woofc-action-full"><a href="' . wc_get_cart_url() . '">' . esc_html__( 'Cart', 'woofc' ) . '</a></div></div></div>';
					}
					if ( get_option( '_woofc_buttons', '01' ) == '03' ) {
						$cart_html .= '<div class="woofc-action"><div class="woofc-action-inner"><div class="woofc-action-full"><a href="' . wc_get_checkout_url() . '">' . esc_html__( 'Checkout', 'woofc' ) . '</a></div></div></div>';
					}
				}
				if ( get_option( '_woofc_continue', 'yes' ) == 'yes' ) {
					$cart_html .= '<div class="woofc-continue"><span id="woofc-continue">' . esc_html__( 'Continue Shopping', 'woofc' ) . '</span></div>';
				}
				$cart_html .= '</div>';
			} else {
				$cart_html .= '<div class="woofc-no-item">' . esc_html__( 'There are no products in the cart!', 'woofc' ) . '</div>';
			}

			return $cart_html;
		}

		function woofc_wp_footer() {
			?>
			<div id="woofc-area"
			     class="woofc-area woofc-effect-<?php echo esc_attr( get_option( '_woofc_position', '05' ) ); ?> woofc-style-<?php echo esc_attr( get_option( '_woofc_style', '01' ) ); ?>">
				<?php echo self::woofc_show_cart(); ?>
			</div>
			<input type="hidden" id="woofc-nonce" value="<?php echo wp_create_nonce( 'woofc-security' ); ?>"/>
			<div class="woofc-overlay"></div>
			<style>
				.woofc-area.woofc-style-01, .woofc-area.woofc-style-03, .woofc-area.woofc-style-02 .woofc-area-bot .woofc-action .woofc-action-inner > div a:hover, .woofc-area.woofc-style-04 .woofc-area-bot .woofc-action .woofc-action-inner > div a:hover {
					background-color: <?php echo get_option( '_woofc_color', '#cc6055' ); ?>;
				}

				.woofc-area.woofc-style-01 .woofc-area-bot .woofc-action .woofc-action-inner > div a, .woofc-area.woofc-style-02 .woofc-area-bot .woofc-action .woofc-action-inner > div a, .woofc-area.woofc-style-03 .woofc-area-bot .woofc-action .woofc-action-inner > div a, .woofc-area.woofc-style-04 .woofc-area-bot .woofc-action .woofc-action-inner > div a {
					outline: none;
					color: <?php echo get_option( '_woofc_color', '#cc6055' ); ?>;
				}

				.woofc-area.woofc-style-02 .woofc-area-bot .woofc-action .woofc-action-inner > div a, .woofc-area.woofc-style-04 .woofc-area-bot .woofc-action .woofc-action-inner > div a {
					border-color: <?php echo get_option( '_woofc_color', '#cc6055' ); ?>;
				}

				.woofc-area.woofc-style-05 {
					background-color: <?php echo get_option( '_woofc_color', '#cc6055' ); ?>;
					background-image: url("<?php echo( get_option( '_woofc_bg_image', '' ) != '' ? wp_get_attachment_url( get_option( '_woofc_bg_image', '' ) ) : '' ); ?>");
					background-size: cover;
					background-position: center;
					background-repeat: no-repeat;
				}
			</style>
			<?php
			if ( ( get_option( '_woofc_auto_show_normal', 'yes' ) == 'yes' ) && ( isset( $_POST['add-to-cart'] ) || ( isset( $_GET['add-to-cart'] ) ) ) ) {
				?>
				<script>
					jQuery( document ).ready( function() {
						setTimeout( function() {
							woofc_show_cart();
						}, 1000 );
					} );
				</script>
				<?php
			}
		}
	}

	new WPcleverWoofc();
}