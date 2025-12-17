<?php
/**
 * Hero Section Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_Hero_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_hero';
    }

    public function get_title() {
        return __('DK Hero Section', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Contenu', 'digital-kappa'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'badge_text',
            [
                'label'   => __('Badge', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Marketplace de confiance', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Titre', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Découvrez nos produits digitaux', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'title_highlight',
            [
                'label'   => __('Titre en surbrillance (couleur or)', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('de qualité professionnelle', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => __('Description', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Des outils et ressources créés par des experts pour vous aider à réussir vos projets.', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'primary_button_text',
            [
                'label'   => __('Bouton principal', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explorer le catalogue', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'primary_button_url',
            [
                'label' => __('URL du bouton principal', 'digital-kappa'),
                'type'  => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'secondary_button_text',
            [
                'label'   => __('Bouton secondaire', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Comment ça marche', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'secondary_button_url',
            [
                'label' => __('URL du bouton secondaire', 'digital-kappa'),
                'type'  => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'show_featured_products',
            [
                'label'        => __('Afficher produits vedettes', 'digital-kappa'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __('Oui', 'digital-kappa'),
                'label_off'    => __('Non', 'digital-kappa'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'digital-kappa'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label'     => __('Couleur de fond', 'digital-kappa'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#f9fafb',
                'selectors' => [
                    '{{WRAPPER}} .hero-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="hero-section relative overflow-hidden px-4 lg:px-20 py-12 lg:py-20">
            <!-- Decorative blur -->
            <div class="absolute top-0 right-0 lg:right-1/4 w-64 h-64 bg-[rgba(210,163,11,0.05)] rounded-full blur-3xl -z-10"></div>

            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                    <!-- Content -->
                    <div class="space-y-6 text-center lg:text-left order-2 lg:order-1">
                        <?php if (!empty($settings['badge_text'])) : ?>
                            <div class="hero-badge inline-flex items-center gap-2">
                                <div class="dot w-2 h-2 bg-dk-gold rounded-full"></div>
                                <span class="text-sm text-dk-text-primary-alt"><?php echo esc_html($settings['badge_text']); ?></span>
                            </div>
                        <?php endif; ?>

                        <h1 class="text-dk-text-primary-alt">
                            <?php echo esc_html($settings['title']); ?>
                            <?php if (!empty($settings['title_highlight'])) : ?>
                                <span class="text-dk-gold"><?php echo esc_html($settings['title_highlight']); ?></span>
                            <?php endif; ?>
                        </h1>

                        <?php if (!empty($settings['description'])) : ?>
                            <p class="hero-description text-dk-text-muted text-lg">
                                <?php echo esc_html($settings['description']); ?>
                            </p>
                        <?php endif; ?>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <?php if (!empty($settings['primary_button_text'])) : ?>
                                <a href="<?php echo esc_url($settings['primary_button_url']['url'] ?? '#'); ?>" class="btn-dk-primary">
                                    <?php echo esc_html($settings['primary_button_text']); ?>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($settings['secondary_button_text'])) : ?>
                                <a href="<?php echo esc_url($settings['secondary_button_url']['url'] ?? '#'); ?>" class="btn-dk-secondary">
                                    <?php echo esc_html($settings['secondary_button_text']); ?>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Featured Products -->
                    <?php if ($settings['show_featured_products'] === 'yes') : ?>
                        <div class="order-1 lg:order-2">
                            <div class="grid grid-cols-2 gap-4">
                                <?php
                                $featured_products = new WP_Query(array(
                                    'post_type'      => 'dk_product',
                                    'posts_per_page' => 2,
                                    'orderby'        => 'rand',
                                ));

                                if ($featured_products->have_posts()) :
                                    while ($featured_products->have_posts()) : $featured_products->the_post();
                                        echo digital_kappa_product_card(get_the_ID());
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                    // Fallback cards
                                    ?>
                                    <div class="product-card">
                                        <div class="product-card-image aspect-[4/3] bg-gradient-to-br from-dk-gold to-dk-gold-hover flex items-center justify-center">
                                            <i data-lucide="book-open" class="w-12 h-12 text-white"></i>
                                        </div>
                                        <div class="product-card-content">
                                            <h3 class="product-card-title"><?php esc_html_e('Guide du développeur moderne', 'digital-kappa'); ?></h3>
                                            <p class="product-card-description"><?php esc_html_e('Ebook complet pour maîtriser les outils et pratiques du développement moderne.', 'digital-kappa'); ?></p>
                                            <div class="product-card-footer">
                                                <span class="product-card-price">59 €</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card">
                                        <div class="product-card-image aspect-[4/3] bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center">
                                            <i data-lucide="layout-template" class="w-12 h-12 text-white"></i>
                                        </div>
                                        <div class="product-card-content">
                                            <h3 class="product-card-title"><?php esc_html_e('Design System Pro', 'digital-kappa'); ?></h3>
                                            <p class="product-card-description"><?php esc_html_e('Système de design complet avec composants React et Figma.', 'digital-kappa'); ?></p>
                                            <div class="product-card-footer">
                                                <span class="product-card-price">149 €</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
