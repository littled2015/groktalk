<?php
/*
Template Name: Innovation Spotlight
*/
get_header(); ?>

<main class="innovation-spotlight-page">
    <section class="hero-section">
        <div class="container">
            <h1>Innovation Spotlight</h1>
            <p>Showcasing cutting-edge AI experiments and applications</p>
            
            <div class="spotlight-nav">
                <a href="#demos" class="nav-button active">Live Demos</a>
                <a href="#prompt-testing" class="nav-button">Prompt Testing</a>
                <a href="#code-gallery" class="nav-button">Code Gallery</a>
                <a href="#experiments" class="nav-button">AI Experiments</a>
            </div>
        </div>
    </section>

    <section id="demos" class="live-demos">
        <div class="container">
            <h2>Live AI Demonstrations</h2>
            <div class="demo-grid">
                <div class="demo-card">
                    <h3>AI Customer Service Bot</h3>
                    <p>Real-time conversation demo</p>
                    <button class="btn btn-primary" id="start-chatbot">Try Now</button>
                    <div class="chatbot-interface" style="display: none;">
                        <div class="chat-messages"></div>
                        <div class="chat-input">
                            <input type="text" placeholder="Type your message...">
                            <button>Send</button>
                        </div>
                    </div>
                </div>
                <!-- Add more demo cards -->
            </div>
        </div>
    </section>

    <!-- Add more sections as per wireframe -->
</main>

<?php get_footer(); ?>