<?php
/*
Template Name: Solutions Hub
*/
get_header(); ?>

<main class="solutions-hub-page">
    <section class="hero-section">
        <div class="container">
            <h1>Solutions Hub</h1>
            <p>Practical AI solutions for real business challenges</p>
            
            <div class="solution-nav">
                <a href="#implementation" class="nav-button active">AI Implementation</a>
                <a href="#learning" class="nav-button">AI Learning Path</a>
                <a href="#case-studies" class="nav-button">Case Studies</a>
                <a href="#roi-calculator" class="nav-button">ROI Calculator</a>
            </div>
        </div>
    </section>

    <section id="implementation" class="services-section">
        <div class="container">
            <h2>AI Implementation Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <h3>Project Assessment</h3>
                    <p>Complete AI readiness evaluation</p>
                    <ul class="service-features">
                        <li>Detailed readiness report</li>
                        <li>Risk assessment matrix</li>
                        <li>Implementation roadmap</li>
                        <li>Priority recommendations</li>
                    </ul>
                    <a href="#contact" class="btn btn-primary">Schedule Assessment</a>
                    <p class="pricing">Starting at $2,500</p>
                </div>
                <!-- Add more service cards -->
            </div>
        </div>
    </section>

    <!-- Add more sections as per wireframe -->
</main>

<?php get_footer(); ?>