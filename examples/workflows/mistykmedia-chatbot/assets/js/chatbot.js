// File: /mistykmedia-chatbot/mistykmedia-chatbot/assets/js/chatbot.js

document.addEventListener('DOMContentLoaded', function() {
    const chatbotContainer = document.getElementById('chatbot-container');
    const chatInput = document.getElementById('chat-input');
    const chatButton = document.getElementById('chat-button');
    const chatLog = document.getElementById('chat-log');

    chatButton.addEventListener('click', function() {
        const userMessage = chatInput.value;
        if (userMessage.trim() === '') return;

        appendMessage('User', userMessage);
        chatInput.value = '';

        fetchChatbotResponse(userMessage);
    });

    function appendMessage(sender, message) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('chat-message');
        messageElement.innerHTML = `<strong>${sender}:</strong> ${message}`;
        chatLog.appendChild(messageElement);
        chatLog.scrollTop = chatLog.scrollHeight; // Scroll to the bottom
    }

    function fetchChatbotResponse(message) {
        fetch('/wp-json/chatbot/v1/respond', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ message: message }),
        })
        .then(response => response.json())
        .then(data => {
            if (data && data.response) {
                appendMessage('Chatbot', data.response);
            } else {
                appendMessage('Chatbot', 'Sorry, I did not understand that.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            appendMessage('Chatbot', 'An error occurred. Please try again later.');
        });
    }
});