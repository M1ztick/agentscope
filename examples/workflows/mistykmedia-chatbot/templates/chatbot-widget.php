<!-- This file contains the HTML structure for the chatbot widget that will be displayed on the website. -->

<div id="mistykmedia-chatbot" class="chatbot-widget">
    <div class="chatbot-header">
        <h2>Chat with Us!</h2>
        <button id="chatbot-close" aria-label="Close Chat">×</button>
    </div>
    <div class="chatbot-messages" id="chatbot-messages">
        <!-- Messages will be dynamically inserted here -->
    </div>
    <div class="chatbot-input">
        <input type="text" id="chatbot-input" placeholder="Type your message..." aria-label="Chat input">
        <button id="chatbot-send" aria-label="Send Message">Send</button>
    </div>
</div>

<style>
    /* Basic styles for the chatbot widget */
    .chatbot-widget {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        display: none; /* Initially hidden */
    }
    .chatbot-header {
        background-color: #0073aa;
        color: white;
        padding: 10px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .chatbot-messages {
        height: 300px;
        overflow-y: auto;
        padding: 10px;
    }
    .chatbot-input {
        display: flex;
        padding: 10px;
    }
    .chatbot-input input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .chatbot-input button {
        padding: 10px;
        margin-left: 5px;
        background-color: #0073aa;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<script>
    document.getElementById('chatbot-send').addEventListener('click', function() {
        const inputField = document.getElementById('chatbot-input');
        const message = inputField.value;
        if (message) {
            // Logic to send the message to the chatbot API
            inputField.value = ''; // Clear input field
        }
    });

    document.getElementById('chatbot-close').addEventListener('click', function() {
        document.getElementById('mistykmedia-chatbot').style.display = 'none';
    });

    // Function to show the chatbot widget
    function showChatbot() {
        document.getElementById('mistykmedia-chatbot').style.display = 'block';
    }
</script>