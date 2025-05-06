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
        // Configuration
        const chatConfig = {
            typingSpeed: 30, // ms per character
            botResponseDelay: 800, // ms delay before bot starts "typing"
            greetingMessage: 'Hello! I\'m GrokBot, your AI assistant. I can help you with AI-related questions, project ideas, or just chat about the latest AI trends. How can I assist you today?',
            placeholderText: 'Type your message here...',
            sendButtonText: 'Send',
            closeButtonText: 'Close',
            errorMessage: 'Sorry, I couldn\'t process your request. Please try again.'
        };

        // DOM Elements
        const $startChatbot = $('#start-chatbot');
        const $chatInterface = $('.chatbot-interface');
        const $chatMessages = $('.chat-messages');
        const $chatInput = $('.chat-input input');
        const $chatSendButton = $('.chat-input button');
        const $chatClose = $('.chatbot-close');

        // If chat interface doesn't exist, create it
        if ($chatInterface.length === 0 && $startChatbot.length > 0) {
            createChatInterface();
        }

        // Start chatbot button click
        $startChatbot.on('click', function() {
            $('.chatbot-interface').slideDown(300);
            $startChatbot.fadeOut(300);
            
            // Add initial greeting message
            setTimeout(() => {
                addBotMessage(chatConfig.greetingMessage);
            }, 500);
        });

        // Close chatbot button
        $(document).on('click', '.chatbot-close', function() {
            $('.chatbot-interface').slideUp(300);
            $startChatbot.fadeIn(300);
        });

        // Send message on button click
        $(document).on('click', '.chat-input button', function() {
            sendMessage();
        });

        // Send message on Enter key
        $(document).on('keypress', '.chat-input input', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                sendMessage();
            }
        });

        // Focus input when chat opens
        $chatInterface.on('transitionend', function() {
            if ($(this).is(':visible')) {
                $chatInput.focus();
            }
        });

        // Create chat interface if it doesn't exist
        function createChatInterface() {
            const chatHTML = `
                <div class="chatbot-interface" style="display: none;">
                    <div class="chat-header">
                        <div class="bot-identity">
                            <div class="bot-avatar">
                                <div class="bot-icon">🤖</div>
                            </div>
                            <div class="bot-name">GrokBot</div>
                        </div>
                        <button class="chatbot-close" aria-label="Close chat">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="chat-messages"></div>
                    <div class="chat-input">
                        <input type="text" placeholder="${chatConfig.placeholderText}" aria-label="Type your message">
                        <button aria-label="Send message">${chatConfig.sendButtonText}</button>
                    </div>
                </div>
            `;
            
            // Append to parent container or body
            const $parent = $startChatbot.parent();
            $parent.append(chatHTML);
        }

        // Send message function
        function sendMessage() {
            const $input = $('.chat-input input');
            const message = $input.val().trim();
            
            if (message === '') return;

            // Add user message to chat
            addUserMessage(message);
            
            // Clear input
            $input.val('');
            
            // Show typing indicator
            showTypingIndicator();
            
            // Send AJAX request
            setTimeout(() => {
                // Here you would normally send an AJAX request to your backend
                // For demo purposes, we'll simulate a response
                processBotResponse(message);
            }, chatConfig.botResponseDelay);
        }

        // Process bot response
        function processBotResponse(userMessage) {
            // For demo purposes, generate a response based on user message
            // In a real implementation, this would come from your server/API
            const botResponse = generateDemoResponse(userMessage);
            
            // Hide typing indicator
            hideTypingIndicator();
            
            // Add bot message with typing effect
            addBotMessageWithTyping(botResponse);
        }

        // Generate demo response (replace with actual API call in production)
        function generateDemoResponse(userMessage) {
            // Lowercase for easier matching
            const message = userMessage.toLowerCase();
            
            // Simple keyword matching for demo
            if (message.includes('hello') || message.includes('hi') || message.includes('hey')) {
                return "Hi there! How can I assist you with AI today?";
            } else if (message.includes('help') || message.includes('support') || message.includes('assist')) {
                return "I'm here to help! I can answer questions about AI technologies, explain concepts, or suggest resources for learning. What specific area are you interested in?";
            } else if (message.includes('ai') && (message.includes('what is') || message.includes("what's"))) {
                return "Artificial Intelligence (AI) refers to systems designed to perform tasks that typically require human intelligence. These include learning, reasoning, problem-solving, perception, and language understanding. Is there a specific type of AI you'd like to know more about?";
            } else if (message.includes('machine learning') || message.includes('ml')) {
                return "Machine Learning is a subset of AI that focuses on giving computers the ability to learn from data without being explicitly programmed. Would you like to know about different ML approaches or applications?";
            } else if (message.includes('deep learning')) {
                return "Deep Learning is a subset of machine learning that uses neural networks with many layers (hence 'deep'). It's particularly powerful for tasks like image recognition, natural language processing, and speech recognition.";
            } else if (message.includes('neural') && message.includes('network')) {
                return "Neural networks are computing systems inspired by the biological neural networks in animal brains. They consist of artificial neurons that can learn to perform tasks by considering examples, without being programmed with task-specific rules.";
            } else if (message.includes('thank')) {
                return "You're welcome! If you have any other questions, feel free to ask. I'm here to help!";
            } else if (message.includes('bye') || message.includes('goodbye')) {
                return "Goodbye! Feel free to chat again if you have more questions about AI.";
            } else {
                // Generic responses for other inputs
                const genericResponses = [
                    `That's an interesting point about "${userMessage}". Would you like to explore this topic further?`,
                    `I understand you're interested in "${userMessage}". Could you tell me more about what specific aspects you'd like to know?`,
                    `Thanks for bringing up "${userMessage}". This is an important area in AI. What would you like to know specifically?`,
                    `"${userMessage}" is a fascinating topic. I'd be happy to discuss it in more detail if you have specific questions.`,
                    `I see you mentioned "${userMessage}". How can I help you with this topic?`
                ];
                
                // Return random generic response
                return genericResponses[Math.floor(Math.random() * genericResponses.length)];
            }
        }

        // Add user message to chat
        function addUserMessage(message) {
            const messageHtml = `
                <div class="message user-message">
                    <div class="message-avatar">
                        <div class="user-icon">👤</div>
                    </div>
                    <div class="message-bubble">
                        <div class="message-content">${escapeHtml(message)}</div>
                        <div class="message-time">${getCurrentTime()}</div>
                    </div>
                </div>
            `;
            
            $chatMessages.append(messageHtml);
            scrollToBottom();
        }

        // Add bot message to chat
        function addBotMessage(message) {
            const messageHtml = `
                <div class="message bot-message">
                    <div class="message-avatar">
                        <div class="bot-icon">🤖</div>
                    </div>
                    <div class="message-bubble">
                        <div class="message-content">${message}</div>
                        <div class="message-time">${getCurrentTime()}</div>
                    </div>
                </div>
            `;
            
            $chatMessages.append(messageHtml);
            scrollToBottom();
        }

        // Add bot message with typing effect
        function addBotMessageWithTyping(message) {
            // Create empty message first
            const $messageWrapper = $(`
                <div class="message bot-message">
                    <div class="message-avatar">
                        <div class="bot-icon">🤖</div>
                    </div>
                    <div class="message-bubble">
                        <div class="message-content"></div>
                        <div class="message-time">${getCurrentTime()}</div>
                    </div>
                </div>
            `);
            
            $chatMessages.append($messageWrapper);
            scrollToBottom();
            
            // Get message content element
            const $messageContent = $messageWrapper.find('.message-content');
            
            // Simulate typing
            let i = 0;
            const typingInterval = setInterval(() => {
                if (i < message.length) {
                    $messageContent.html($messageContent.html() + message.charAt(i));
                    i++;
                    scrollToBottom();
                } else {
                    clearInterval(typingInterval);
                }
            }, chatConfig.typingSpeed);
        }

        // Show typing indicator
        function showTypingIndicator() {
            const indicatorHtml = `
                <div class="message bot-message typing-indicator">
                    <div class="message-avatar">
                        <div class="bot-icon">🤖</div>
                    </div>
                    <div class="message-bubble">
                        <div class="dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            `;
            
            $chatMessages.append(indicatorHtml);
            scrollToBottom();
        }

        // Hide typing indicator
        function hideTypingIndicator() {
            $('.typing-indicator').remove();
        }

        // Scroll chat to bottom
        function scrollToBottom() {
            $chatMessages.scrollTop($chatMessages[0].scrollHeight);
        }

        // Get current time
        function getCurrentTime() {
            const now = new Date();
            return now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }

        // Escape HTML
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
    }
})(jQuery);