<?php
/**
 * Front Page Template
 *
 * @package PJDesigns
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero" id="home">
    <?php
    $hero_images = get_field('hero_images');
    if( $hero_images && is_array($hero_images) ):
        foreach( $hero_images as $index => $image ):
            $active_class = ($index === 0) ? 'active' : '';
            ?>
            <div class="hero-slide <?php echo $active_class; ?>" style="background-image: url('<?php echo esc_url($image['image']); ?>');"></div>
        <?php endforeach;
    else:
        // Default hero images
        ?>
        <div class="hero-slide active" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner.png');"></div>
        <div class="hero-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner2.png');"></div>
        <div class="hero-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner3.png');"></div>
        <div class="hero-slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/banner4.jpg');"></div>
    <?php endif; ?>

    <div class="hero-content">
        <h1><?php echo esc_html( get_field('hero_title') ?: 'Creative Design Solutions' ); ?></h1>
        <p><?php echo esc_html( get_field('hero_subtitle') ?: 'Transforming Ideas Into Stunning Visual Experiences' ); ?></p>
        <p><?php echo esc_html( get_field('hero_tagline') ?: 'Since 2004' ); ?></p>
        <a href="<?php echo esc_url( get_field('hero_button_link') ?: '#contact' ); ?>" class="cta-button">
            <?php echo esc_html( get_field('hero_button_text') ?: 'Let\'s Work Together' ); ?>
        </a>
    </div>
</section>

<!-- Brands Carousel Section -->
<section class="brands" id="brands">
    <div class="section-divider">
        <svg viewBox="0 0 1200 100" preserveAspectRatio="none">
            <path d="M0,50 Q300,0 600,50 T1200,50 L1200,0 L0,0 Z" fill="#5baec7" opacity="0.2" class="wave-animation-right" />
            <path d="M0,50 Q300,100 600,50 T1200,50 L1200,0 L0,0 Z" fill="#5baec7" opacity="0.3" class="wave-animation-left" />
        </svg>
    </div>

    <h2 class="brands-title"><?php echo esc_html( get_field('brands_title') ?: 'Featured Brand Partners' ); ?></h2>

    <?php
    $brands_intro = get_field('brands_intro');
    if( $brands_intro ): ?>
        <p style="text-align: center; color: var(--text-light); max-width: 800px; margin: 0 auto 2rem; font-size: 1.1rem;">
            <?php echo esc_html($brands_intro); ?>
        </p>
    <?php else: ?>
        <p style="text-align: center; color: var(--text-light); max-width: 800px; margin: 0 auto 2rem; font-size: 1.1rem;">
            PJ Designs maintains retail accounts with almost any fabric, wallpaper, furniture, lighting, carpet, and paint brand. These are just some highlights of companies we've offered since 2004.
        </p>
    <?php endif; ?>

    <div class="carousel-container">
        <div class="carousel-wrapper">
            <?php
            $brands = get_field('brands');
            if( $brands && is_array($brands) ):
                foreach( $brands as $index => $brand ):
                    $active_class = ($index === 0) ? 'active' : '';
                    ?>
                    <div class="carousel-slide <?php echo $active_class; ?>">
                        <div class="brand-logo">
                            <?php if( isset($brand['logo']) && $brand['logo'] ): ?>
                                <img src="<?php echo esc_url($brand['logo']['url']); ?>" alt="<?php echo esc_attr($brand['logo']['alt'] ?: 'Brand Logo'); ?>" />
                            <?php endif; ?>
                        </div>
                        <?php if( isset($brand['tagline']) ): ?>
                            <div class="brand-tagline"><?php echo esc_html($brand['tagline']); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach;
            else:
                // Default brands - you can remove this fallback in production
                echo '<!-- Add brands via ACF in WordPress admin -->';
            endif;
            ?>
        </div>

        <?php if( $brands && is_array($brands) && count($brands) > 1 ): ?>
            <div class="carousel-dots">
                <?php foreach( $brands as $index => $brand ):
                    $active_class = ($index === 0) ? 'active' : '';
                    ?>
                    <span class="dot <?php echo $active_class; ?>" data-slide="<?php echo $index; ?>"></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- About Section -->
<section id="about">
    <h2 class="section-title"><?php echo esc_html( get_field('about_title') ?: 'About PJ Designs' ); ?></h2>

    <?php
    $about_content = get_field('about_content');
    if( $about_content ): ?>
        <div style="max-width: 900px; margin: 0 auto 3rem; padding: 0 2rem; text-align: center; color: var(--text-dark); font-size: 1.1rem; line-height: 1.8;">
            <?php echo wp_kses_post($about_content); ?>
        </div>
    <?php else: ?>
        <!-- Default about content -->
        <div style="max-width: 900px; margin: 0 auto 3rem; padding: 0 2rem; text-align: center; color: var(--text-dark); font-size: 1.1rem; line-height: 1.8;">
            <p style="margin-bottom: 1.5rem;">
                Since 2004, PJ Designs is a full-service interior design and retail furniture business. We specialize in custom window treatments, especially Hunter Douglas blinds, shades and shutters as well as soft/fabric treatments like drapes, Roman shades, cornices and valances – really just about anything you can imagine.
            </p>
            <p style="margin-bottom: 1.5rem;">
                We offer you best quality fabrics in many price ranges, excellent workmanship and professional installation. Below are listed some furniture, lighting and fabric brands to inspire you.
            </p>
            <p style="margin-bottom: 1.5rem;">
                As we entered our 22nd year in business in Shenandoah County, VA, we sold our Woodstock location and moved to Edinburg – where you can meet us, by appointment, to suit your schedule.
            </p>
            <p>
                We have three contacts for you to talk with us: our familiar Woodstock phone number <strong>540-459-8307</strong>, or our cell, <strong>202-744-4898</strong> where you can text or leave us a voice mail if we miss you.
            </p>
        </div>
    <?php endif; ?>

    <div class="about-gallery">
        <?php
        $about_gallery = get_field('about_gallery');
        if( $about_gallery && is_array($about_gallery) ):
            foreach( $about_gallery as $image_item ):
                if( isset($image_item['image']) ):
                    ?>
                    <div class="about-gallery-image">
                        <img src="<?php echo esc_url($image_item['image']['url']); ?>" alt="<?php echo esc_attr($image_item['image']['alt'] ?: 'PJ Designs Work'); ?>" />
                    </div>
                <?php endif;
            endforeach;
        else:
            // Default images
            ?>
            <div class="about-gallery-image">
                <img src="https://pjdesignsva.com/wp-content/uploads/2020/09/bathroom1.jpg" alt="PJ Designs Interior Work" />
            </div>
            <div class="about-gallery-image">
                <img src="https://pjdesignsva.com/wp-content/uploads/2020/08/hero-img-1.jpg" alt="PJ Designs Project" />
            </div>
            <div class="about-gallery-image">
                <img src="https://pjdesignsva.com/wp-content/uploads/2014/03/pjdesigns002-1024x682.jpg" alt="PJ Designs Portfolio" />
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Services Section -->
<section class="services" id="services">
    <h2 class="section-title"><?php echo esc_html( get_field('services_title') ?: 'Our Services' ); ?></h2>

    <div class="services-grid">
        <?php
        $services = get_field('services');
        if( $services && is_array($services) ):
            foreach( $services as $index => $service ):
                $card_type = isset($service['card_type']) ? $service['card_type'] : 'solid';
                $bg_color = isset($service['bg_color']) ? $service['bg_color'] : 'primary';

                $style = '';
                $bg_class = '';

                if( $card_type === 'background' && isset($service['image']) ):
                    $style = 'style="background-image: url(' . esc_url($service['image']['url']) . '); background-size: cover; background-position: center;"';
                elseif( $card_type === 'solid' ):
                    $bg_class = 'background: var(--' . ($bg_color === 'accent' ? 'accent' : 'primary') . '-color);';
                    $style = 'style="' . $bg_class . '"';
                endif;
                ?>

                <div class="service-card fade-in" <?php echo $style; ?>>
                    <div class="service-content">
                        <?php if( $card_type === 'solid' && isset($service['image']) ): ?>
                            <img src="<?php echo esc_url($service['image']['url']); ?>" alt="<?php echo esc_attr($service['image']['alt'] ?: $service['title']); ?>" class="service-image" />
                        <?php endif; ?>

                        <h3><?php echo esc_html($service['title']); ?></h3>
                        <p><?php echo esc_html($service['description']); ?></p>
                    </div>
                </div>
            <?php endforeach;
        else:
            // Default services - you can remove this in production
            echo '<!-- Add services via ACF in WordPress admin -->';
        endif;
        ?>
    </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio">
    <div class="section-divider">
        <svg viewBox="0 0 1200 100" preserveAspectRatio="none">
            <path d="M0,50 Q300,0 600,50 T1200,50 L1200,0 L0,0 Z" fill="#f9ad4a" opacity="0.2" class="wave-animation-right" />
            <path d="M0,50 Q300,100 600,50 T1200,50 L1200,0 L0,0 Z" fill="#f9ad4a" opacity="0.3" class="wave-animation-left" />
        </svg>
    </div>

    <h2 class="section-title"><?php echo esc_html( get_field('portfolio_title') ?: 'Our Work' ); ?></h2>

    <div class="image-gallery">
        <?php
        $portfolio_images = get_field('portfolio_images');
        if( $portfolio_images && is_array($portfolio_images) ):
            foreach( $portfolio_images as $image_item ):
                if( isset($image_item['image']) ):
                    ?>
                    <div class="gallery-image">
                        <img src="<?php echo esc_url($image_item['image']['url']); ?>" alt="<?php echo esc_attr($image_item['image']['alt'] ?: 'Portfolio Image'); ?>" />
                    </div>
                <?php endif;
            endforeach;
        else:
            // Default portfolio images
            echo '<!-- Add portfolio images via ACF in WordPress admin -->';
        endif;
        ?>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox">
    <span class="lightbox-close">&times;</span>
    <img class="lightbox-content" id="lightbox-img" alt="Gallery Image" />
</div>

<!-- Calendly Booking Section -->
<section class="calendly" id="booking">
    <div class="section-divider">
        <svg viewBox="0 0 1200 100" preserveAspectRatio="none">
            <path d="M0,50 Q300,0 600,50 T1200,50 L1200,0 L0,0 Z" fill="#5baec7" opacity="0.2" class="wave-animation-right" />
            <path d="M0,50 Q300,100 600,50 T1200,50 L1200,0 L0,0 Z" fill="#5baec7" opacity="0.3" class="wave-animation-left" />
        </svg>
    </div>

    <h2 class="section-title"><?php echo esc_html( get_field('booking_title') ?: 'Schedule a Consultation' ); ?></h2>

    <div class="calendly-container">
        <div class="calendly-intro fade-in">
            <p>
                <?php echo esc_html( get_field('booking_intro') ?: 'Ready to transform your space? Book a consultation with PJ Designs. We\'ll discuss your vision, explore design possibilities, and create a plan tailored to your unique style and needs.' ); ?>
            </p>
        </div>

        <div class="calendly-widget fade-in">
            <?php
            $calendly_url = get_field('calendly_url');
            if( $calendly_url ): ?>
                <!-- Calendly inline widget -->
                <div class="calendly-inline-widget" data-url="<?php echo esc_url($calendly_url); ?>" style="min-width:320px;height:630px;"></div>
                <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
            <?php else: ?>
                <div id="calendly-embed-container">
                    <p style="color: var(--text-light); padding: 3rem">
                        Calendly booking widget will be integrated here.<br /><br />
                        <strong>To complete the integration:</strong><br />
                        1. Add your Calendly URL in the WordPress admin under "Booking Section" ACF fields<br />
                        2. The Calendly widget will automatically appear here
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact" id="contact">
    <h2 class="section-title"><?php echo esc_html( get_field('contact_title') ?: 'Get In Touch' ); ?></h2>

    <div class="contact-content">
        <div class="contact-info fade-in">
            <h3><?php echo esc_html( get_field('contact_heading') ?: 'Let\'s Create Something Amazing' ); ?></h3>
            <p>
                <?php echo esc_html( get_field('contact_intro') ?: 'Ready to start your next project? We\'d love to hear from you. Get in touch and let\'s discuss how we can bring your vision to life.' ); ?>
            </p>

            <div class="contact-details">
                <?php if( get_field('contact_email') ): ?>
                    <div class="contact-item">
                        <i class="fa-solid fa-envelope"></i>
                        <span><?php echo esc_html( get_field('contact_email') ); ?></span>
                    </div>
                <?php endif; ?>

                <?php if( get_field('contact_phone') ): ?>
                    <div class="contact-item">
                        <i class="fa-solid fa-phone"></i>
                        <span><?php echo esc_html( get_field('contact_phone') ); ?></span>
                    </div>
                <?php endif; ?>

                <?php if( get_field('contact_location') ): ?>
                    <div class="contact-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <span><?php echo esc_html( get_field('contact_location') ); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <form class="contact-form fade-in" id="contactForm">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Send Message</button>
        </form>
    </div>
</section>

<?php get_footer(); ?>
