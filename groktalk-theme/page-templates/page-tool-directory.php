<?php
/*
Template Name: AI Tool Directory
*/
get_header();
?>

<main id="primary" class="site-main ai-tool-directory">
    <!-- Hero Section with Search -->
    <section class="directory-hero light-section">
        <div class="container">
            <h1 class="directory-title">AI Tool Directory</h1>
            <p class="directory-subtitle">Discover and compare the latest AI tools and technologies</p>
            
            <div class="tool-search">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="search-inner">
                        <input type="search" placeholder="Search for AI tools..." name="s" class="search-input">
                        <input type="hidden" name="post_type" value="ai_tool">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            
            <div class="filter-categories">
                <span class="filter-label">Browse by category:</span>
                <div class="category-pills">
                    <a href="#all" class="category-pill active" data-category="all">All</a>
                    <a href="#text" class="category-pill" data-category="text">Text Generation</a>
                    <a href="#image" class="category-pill" data-category="image">Image Generation</a>
                    <a href="#audio" class="category-pill" data-category="audio">Audio Processing</a>
                    <a href="#video" class="category-pill" data-category="video">Video Creation</a>
                    <a href="#code" class="category-pill" data-category="code">Coding Assistants</a>
                    <a href="#data" class="category-pill" data-category="data">Data Analysis</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Tools -->
    <section class="featured-tools light-section">
        <div class="container">
            <h2 class="section-title dark-title">Featured AI Tools</h2>
            
            <div class="tools-grid">
                <!-- Tool Card 1 -->
                <div class="tool-card" data-categories="text,code">
                    <div class="tool-card-header">
                        <div class="tool-logo">
                            <div class="logo-placeholder">Tool 1</div>
                        </div>
                        <div class="rating">
                            <div class="stars">★★★★★</div>
                            <span class="rating-count">4.8/5</span>
                        </div>
                    </div>
                    <div class="tool-info">
                        <h3 class="tool-name">CodeWhisperer Pro</h3>
                        <p class="tool-description">Advanced AI coding assistant that understands context and generates production-ready code in multiple languages.</p>
                        <div class="tool-categories">
                            <span class="tool-category">Coding</span>
                            <span class="tool-category">Text</span>
                        </div>
                    </div>
                    <div class="tool-footer">
                        <div class="pricing-tier">
                            <span class="price-label">Starting at</span>
                            <span class="price-amount">$20</span>
                            <span class="price-period">/month</span>
                        </div>
                        <a href="#" class="btn btn-outline">View Details</a>
                    </div>
                </div>
                
                <!-- Tool Card 2 -->
                <div class="tool-card" data-categories="image">
                    <div class="tool-card-header">
                        <div class="tool-logo">
                            <div class="logo-placeholder">Tool 2</div>
                        </div>
                        <div class="rating">
                            <div class="stars">★★★★☆</div>
                            <span class="rating-count">4.3/5</span>
                        </div>
                    </div>
                    <div class="tool-info">
                        <h3 class="tool-name">ArtisticAI</h3>
                        <p class="tool-description">Create stunning artwork and realistic images with simple text prompts. Multiple styles and high-resolution output.</p>
                        <div class="tool-categories">
                            <span class="tool-category">Images</span>
                            <span class="tool-category">Design</span>
                        </div>
                    </div>
                    <div class="tool-footer">
                        <div class="pricing-tier">
                            <span class="price-label">Free tier</span>
                            <span class="price-amount">$10</span>
                            <span class="price-period">/month premium</span>
                        </div>
                        <a href="#" class="btn btn-outline">View Details</a>
                    </div>
                </div>
                
                <!-- Tool Card 3 -->
                <div class="tool-card" data-categories="audio">
                    <div class="tool-card-header">
                        <div class="tool-logo">
                            <div class="logo-placeholder">Tool 3</div>
                        </div>
                        <div class="rating">
                            <div class="stars">★★★★★</div>
                            <span class="rating-count">4.9/5</span>
                        </div>
                    </div>
                    <div class="tool-info">
                        <h3 class="tool-name">VoiceCraft</h3>
                        <p class="tool-description">Professional voice synthesis with natural inflection and emotional range. Perfect for podcasts, videos and audiobooks.</p>
                        <div class="tool-categories">
                            <span class="tool-category">Audio</span>
                            <span class="tool-category">Voice</span>
                        </div>
                    </div>
                    <div class="tool-footer">
                        <div class="pricing-tier">
                            <span class="price-label">Starting at</span>
                            <span class="price-amount">$15</span>
                            <span class="price-period">/month</span>
                        </div>
                        <a href="#" class="btn btn-outline">View Details</a>
                    </div>
                </div>
                
                <!-- Tool Card 4 -->
                <div class="tool-card" data-categories="text,data">
                    <div class="tool-card-header">
                        <div class="tool-logo">
                            <div class="logo-placeholder">Tool 4</div>
                        </div>
                        <div class="rating">
                            <div class="stars">★★★★☆</div>
                            <span class="rating-count">4.2/5</span>
                        </div>
                    </div>
                    <div class="tool-info">
                        <h3 class="tool-name">DataSense AI</h3>
                        <p class="tool-description">Turn complex data into actionable insights. Automated analysis, beautiful visualizations, and plain-language explanations.</p>
                        <div class="tool-categories">
                            <span class="tool-category">Data</span>
                            <span class="tool-category">Analytics</span>
                        </div>
                    </div>
                    <div class="tool-footer">
                        <div class="pricing-tier">
                            <span class="price-label">Business tier</span>
                            <span class="price-amount">$50</span>
                            <span class="price-period">/month</span>
                        </div>
                        <a href="#" class="btn btn-outline">View Details</a>
                    </div>
                </div>
                
                <!-- Tool Card 5 -->
                <div class="tool-card" data-categories="video">
                    <div class="tool-card-header">
                        <div class="tool-logo">
                            <div class="logo-placeholder">Tool 5</div>
                        </div>
                        <div class="rating">
                            <div class="stars">★★★★☆</div>
                            <span class="rating-count">4.4/5</span>
                        </div>
                    </div>
                    <div class="tool-info">
                        <h3 class="tool-name">VideoGenius</h3>
                        <p class="tool-description">AI-powered video editing and creation. Script to finished video in minutes with narration, effects, and music.</p>
                        <div class="tool-categories">
                            <span class="tool-category">Video</span>
                            <span class="tool-category">Content</span>
                        </div>
                    </div>
                    <div class="tool-footer">
                        <div class="pricing-tier">
                            <span class="price-label">Starting at</span>
                            <span class="price-amount">$30</span>
                            <span class="price-period">/month</span>
                        </div>
                        <a href="#" class="btn btn-outline">View Details</a>
                    </div>
                </div>
                
                <!-- Tool Card 6 -->
                <div class="tool-card" data-categories="code,data">
                    <div class="tool-card-header">
                        <div class="tool-logo">
                            <div class="logo-placeholder">Tool 6</div>
                        </div>
                        <div class="rating">
                            <div class="stars">★★★★★</div>
                            <span class="rating-count">4.7/5</span>
                        </div>
                    </div>
                    <div class="tool-info">
                        <h3 class="tool-name">NeuralDB</h3>
                        <p class="tool-description">AI-optimized database that dynamically restructures based on usage patterns. Self-optimizing queries and scaling.</p>
                        <div class="tool-categories">
                            <span class="tool-category">Database</span>
                            <span class="tool-category">Development</span>
                        </div>
                    </div>
                    <div class="tool-footer">
                        <div class="pricing-tier">
                            <span class="price-label">Enterprise</span>
                            <span class="price-amount">Custom</span>
                            <span class="price-period">pricing</span>
                        </div>
                        <a href="#" class="btn btn-outline">View Details</a>
                    </div>
                </div>
            </div>
            
            <div class="load-more">
                <button class="btn btn-purple">Load More Tools</button>
            </div>
        </div>
    </section>

    <!-- Submit Your Tool -->
    <section class="submit-tool-section">
        <div class="container">
            <div class="submit-tool-wrapper">
                <div class="submit-info">
                    <h2>Submit Your AI Tool</h2>
                    <p>Have you developed an AI tool that should be featured in our directory? Get visibility in front of thousands of potential users.</p>
                    <ul class="benefits-list">
                        <li>Reach AI-focused decision makers</li>
                        <li>Get featured in our newsletter</li>
                        <li>Receive expert feedback</li>
                        <li>Connect with potential investors</li>
                    </ul>
                </div>
                <div class="submit-action">
                    <a href="<?php echo esc_url(home_url('/submit-ai-tool/')); ?>" class="btn btn-primary">Submit Your Tool</a>
                    <p class="note">Basic listings are free. Premium listings start at $99/month.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tool Comparison -->
    <section class="tool-comparison light-section">
        <div class="container">
            <h2 class="section-title dark-title">Compare AI Tools</h2>
            <p class="section-subtitle">Select tools to compare features, pricing, and user ratings</p>
            
            <div class="comparison-wrapper">
                <div class="comparison-buttons">
                    <button class="btn btn-secondary">Select Tools to Compare</button>
                    <button class="btn btn-purple">View Recent Comparisons</button>
                </div>
                
                <div class="popular-comparisons">
                    <h3>Popular Comparisons</h3>
                    <div class="comparison-links">
                        <a href="#" class="comparison-link">ChatGPT vs Claude</a>
                        <a href="#" class="comparison-link">Midjourney vs DALL-E</a>
                        <a href="#" class="comparison-link">Whisper vs Descript</a>
                        <a href="#" class="comparison-link">GitHub Copilot vs Tabnine</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <h2>Get AI Tool Updates</h2>
                <p>Subscribe to receive alerts when new AI tools are added to our directory</p>
                
                <form class="newsletter-form" id="newsletter-form">
                    <div class="form-group">
                        <input type="email" placeholder="Enter your email" required>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </div>
                    <p class="form-note">No spam. Unsubscribe anytime.</p>
                </form>
            </div>
        </div>
    </section>
</main>

<!-- JavaScript for the directory filter functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all filter pills
        const filterPills = document.querySelectorAll('.category-pill');
        const toolCards = document.querySelectorAll('.tool-card');
        
        // Add click event to filter pills
        filterPills.forEach(pill => {
            pill.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all pills
                filterPills.forEach(p => p.classList.remove('active'));
                
                // Add active class to clicked pill
                this.classList.add('active');
                
                // Get the category to filter by
                const category = this.dataset.category;
                
                // Show/hide tool cards based on category
                toolCards.forEach(card => {
                    if (category === 'all') {
                        card.style.display = 'flex';
                    } else {
                        const cardCategories = card.dataset.categories.split(',');
                        if (cardCategories.includes(category)) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            });
        });
    });
</script>

<style>
/* AI Tool Directory Styles */
.directory-hero {
    padding: 6rem 0;
    text-align: center;
}

.directory-title {
    font-size: 4.5rem;
    color: var(--midnight-black);
    margin-bottom: 1.5rem;
}

.directory-subtitle {
    font-size: 2rem;
    color: var(--cosmic-web-grey);
    margin-bottom: 3rem;
    max-width: 70ch;
    margin-left: auto;
    margin-right: auto;
}

.tool-search {
    max-width: 700px;
    margin: 0 auto 3rem;
}

.search-inner {
    display: flex;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

.search-input {
    flex: 1;
    padding: 1.5rem 2rem;
    border: 1px solid #eee;
    border-right: none;
    font-size: 1.6rem;
    color: var(--midnight-black);
}

.search-input:focus {
    outline: none;
    border-color: var(--electric-purple);
}

.filter-categories {
    margin-top: 3rem;
}

.filter-label {
    display: block;
    margin-bottom: 1.5rem;
    font-size: 1.6rem;
    color: var(--cosmic-web-grey);
}

.category-pills {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
}

.category-pill {
    padding: 1rem 2rem;
    background-color: #f0f0f5;
    color: var(--cosmic-web-grey);
    border-radius: 5rem;
    font-size: 1.4rem;
    transition: all 0.3s ease;
    text-decoration: none;
    border: 1px solid transparent;
}

.category-pill:hover, 
.category-pill.active {
    background-color: var(--electric-purple);
    color: var(--text-white);
    transform: translateY(-2px);
}

/* Tool cards */
.tools-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.tool-card {
    background-color: var(--text-white);
    border-radius: 1rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.tool-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border-color: var(--electric-purple);
}

.tool-card-header {
    padding: 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.logo-placeholder {
    width: 80px;
    height: 40px;
    background-color: #f0f0f5;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 0.5rem;
    color: var(--cosmic-web-grey);
    font-weight: 500;
}

.rating {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.stars {
    color: gold;
    font-size: 1.8rem;
}

.rating-count {
    font-size: 1.4rem;
    color: var(--cosmic-web-grey);
}

.tool-info {
    padding: 2rem;
    flex: 1;
}

.tool-name {
    font-size: 2.2rem;
    color: var(--midnight-black);
    margin-bottom: 1rem;
}

.tool-description {
    font-size: 1.6rem;
    color: var(--cosmic-web-grey);
    margin-bottom: 1.5rem;
    line-height: 1.5;
}

.tool-categories {
    display: flex;
    flex-wrap: wrap;
    gap: 0.8rem;
}

.tool-category {
    font-size: 1.3rem;
    padding: 0.5rem 1rem;
    background-color: #f0f0f5;
    border-radius: 2rem;
    color: var(--cosmic-web-grey);
}

.tool-footer {
    padding: 2rem;
    border-top: 1px solid rgba(0, 0, 0, 0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.pricing-tier {
    display: flex;
    flex-direction: column;
}

.price-label {
    font-size: 1.2rem;
    color: var(--cosmic-web-grey);
}

.price-amount {
    font-size: 2rem;
    font-weight: 600;
    color: var(--midnight-black);
}

.price-period {
    font-size: 1.4rem;
    color: var(--cosmic-web-grey);
}

/* Submit Tool Section */
.submit-tool-section {
    background-color: var(--electric-purple);
    color: var(--text-white);
    padding: 6rem 0;
}

.submit-tool-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 5rem;
}

.submit-info {
    max-width: 60%;
}

.submit-info h2 {
    font-size: 3.5rem;
    margin-bottom: 1.5rem;
}

.submit-info p {
    font-size: 1.8rem;
    margin-bottom: 2rem;
    color: rgba(255, 255, 255, 0.9);
}

.benefits-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.benefits-list li {
    font-size: 1.6rem;
    padding: 0.8rem 0;
    display: flex;
    align-items: center;
}

.benefits-list li::before {
    content: '✓';
    margin-right: 1rem;
    font-weight: bold;
    color: var(--text-white);
}

.submit-action {
    text-align: center;
}

.submit-action .btn {
    font-size: 1.8rem;
    padding: 1.5rem 3rem;
    margin-bottom: 1.5rem;
    background-color: var(--text-white);
    color: var(--electric-purple);
}

.submit-action .btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.note {
    font-size: 1.4rem;
    opacity: 0.8;
}

/* Tool Comparison */
.tool-comparison {
    padding: 6rem 0;
}

.comparison-wrapper {
    max-width: 900px;
    margin: 0 auto;
}

.comparison-buttons {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-bottom: 4rem;
}

.popular-comparisons {
    text-align: center;
}

.popular-comparisons h3 {
    font-size: 2rem;
    color: var(--midnight-black);
    margin-bottom: 2rem;
}

.comparison-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1.5rem;
}

.comparison-link {
    font-size: 1.6rem;
    padding: 1rem 2rem;
    background-color: #f0f0f5;
    color: var(--midnight-black);
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    text-decoration: none;
}

.comparison-link:hover {
    background-color: var(--electric-purple);
    color: var(--text-white);
    transform: translateY(-2px);
}

.load-more {
    text-align: center;
    margin-top: 4rem;
}

.btn-outline {
    background-color: transparent;
    border: 2px solid var(--electric-purple);
    color: var(--electric-purple);
    padding: 1rem 2rem;
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.btn-outline:hover {
    background-color: var(--electric-purple);
    color: var(--text-white);
    transform: translateY(-3px);
}

/* Section titles for light background */
.dark-title {
    color: var(--midnight-black);
}

.dark-title::after {
    background: var(--glow-gradient);
}

/* Responsive styles */
@media (max-width: 768px) {
    .submit-tool-wrapper {
        flex-direction: column;
        gap: 3rem;
    }
    
    .submit-info {
        max-width: 100%;
        text-align: center;
    }
    
    .tools-grid {
        grid-template-columns: 1fr;
    }
    
    .comparison-buttons {
        flex-direction: column;
    }
    
    .comparison-link {
        width: 100%;
    }
    
    .tool-footer {
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .tool-footer .btn {
        width: 100%;
    }
}
</style>

<?php get_footer(); ?>