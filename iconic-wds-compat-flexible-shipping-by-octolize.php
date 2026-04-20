<?php
/**
 * Plugin Name:       WooCommerce Delivery Slots by Kadence [Flexible Shipping by Octolize]
 * Plugin URI:        https://iconicwp.com/products/{plugin-name}/?utm_source=iconicwp&utm_medium=plugin&utm_campaign=iconic-wds-compat-flexible-shipping-by-octolize
 * Description:       Compatibility between Delivery Slots by Kadence and Flexible Shipping by Octolize.
 * Author:            Kadence
 * Author URI:        https://www.kadencewp.com/
 * Text Domain:       iconic-compat-{54494}
 * Domain Path:       /languages
 * Version:           0.1.0
 * GitHub Plugin URI: stellarwp/kadence-wds-compat-flexible-shipping-by-octolize
 */

/**
 * Change format of the shipping method ID.
 *
 * @param array $shipping_method_options Shipping methods.
 *
 * @return array
 */
function iconic_compat_flexible_shipping_update_shipping_method_id( $shipping_method_options ) {
	$updated_shipping_method = array();

	foreach ( $shipping_method_options as $method_key => $method_name ) {
		if ( false !== strpos( $method_key, 'wpdesk\fs\tablerate\shippingmethodsingle:' ) ) {
			$method_key = str_replace( 'wpdesk\fs\tablerate\shippingmethodsingle:', 'flexible_shipping_single:', $method_key );
		}

		$updated_shipping_method[ $method_key ] = $method_name;
	}

	// print_r($updated_shipping_method);exit;
	return $updated_shipping_method;
}

add_filter( 'iconic_wds_shipping_method_options', 'iconic_compat_flexible_shipping_update_shipping_method_id', 10 );
