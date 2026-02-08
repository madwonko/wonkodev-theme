<?php
/**
 * Page Template
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
        <article id="page-<?php the_ID(); ?>" <?php post_class('single-page'); ?>>
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="page-featured-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>
            
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        </article>
        
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
.single-page {
    margin-bottom: 3rem;
}

.page-header {
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--color-bg-alt);
}

.page-title {
    font-size: 3rem;
    line-height: 1.2;
}

.page-title::before {
    content: '// ';
    color: var(--color-primary);
}

.page-featured-image {
    margin-bottom: 2rem;
    border-radius: var(--border-radius);
    overflow: hidden;
}

.page-featured-image img {
    width: 100%;
    height: auto;
}

.page-content {
    font-size: 1.1rem;
    line-height: 1.8;
}

.page-content h2,
.page-content h3,
.page-content h4 {
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.page-content p {
    margin-bottom: 1.5rem;
}

.page-content img {
    margin: 2rem 0;
    border-radius: var(--border-radius);
}

.page-content ul,
.page-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.page-content li {
    margin-bottom: 0.5rem;
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }
}
</style>

<?php
get_footer();
