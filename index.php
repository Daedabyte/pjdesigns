<?php
/**
 * Main Index Template
 *
 * This is the fallback template for WordPress.
 * Since we're using front-page.php for the homepage,
 * this template handles other contexts.
 *
 * @package PJDesigns
 */

get_header(); ?>

<section style="padding: 8rem 2rem 5rem; text-align: center; min-height: 60vh;">
    <div style="max-width: 800px; margin: 0 auto;">
        <h1 style="color: var(--primary-color); margin-bottom: 1.5rem;">
            <?php
            if ( is_home() ) {
                echo 'Welcome to ' . get_bloginfo( 'name' );
            } elseif ( is_404() ) {
                echo 'Page Not Found';
            } else {
                the_title();
            }
            ?>
        </h1>

        <?php if ( is_404() ): ?>
            <p style="font-size: 1.2rem; color: var(--text-light); margin-bottom: 2rem;">
                Sorry, the page you're looking for doesn't exist.
            </p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cta-button">
                Return to Homepage
            </a>
        <?php else: ?>
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div style="text-align: left; margin-bottom: 2rem;">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="font-size: 1.2rem; color: var(--text-light);">
                    No content found. Please visit the <a href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage</a>.
                </p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
