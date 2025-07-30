<?php
/**
 * The Enable Cookie Notice functionality of the plugin.
 * 
 * @link       https://club.wpeka.com/
 * @since      9.2.11
 * @package    Wpl_Cookie_Consent
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The admin-specific functionality for cookie notice.
 *
 * @package    Wpl_Cookie_Consent
 * @subpackage Wpl_Cookie_Consent/admin/modules
 * @author     wpeka <https://club.wpeka.com>
 */

class Gdpr_Cookie_Consent_Cookie_Notice {
    
    /**
     * Display errors.
     * 
     * @var array $errors Display errors.
     */

    private static $errors = array();
    public $settings;

    /**
     * Gdpr_Cookie_Consent_Cookie_Notice constructor.
     *
     * @since 9.2.11
     */

    public function __construct() {
        if ( Gdpr_Cookie_Consent::is_request( 'admin' ) ) {
            add_action( 'wp_ajax_gcc_cookie_notice_tab', array( $this, 'wp_settings_cookie_notice_tab' ) );
            add_action('admin_enqueue_scripts', array($this, 'register_cookie_notice_script'));
        }
    }

    public function register_cookie_notice_script() {
        // Get user's Pageview data
        wp_enqueue_script('cookie_notice_ajax', plugin_dir_url( __FILE__ ) . 'assets/js/cookie-notice-data.js', array('jquery', 'gdpr-cookie-consent-admin-revamp'), '1.0', true);

        wp_localize_script('cookie_notice_ajax', 'cookie_notice_ajax', array(
            'ajax_url'          => admin_url( 'admin-ajax.php' )
        ));
    }

    /**
     * Cookie Notice Toggle
     * 
     * @since 9.2.11
     */

    public function wp_settings_cookie_notice_tab() {
        error_log("DODODO inside cookie_notice_tab()");
    }

}
?>