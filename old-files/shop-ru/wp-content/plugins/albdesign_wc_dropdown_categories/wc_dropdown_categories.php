<?php
/*
Plugin Name: Albdesign Woocommerce Dropdown Categories
Description: Albdesign Woocommerce Dropdown Categories
Author URI: https://codecanyon.net/user/albdesign?ref=albdesign
Version: 1.0.0
Author: Albdesign
Author URI: https://codecanyon.net/user/albdesign?ref=albdesign
Text Domain: albdesign-wc-dropdown-categories
*/



class Albdesign_WC_Dropdown_Categories {
	private static $instance = null;
	private $plugin_path;
	private $plugin_url;
    private $domain = 'albdesign-wc-dropdown-categories';

	private $slug ='albdesign_wc_dropdown_categories';
	
	/**
	 * Creates or returns an instance of this class.
	 */
	public static function get_instance() {
		// If an instance hasn't been created and set to $instance create an instance and set it to $instance.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Initializes the plugin by setting localization, hooks, filters, and administrative functions.
	 */
	private function __construct() {
		$this->plugin_path = plugin_dir_path( __FILE__ );
		$this->plugin_url  = plugin_dir_url( __FILE__ );

		//Frontend scripts and styles
		add_action( 'wp_enqueue_scripts', array( $this, 'register_styles_frontend' ) );

		//admin css/js 
		add_action( 'admin_enqueue_scripts', array( $this, 'register_scripts_styles_admin' ));
	
		//handle button addition below post title
		add_action('admin_footer',  array($this, 'add_mce_popup'));		
		
		//Load Language
		add_action('plugins_loaded', array( $this, 'wc_dropdown_textdomain'));
		
		//register the shortcode
		add_shortcode('albdesign_wc_dropdown_categories',array($this, 'add_albdesign_wc_dropdown_shortcode'));	

		//Register widget 
		add_action('widgets_init', create_function('', 'return register_widget("Albdesign_WC_Dropdown_Categories_Widget");'));
		
		// We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );
		
        // Use this when creating a shortcode addon
        add_shortcode( 'albdesign_wc_dropdown_categories_vc', array( $this, 'renderMyBartag' ) );		
		

		$this->run_plugin();
	}
 
 
	public function get_plugin_url() {
		return $this->plugin_url;
	}

	public function get_plugin_path() {
		return $this->plugin_path;
	}



	/*
	* Load languages
	*/
	
	public function wc_dropdown_textdomain() {
		load_plugin_textdomain( $this->domain, false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
	}	



    /**
     * Enqueue and register CSS/JS frontend.
     */
	public function register_styles_frontend(){
		
		
		//check if frontend JS is already enqueued so we dont double-triple... enqueue 
		if (wp_script_is( 'albdesign-wc-dropdown-navaccordion', 'enqueued' )) {
			return;
		} else {
			wp_enqueue_script( 'albdesign-wc-dropdown-navaccordion',$this->get_plugin_url().'assets/js/navAccordion.js',array( 'jquery' ),null,true);
		}
		
		//check if frontend fontawesome is already enqueued so we dont double-triple... enqueue 
		if ( wp_style_is( 'albdesign-wc-dropdown-font-awesome', 'enqueued' ) ) {
			return ;
		}else {
			wp_enqueue_style('albdesign-wc-dropdown-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', null,null);

		}
		
		
		$file = 'albdesign_wc_dropdown.css';
		
		if(file_exists( get_stylesheet_directory() .'/'.$file ) ) {
			
			//check child theme folder
			wp_enqueue_style( $this->domain , get_stylesheet_directory_uri() .'/'.$file  , null,null);
			
		}else if( file_exists( get_template_directory() .'/'.$file ) ) {
			
			//check parent theme folder
			wp_enqueue_style( $this->domain , get_template_directory_uri() .'/'.$file  , null,null);
			
		}else{
			//load CSS from plugin folder 
			wp_enqueue_style( $this->domain , $this->get_plugin_url() . 'assets/css/frontend.css', null,null);
		}
		
	}
	

	
	/*
	* Admin CSS JS equeue 
	*/
	public function register_scripts_styles_admin(){
		
		wp_enqueue_style( 'wp-color-picker' ); 
		
		wp_enqueue_style( 'albdesign-wc-dropdown-categories-admin',$this->get_plugin_url().'assets/css/admin.css' );
		wp_enqueue_script( 'albdesign-wc-dropdown-categories-js-admin',$this->get_plugin_url().'assets/js/admin.js',array( 'wp-color-picker' ),'1.0.0',true);
		wp_enqueue_style('albdesign-wc-dropdown-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', null,null);
		
	}
	
	
	
   /*
	* Add the MCE editor button next to the "add media" button
	*/
    public function add_mce_popup(){

        ?>
        <script>

			//create the shortcode 
			jQuery('body').on('click', '.select_albdesign_wc_dropdown_cats_form_container ',function(){
					
					var shortcode = get_full_shortcode_string();
					
					var start_of_phpcode = '&lt;?php echo do_shortcode(\'';
					var encode_start_phpcode = start_of_phpcode.replace(/&lt;/g, '<');
					
					var end_of_phpcode  = '\'); ?&gt;';
					var encode_end_of_phpcode  = end_of_phpcode.replace(/&gt;/g, '>');
					
					var full_shortcode = encode_start_phpcode + shortcode + encode_end_of_phpcode;


					jQuery('.albdesign_wc_dropdown_cats_shortcode_container').text();
					jQuery('.albdesign_wc_dropdown_cats_shortcode_container').text(full_shortcode).html();
			});
		
            function Albdesign_WC_Dropdown_Categories_Insertshortcode(){

				var full_shortcode = get_full_shortcode_string();
                window.send_to_editor(full_shortcode);

            }
			
			
			function get_full_shortcode_string(){
				
				var hide_empty 		= jQuery("#<?php echo $this->slug;?>_hide_empty  option:selected").val();

				var show_count 		= jQuery("#<?php echo $this->slug;?>_show_count  option:selected").val();

				var order_by		= jQuery("#<?php echo $this->slug;?>_order_by").val();
				var order   		= jQuery("#<?php echo $this->slug;?>_order").val();

				
				//link parent categories
				var parent_clickable = jQuery("#<?php echo $this->slug;?>_parent_category_clickable").val();
				
				//exclude categories 		
				var exclude_categories_array = jQuery('input.albdesign_wc_dropdown_categories_exclude_categories:checked').map(function() {return this.value}).get().join(',');
				
				var font_size_dirty 		= jQuery("#<?php echo $this->slug;?>_font_size").val();
				var font_size 				= font_size_dirty.replace(/px/g, '');
				
				var font_color 			= jQuery("#<?php echo $this->slug;?>_font_color").val();
				var hover_font_color	= jQuery("#<?php echo $this->slug;?>_hover_font_color").val();
				
				var bgcolor			= jQuery("#<?php echo $this->slug;?>_bgcolor").val();
				var hoverbgcolor	= jQuery("#<?php echo $this->slug;?>_hover_bgcolor").val();				
				
				var hide_current_cat = jQuery("#<?php echo $this->slug;?>_hide_current_category").val();
				
				var expanded_icon = jQuery("#<?php echo $this->slug;?>_expanded_icon").val();
				var collapsed_icon = jQuery("#<?php echo $this->slug;?>_collapsed_icon").val();
				
				var extra_css_class = jQuery("#<?php echo $this->slug;?>_extra_css_class").val();

				//generate a random ID 
				var randomNumber = Math.floor(Math.random() * 2000);
				
				var full_shortcode = "[albdesign_wc_dropdown_categories bgcolor=\"" + bgcolor + "\" hover_bgcolor=\"" + hoverbgcolor + "\" hide_empty=\""+ hide_empty +"\" show_count=\""+ show_count +"\" exclude_cats_id=\""+ exclude_categories_array +"\" order_by=\""+ order_by +"\" order=\""+ order +"\" font_size=\""+ font_size +"\" font_color=\""+ font_color +"\" hover_font_color=\""+ hover_font_color +"\" hide_current_cat=\""+ hide_current_cat +"\" collapsed_icon=\""+ collapsed_icon +"\" expanded_icon=\""+ expanded_icon +"\" extra_css_class=\""+ extra_css_class +"\" parent_is_clickable=\""+ parent_clickable +"\" id=\""+ randomNumber +"\"]";		

				return full_shortcode;
			}
			

			
        </script>

        <div id="select_albdesign_wc_dropdown_cats_form" style="display:none;">
            <div class="wrap ">
                <div class="select_albdesign_wc_dropdown_cats_form_container" >
                    <div >
                        <h2 ><?php _e('Insert Dropdown Categories',$this->domain);?></h2>
                    </div>
					
                    <div >

						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Hide empty',$this->domain);?></label>
							</div>
							<div class="rightside">
								<select name="<?php echo $this->slug;?>_hide_empty" id="<?php echo $this->slug;?>_hide_empty">
									<option value="yes"><?php _e('Yes',$this->domain);?></option>
									<option value="no"><?php _e('No',$this->domain);?></option>
								</select> 
							</div>
							<div class="clear_both"></div>
						</div>						
						
						
						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Show count',$this->domain);?></label>
							</div>
							<div class="rightside">
								<select name="<?php echo $this->slug;?>_show_count" id="<?php echo $this->slug;?>_show_count">
									<option value="no"><?php _e('No',$this->domain);?></option>
									<option value="yes"><?php _e('Yes',$this->domain);?></option>
								</select> 
							</div>							
							<div class="clear_both"></div>
						</div>		
						
						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Parent category is clickable',$this->domain);?></label>
							</div>
							<div class="rightside">
								<select name="<?php echo $this->slug;?>_parent_category_clickable" id="<?php echo $this->slug;?>_parent_category_clickable">
									
									<option value="yes"><?php _e('Yes',$this->domain);?></option>
									<option value="no"><?php _e('No',$this->domain);?></option>
								</select> 
							</div>							
							<div class="clear_both"></div>
						</div>						
						
						
						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Hide current category',$this->domain);?></label>
							</div>
							<div class="rightside">
								<select name="<?php echo $this->slug;?>_hide_current_category" id="<?php echo $this->slug;?>_hide_current_category">
									<option value="no"><?php _e('No',$this->domain);?></option>
									<option value="yes"><?php _e('Yes',$this->domain);?></option>
									
								</select> 
							</div>
							<div class="clear_both"></div>
						</div>							
						
						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Exclude categories',$this->domain);?></label>
							</div>
							<div class="rightside">
								<?php 
									if( is_array( self::get_wc_categories() ) ){
										foreach( self::get_wc_categories() as $single_category) { ?>
											<input type="checkbox" value="<?php echo $single_category['id'];?>" name="<?php echo $this->slug;?>_exclude_categories[]" class="<?php echo $this->slug;?>_exclude_categories" > <?php echo $single_category['name'];?><br>
										<?php 
										} //end foreach 
									} 
								?>									
							</div>
							<div class="clear_both"></div>
						</div>							
						
						<div class="albdesign_wc_dropdown_cats_options_header_text"><h3><?php _e('Ordering options',$this->domain);?></h3></div>
						
						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Order by',$this->domain);?></label>
							</div>
							<div class="rightside">
								<select name="<?php echo $this->slug;?>_order_by" id="<?php echo $this->slug;?>_order_by">
									<option value="name"><?php _e('Name',$this->domain);?></option>
									<option value="id"><?php _e('ID',$this->domain);?></option>
									<option value="slug"><?php _e('Slug',$this->domain);?></option>
									<option value="count"><?php _e('Count',$this->domain);?></option>
									<option value="term_group"><?php _e('Term group',$this->domain);?></option>
								</select> 
							</div>							
							<div class="clear_both"></div>
						</div>	

						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Order',$this->domain);?></label>
							</div>
							<div class="rightside">
								<select name="<?php echo $this->slug;?>_order" id="<?php echo $this->slug;?>_order">
									<option value="asc"><?php _e('Ascending',$this->domain);?></option>
									<option value="desc"><?php _e('Descending',$this->domain);?></option>
									
								</select> 
							</div>							
							<div class="clear_both"></div>
						</div>						
						
						
						<div class="albdesign_wc_dropdown_cats_options_header_text"><h3><?php _e('Display options',$this->domain);?></h3></div>
						
						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Font size in px',$this->domain);?></label>
							</div>
							<div class="rightside">
								<input type="text"  name="<?php echo $this->slug;?>_font_size" id="<?php echo $this->slug;?>_font_size">
							</div>
							<div class="clear_both"></div>
						</div>						
						
						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Font color',$this->domain);?></label>
							</div>
							<div class="rightside">
								<input type="text" class="albdesign_wc_dropdown_categories_color_picker" name="<?php echo $this->slug;?>_font_color" id="<?php echo $this->slug;?>_font_color">
							</div>
							<div class="clear_both"></div>
						</div>	

						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Hover font color',$this->domain);?></label>
							</div>
							<div class="rightside">
								<input type="text" class="albdesign_wc_dropdown_categories_color_picker" name="<?php echo $this->slug;?>_hover_font_color" id="<?php echo $this->slug;?>_hover_font_color">
							</div>
							<div class="clear_both"></div>
						</div>						
						
						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Background color',$this->domain);?></label>
							</div>
							<div class="rightside">
								<input type="text" class="albdesign_wc_dropdown_categories_color_picker" name="<?php echo $this->slug;?>_bgcolor" id="<?php echo $this->slug;?>_bgcolor">
							</div>
							<div class="clear_both"></div>
						</div>
						
						
						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Hover background color',$this->domain);?></label>
							</div>
							<div class="rightside">
								<input type="text" class="albdesign_wc_dropdown_categories_color_picker" name="<?php echo $this->slug;?>_hover_bgcolor" id="<?php echo $this->slug;?>_hover_bgcolor">	
							</div>
							<div class="clear_both"></div>
						</div>		

						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Expand icon',$this->domain);?></label>
							</div>
							<div class="rightside">
								<select name="<?php echo $this->slug;?>_expanded_icon" class="icon_list_options" id="<?php echo $this->slug;?>_expanded_icon">
									<option value="fa-angle-double-down">&#xf103 </option>
									<option value="fa-angle-double-up">&#xf102 </option>
									<option value="fa-angle-double-right">&#xf101 </option>
									<option value="fa-angle-double-left">&#xf100 </option>
									<option value="fa-angle-down">&#xf107 </option>
									<option value="fa-angle-up">&#xf106 </option>
									<option value="fa-angle-left">&#xf104 </option>
									<option value="fa-angle-right">&#xf105 </option>
									<option value="fa-arrow-circle-o-down">&#xf01a </option>
									<option value="fa-arrow-circle-o-up">&#xf01b </option>
									<option value="fa-arrow-circle-o-left">&#xf190 </option>
									<option value="fa-arrow-circle-o-right">&#xf18e </option>
									<option value="fa-arrow-circle-down">&#xf0ab </option>
									<option value="fa-arrow-circle-up">&#xf0aa </option>
									<option value="fa-arrow-circle-left">&#xf0a8 </option>
									<option value="fa-arrow-circle-right">&#xf0a9 </option>
									<option value="fa-arrow-down">&#xf063 </option>									
									<option value="fa-arrow-up">&#xf062 </option>									
									<option value="fa-arrow-left">&#xf060 </option>										
									<option value="fa-arrow-right">&#xf061 </option>	
									<option value="fa-arrows-h">&#xf07e </option>									
									<option value="fa-arrows-v">&#xf07d </option>		
									<option value="fa-caret-down">&#xf0d7 </option>									
									<option value="fa-caret-up">&#xf0d8 </option>									
									<option value="fa-caret-left">&#xf0d9 </option>									
									<option value="fa-caret-right">&#xf0da </option>
									<option value="fa-caret-square-o-down">&#xf150 </option>									
									<option value="fa-caret-square-o-up">&#xf151 </option>									
									<option value="fa-caret-square-o-left">&#xf191 </option>									
									<option value="fa-caret-square-o-right">&#xf152 </option>
									<option value="fa-level-down">&#xf149 </option>									
									<option value="fa-level-up">&#xf148 </option>	
									<option value="fa-long-arrow-down">&#xf175 </option>									
									<option value="fa-long-arrow-up">&#xf176 </option>									
									<option value="fa-long-arrow-left">&#xf177 </option>									
									<option value="fa-long-arrow-right">&#xf178 </option>		
									<option value="fa-minus">&#xf068 </option>									
									<option value="fa-plus">&#xf067 </option>
									<option value="fa-minus-circle">&#xf056 </option>									
									<option value="fa-plus-circle">&#xf055 </option>	
									<option value="fa-minus-square">&#xf146 </option>									
									<option value="fa-plus-square">&#xf0fe </option>
									<option value="fa-minus-square-o">&#xf147 </option>									
									<option value="fa-plus-square-o">&#xf196 </option>	
									<option value="fa-reorder">&#xf0c9 </option>
									<option value="fa-unsorted">&#xf0dc </option>	
									<option value="fa-sort-down">&#xf0dd </option>	
									<option value="fa-sort-up">&#xf0de </option>	
								</select> 
							</div>
							<div class="clear_both"></div>
						</div>
						
						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Collaps icon',$this->domain);?></label>
							</div>
							<div class="rightside">
								<select name="<?php echo $this->slug;?>_collapsed_icon" class="icon_list_options" id="<?php echo $this->slug;?>_collapsed_icon" >
									
									<option value="fa-angle-double-up">&#xf102 </option>
									<option value="fa-angle-double-down">&#xf103 </option>
									<option value="fa-angle-double-right">&#xf101 </option>
									<option value="fa-angle-double-left">&#xf100 </option>
									<option value="fa-angle-down">&#xf107 </option>
									<option value="fa-angle-up">&#xf106 </option>
									<option value="fa-angle-left">&#xf104 </option>
									<option value="fa-angle-right">&#xf105 </option>
									<option value="fa-arrow-circle-o-down">&#xf01a </option>
									<option value="fa-arrow-circle-o-up">&#xf01b </option>
									<option value="fa-arrow-circle-o-left">&#xf190 </option>
									<option value="fa-arrow-circle-o-right">&#xf18e </option>
									<option value="fa-arrow-circle-down">&#xf0ab </option>
									<option value="fa-arrow-circle-up">&#xf0aa </option>
									<option value="fa-arrow-circle-left">&#xf0a8 </option>
									<option value="fa-arrow-circle-right">&#xf0a9 </option>
									<option value="fa-arrow-down">&#xf063 </option>									
									<option value="fa-arrow-up">&#xf062 </option>									
									<option value="fa-arrow-left">&#xf060 </option>										
									<option value="fa-arrow-right">&#xf061 </option>	
									<option value="fa-arrows-h">&#xf07e </option>									
									<option value="fa-arrows-v">&#xf07d </option>		
									<option value="fa-caret-down">&#xf0d7 </option>									
									<option value="fa-caret-up">&#xf0d8 </option>									
									<option value="fa-caret-left">&#xf0d9 </option>									
									<option value="fa-caret-right">&#xf0da </option>
									<option value="fa-caret-square-o-down">&#xf150 </option>									
									<option value="fa-caret-square-o-up">&#xf151 </option>									
									<option value="fa-caret-square-o-left">&#xf191 </option>									
									<option value="fa-caret-square-o-right">&#xf152 </option>
									<option value="fa-level-down">&#xf149 </option>									
									<option value="fa-level-up">&#xf148 </option>	
									<option value="fa-long-arrow-down">&#xf175 </option>									
									<option value="fa-long-arrow-up">&#xf176 </option>									
									<option value="fa-long-arrow-left">&#xf177 </option>									
									<option value="fa-long-arrow-right">&#xf178 </option>		
									<option value="fa-minus">&#xf068 </option>									
									<option value="fa-plus">&#xf067 </option>
									<option value="fa-minus-circle">&#xf056 </option>									
									<option value="fa-plus-circle">&#xf055 </option>	
									<option value="fa-minus-square">&#xf146 </option>									
									<option value="fa-plus-square">&#xf0fe </option>
									<option value="fa-minus-square-o">&#xf147 </option>									
									<option value="fa-plus-square-o">&#xf196 </option>	
									<option value="fa-reorder">&#xf0c9 </option>
									<option value="fa-unsorted">&#xf0dc </option>	
									<option value="fa-sort-down">&#xf0dd </option>	
									<option value="fa-sort-up">&#xf0de </option>	
								</select>
							</div>
							<div class="clear_both"></div>
						</div>						
						
						
						<div class="albdesign_wc_dropdown_cats_options_single_row_container">
							<div class="float_left">
								<label><?php _e('Extra CSS class',$this->domain);?></label>
							</div>
							<div class="rightside">
								<input type="text"  name="<?php echo $this->slug;?>_extra_css_class" id="<?php echo $this->slug;?>_extra_css_class">	
							</div>
							<div class="clear_both"></div>
						</div>						

                    </div>
					

                    <div style="padding:15px; padding-left: 0">
                        <input type="button" class="button-primary" value="<?php _e('Insert dropdown',$this->domain);?>" onclick="Albdesign_WC_Dropdown_Categories_Insertshortcode();"/>&nbsp;&nbsp;&nbsp;
                    <a class="button" style="color:#bbb;" href="#" onclick="tb_remove(); return false;"><?php _e('Cancel',$this->domain);?></a>
                    </div>
					
					<br>
	
                </div>
				
				<div class="albdesign_wc_dropdown_cats_options_header_text"><h3><?php _e('PHP Code. To be used in PHP files if needed',$this->domain);?></h3></div>
				<span class="albdesign_wc_dropdown_cats_shortcode_container"></span>				
            </div>
        </div>

        <?php
    }		
	
	
	
	/*
	* Shortcode function 
	*/
	public static function add_albdesign_wc_dropdown_shortcode($atts){

		global $wp_query;
		
		extract(
				shortcode_atts( 
								array(
										'id' 					=> '',
										'title' 				=> 'show',
										'show_count' 			=> 'no',
										'hide_empty' 			=> 'no',
										'parent_is_clickable' 	=> 'yes',
										'bgcolor'				=> '',
										'hover_bgcolor'			=> '',
										'order_by'				=> 'name',
										'order'					=> 'asc',
										'exclude_cats_id'		=> array(),
										
										'font_size'				=> '',
										'font_color'			=> '',
										'hover_font_color'		=> '',
										'hide_current_cat'		=> '',
										
										'expanded_icon'			=> 'fa-plus',
										'collapsed_icon'		=> 'fa-minus',
										
										'extra_css_class'		=> '',
										
									), 
								$atts
				)
			);	
			
		$font_size = str_replace('px','',$font_size);

		$current_product_cat = isset( $wp_query->query['product_cat'] ) ? $wp_query->query['product_cat'] : '';
			
		$list_args  = array(
			'show_count'					=>	(($show_count == 'yes' ) ? 1 : 0),
			'hierarchical'					=>	1,
			'taxonomy'						=>	'product_cat',
			'hide_empty'					=>	(($hide_empty == 'yes' ) ? 1 : 0),
			'menu_order'					=>	'',
			'orderby'						=>	$order_by,
			'order'							=>	$order,
			'exclude'						=>	$exclude_cats_id,
			'echo'							=>	false,
			'walker' 						=>	new Albdesign_WC_Dropdown_Category_Walker,
			'title_li' 						=>	'',
			'pad_counts' 					=>	1,
			'show_option_none'				=>	__('No product categories exist.','albdesign-wc-dropdown-categories'),
			'current_category'				=>	null,
			'current_category_ancestors'	=>	array()	,

			'selected'           			=>	$current_product_cat,
		);			
			
		ob_start();

		//generate a randon number since we might have 2 or 2+ widgets/shortcode on the same page/sidebar
		$rand_number = $id;
		
		?>

		<style>
			.WcDropdownNav.random<?php echo $id;?> {
				<?php echo ( $bgcolor) ? 'background:'.$bgcolor.';'  : '' ; ?>
			}

			/* First Level */

			.WcDropdownNav.random<?php echo $id;?> ul {
				margin: 0;
				padding: 0;
				list-style: none;
			}


			.WcDropdownNav.random<?php echo $id;?> ul li a {
				<?php echo ( $font_color) ? 'color:'.$font_color.';'  : '' ; ?>
				<?php echo ( $font_size) ? 'font-size:'.$font_size.'px;'  : '' ; ?>
				line-height: normal;
				display: block;
				padding: 12px 20px;
				text-decoration: none;
			}

			.WcDropdownNav.random<?php echo $id;?> ul li a:hover {
				
				<?php echo ( $hover_bgcolor) ? 'background:'.$hover_bgcolor.';'  : '' ; ?>
				text-decoration: none;
				
				<?php echo ( $hover_font_color) ? 'color:'.$hover_font_color.';'  : '' ; ?>
			}

			/* Second Level */

			.WcDropdownNav.random<?php echo $id;?> ul ul { border-bottom: none }

			.WcDropdownNav.random<?php echo $id;?> ul ul li {
				<?php echo ( $bgcolor) ? 'background:'.$bgcolor.';'  : '' ; ?>
			}

			
			.WcDropdownNav.random<?php echo $id;?> ul li.current-cat {
				<?php echo ( $hide_current_cat =='yes' ) ? 'display:none;' : '' ; ?>
			}
			
			.WcDropdownNav.random<?php echo $id;?> ul ul li a {
				
				<?php echo ( $font_color) ? 'color:'.$font_color.';'  : '' ; ?>
				display: block;
				line-height: normal;
				padding: 0.51em 20px 0.5em 2.5em;
			}

			.WcDropdownNav.random<?php echo $id;?> ul ul li a:hover { 
				<?php echo ( $hover_bgcolor) ? 'background:'.$hover_bgcolor.';'  : '' ; ?>
			}

			/* Third Level */

			.WcDropdownNav.random<?php echo $id;?> ul ul ul li { border: none; }

			.WcDropdownNav.random<?php echo $id;?> ul ul ul li a {
				padding-left: 3.5em;

			}

			/* Accordion Button */

			ul li.has-subnav .accordion-btn {
				
				font-size: 16px;
			}
			
			.WcDropdownNav li.cat-item {
				position:relative;
				padding-top:0;
				padding-bottom:0;
			}
			

			
			.WcDropdownNav.random<?php echo $id;?> ul  li a:hover + .accordion-btn-wrap {
				<?php echo ( $hover_bgcolor) ? 'background-color:'.$hover_bgcolor.';'  : '' ; ?>
				
			}
			
			.WcDropdownNav.random<?php echo $id;?> ul  li a:hover + .accordion-btn-wrap span i,
			.WcDropdownNav.random<?php echo $id;?> .accordion-btn-wrap span i:hover {
				<?php echo ( $hover_font_color) ? 'color:'.$hover_font_color.';'  : '' ; ?>
			}
			
			.WcDropdownNav.random<?php echo $id;?> .accordion-btn-wrap span i{
				<?php echo ( $font_color) ? 'color:'.$font_color.';'  : '' ; ?>
				<?php echo ( $font_size) ? 'font-size:'.$font_size.'px;'  : '' ; ?>
				
			}
			
		</style>

		<script>
			jQuery(document).ready(function(){
			
				//Accordion Nav
				jQuery('.WcDropdownNav.random<?php echo $id;?>').navAccordion({
					expandButtonText: '<i class="fa <?php echo $expanded_icon;?>"></i>',  //Text inside of buttons can be HTML
					collapseButtonText: '<i class="fa <?php echo $collapsed_icon;?>"></i>',
					<?php echo ( $parent_is_clickable == 'no'  ) ? 'headersOnly :true,' : '' ;?>
					
				});
				
				
			});
		</script>		
		
		<nav class="WcDropdownNav random<?php echo $id;?> <?php echo $extra_css_class;?>">
					<ul>
						<?php echo wp_list_categories( $list_args );?>
					</ul>
		</nav>

		<?php 		
		$html_to_return = ob_get_clean();
		return $html_to_return;
	}

	
	

    /**
     * Add button on page/post aside ADD MEDIA button
     */	
	public function add_form_button_to_page(){
	
		
		// display button matching new UI
        echo '<style>.wp-core-ui a#albdesign_wc_dropdown_add_button_on_tinymce{padding-left: 0.4em;}</style>
                  <a href="#TB_inline&height=750&width=700&inlineId=select_albdesign_wc_dropdown_cats_form" class="thickbox button" id="albdesign_wc_dropdown_add_button_on_tinymce" title="Add WC Dropdown Categories">Add WC Dropdown Categories</a>';
	}		

	
    /**
     * Run the plugin 
     */
    private function run_plugin() {

		//Adding "embed form" button
        add_action('media_buttons', array($this, 'add_form_button_to_page'), 20);

	}


	
	/*
	* Get all woocomerce categories 
	*/
	
	static function get_wc_categories(){
		$args = array(
			'hide_empty' => 0,
			'hierarchical' => 1
		);

		$product_categories = get_terms( 'product_cat', $args );
		

		if(is_array($product_categories )){
			foreach($product_categories as $single_category){
				$single_category_array['id'] = $single_category->term_id;
				$single_category_array['name'] = $single_category->name;
				$all_categories[] = $single_category_array;
			}
			
			return $all_categories;
		}
		
		
		return false;	

		
	}
	

	
		
	/*
	* Get all woocommerce categories for Visual Composer
	*/
	
	static function get_wc_categories_for_visual_composer(){
		$args = array(
			'hide_empty' => 0,
			'hierarchical' => 1
		);

		$product_categories = get_terms( 'product_cat', $args );
		

		if(is_array($product_categories )){
			foreach($product_categories as $single_category){
				
				$single_category_array[$single_category->name] = $single_category->term_id;
				
				//$all_categories[] = $single_category_array;
			}
			
			return $single_category_array;
		}
		
		
		return false;	

		
	}


	/* VISUAL COMPOSER RELATED STUFF ... START */
	
		public function integrateWithVC() {
			
			// Check if Visual Composer is installed
			if ( ! defined( 'WPB_VC_VERSION' ) ) {
				return;
			}

			vc_map( array(
				'name' => __('Albdesign Dropdown Categories', $this->domain),
				'description' => __('Albdesign Woocommerce dropdown categories', $this->domain),
				'base' => 'albdesign_wc_dropdown_categories_vc',
				'class' => '',
				'controls' => 'full',
				'icon' => 'icon-wpb-woocommerce',
				'category' => __('WooCommerce', 'js_composer'),
				'params' => array(

						array(
							'type' => 'dropdown',
							'heading' => __( 'Hide empty', $this->domain ),
							'param_name' => 'hide_empty',
							'save_always' => true,						
							'value' => array(
								__( 'Yes', $this->domain ) => 'yes',
								__( 'No', $this->domain ) =>  'no',

								),
						),	
						array(
							'type' => 'dropdown',
							'heading' => __( 'Show count', $this->domain ),
							'param_name' => 'show_count',
							'save_always' => true,						
							'value' => array(
								__( 'Yes', $this->domain ) => 'yes',
								__( 'No', $this->domain ) =>  'no',

								),
						),						
						
						array(
							'type' => 'dropdown',
							'heading' => __( 'Parent category is clickable', $this->domain ),
							'param_name' => 'parent_is_clickable',
							'save_always' => true,
							'value' => array(
								__( 'Yes', $this->domain ) => 'yes',
								__( 'No', $this->domain ) =>  'no',

								),
						),			

						array(
							'type' => 'dropdown',
							'heading' => __( 'Hide current category', $this->domain ),
							'param_name' => 'hide_current_cat',
							'save_always' => true,
							'value' => array(
								__( 'No', $this->domain )  =>  'no',
								__( 'Yes', $this->domain ) => 'yes',

								),
						),	

						array(
							'type' => 'checkbox',
							'heading' => __( 'Exclude categories', $this->domain  ),
							'param_name' => 'exclude_cats_id',
							'value' => 	Albdesign_WC_Dropdown_Categories::get_wc_categories_for_visual_composer()
						),					
						
						array(
							'type' => 'dropdown',
							'heading' => __( 'Order by', $this->domain ),
							'param_name' => 'order_by',
							'save_always' => true,
							'value' => array(
								__( 'Name', $this->domain ) 		=> 'name',
								__( 'ID', $this->domain ) 			=>  'id',
								__( 'Slug', $this->domain ) 		=>  'slug',
								__( 'Count', $this->domain ) 		=>  'count',
								__( 'Term group', $this->domain ) 	=>  'term_group'
								),
						),			

						array(
							'type' => 'dropdown',
							'heading' => __( 'Order', $this->domain ),
							'param_name' => 'order',
							'save_always' => true,
							'value' => array(
								__( 'Ascending', $this->domain )	=> 'asc',
								__( 'Descending', $this->domain )	=>  'desc',
								
								),
						),					
						
						array(
							'type' => 'textfield',
							'save_always' => true,
							'heading' => __('Font size in px', $this->domain),
							'param_name' => 'font_size',
							'value' => '16',
							
						),					
						
						
						array(
							'type' => 'colorpicker',
							'heading' => __('Font color', $this->domain),
							'save_always' => true,						
							'param_name' => 'font_color',
							'value' => '',
							
						),					
						
						array(
							'type' => 'colorpicker',
							'heading' => __('Hover font color', $this->domain),
							'save_always' => true,						
							'param_name' => 'hover_font_color',
							'value' => '', 
							
						),	

						array(
							'type' => 'colorpicker',
							'heading' => __('Background color', $this->domain),
							'save_always' => true,						
							'param_name' => 'bgcolor',
							'value' => '', 
						),					
						
						
						array(
							'type' => 'colorpicker',
							'heading' => __('Hover background color', $this->domain),
							'save_always' => true,						
							'param_name' => 'hover_bgcolor',
							'value' => '', 
						),					
						
						
						array(
							'type' => 'dropdown',
							'heading' => __( 'Expand icon', $this->domain ),
							'param_name' => 'expanded_icon',
							'description'	=> sprintf(
														__('Click <a href="#" class="albdesign_wc_dropdown_show_all_icons_link">here</a></strong> to view all the available icons. %s', $this->domain ), 
														'<div class="albdesign_wc_dropdown_show_all_icons"><div class="one_third">
															<p> Angle double down <i class="fa fa-angle-double-down"></i></p>
															<p> Angle double up <i class="fa fa-angle-double-up"></i></p>
															<p> Angle double right <i class="fa fa-angle-double-right"></i></p>
															<p> Angle double left <i class="fa fa-angle-double-left"></i></p>
															<p> Angle down <i class="fa fa-angle-down"></i></p>
															<p> Angle up <i class="fa fa-angle-up"></i></p>
															<p> Angle left <i class="fa fa-angle-left"></i></p>
															<p> Angle right <i class="fa fa-angle-right"></i></p>
															<p> Arrow circle-o-down <i class="fa fa-arrow-circle-o-down"></i></p>
															<p> Arrow circle-o-up <i class="fa fa-arrow-circle-o-up"></i></p>
															<p> Arrow circle-o-right <i class="fa fa-arrow-circle-o-right"></i></p>
															<p> Arrow circle-o-left <i class="fa fa-arrow-circle-o-left"></i></p>
															<p> Arrow circle down <i class="fa fa-arrow-circle-down"></i></p>
															<p> Arrow circle up <i class="fa fa-arrow-circle-up"></i></p>
															<p> Arrow circle right <i class="fa fa-arrow-circle-right"></i></p>
															<p> Arrow circle left <i class="fa fa-arrow-circle-left"></i></p>
														</div>
														<div class="one_third">
															
															<p> Arrow down <i class="fa fa-arrow-down"></i></p>
															<p> Arrow up <i class="fa fa-arrow-up"></i></p>
															<p> Arrow right <i class="fa fa-arrow-right"></i></p>
															<p> Arrow left <i class="fa fa-arrow-left"></i></p>
															<p> Arrow horizontal <i class="fa fa-arrows-h"></i></p>
															<p> Arrow vertical <i class="fa fa-arrows-v"></i></p>
															<p> Caret down <i class="fa fa-caret-down"></i></p>
															<p> Caret up <i class="fa fa-caret-up"></i></p>
															<p> Caret right <i class="fa fa-caret-right"></i></p>
															<p> Caret left <i class="fa fa-caret-left"></i></p>
															<p> Caret square-o-down <i class="fa fa-caret-square-o-down"></i></p>
															<p> Caret square-o-up <i class="fa fa-caret-square-o-up"></i></p>
															<p> Caret square-o-right <i class="fa fa-caret-square-o-right"></i></p>
															<p> Caret square-o-left <i class="fa fa-caret-square-o-left"></i></p>
															<p> Level down <i class="fa fa-level-down"></i></p>
															<p> Level up <i class="fa fa-level-up"></i></p>	
														</div>
														<div class="one_third">
															<p> Long arrow down <i class="fa fa-long-arrow-down"></i></p>
															<p> Long arrow up <i class="fa fa-long-arrow-up"></i></p>
															<p> Long arrow right <i class="fa fa-long-arrow-right"></i></p>
															<p> Long arrow left <i class="fa fa-long-arrow-left"></i></p>
															<p> Minus <i class="fa fa-minus"></i></p>
															<p> Plus <i class="fa fa-plus"></i></p>
															<p> Minus Circle <i class="fa fa-minus-circle"></i></p>
															<p> Plus Circle <i class="fa fa-plus-circle"></i></p>
															<p> Minus square <i class="fa fa-minus-square"></i></p>
															<p> Plus square <i class="fa fa-plus-square"></i></p>
															<p> Minus o-square <i class="fa fa-minus-square-o"></i></p>
															<p> Plus o-square <i class="fa fa-plus-square-o"></i></p>
															<p> Reorder <i class="fa fa-reorder"></i></p>
															<p> Unsorted <i class="fa fa-unsorted"></i></p>
															<p> Sort down <i class="fa fa-sort-down"></i></p>
															<p> Sort up <i class="fa fa-sort-up"></i></p>
														</div>
														</div>'),
							'save_always' => true,
							'value' => array(
								'Angle double down' 		=> 'fa-angle-double-down',
								'Angle double up' 			=> 'fa-angle-double-up',
								'Angle double right' 		=> 'fa-angle-double-right',
								'Angle double left' 		=> 'fa-angle-double-left',
								'Angle down' 				=> 'fa-angle-down',
								'Angle up' 					=> 'fa-angle-up',
								'Angle left' 				=> 'fa-angle-left',
								'Angle right' 				=> 'fa-angle-right',
								'Arrow circle-o-down'       => 'fa-arrow-circle-o-down',
								'Arrow circle-o-up'      	=> 'fa-arrow-circle-o-up',
								'Arrow circle-o-right'		=> 'fa-arrow-circle-o-right',
								'Arrow circle-o-left'		=> 'fa-arrow-circle-o-left',
								'Arrow circle down'			=> 'fa-arrow-circle-down',
								'Arrow circle up'			=> 'fa-arrow-circle-up',
								'Arrow circle right'		=> 'fa-arrow-circle-right',
								'Arrow circle left'			=> 'fa-arrow-circle-left',
								
								'Arrow down'				=> 'fa-arrow-down',
								'Arrow up'					=> 'fa-arrow-up',
								'Arrow right'				=> 'fa-arrow-right',
								'Arrow left'				=> 'fa-arrow-left',
								
								'Arrow horizontal'			=> 'fa-arrows-h',
								'Arrow vertical'			=> 'fa-arrows-v',
								'Caret down'				=> 'fa-caret-down',
								'Caret up'					=> 'fa-caret-up',
								'Caret right'				=> 'fa-caret-right',
								'Caret left'				=> 'fa-caret-left',
								'Caret square-o-down'		=> 'fa-caret-square-o-down',
								'Caret square-o-up'			=> 'fa-caret-square-o-up',
								'Caret square-o-right'		=> 'fa-caret-square-o-right',
								'Caret square-o-left'		=> 'fa-caret-square-o-left',
								'Level down'				=> 'fa-level-down',
								'Level up'					=> 'fa-level-up',
								
								
								'Long arrow down'			=> 'fa-long-arrow-down',
								'Long arrow up'				=> 'fa-long-arrow-up',
								'Long arrow right'			=> 'fa-long-arrow-right',
								'Long arrow left'			=> 'fa-long-arrow-left',
								'Minus'						=> 'fa-minus',
								'Plus'						=> 'fa-plus',
								'Minus Circle'				=> 'fa-minus-circle',
								'Plus Circle'				=> 'fa-plus-circle',
								'Minus square'				=> 'fa-minus-square',
								'Plus square'				=> 'fa-plus-square',
								'Minus o-square'			=> 'fa-minus-square-o',
								'Plus o-square'				=> 'fa-plus-square-o',							
								'Reorder'					=> 'fa-reorder',							
								'Unsorted'					=> 'fa-unsorted',							
								'Sort down'					=> 'fa-sort-down',							
								'Sort up'					=> 'fa-sort-up',							

								),
						),					
						
						
						array(
							'type' => 'dropdown',
							'heading' => __( 'Collaps icon', $this->domain ),
							'param_name' => 'collapsed_icon',
							'description'	=> sprintf(
														__('Click <a href="#" class="albdesign_wc_dropdown_show_all_icons_link">here</a></strong> to view all the available icons. %s', $this->domain ), 
														'<div class="albdesign_wc_dropdown_show_all_icons"><div class="one_third">
															<p> Angle double down <i class="fa fa-angle-double-down"></i></p>
															<p> Angle double up <i class="fa fa-angle-double-up"></i></p>
															<p> Angle double right <i class="fa fa-angle-double-right"></i></p>
															<p> Angle double left <i class="fa fa-angle-double-left"></i></p>
															<p> Angle down <i class="fa fa-angle-down"></i></p>
															<p> Angle up <i class="fa fa-angle-up"></i></p>
															<p> Angle left <i class="fa fa-angle-left"></i></p>
															<p> Angle right <i class="fa fa-angle-right"></i></p>
															<p> Arrow circle-o-down <i class="fa fa-arrow-circle-o-down"></i></p>
															<p> Arrow circle-o-up <i class="fa fa-arrow-circle-o-up"></i></p>
															<p> Arrow circle-o-right <i class="fa fa-arrow-circle-o-right"></i></p>
															<p> Arrow circle-o-left <i class="fa fa-arrow-circle-o-left"></i></p>
															<p> Arrow circle down <i class="fa fa-arrow-circle-down"></i></p>
															<p> Arrow circle up <i class="fa fa-arrow-circle-up"></i></p>
															<p> Arrow circle right <i class="fa fa-arrow-circle-right"></i></p>
															<p> Arrow circle left <i class="fa fa-arrow-circle-left"></i></p>
														</div>
														<div class="one_third">
															
															<p> Arrow down <i class="fa fa-arrow-down"></i></p>
															<p> Arrow up <i class="fa fa-arrow-up"></i></p>
															<p> Arrow right <i class="fa fa-arrow-right"></i></p>
															<p> Arrow left <i class="fa fa-arrow-left"></i></p>
															<p> Arrow horizontal <i class="fa fa-arrows-h"></i></p>
															<p> Arrow vertical <i class="fa fa-arrows-v"></i></p>
															<p> Caret down <i class="fa fa-caret-down"></i></p>
															<p> Caret up <i class="fa fa-caret-up"></i></p>
															<p> Caret right <i class="fa fa-caret-right"></i></p>
															<p> Caret left <i class="fa fa-caret-left"></i></p>
															<p> Caret square-o-down <i class="fa fa-caret-square-o-down"></i></p>
															<p> Caret square-o-up <i class="fa fa-caret-square-o-up"></i></p>
															<p> Caret square-o-right <i class="fa fa-caret-square-o-right"></i></p>
															<p> Caret square-o-left <i class="fa fa-caret-square-o-left"></i></p>
															<p> Level down <i class="fa fa-level-down"></i></p>
															<p> Level up <i class="fa fa-level-up"></i></p>	
														</div>
														<div class="one_third">
															<p> Long arrow down <i class="fa fa-long-arrow-down"></i></p>
															<p> Long arrow up <i class="fa fa-long-arrow-up"></i></p>
															<p> Long arrow right <i class="fa fa-long-arrow-right"></i></p>
															<p> Long arrow left <i class="fa fa-long-arrow-left"></i></p>
															<p> Minus <i class="fa fa-minus"></i></p>
															<p> Plus <i class="fa fa-plus"></i></p>
															<p> Minus Circle <i class="fa fa-minus-circle"></i></p>
															<p> Plus Circle <i class="fa fa-plus-circle"></i></p>
															<p> Minus square <i class="fa fa-minus-square"></i></p>
															<p> Plus square <i class="fa fa-plus-square"></i></p>
															<p> Minus o-square <i class="fa fa-minus-square-o"></i></p>
															<p> Plus o-square <i class="fa fa-plus-square-o"></i></p>
															<p> Reorder <i class="fa fa-reorder"></i></p>
															<p> Unsorted <i class="fa fa-unsorted"></i></p>
															<p> Sort down <i class="fa fa-sort-down"></i></p>
															<p> Sort up <i class="fa fa-sort-up"></i></p>
														</div>
														</div>'),
							'save_always' => true,
							'value' => array(

								'Angle double up' 			=> 'fa-angle-double-up',
								'Angle double down' 		=> 'fa-angle-double-down',
								'Angle double right' 		=> 'fa-angle-double-right',
								'Angle double left' 		=> 'fa-angle-double-left',
								'Angle down' 				=> 'fa-angle-down',
								'Angle up' 					=> 'fa-angle-up',
								'Angle left' 				=> 'fa-angle-left',
								'Angle right' 				=> 'fa-angle-right',
								'Arrow circle-o-down'       => 'fa-arrow-circle-o-down',
								'Arrow circle-o-up'      	=> 'fa-arrow-circle-o-up',
								'Arrow circle-o-right'		=> 'fa-arrow-circle-o-right',
								'Arrow circle-o-left'		=> 'fa-arrow-circle-o-left',
								'Arrow circle down'			=> 'fa-arrow-circle-down',
								'Arrow circle up'			=> 'fa-arrow-circle-up',
								'Arrow circle right'		=> 'fa-arrow-circle-right',
								'Arrow circle left'			=> 'fa-arrow-circle-left',
								'Arrow down'				=> 'fa-arrow-down',
								'Arrow up'					=> 'fa-arrow-up',
								'Arrow right'				=> 'fa-arrow-right',
								'Arrow left'				=> 'fa-arrow-left',
								'Arrow horizontal'			=> 'fa-arrows-h',
								'Arrow vertical'			=> 'fa-arrows-v',
								'Caret down'				=> 'fa-caret-down',
								'Caret up'					=> 'fa-caret-up',
								'Caret right'				=> 'fa-caret-right',
								'Caret left'				=> 'fa-caret-left',
								'Caret square-o-down'		=> 'fa-caret-square-o-down',
								'Caret square-o-up'			=> 'fa-caret-square-o-up',
								'Caret square-o-right'		=> 'fa-caret-square-o-right',
								'Caret square-o-left'		=> 'fa-caret-square-o-left',
								'Level down'				=> 'fa-level-down',
								'Level up'					=> 'fa-level-up',
								'Long arrow down'			=> 'fa-long-arrow-down',
								'Long arrow up'				=> 'fa-long-arrow-up',
								'Long arrow right'			=> 'fa-long-arrow-right',
								'Long arrow left'			=> 'fa-long-arrow-left',
								'Minus'						=> 'fa-minus',
								'Plus'						=> 'fa-plus',
								'Minus Circle'				=> 'fa-minus-circle',
								'Plus Circle'				=> 'fa-plus-circle',
								'Minus square'				=> 'fa-minus-square',
								'Plus square'				=> 'fa-plus-square',
								'Minus o-square'			=> 'fa-minus-square-o',
								'Plus o-square'				=> 'fa-plus-square-o',							
								'Reorder'					=> 'fa-reorder',							
								'Unsorted'					=> 'fa-unsorted',							
								'Sort down'					=> 'fa-sort-down',							
								'Sort up'					=> 'fa-sort-up',							

								),
						),						
						
						
						array(
							'type' => 'textfield',
							'heading' => __('Extra CSS class', $this->domain),
							'param_name' => 'extra_css_class',
							'value' => '',
						),
						
				)
				
			) );
			
			
		}

		/*
		* Render visual composer shortcode
		*/
		public function renderMyBartag( $atts, $content = null ) {
		  extract( shortcode_atts( array(
					'id' 					=> rand(1,10000),
					'title' 				=> 'show',
					'show_count' 		=> '',
					'hide_empty' 			=> 'no',
					'parent_is_clickable' 	=> 'yes',
					'bgcolor'				=> '',
					'hover_bgcolor'			=> '',
					'order_by'				=> 'name',
					'order'					=> 'asc',
					'exclude_cats_id'		=> array(),
					
					'font_size'				=> '',
					'font_color'			=> '',
					'hover_font_color'		=> '',
					'hide_current_cat'		=> '',
					
					'expanded_icon'			=> 'fa-plus',
					'collapsed_icon'		=> 'fa-minus',
					
					'extra_css_class'		=> '',
		  ), $atts ) );
		  

		  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content

			if(is_array($exclude_cats_id)){
				$exclude_cats_id = implode(',',$exclude_cats_id);
			}
			
			$font_size = str_replace('px','',$font_size);
		  
			$output = '[albdesign_wc_dropdown_categories bgcolor="'.$bgcolor.'" hover_bgcolor="'.$hover_bgcolor.'" hide_empty="'. $hide_empty.'" show_count="'. $show_count .'" exclude_cats_id="'. $exclude_cats_id .'" order_by="'. $order_by .'" order="'.$order.'" font_size="'.$font_size.'" font_color="'.$font_color.'" hover_font_color="'.$hover_font_color.'" hide_current_cat="'. $hide_current_cat .'" collapsed_icon="'.$collapsed_icon.'" expanded_icon="'.$expanded_icon.'" extra_css_class="'.$extra_css_class.'" parent_is_clickable="'.$parent_is_clickable.'" id="'.$id.'"]';
		  
			return do_shortcode($output);
		}	
		
	/* VISUAL COMPOSER RELATED STUFF ... ENDS */ 
	
}


class Albdesign_WC_Dropdown_Categories_Widget extends WP_Widget {

	private $domain = 'albdesign-wc-dropdown-categories';

	
	
    function Albdesign_WC_Dropdown_Categories_Widget() {
        parent::__construct( false , $name = __('Wooocommerce Dropdown Categories',$this->domain));	
		
    }
 
   
    function widget($args, $instance) {	
	
        extract( $args );
		
        $title 					= apply_filters('widget_title', $instance['title']);
        $hide_empty 			= $instance['hide_empty'];
        $show_count 			= $instance['show_count'];
        $hide_current_cat		= $instance['hide_current_cat'];
        $order_by				= $instance['order_by'];
        $order					= $instance['order'];
        $font_size				= str_replace('px','',$instance['font_size']);
        $font_color				= $instance['font_color'];
        $hover_font_color		= $instance['hover_font_color'];
        $background_color		= $instance['background_color'];
        $hover_background_color	= $instance['hover_background_color'];
        $expanded_icon			= $instance['expanded_icon'];
        $collapsed_icon			= $instance['collapsed_icon'];
        $extra_css_class		= $instance['extra_css_class'];
        $parent_is_clickable	= $instance['parent_is_clickable'];

		

		$exclude_cats ='';
		if(is_array($instance['exclude_cats'])){
			$exclude_cats = implode(',',$instance['exclude_cats']);
		}
      
		echo $before_widget;
		
		if ( $title ){
			echo $before_title . $title . $after_title; 
		}
		
		$full_shortcode = '[albdesign_wc_dropdown_categories bgcolor="'.$background_color.'" hover_bgcolor="'.$hover_background_color.'" hide_empty="'. $hide_empty.'" show_count="'. $show_count .'" exclude_cats_id="'. $exclude_cats .'" order_by="'. $order_by .'" order="'.$order.'" font_size="'.$font_size.'" font_color="'.$font_color.'" hover_font_color="'.$hover_font_color.'" hide_current_cat="'. $hide_current_cat .'" collapsed_icon="'.$collapsed_icon.'" expanded_icon="'.$expanded_icon.'" extra_css_class="'.$extra_css_class.'" parent_is_clickable="'.$parent_is_clickable.'" id="'.$widget_id.'"]';
		
		
		echo do_shortcode($full_shortcode);
		
		
		echo $after_widget; 
    }
 
    
    function update($new_instance, $old_instance) {		
	
		$instance = $old_instance;
		
		$instance['title'] 					= $new_instance['title'];
		$instance['hide_empty'] 			= $new_instance['hide_empty'];
		$instance['show_count'] 			= $new_instance['show_count'];
		$instance['hide_current_cat'] 		= $new_instance['hide_current_cat'];
		$instance['order_by'] 				= $new_instance['order_by'];
		$instance['order'] 					= $new_instance['order'];
		$instance['font_size'] 				= str_replace('px','',$new_instance['font_size']);
		$instance['font_color'] 			= $new_instance['font_color'];
		$instance['hover_font_color'] 		= $new_instance['hover_font_color'];
		$instance['background_color'] 		= $new_instance['background_color'];
		$instance['hover_background_color'] = $new_instance['hover_background_color'];
		$instance['expanded_icon'] 			= $new_instance['expanded_icon'];
		$instance['collapsed_icon'] 		= $new_instance['collapsed_icon'];
		$instance['parent_is_clickable'] 	= $new_instance['parent_is_clickable'];
		$instance['extra_css_class'] 		= $new_instance['extra_css_class'];
		
		$instance['exclude_cats'] = array();
		if(isset($new_instance['exclude_cats'])){
			$instance['exclude_cats'] = $new_instance['exclude_cats'];
		}
		
        return $instance;
    }
 
   
    function form($instance) {	
	
		$title 		= __('Product categories',$this->domain); 
		if(isset($instance['title'])){
			$title 		= esc_attr($instance['title']);
		}
		
		$hide_empty 		= 'no';
		if(isset($instance['hide_empty'])){
			$hide_empty 		= $instance['hide_empty'];
		}	

		$show_count 		= 'no';
		if(isset($instance['show_count'])){
			$show_count 		= $instance['show_count'];
		}		
       
		$hide_current_cat 		= 'no';
		if(isset($instance['hide_current_cat'])){
			$hide_current_cat 		= $instance['hide_current_cat'];
		}	
		
		$exclude_cats 		= array();
		if(isset($instance['exclude_cats'])){
			$exclude_cats 		= $instance['exclude_cats'];
		}		

		$order_by 		= 'name';
		if(isset($instance['order_by'])){
			$order_by 		= $instance['order_by'];
		}	

		$order		= 'asc';
		if(isset($instance['order'])){
			$order 		= $instance['order'];
		}		
		
		
		$font_size		= '16';
		if(isset($instance['font_size'])){
			$font_size 		= str_replace('px','',$instance['font_size']);
		}	

		$font_color		= '';
		if(isset($instance['font_color'])){
			$font_color 		= $instance['font_color'];
		}	
		
		$hover_font_color		= '';
		if(isset($instance['hover_font_color'])){
			$hover_font_color 		= $instance['hover_font_color'];
		}		
	  
		$background_color		= '';
		if(isset($instance['background_color'])){
			$background_color 		= $instance['background_color'];
		}		
		
		$hover_background_color		= '';
		if(isset($instance['hover_background_color'])){
			$hover_background_color 		= $instance['hover_background_color'];
		}			
		
		$expanded_icon		= '';
		if(isset($instance['expanded_icon'])){
			$expanded_icon 		= $instance['expanded_icon'];
		}			
		
		$collapsed_icon		= '';
		if(isset($instance['collapsed_icon'])){
			$collapsed_icon 		= $instance['collapsed_icon'];
		}		
		
		$extra_css_class		= '';
		if(isset($instance['extra_css_class'])){
			$extra_css_class 		= $instance['extra_css_class'];
		}		
		
		$parent_is_clickable		= 'yes';
		if(isset($instance['parent_is_clickable'])){
			$parent_is_clickable 		= $instance['parent_is_clickable'];
		}	  
	  
	  
	  
	  
	   
        ?>
        <p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title',$this->domain); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		
        <p>
			<label for="<?php echo $this->get_field_id('hide_empty'); ?>"><?php _e('Hide empty',$this->domain); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id('hide_empty'); ?>" name="<?php echo $this->get_field_name('hide_empty'); ?>" value="<?php echo $hide_empty; ?>" >
				<option value="no" <?php selected($hide_empty,'no');?> ><?php _e('No',$this->domain); ?></option>
				<option value="yes" <?php selected($hide_empty,'yes');?> ><?php _e('Yes',$this->domain); ?></option>
			</select>
        </p>		
		
		
        <p>
			<label for="<?php echo $this->get_field_id('show_count'); ?>"><?php _e('Show count',$this->domain); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id('show_count'); ?>" name="<?php echo $this->get_field_name('show_count'); ?>" value="<?php echo $show_count; ?>" >
				<option value="no" <?php selected($show_count,'no');?> ><?php _e('No',$this->domain); ?></option>
				<option value="yes" <?php selected($show_count,'yes');?> ><?php _e('Yes',$this->domain); ?></option>
			</select>
        </p>	

        <p>
			<label for="<?php echo $this->get_field_id('hide_current_cat'); ?>"><?php _e('Hide current category',$this->domain); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id('hide_current_cat'); ?>" name="<?php echo $this->get_field_name('hide_current_cat'); ?>"  >
				<option value="no" <?php selected($hide_current_cat,'no');?> ><?php _e('No',$this->domain); ?></option>
				<option value="yes" <?php selected($hide_current_cat,'yes');?> ><?php _e('Yes',$this->domain); ?></option>
			</select>
        </p>	
		
        <p>
			<label for="<?php echo $this->get_field_id('parent_is_clickable'); ?>"><?php _e('Parent category is clickable',$this->domain); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id('parent_is_clickable'); ?>" name="<?php echo $this->get_field_name('parent_is_clickable'); ?>"  >
				<option value="yes" <?php selected($parent_is_clickable,'yes');?> ><?php _e('Yes',$this->domain); ?></option>
				<option value="no" <?php selected($parent_is_clickable,'no');?> ><?php _e('No',$this->domain); ?></option>
				
			</select>
        </p>		

        <p>
			<label for="<?php echo $this->get_field_id('exclude_cats'); ?>"><?php _e('Exclude categories',$this->domain); ?></label> <Br>
			<?php 
				if( is_array( Albdesign_WC_Dropdown_Categories::get_wc_categories() ) ){
					foreach( Albdesign_WC_Dropdown_Categories::get_wc_categories() as $single_category) { ?>
						<input type="checkbox" <?php if(in_array($single_category['id'], $exclude_cats)){ echo ' checked="checked" ';} ?>  value="<?php echo $single_category['id'];?>"  name="<?php echo $this->get_field_name('exclude_cats'); ?>[]" id="<?php echo $this->get_field_id('exclude_cats'); ?>"> <?php echo $single_category['name'];?><br>
					<?php 
					} //end foreach 
				} 
			?>
        </p>
		
		
		<h2><?php _e('Ordering options',$this->domain);?></h2>
		<p>
			<label for="<?php echo $this->get_field_id('order_by'); ?>"><?php _e('Order by',$this->domain); ?></label> <Br>
			<select class="widefat"  id="<?php echo $this->get_field_id('order_by'); ?>" name="<?php echo $this->get_field_name('order_by'); ?>"  >
				<option value="name" <?php selected($order_by,'name');?> ><?php _e('Name',$this->domain);?></option>
				<option value="id"<?php selected($order_by,'id');?> ><?php _e('ID',$this->domain);?></option>
				<option value="slug"<?php selected($order_by,'slug');?> ><?php _e('Slug',$this->domain);?></option>
				<option value="count"<?php selected($order_by,'count');?> ><?php _e('Count',$this->domain);?></option>
				<option value="term_group"<?php selected($order_by,'term_group');?> ><?php _e('Term group',$this->domain);?></option>
			</select>
		</p>	

		<p>
			<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order',$this->domain); ?></label> <Br>
			<select class="widefat"  id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>"  >
				<option value="asc" <?php selected($order,'asc');?> ><?php _e('Ascending',$this->domain);?></option>
				<option value="desc"<?php selected($order,'desc');?> ><?php _e('Descending',$this->domain);?></option>
			</select>
		</p>	

		
		<p>
			<label for="<?php echo $this->get_field_id('font_size'); ?>"><?php _e('Font size in px',$this->domain); ?></label> <Br>
			<input class="widefat" id="<?php echo $this->get_field_id('font_size'); ?>" name="<?php echo $this->get_field_name('font_size'); ?>" type="text" value="<?php echo $font_size; ?>" />
		</p>	

		<p>
			<label for="<?php echo $this->get_field_id('font_color'); ?>"><?php _e('Font color',$this->domain); ?></label> <Br>
			<input class=" albdesign_wc_dropdown_categories_color_picker " id="<?php echo $this->get_field_id('font_color'); ?>" name="<?php echo $this->get_field_name('font_color'); ?>" type="text" value="<?php echo $font_color; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('hover_font_color'); ?>"><?php _e('Hover font color',$this->domain); ?></label> <Br>
			<input class=" albdesign_wc_dropdown_categories_color_picker " id="<?php echo $this->get_field_id('hover_font_color'); ?>" name="<?php echo $this->get_field_name('hover_font_color'); ?>" type="text" value="<?php echo $hover_font_color; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('background_color'); ?>"><?php _e('Background color',$this->domain); ?></label> <Br>
			<input class=" albdesign_wc_dropdown_categories_color_picker " id="<?php echo $this->get_field_id('background_color'); ?>" name="<?php echo $this->get_field_name('background_color'); ?>" type="text" value="<?php echo $background_color; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('hover_background_color'); ?>"><?php _e('Hover background color',$this->domain); ?></label> <Br>
			<input class=" albdesign_wc_dropdown_categories_color_picker " id="<?php echo $this->get_field_id('hover_background_color'); ?>" name="<?php echo $this->get_field_name('hover_background_color'); ?>" type="text" value="<?php echo $hover_background_color; ?>" />
		</p>		

		<p>
			<label for="<?php echo $this->get_field_id('expanded_icon'); ?>"><?php _e('Expand icon',$this->domain); ?></label> <Br>
			<select class="widefat albdesign_wc_dropdown_icon_list_options"  id="<?php echo $this->get_field_id('expanded_icon'); ?>" name="<?php echo $this->get_field_name('expanded_icon'); ?>"  >
				<option value="fa-angle-double-down" <?php selected($expanded_icon,'fa-angle-double-down');?> >&#xf103 </option>
				<option value="fa-angle-double-up" <?php selected($expanded_icon,'fa-angle-double-up');?> >&#xf102 </option>
				<option value="fa-angle-double-right" <?php selected($expanded_icon,'fa-angle-double-right');?> >&#xf101 </option>
				<option value="fa-angle-double-left" <?php selected($expanded_icon,'fa-angle-double-left');?> >&#xf100 </option>
				<option value="fa-angle-down" <?php selected($expanded_icon,'fa-angle-down');?> >&#xf107 </option>
				<option value="fa-angle-up" <?php selected($expanded_icon,'fa-angle-up');?> >&#xf106 </option>
				<option value="fa-angle-left" <?php selected($expanded_icon,'fa-angle-left');?> >&#xf104 </option>
				<option value="fa-angle-right" <?php selected($expanded_icon,'fa-angle-right');?> >&#xf105 </option>
				
				<option value="fa-arrow-circle-o-down" <?php selected($expanded_icon,'fa-arrow-circle-o-down');?> >&#xf01a </option>
				<option value="fa-arrow-circle-o-up" <?php selected($expanded_icon,'fa-arrow-circle-o-up');?> >&#xf01b </option>
				<option value="fa-arrow-circle-o-left" <?php selected($expanded_icon,'fa-arrow-circle-o-left');?> >&#xf190 </option>
				<option value="fa-arrow-circle-o-right" <?php selected($expanded_icon,'fa-arrow-circle-o-right');?> >&#xf18e </option>
				
				<option value="fa-arrow-circle-down" <?php selected($expanded_icon,'fa-arrow-circle-down');?> >&#xf0ab </option>
				<option value="fa-arrow-circle-up" <?php selected($expanded_icon,'fa-arrow-circle-up');?> >&#xf0aa </option>
				<option value="fa-arrow-circle-left" <?php selected($expanded_icon,'fa-arrow-circle-left');?> >&#xf0a8 </option>
				<option value="fa-arrow-circle-right" <?php selected($expanded_icon,'fa-arrow-circle-right');?> >&#xf0a9 </option>
				
				<option value="fa-arrow-down" <?php selected($expanded_icon,'fa-arrow-down');?> >&#xf063 </option>									
				<option value="fa-arrow-up" <?php selected($expanded_icon,'fa-arrow-up');?> >&#xf062 </option>									
				<option value="fa-arrow-left" <?php selected($expanded_icon,'fa-arrow-left');?> >&#xf060 </option>										
				<option value="fa-arrow-right" <?php selected($expanded_icon,'fa-arrow-right');?> >&#xf061 </option>	
				
				<option value="fa-arrows-h" <?php selected($expanded_icon,'fa-arrows-h');?> >&#xf07e </option>									
				<option value="fa-arrows-v" <?php selected($expanded_icon,'fa-arrows-v');?> >&#xf07d </option>		
				
				<option value="fa-caret-down" <?php selected($expanded_icon,'fa-caret-down');?> >&#xf0d7 </option>									
				<option value="fa-caret-up" <?php selected($expanded_icon,'fa-caret-up');?> >&#xf0d8 </option>									
				<option value="fa-caret-left" <?php selected($expanded_icon,'fa-caret-left');?> >&#xf0d9 </option>									
				<option value="fa-caret-right" <?php selected($expanded_icon,'fa-caret-right');?> >&#xf0da </option>
				
				<option value="fa-caret-square-o-down" <?php selected($expanded_icon,'fa-caret-square-o-down');?> >&#xf150 </option>									
				<option value="fa-caret-square-o-up" <?php selected($expanded_icon,'fa-caret-square-o-up');?> >&#xf151 </option>									
				<option value="fa-caret-square-o-left" <?php selected($expanded_icon,'fa-caret-square-o-left');?> >&#xf191 </option>									
				<option value="fa-caret-square-o-right" <?php selected($expanded_icon,'fa-caret-square-o-right');?> >&#xf152 </option>
				
				<option value="fa-level-down" <?php selected($expanded_icon,'fa-level-down');?> >&#xf149 </option>									
				<option value="fa-level-up" <?php selected($expanded_icon,'fa-level-up');?> >&#xf148 </option>	
				
				<option value="fa-long-arrow-down" <?php selected($expanded_icon,'fa-long-arrow-down');?> >&#xf175 </option>									
				<option value="fa-long-arrow-up" <?php selected($expanded_icon,'fa-long-arrow-up');?> >&#xf176 </option>									
				<option value="fa-long-arrow-left" <?php selected($expanded_icon,'fa-long-arrow-left');?> >&#xf177 </option>									
				<option value="fa-long-arrow-right" <?php selected($expanded_icon,'fa-long-arrow-right');?> >&#xf178 </option>		
				
				<option value="fa-minus" <?php selected($expanded_icon,'fa-minus');?> >&#xf068 </option>									
				<option value="fa-plus" <?php selected($expanded_icon,'fa-plus');?> >&#xf067 </option>
				
				<option value="fa-minus-circle" <?php selected($expanded_icon,'fa-minus-circle');?> >&#xf056 </option>									
				<option value="fa-plus-circle" <?php selected($expanded_icon,'fa-plus-circle');?> >&#xf055 </option>	
				<option value="fa-minus-square" <?php selected($expanded_icon,'fa-minus-square');?> >&#xf146 </option>									
				<option value="fa-plus-square" <?php selected($expanded_icon,'fa-plus-square');?> >&#xf0fe </option>
				
				<option value="fa-minus-square-o" <?php selected($expanded_icon,'fa-minus-square-o');?> >&#xf147 </option>									
				<option value="fa-plus-square-o" <?php selected($expanded_icon,'fa-plus-square-o');?> >&#xf196 </option>	
				
				<option value="fa-reorder" <?php selected($expanded_icon,'fa-reorder');?> >&#xf0c9 </option>
				<option value="fa-unsorted" <?php selected($expanded_icon,'fa-unsorted');?> >&#xf0dc </option>	
				<option value="fa-sort-down" <?php selected($expanded_icon,'fa-sort-down');?> >&#xf0dd </option>	
				<option value="fa-sort-up" <?php selected($expanded_icon,'fa-sort-up');?> >&#xf0de </option>					
			</select>
		</p>		
		
		
		
		<p>
			<label for="<?php echo $this->get_field_id('collapsed_icon'); ?>"><?php _e('Collaps icon',$this->domain); ?></label> <Br>
			<select class="widefat albdesign_wc_dropdown_icon_list_options"  id="<?php echo $this->get_field_id('collapsed_icon'); ?>" name="<?php echo $this->get_field_name('collapsed_icon'); ?>"  >
				<option value="fa-angle-double-down" <?php selected($collapsed_icon,'fa-angle-double-down');?> >&#xf103 </option>
				<option value="fa-angle-double-up" <?php selected($collapsed_icon,'fa-angle-double-up');?> >&#xf102 </option>
				<option value="fa-angle-double-right" <?php selected($collapsed_icon,'fa-angle-double-right');?> >&#xf101 </option>
				<option value="fa-angle-double-left" <?php selected($collapsed_icon,'fa-angle-double-left');?> >&#xf100 </option>
				<option value="fa-angle-down" <?php selected($collapsed_icon,'fa-angle-down');?> >&#xf107 </option>
				<option value="fa-angle-up" <?php selected($collapsed_icon,'fa-angle-up');?> >&#xf106 </option>
				<option value="fa-angle-left" <?php selected($collapsed_icon,'fa-angle-left');?> >&#xf104 </option>
				<option value="fa-angle-right" <?php selected($collapsed_icon,'fa-angle-right');?> >&#xf105 </option>
				<option value="fa-arrow-circle-o-down" <?php selected($collapsed_icon,'fa-arrow-circle-o-down');?> >&#xf01a </option>
				<option value="fa-arrow-circle-o-up" <?php selected($collapsed_icon,'fa-arrow-circle-o-up');?> >&#xf01b </option>
				<option value="fa-arrow-circle-o-left" <?php selected($collapsed_icon,'fa-arrow-circle-o-left');?> >&#xf190 </option>
				<option value="fa-arrow-circle-o-right" <?php selected($collapsed_icon,'fa-arrow-circle-o-right');?> >&#xf18e </option>
				<option value="fa-arrow-circle-down" <?php selected($collapsed_icon,'fa-arrow-circle-down');?> >&#xf0ab </option>
				<option value="fa-arrow-circle-up" <?php selected($collapsed_icon,'fa-arrow-circle-up');?> >&#xf0aa </option>
				<option value="fa-arrow-circle-left" <?php selected($collapsed_icon,'fa-arrow-circle-left');?> >&#xf0a8 </option>
				<option value="fa-arrow-circle-right" <?php selected($collapsed_icon,'fa-arrow-circle-right');?> >&#xf0a9 </option>
				<option value="fa-arrow-down" <?php selected($collapsed_icon,'fa-arrow-down');?> >&#xf063 </option>									
				<option value="fa-arrow-up" <?php selected($collapsed_icon,'fa-arrow-up');?> >&#xf062 </option>									
				<option value="fa-arrow-left" <?php selected($collapsed_icon,'fa-arrow-left');?> >&#xf060 </option>										
				<option value="fa-arrow-right" <?php selected($collapsed_icon,'fa-arrow-right');?> >&#xf061 </option>	
				<option value="fa-arrows-h" <?php selected($collapsed_icon,'fa-arrows-h');?> >&#xf07e </option>									
				<option value="fa-arrows-v" <?php selected($collapsed_icon,'fa-arrows-v');?> >&#xf07d </option>		
				<option value="fa-caret-down" <?php selected($collapsed_icon,'fa-caret-down');?> >&#xf0d7 </option>									
				<option value="fa-caret-up" <?php selected($collapsed_icon,'fa-caret-up');?> >&#xf0d8 </option>									
				<option value="fa-caret-left" <?php selected($collapsed_icon,'fa-caret-left');?> >&#xf0d9 </option>									
				<option value="fa-caret-right" <?php selected($collapsed_icon,'fa-caret-right');?> >&#xf0da </option>
				<option value="fa-caret-square-o-down" <?php selected($collapsed_icon,'fa-caret-square-o-down');?> >&#xf150 </option>									
				<option value="fa-caret-square-o-up" <?php selected($collapsed_icon,'fa-caret-square-o-up');?> >&#xf151 </option>									
				<option value="fa-caret-square-o-left" <?php selected($collapsed_icon,'fa-caret-square-o-left');?> >&#xf191 </option>									
				<option value="fa-caret-square-o-right" <?php selected($collapsed_icon,'fa-caret-square-o-right');?> >&#xf152 </option>
				<option value="fa-level-down" <?php selected($collapsed_icon,'fa-level-down');?> >&#xf149 </option>									
				<option value="fa-level-up" <?php selected($collapsed_icon,'fa-level-up');?> >&#xf148 </option>	
				<option value="fa-long-arrow-down" <?php selected($collapsed_icon,'fa-long-arrow-down');?> >&#xf175 </option>									
				<option value="fa-long-arrow-up" <?php selected($collapsed_icon,'fa-long-arrow-up');?> >&#xf176 </option>									
				<option value="fa-long-arrow-left" <?php selected($collapsed_icon,'fa-long-arrow-left');?> >&#xf177 </option>									
				<option value="fa-long-arrow-right" <?php selected($collapsed_icon,'fa-long-arrow-right');?> >&#xf178 </option>		
				<option value="fa-minus" <?php selected($collapsed_icon,'fa-minus');?> >&#xf068 </option>									
				<option value="fa-plus" <?php selected($collapsed_icon,'fa-plus');?> >&#xf067 </option>
				<option value="fa-minus-circle" <?php selected($collapsed_icon,'fa-minus-circle');?> >&#xf056 </option>									
				<option value="fa-plus-circle" <?php selected($collapsed_icon,'fa-plus-circle');?> >&#xf055 </option>	
				<option value="fa-minus-square" <?php selected($collapsed_icon,'fa-minus-square');?> >&#xf146 </option>									
				<option value="fa-plus-square" <?php selected($collapsed_icon,'fa-plus-square');?> >&#xf0fe </option>
				<option value="fa-minus-square-o" <?php selected($collapsed_icon,'fa-minus-square-o');?> >&#xf147 </option>									
				<option value="fa-plus-square-o" <?php selected($collapsed_icon,'fa-plus-square-o');?> >&#xf196 </option>	
				<option value="fa-reorder" <?php selected($collapsed_icon,'fa-reorder');?> >&#xf0c9 </option>
				<option value="fa-unsorted" <?php selected($collapsed_icon,'fa-unsorted');?> >&#xf0dc </option>	
				<option value="fa-sort-down" <?php selected($collapsed_icon,'fa-sort-down');?> >&#xf0dd </option>	
				<option value="fa-sort-up" <?php selected($collapsed_icon,'fa-sort-up');?> >&#xf0de </option>					
			</select>
		</p>		
		
		
        <p>
			<label for="<?php echo $this->get_field_id('extra_css_class'); ?>"><?php _e('Extra CSS class',$this->domain); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('extra_css_class'); ?>" name="<?php echo $this->get_field_name('extra_css_class'); ?>" type="text" value="<?php echo $extra_css_class; ?>" />
        </p>		
		
        <?php 
    }
 
 

 
} 




class Albdesign_WC_Dropdown_Category_Walker extends Walker_Category {
	
	

	public function start_el( &$output_html, $category, $depth = 0, $args = array(), $id = 0 ) {
		$category_name = apply_filters(
			'list_cats',
			esc_attr( $category->name ),
			$category
		);

		if ( ! $category_name ) {
			return;
		}

		$category_count = '';

		if ( ! empty( $args['show_count'] ) ) {
			$category_count = '<span class="albdesign_wc_dropdown_categories_cat_count">' .  $category->count  . '</span>';
		}

		$link_html = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';
		if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
			$link_html .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		}

		$link_html .= '>';
		$link_html .= $category_name . $category_count. '</a>';



		if ( 'list' == $args['style'] ) {
			$output_html .= "\t<li";
			$css_classes = array(
				'cat-item',
				'cat-item-' . $category->term_id,
			);

			


			if ( ! empty( $args['current_category'] ) ) {

				$_current_category = get_term( $args['current_category'], $category->taxonomy );

				if ( $category->term_id == $args['current_category'] ) {
					$css_classes[] = 'current-cat';
				} 
				
				elseif ( $category->term_id == $_current_category->parent ) {
					$css_classes[] = 'albdesign-current-cat-parent';
				}
				
			}

			$css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );

			$output_html .=  ' class="' . $css_classes . '"';
			$output_html .= ">$link_html\n";
		} else {
			$output_html .= "\t$link_html<br />\n";
		}
	}

	
	


}

//Start it all 
Albdesign_WC_Dropdown_Categories::get_instance();