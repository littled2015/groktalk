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
            
            // Add custom styling with purple accents
            const customStyle = `
                <style>
                    .chatbot-interface {
                        position: fixed;
                        bottom: 20px;
                        right: 20px;
                        width: 350px;
                        max-height: 500px;
                        display: flex;
                        flex-direction: column;
                        border-radius: 12px;
                        overflow: hidden;
                        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.3);
                        z-index: 1000;
                        background-color: var(--cosmic-web-grey);
                        border: 1px solid rgba(121, 40, 202, 0.3);
                    }
                    
                    .chat-header {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        padding: 15px;
                        background-color: rgba(121, 40, 202, 0.2);
                        border-bottom: 1px solid rgba(121, 40, 202, 0.3);
                    }
                    
                    .bot-avatar {
                        width: 36px;
                        height: 36px;
                        background-color: var(--electric-purple);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-right: 10px;
                    }
                    
                    .bot-name {
                        color: var(--text-white);
                        font-weight: 600;
                    }
                    
                    .bot-identity {
                        display: flex;
                        align-items: center;
                    }
                    
                    .chatbot-close {
                        background: none;
                        border: none;
                        color: var(--text-white);
                        cursor: pointer;
                        padding: 5px;
                    }
                    
                    .chat-messages {
                        padding: 15px;
                        overflow-y: auto;
                        flex: 1;
                        display: flex;
                        flex-direction: column;
                        gap: 15px;
                        max-height: 350px;
                    }
                    
                    .message {
                        display: flex;
                        align-items: flex-start;
                        max-width: 80%;
                    }
                    
                    .user-message {
                        margin-left: auto;
                        flex-direction: row-reverse;
                    }
                    
                    .message-avatar {
                        width: 30px;
                        height: 30px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 8px;
                    }
                    
                    .bot-icon {
                        background-color: var(--electric-purple);
                        color: var(--text-white);
                        width: 100%;
                        height: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 50%;
                    }
                    
                    .user-icon {
                        background-color: var(--text-cosmic-grey);
                        color: var(--text-white);
                        width: 100%;
                        height: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 50%;
                    }
                    
                    .message-bubble {
                        padding: 10px 15px;
                        border-radius: 18px;
                        background-color: rgba(121, 40, 202, 0.2);
                        color: var(--text-white);
                    }
                    
                    .user-message .message-bubble {
                        background-color: rgba(121, 40, 202, 0.4);
                        color: var(--text-white);
                        border-bottom-right-radius: 4px;
                    }
                    
                    .bot-message .message-bubble {
                        background-color: rgba(18, 18, 37, 0.7);
                        color: var(--text-light-grey);
                        border-bottom-left-radius: 4px;
                    }
                    
                    .message-time {
                        font-size: 0.7rem;
                        color: var(--text-cosmic-grey);
                        margin-top: 5px;
                        text-align: right;
                    }
                    
                    .chat-input {
                        display: flex;
                        border-top: 1px solid rgba(121, 40, 202, 0.3);
                        padding: 10px;
                    }
                    
                    .chat-input input {
                        flex: 1;
                        padding: 10px 15px;
                        border: 1px solid rgba(121, 40, 202, 0.3);
                        border-radius: 20px;
                        background-color: rgba(5, 5, 16, 0.5);
                        color: var(--text-white);
                        margin-right: 10px;
                    }
                    
                    .chat-input input:focus {
                        outline: none;
                        border-color: var(--electric-purple);
                        box-shadow: 0 0 0 2px rgba(121, 40, 202, 0.2);
                    }
                    
                    .chat-input button {
                        background-color: var(--electric-purple);
                        color: var(--text-white);
                        border: none;
                        border-radius: 20px;
                        padding: 10px 15px;
                        cursor: pointer;
                        font-weight: 600;
                        transition: all 0.3s ease;
                    }
                    
                    .chat-input button:hover {
                        background-color: var(--soft-purple);
                        transform: translateY(-2px);
                    }
                    
                    .typing-indicator {
                        display: flex;
                        align-items: center;
                    }
                    
                    .dots {
                        display: flex;
                        align-items: center;
                        gap: 4px;
                        padding: 10px 15px;
                    }
                    
                    .dots span {
                        width: 8px;
                        height: 8px;
                        background-color: var(--electric-purple);
                        border-radius: 50%;
                        opacity: 0.6;
                        animation: typing 1.5s infinite;
                    }
                    
                    .dots span:nth-child(2) {
                        animation-delay: 0.2s;
                    }
                    
                    .dots span:nth-child(3) {
                        animation-delay: 0.4s;
                    }
                    
                    @keyframes typing {
                        0% {
                            transform: translateY(0);
                        }
                        50% {
                            transform: translateY(-8px);
                        }
                        100% {
                            transform: translateY(0);
                        }
                    }
                </style>
            `;
            
                            // Append custom style to head
            $('head').append(customStyle);
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