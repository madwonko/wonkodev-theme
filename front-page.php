<?php
/**
 * Front Page Template
 *
 * @package Wonkodev
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <p class="hero-prompt">wonkodev <span class="cursor"></span></p>
            <h1 class="hero-title">Creative Code Solutions</h1>
            <p class="hero-description">
                Building innovative WordPress plugins and development tools with a quirky twist. 
                We transform complex problems into elegant, user-friendly solutions.
            </p>
            <p class="hero-comment">Modern development meets creative thinking</p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(home_url('/plugins')); ?>" class="btn btn-primary">
                    Browse Plugins →
                </a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary">
                    Get in Touch
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Plugins Section -->
<section class="plugins-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Featured Plugins</h2>
            <p class="section-description">
                Explore our collection of WordPress plugins designed to enhance your website's functionality
            </p>
        </div>
        
        <div class="plugin-grid">
            <?php
            $args = array(
                'post_type' => 'wonko_plugin',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            
            $plugins_query = new WP_Query($args);
            
            if ($plugins_query->have_posts()) :
                while ($plugins_query->have_posts()) : $plugins_query->the_post();
                    $version = get_post_meta(get_the_ID(), '_plugin_version', true);
                    $download_url = get_post_meta(get_the_ID(), '_plugin_download_url', true);
                    $demo_url = get_post_meta(get_the_ID(), '_plugin_demo_url', true);
                    $docs_url = get_post_meta(get_the_ID(), '_plugin_docs_url', true);
                    
                    // Get first two letters for icon
                    $title = get_the_title();
                    $words = explode(' ', $title);
                    $initials = '';
                    if (count($words) >= 2) {
                        $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                    } else {
                        $initials = strtoupper(substr($title, 0, 2));
                    }
                    ?>
                    <div class="plugin-card">
                        <div class="plugin-header">
                            <div class="plugin-icon"><?php echo esc_html($initials); ?></div>
                            <div>
                                <h3 class="plugin-title"><?php the_title(); ?></h3>
                                <?php if ($version) : ?>
                                    <div class="plugin-version">v<?php echo esc_html($version); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="plugin-description">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'plugin_category');
                        if ($terms && !is_wp_error($terms)) :
                            ?>
                            <div class="plugin-meta">
                                <?php foreach ($terms as $term) : ?>
                                    <span class="plugin-tag"><?php echo esc_html($term->name); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="plugin-links">
                            <a href="<?php the_permalink(); ?>" class="plugin-link">Details</a>
                            <?php if ($docs_url) : ?>
                                <a href="<?php echo esc_url($docs_url); ?>" class="plugin-link">Docs</a>
                            <?php endif; ?>
                            <?php if ($download_url) : ?>
                                <a href="<?php echo esc_url($download_url); ?>" class="plugin-link">Download</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <!-- Placeholder plugins for demo -->
                <div class="plugin-card">
                    <div class="plugin-header">
                        <div class="plugin-icon">RA</div>
                        <div>
                            <h3 class="plugin-title">RadioPeng Audio Player</h3>
                            <div class="plugin-version">v1.2.0</div>
                        </div>
                    </div>
                    <div class="plugin-description">
                        A powerful music player plugin that connects to your AzuraCast radio station with live metadata display.
                    </div>
                    <div class="plugin-meta">
                        <span class="plugin-tag">Audio</span>
                        <span class="plugin-tag">Radio</span>
                    </div>
                    <div class="plugin-links">
                        <a href="#" class="plugin-link">Details</a>
                        <a href="#" class="plugin-link">Docs</a>
                        <a href="#" class="plugin-link">Download</a>
                    </div>
                </div>
                
                <div class="plugin-card">
                    <div class="plugin-header">
                        <div class="plugin-icon">BS</div>
                        <div>
                            <h3 class="plugin-title">Band Song Manager</h3>
                            <div class="plugin-version">v1.0.0</div>
                        </div>
                    </div>
                    <div class="plugin-description">
                        Organize your music repertoire, track performance history, and display your song list to fans.
                    </div>
                    <div class="plugin-meta">
                        <span class="plugin-tag">Music</span>
                        <span class="plugin-tag">Catalog</span>
                    </div>
                    <div class="plugin-links">
                        <a href="#" class="plugin-link">Details</a>
                        <a href="#" class="plugin-link">Docs</a>
                        <a href="#" class="plugin-link">Download</a>
                    </div>
                </div>
                
                <div class="plugin-card">
                    <div class="plugin-header">
                        <div class="plugin-icon">TS</div>
                        <div>
                            <h3 class="plugin-title">Ticketing System</h3>
                            <div class="plugin-version">Coming Soon</div>
                        </div>
                    </div>
                    <div class="plugin-description">
                        Professional support ticket management system with email integration and customer portal.
                    </div>
                    <div class="plugin-meta">
                        <span class="plugin-tag">Support</span>
                        <span class="plugin-tag">CRM</span>
                    </div>
                    <div class="plugin-links">
                        <a href="#" class="plugin-link">Learn More</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?php echo esc_url(home_url('/plugins')); ?>" class="btn btn-primary">
                View All Plugins →
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-4">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Why Choose Wonkodev?</h2>
            <p class="section-description">
                We combine technical expertise with creative problem-solving
            </p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">{ }</div>
                <h3 class="feature-title">Clean Code</h3>
                <p class="feature-description">
                    Well-documented, maintainable code following WordPress best practices and coding standards.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3 class="feature-title">Performance First</h3>
                <p class="feature-description">
                    Optimized for speed and efficiency, ensuring your website runs smoothly and quickly.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🎨</div>
                <h3 class="feature-title">User-Friendly</h3>
                <p class="feature-description">
                    Intuitive interfaces designed for both developers and end-users with no coding required.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🔧</div>
                <h3 class="feature-title">Ongoing Support</h3>
                <p class="feature-description">
                    Regular updates, bug fixes, and dedicated support to keep your plugins running perfectly.
                </p>
            </div>
        </div>
    </div>
</section>

<style>
.features-section {
    background-color: var(--color-bg-alt);
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.feature-card {
    text-align: center;
    padding: 2rem;
    background: white;
    border-radius: var(--border-radius);
    transition: var(--transition);
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.feature-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.feature-title {
    font-family: var(--font-primary);
    font-size: 1.3rem;
    margin-bottom: 1rem;
    color: var(--color-dark);
}

.feature-description {
    color: var(--color-gray);
    line-height: 1.7;
}
</style>

<?php
get_footer();
