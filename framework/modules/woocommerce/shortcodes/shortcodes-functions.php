<?php

if ( ! function_exists( 'dessau_select_include_woocommerce_shortcodes' ) ) {
	function dessau_select_include_woocommerce_shortcodes() {
		foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/woocommerce/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	if ( dessau_select_core_plugin_installed() ) {
		add_action( 'dessau_core_action_include_shortcodes_file', 'dessau_select_include_woocommerce_shortcodes' );
	}
}

if ( ! function_exists( 'dessau_select_set_product_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for product shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function dessau_select_set_product_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-product-info';
		$shortcodes_icon_class_array[] = '.icon-wpb-product-list';
		$shortcodes_icon_class_array[] = '.icon-wpb-product-list-carousel';
		$shortcodes_icon_class_array[] = '.icon-wpb-product-list-simple';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( dessau_select_core_plugin_installed() ) {
		add_filter( 'dessau_core_filter_add_vc_shortcodes_custom_icon_class', 'dessau_select_set_product_list_icon_class_name_for_vc_shortcodes' );
	}
}