<?php
/**
 * Main template file
 *
 * @package Wonkodev
 */

get_header();
?>

<div class="container py-4">
    <div class="content-area">
        <?php if (have_posts()) : ?>
            
            <header class="page-header">
                <?php
                if (is_home() && !is_front_page()) :
                    ?>
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                    <?php
                else :
                    ?>
                    <h1 class="page-title">// Latest Posts</h1>
                    <?php
                endif;
                ?>
            </header>

            <div class="posts-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('wonkodev-featured'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <header class="post-header">
                                <div class="post-meta">
                                    <time datetime="<?php echo get_the_date('c'); ?>">
                                        <?php echo get_the_date(); ?>
                                    </time>
                                    <span class="separator">//</span>
                                    <span class="post-author">By <?php the_author(); ?></span>
                                </div>
                                
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                            </header>
                            
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <div class="post-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    → Read More
                                </a>
                                
                                <?php if (has_category()) : ?>
                                    <div class="post-categories">
                                        <?php the_category(' '); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            the_posts_pagination(array(
                'prev_text' => '← Previous',
                'next_text' => 'Next →',
            ));
            ?>

        <?php else : ?>
            
            <div class="no-results">
                <h1 class="page-title">// Nothing Found</h1>
                <p>No posts were found. Try searching for what you're looking for.</p>
                <?php get_search_form(); ?>
            </div>

        <?php endif; ?>
    </div>
</div>

<style>
.posts-grid {
    display: grid;
    gap: 2rem;
    margin-top: 2rem;
}

.post-card {
    background: white;
    border: 2px solid var(--color-bg-alt);
    border-radius: var(--border-radius);
    overflow: hidden;
    transition: var(--transition);
}

.post-card:hover {
    border-color: var(--color-primary);
    box-shadow: 0 10px 30px rgba(16, 185, 129, 0.1);
}

.post-thumbnail img {
    width: 100%;
    height: auto;
    display: block;
}

.post-content {
    padding: 2rem;
}

.post-meta {
    font-family: var(--font-primary);
    font-size: 0.9rem;
    color: var(--color-light-gray);
    margin-bottom: 0.5rem;
}

.post-meta .separator {
    margin: 0 0.5rem;
    color: var(--color-primary);
}

.post-title {
    margin-bottom: 1rem;
}

.post-title a {
    color: var(--color-dark);
}

.post-title a:hover {
    color: var(--color-primary);
}

.post-excerpt {
    color: var(--color-gray);
    line-height: 1.7;
    margin-bottom: 1.5rem;
}

.post-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 1px solid var(--color-bg-alt);
}

.read-more {
    font-family: var(--font-primary);
    color: var(--color-primary);
    font-weight: 600;
}

.post-categories {
    display: flex;
    gap: 0.5rem;
}

.post-categories a {
    font-size: 0.8rem;
    padding: 0.3rem 0.6rem;
    background-color: var(--color-bg-alt);
    border-radius: 4px;
    color: var(--color-gray);
    font-family: var(--font-primary);
}

.pagination {
    margin-top: 3rem;
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.pagination a,
.pagination span {
    font-family: var(--font-primary);
    padding: 0.5rem 1rem;
    border: 2px solid var(--color-bg-alt);
    border-radius: var(--border-radius);
    color: var(--color-dark);
}

.pagination a:hover,
.pagination .current {
    border-color: var(--color-primary);
    background-color: var(--color-primary);
    color: white;
}

.no-results {
    text-align: center;
    padding: 4rem 2rem;
}

.no-results p {
    color: var(--color-gray);
    margin-bottom: 2rem;
}
</style>

<?php
get_footer();
