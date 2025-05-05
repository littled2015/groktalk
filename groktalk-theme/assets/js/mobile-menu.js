// Chatbot functionality for GrokTalk Theme
(function($) {
    'use strict';

    $(document).ready(function() {
        // Initialize chatbot if elements exist
        if ($('#start-chatbot').length || $('.chatbot-interface').length) {
            initializeChatbot();
        }
    });

    function initializeChatbot() {
        // Start chatbot button click
        $('#start-chatbot').on('click', function() {
            $('.chatbot-interface').slideDown(300);
            $('#start-chatbot').hide();
            
            // Add initial greeting message
            addBotMessage('Hello! I\'m here to help you with AI-related questions. How can I assist you today?');
        });

        // Close chatbot button if exists
        $('.chatbot-close').on('click', function() {
            $('.chatbot-interface').slideUp(300);
            $('#start-chatbot').show();
        });

        // Send message on button click
        $('.chat-input button').on('click', function() {
            sendMessage();
        });

        // Send message on Enter key
        $('.chat-input input').on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                sendMessage();
            }
        });

        function sendMessage() {
            var input = $('.chat-input input');
            var message = input.val().trim();
            
            if (message === '') return;

            // Add user message to chat
            addUserMessage(message);
            
            // Clear input
            input.val('');
            
            // Show typing indicator
            showTypingIndicator();

            // Send AJAX request
            $.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'groktalk_chatbot',
                    nonce: ajax_object.nonce,
                    message: message
                },
                success: function(response) {
                    hideTypingIndicator();
                    
                    if (response.success) {
                        addBotMessage(response.data.response);
                    } else {
                        addErrorMessage(response.data.message || 'An error occurred');
                    }
                },
                error: function(xhr, status, error) {
                    hideTypingIndicator();
                    addErrorMessage('Could not connect to chatbot. Please try again.');
                    console.error('Chatbot error:', error);
                }
            });
        }

        function addUserMessage(message) {
            var messageHtml = `
                <div class="message user-message">
                    <div class="message-avatar">👤</div>
                    <div class="message-content">${escapeHtml(message)}</div>
                    <div class="message-time">${getCurrentTime()}</div>
                </div>
            `;
            
            $('.chat-messages').append(messageHtml);
            scrollToBottom();
        }

        function addBotMessage(message) {
            var messageHtml = `
                <div class="message bot-message">
                    <div class="message-avatar">🤖</div>
                    <div class="message-content">${message}</div>
                    <div class="message-time">${getCurrentTime()}</div>
                </div>
            `;
            
            $('.chat-messages').append(messageHtml);
            scrollToBottom();
        }

        function addErrorMessage(message) {
            var messageHtml = `
                <div class="message error-message">
                    <div class="message-avatar">⚠️</div>
                    <div class="message-content">${escapeHtml(message)}</div>
                </div>
            `;
            
            $('.chat-messages').append(messageHtml);
            scrollToBottom();
        }

        function showTypingIndicator() {
            $('.chat-messages').append(`
                <div class="typing-indicator">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            `);
            scrollToBottom();
        }

        function hideTypingIndicator() {
            $('.typing-indicator').remove();
        }

        function scrollToBottom() {
            var chatMessages = $('.chat-messages');
            chatMessages.scrollTop(chatMessages[0].scrollHeight);
        }

        function getCurrentTime() {
            var now = new Date();
            return now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }

        function escapeHtml(text) {
            var div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
    }
})(jQuery);