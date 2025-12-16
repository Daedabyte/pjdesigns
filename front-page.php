<?php
/**
 * Front Page Template
 * ACF Free Version - Using Individual Fields
 *
 * @package PJDesigns
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero" id="home">
    <?php
    // Get individual hero images (ACF Free)
    $hero_images = array();
    for($i = 1; $i <= 4; $i++) {
        $image_url = get_field('hero_image_' . $i);
        if($image_url) {
            $hero_images[] = $image_url;
        }
    }

    if( !empty($hero_images) ):
        foreach( $hero_images as $index => $image_url ):
            $active_class = ($index === 0) ? 'active' : '';
            ?>
            <div class="hero-slide <?php echo $active_class; ?>" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
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
            // Get individual brand fields (ACF Free)
            $brands = array();
            for($i = 1; $i <= 4; $i++) {
                $logo = get_field('brand_' . $i . '_logo');
                $tagline = get_field('brand_' . $i . '_tagline');
                if($logo) {
                    $brands[] = array('logo' => $logo, 'tagline' => $tagline);
                }
            }

            if( !empty($brands) ):
                foreach( $brands as $index => $brand ):
                    $active_class = ($index === 0) ? 'active' : '';
                    ?>
                    <div class="carousel-slide <?php echo $active_class; ?>">
                        <div class="brand-logo">
                            <img src="<?php echo esc_url($brand['logo']['url']); ?>" alt="<?php echo esc_attr($brand['logo']['alt'] ?: 'Brand Logo'); ?>" />
                        </div>
                        <?php if( $brand['tagline'] ): ?>
                            <div class="brand-tagline"><?php echo esc_html($brand['tagline']); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach;
            else:
                // Default brands
                ?>
                <div class="carousel-slide active">
                    <div class="brand-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/fabricut.png" alt="Fabricut" />
                    </div>
                    <div class="brand-tagline">Premium Fabrics & Textiles</div>
                </div>
                <div class="carousel-slide">
                    <div class="brand-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sharris.png" alt="Samuel & Sons" />
                    </div>
                    <div class="brand-tagline">Luxury Trimmings & Passementerie</div>
                </div>
                <div class="carousel-slide">
                    <div class="brand-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/curry-logo.jpg" alt="Curry & Company" />
                    </div>
                    <div class="brand-tagline">Designer Lighting & Mirrors</div>
                </div>
                <div class="carousel-slide">
                    <div class="brand-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/Hartmann&Forbes.png" alt="Hartmann&Forbes" />
                    </div>
                    <div class="brand-tagline">Natural Window Coverings</div>
                </div>
            <?php endif; ?>
        </div>

        <?php if( !empty($brands) && count($brands) > 1 ): ?>
            <div class="carousel-dots">
                <?php foreach( $brands as $index => $brand ):
                    $active_class = ($index === 0) ? 'active' : '';
                    ?>
                    <span class="dot <?php echo $active_class; ?>" data-slide="<?php echo $index; ?>"></span>
                <?php endforeach; ?>
            </div>
        <?php elseif( empty($brands) ): ?>
            <div class="carousel-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
                <span class="dot" data-slide="2"></span>
                <span class="dot" data-slide="3"></span>
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
        // Get individual about images (ACF Free)
        $about_images = array();
        for($i = 1; $i <= 3; $i++) {
            $image = get_field('about_image_' . $i);
            if($image) {
                $about_images[] = $image;
            }
        }

        if( !empty($about_images) ):
            foreach( $about_images as $image ):
                ?>
                <div class="about-gallery-image">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: 'PJ Designs Work'); ?>" />
                </div>
            <?php endforeach;
        else:
            // Default images
            ?>
            <div class="about-gallery-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/carpets.jpg" alt="PJ Designs Carpets" />
            </div>
            <div class="about-gallery-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/painting-colors.jpg" alt="PJ Designs Paint Colors" />
            </div>
            <div class="about-gallery-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/window-blinds.jpg" alt="PJ Designs Window Treatments" />
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Services Section -->
<section class="services" id="services">
    <h2 class="section-title"><?php echo esc_html( get_field('services_title') ?: 'Our Services' ); ?></h2>

    <div class="services-grid">
        <?php
        // Get individual service fields (ACF Free)
        $services = array();
        for($i = 1; $i <= 6; $i++) {
            $title = get_field('service_' . $i . '_title');
            if($title) {
                $services[] = array(
                    'title' => $title,
                    'description' => get_field('service_' . $i . '_description'),
                    'card_type' => get_field('service_' . $i . '_type') ?: 'solid',
                    'image' => get_field('service_' . $i . '_image'),
                    'bg_color' => get_field('service_' . $i . '_bg_color') ?: 'primary',
                );
            }
        }

        if( !empty($services) ):
            foreach( $services as $service ):
                $card_type = $service['card_type'];
                $bg_color = $service['bg_color'];

                $style = '';
                $bg_class = '';

                if( $card_type === 'background' && $service['image'] ):
                    $style = 'style="background-image: url(' . esc_url($service['image']['url']) . '); background-size: cover; background-position: center;"';
                elseif( $card_type === 'solid' ):
                    $bg_class = 'background: var(--' . ($bg_color === 'accent' ? 'accent' : 'primary') . '-color);';
                    $style = 'style="' . $bg_class . '"';
                endif;
                ?>

                <div class="service-card fade-in" <?php echo $style; ?>>
                    <div class="service-content">
                        <?php if( $card_type === 'solid' && $service['image'] ): ?>
                            <img src="<?php echo esc_url($service['image']['url']); ?>" alt="<?php echo esc_attr($service['image']['alt'] ?: $service['title']); ?>" class="service-image" />
                        <?php endif; ?>

                        <h3><?php echo esc_html($service['title']); ?></h3>
                        <p><?php echo esc_html($service['description']); ?></p>
                    </div>
                </div>
            <?php endforeach;
        else:
            // Default services with theme images
            $default_services = array(
                array(
                    'title' => 'Window Treatments',
                    'description' => 'Custom drapes, blinds, shades, and shutters tailored to your space',
                    'image' => get_template_directory_uri() . '/images/blinds.jpg',
                    'card_type' => 'background'
                ),
                array(
                    'title' => 'Interior Design',
                    'description' => 'Full-service design consultation for residential and commercial spaces',
                    'image' => get_template_directory_uri() . '/images/furniture.jpg',
                    'bg_color' => 'primary'
                ),
                array(
                    'title' => 'Custom Furniture',
                    'description' => 'Bespoke furniture pieces designed to match your aesthetic',
                    'image' => get_template_directory_uri() . '/images/upolstry.jpg',
                    'bg_color' => 'accent'
                ),
                array(
                    'title' => 'Lighting Design',
                    'description' => 'Elegant lighting solutions to illuminate your interiors',
                    'image' => get_template_directory_uri() . '/images/ligihting-image.png',
                    'bg_color' => 'primary'
                ),
                array(
                    'title' => 'Paint & Wallpaper',
                    'description' => 'Expert color consultation and wallpaper installation',
                    'image' => get_template_directory_uri() . '/images/paint-painting.jpg',
                    'bg_color' => 'accent'
                ),
                array(
                    'title' => 'Home Accessories',
                    'description' => 'Curated selection of decorative accessories and accents',
                    'image' => get_template_directory_uri() . '/images/accesories.jpg',
                    'bg_color' => 'primary'
                ),
            );

            foreach($default_services as $service):
                if(isset($service['card_type']) && $service['card_type'] === 'background'):
                    $style = 'style="background-image: url(' . esc_url($service['image']) . '); background-size: cover; background-position: center;"';
                else:
                    $bg_color = isset($service['bg_color']) ? $service['bg_color'] : 'primary';
                    $style = 'style="background: var(--' . ($bg_color === 'accent' ? 'accent' : 'primary') . '-color);"';
                endif;
                ?>
                <div class="service-card fade-in" <?php echo $style; ?>>
                    <div class="service-content">
                        <?php if(!isset($service['card_type']) || $service['card_type'] !== 'background'): ?>
                            <img src="<?php echo esc_url($service['image']); ?>" alt="<?php echo esc_attr($service['title']); ?>" class="service-image" />
                        <?php endif; ?>
                        <h3><?php echo esc_html($service['title']); ?></h3>
                        <p><?php echo esc_html($service['description']); ?></p>
                    </div>
                </div>
            <?php endforeach;
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
        // Get individual portfolio images (ACF Free)
        $portfolio_images = array();
        for($i = 1; $i <= 12; $i++) {
            $image = get_field('portfolio_image_' . $i);
            if($image) {
                $portfolio_images[] = $image;
            }
        }

        if( !empty($portfolio_images) ):
            foreach( $portfolio_images as $image ):
                ?>
                <div class="gallery-image">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: 'Portfolio Image'); ?>" />
                </div>
            <?php endforeach;
        else:
            // Default portfolio images
            $default_portfolio = array(
                'image2.png', 'image3.png', 'image4.png',
                'image5.png', 'image6.png', 'image7.png',
                'DSC02356-scaled.jpg', 'Untitled.png'
            );
            foreach($default_portfolio as $img):
                ?>
                <div class="gallery-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $img; ?>" alt="Portfolio Image" />
                </div>
            <?php endforeach;
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
