<?php
/**
 * Single Post Template
 *
 * @package Wonkodev
 */

get_header();
?>

<div class="container-narrow py-4">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
            <header class="post-header">
                <div class="post-meta">
                    <time datetime="<?php echo get_the_date('c'); ?>">
                        <?php echo get_the_date(); ?>
                    </time>
                    <span class="separator">//</span>
                    <span class="post-author">By <?php the_author(); ?></span>
                    <?php if (has_category()) : ?>
                        <span class="separator">//</span>
                        <?php the_category(', '); ?>
                    <?php endif; ?>
                </div>
                
                <h1 class="post-title"><?php the_title(); ?></h1>
            </header>
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-featured-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>
            
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            
            <?php if (has_tag()) : ?>
                <footer class="post-footer">
                    <div class="post-tags">
                        <span class="tags-label">Tags:</span>
                        <?php the_tags('', ', ', ''); ?>
                    </div>
                </footer>
            <?php endif; ?>
        </article>
        
        <nav class="post-navigation">
            <div class="nav-previous">
                <?php previous_post_link('%link', '← Previous Post'); ?>
            </div>
            <div class="nav-next">
                <?php next_post_link('%link', 'Next Post →'); ?>
            </div>
        </nav>
        
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
        
        <?php
    endwhile;
    ?>
</div>

<style>
.single-post {
    margin-bottom: 3rem;
}

.post-header {
    margin-bottom: 2rem;
}

.post-meta {
    font-family: var(--font-primary);
    font-size: 0.9rem;
    color: var(--color-light-gray);
    margin-bottom: 1rem;
}

.post-meta .separator {
    margin: 0 0.5rem;
    color: var(--color-primary);
}

.post-meta a {
    color: var(--color-gray);
}

.post-meta a:hover {
    color: var(--color-primary);
}

.post-title {
    font-size: 3rem;
    line-height: 1.2;
    margin-bottom: 0;
}

.post-featured-image {
    margin-bottom: 2rem;
    border-radius: var(--border-radius);
    overflow: hidden;
}

.post-featured-image img {
    width: 100%;
    height: auto;
}

.post-content {
    font-size: 1.1rem;
    line-height: 1.8;
}

.post-content h2,
.post-content h3,
.post-content h4 {
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.post-content p {
    margin-bottom: 1.5rem;
}

.post-content img {
    margin: 2rem 0;
    border-radius: var(--border-radius);
}

.post-content ul,
.post-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.post-content li {
    margin-bottom: 0.5rem;
}

.post-content code {
    font-size: 0.9em;
}

.post-content pre {
    margin: 2rem 0;
}

.post-footer {
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 2px solid var(--color-bg-alt);
}

.post-tags {
    font-family: var(--font-primary);
    font-size: 0.9rem;
}

.tags-label {
    color: var(--color-gray);
    margin-right: 0.5rem;
}

.post-tags a {
    display: inline-block;
    padding: 0.3rem 0.6rem;
    background-color: var(--color-bg-alt);
    border-radius: 4px;
    color: var(--color-gray);
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
}

.post-tags a:hover {
    background-color: var(--color-primary);
    color: white;
}

.post-navigation {
    display: flex;
    justify-content: space-between;
    gap: 2rem;
    padding: 2rem 0;
    margin: 3rem 0;
    border-top: 2px solid var(--color-bg-alt);
    border-bottom: 2px solid var(--color-bg-alt);
}

.post-navigation a {
    font-family: var(--font-primary);
    color: var(--color-primary);
    font-weight: 600;
}

.post-navigation a:hover {
    color: var(--color-secondary);
}

.nav-previous {
    flex: 1;
}

.nav-next {
    flex: 1;
    text-align: right;
}

@media (max-width: 768px) {
    .post-title {
        font-size: 2rem;
    }
    
    .post-navigation {
        flex-direction: column;
    }
    
    .nav-next {
        text-align: left;
    }
}
</style>

<?php
get_footer();
