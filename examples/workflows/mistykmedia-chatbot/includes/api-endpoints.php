<?php
/**
 * API Endpoints for the MistyK Media Chatbot.
 * 
 * This file defines the API endpoints that the chatbot will use to communicate
 * with external services and handle user interactions.
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register API endpoints for the chatbot.
 */
function mistykmedia_chatbot_register_api_endpoints() {
    register_rest_route( 'mistykmedia-chatbot/v1', '/message', array(
        'methods'  => 'POST',
        'callback' => 'mistykmedia_chatbot_handle_message',
        'permission_callback' => '__return_true',
    ));
}

/**
 * Handle incoming messages from the chatbot.
 *
 * @param WP_REST_Request $request The request object.
 * @return WP_REST_Response The response object.
 */
function mistykmedia_chatbot_handle_message( $request ) {
    $message = $request->get_param( 'message' );

    // Process the message and generate a response
    // Here you would typically call your chatbot logic or external API

    $response_message = "You said: " . esc_html( $message ); // Placeholder response

    return new WP_REST_Response( array( 'response' => $response_message ), 200 );
}

// Hook to register the API endpoints
add_action( 'rest_api_init', 'mistykmedia_chatbot_register_api_endpoints' );
?>