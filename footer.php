    </main><!-- #main -->

    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="footer-section">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php else : ?>
                    <div class="footer-section">
                        <h3>About Wonkodev</h3>
                        <p>Creating innovative WordPress plugins and development solutions with a quirky twist.</p>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <div class="footer-section">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php else : ?>
                    <div class="footer-section">
                        <h3>Quick Links</h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'container' => false,
                            'fallback_cb' => false,
                        ));
                        ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <div class="footer-section">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php else : ?>
                    <div class="footer-section">
                        <h3>Connect</h3>
                        <ul>
                            <li><a href="https://github.com/wonkodev" target="_blank">GitHub</a></li>
                            <li><a href="https://twitter.com/wonkodev" target="_blank">Twitter</a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Built with code and creativity.</p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
