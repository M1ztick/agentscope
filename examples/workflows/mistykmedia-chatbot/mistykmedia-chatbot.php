<?php
/**
 * Plugin Name: MistyK Media Chatbot
 * Description: A chatbot plugin for WordPress that provides interactive chat functionality on your website.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://mistykmedia.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants
define( 'MISTYKMEDIA_CHATBOT_VERSION', '1.0.0' );
define( 'MISTYKMEDIA_CHATBOT_DIR', plugin_dir_path( __FILE__ ) );
define( 'MISTYKMEDIA_CHATBOT_URL', plugin_dir_url( __FILE__ ) );

// Include necessary files
require_once MISTYKMEDIA_CHATBOT_DIR . 'includes/class-chatbot.php';
require_once MISTYKMEDIA_CHATBOT_DIR . 'includes/api-endpoints.php';
require_once MISTYKMEDIA_CHATBOT_DIR . 'includes/shortcode.php';

// Initialize the plugin
function mistykmedia_chatbot_init() {
    // Register scripts and styles
    wp_enqueue_style( 'chatbot-css', MISTYKMEDIA_CHATBOT_URL . 'assets/css/chatbot.css' );
    wp_enqueue_script( 'chatbot-js', MISTYKMEDIA_CHATBOT_URL . 'assets/js/chatbot.js', array('jquery'), null, true );

    // Initialize the chatbot class
    $chatbot = new Chatbot();
    $chatbot->initialize();
}
add_action( 'wp_enqueue_scripts', 'mistykmedia_chatbot_init' );

// Activation hook
function mistykmedia_chatbot_activate() {
    // Code to run on plugin activation
}
register_activation_hook( __FILE__, 'mistykmedia_chatbot_activate' );

// Deactivation hook
function mistykmedia_chatbot_deactivate() {
    // Code to run on plugin deactivation
}
register_deactivation_hook( __FILE__, 'mistykmedia_chatbot_deactivate' );
?>