<?php
/**
 * Shortcode for embedding the chatbot widget in WordPress.
 *
 * This file registers a shortcode that can be used in posts or pages
 * to display the chatbot widget.
 */

function mistykmedia_chatbot_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . '../templates/chatbot-widget.php';
    return ob_get_clean();
}

add_shortcode('mistykmedia_chatbot', 'mistykmedia_chatbot_shortcode');
?>