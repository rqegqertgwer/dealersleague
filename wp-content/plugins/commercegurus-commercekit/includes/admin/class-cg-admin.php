<?php
/**
 * CommerceGurus Commercekit Admin
 *
 * @class    CG_Admin
 * @package  CommerceGurus Commercekit/Admin
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * CG_Admin class.
 */
class CG_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'includes' ) );
	}

	/**
	 * Include any classes we need within admin.
	 */
	public function includes() {

		// Helper.
		include_once dirname( __FILE__ ) . '/helper/class-cg-helper.php';
	}

}

return new CG_Admin();
