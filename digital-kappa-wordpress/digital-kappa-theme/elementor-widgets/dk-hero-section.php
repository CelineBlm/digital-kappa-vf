<?php
/**
 * Elementor Widget: DK Hero Section
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Hero_Section_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_hero_section';
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
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Contenu', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'badge_text',
            [
                'label' => __('Texte du badge', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Lancement officiel - Nouveaux produits disponibles',
            ]
        );

        $this->add_control(
            'title_line_1',
            [
                'label' => __('Titre ligne 1', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Marketplace de',
            ]
        );

        $this->add_control(
            'title_line_2',
            [
                'label' => __('Titre ligne 2 (accent)', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'produits digitaux',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Découvrez une sélection de produits digitaux de qualité : applications mobiles, ebooks et templates pour booster votre productivité. Achat simple en un clic, téléchargement immédiat, accès à vie.",
            ]
        );

        $this->add_control(
            'button_primary_text',
            [
                'label' => __('Bouton principal', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Explorer les produits',
            ]
        );

        $this->add_control(
            'button_primary_link',
            [
                'label' => __('Lien bouton principal', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '/boutique/',
                ],
            ]
        );

        $this->add_control(
            'button_secondary_text',
            [
                'label' => __('Bouton secondaire', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Comment ça marche',
            ]
        );

        $this->add_control(
            'button_secondary_link',
            [
                'label' => __('Lien bouton secondaire', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '/comment-ca-marche/',
                ],
            ]
        );

        $this->end_controls_section();

        // Images Section
        $this->start_controls_section(
            'images_section',
            [
                'label' => __('Images', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'main_image',
            [
                'label' => __('Image principale (Applications)', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?w=800',
                ],
            ]
        );

        $this->add_control(
            'main_image_title',
            [
                'label' => __('Titre image principale', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Applications mobiles',
            ]
        );

        $this->add_control(
            'main_image_subtitle',
            [
                'label' => __('Sous-titre image principale', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => "Applications prêtes à l'emploi",
            ]
        );

        $this->add_control(
            'secondary_image_1',
            [
                'label' => __('Image secondaire 1 (Ebooks)', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=400',
                ],
            ]
        );

        $this->add_control(
            'secondary_image_1_title',
            [
                'label' => __('Titre image secondaire 1', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Ebooks',
            ]
        );

        $this->add_control(
            'secondary_image_1_subtitle',
            [
                'label' => __('Sous-titre image secondaire 1', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Guides & formations',
            ]
        );

        $this->add_control(
            'secondary_image_2',
            [
                'label' => __('Image secondaire 2 (Templates)', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=400',
                ],
            ]
        );

        $this->add_control(
            'secondary_image_2_title',
            [
                'label' => __('Titre image secondaire 2', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Templates',
            ]
        );

        $this->add_control(
            'secondary_image_2_subtitle',
            [
                'label' => __('Sous-titre image secondaire 2', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Design & code',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $primary_link = !empty($settings['button_primary_link']['url']) ? $settings['button_primary_link']['url'] : '/boutique/';
        $secondary_link = !empty($settings['button_secondary_link']['url']) ? $settings['button_secondary_link']['url'] : '/comment-ca-marche/';
        ?>
        <section class="hero-section-dk bg-gray-50 relative overflow-hidden px-4 lg:px-20 py-8 lg:py-12">
            <div class="container-dk max-w-7xl mx-auto grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- Left content -->
                <div class="hero-content space-y-6">
                    <div class="hero-badge inline-flex items-center gap-2 bg-white border border-gray-100 rounded-full px-4 py-2 shadow-sm">
                        <div class="w-2 h-2 bg-[#d2a30b] rounded-full"></div>
                        <p class="text-sm text-[#0d1421]"><?php echo esc_html($settings['badge_text']); ?></p>
                    </div>

                    <h1 class="text-[#0d1421] leading-tight">
                        <div class="mb-1"><?php echo esc_html($settings['title_line_1']); ?></div>
                        <div class="text-[#d2a30b]"><?php echo esc_html($settings['title_line_2']); ?></div>
                    </h1>

                    <p class="hero-description text-[rgba(13,20,33,0.7)]"><?php echo esc_html($settings['description']); ?></p>

                    <div class="hero-buttons flex flex-col sm:flex-row gap-3">
                        <a href="<?php echo esc_url($primary_link); ?>" class="btn-dk-primary bg-[#d2a30b] text-white px-6 py-3 rounded-lg hover:bg-[#b8900a] transition-colors text-center">
                            <?php echo esc_html($settings['button_primary_text']); ?>
                        </a>
                        <a href="<?php echo esc_url($secondary_link); ?>" class="btn-dk-secondary bg-white text-[#d2a30b] border border-[#d2a30b] px-6 py-3 rounded-lg hover:bg-[#fffbf0] transition-colors text-center">
                            <?php echo esc_html($settings['button_secondary_text']); ?>
                        </a>
                    </div>
                </div>

                <!-- Right content - Featured products -->
                <div class="hero-image-grid relative min-h-[450px] lg:min-h-[500px]">
                    <!-- Decorative blur -->
                    <div class="absolute top-0 right-0 lg:right-10 w-64 h-64 bg-[rgba(210,163,11,0.1)] rounded-full blur-3xl -z-10"></div>

                    <!-- Large card - Applications mobiles -->
                    <div class="hero-image-card w-full max-w-[450px] mx-auto lg:mx-0 bg-white rounded-2xl border border-[#f0f2f5] shadow-xl overflow-hidden mb-4">
                        <div class="relative h-[180px] overflow-hidden">
                            <img src="<?php echo esc_url($settings['main_image']['url']); ?>" alt="<?php echo esc_attr($settings['main_image_title']); ?>" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-b from-[rgba(13,20,33,0.6)] via-[rgba(13,20,33,0.15)] via-20% to-transparent"></div>
                            <div class="absolute top-4 left-4 bg-[#d2a30b] px-2 py-1.5 rounded-lg">
                                <p class="text-white text-xs">Populaire</p>
                            </div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <h3 class="font-['Merriweather',serif] text-white mb-1"><?php echo esc_html($settings['main_image_title']); ?></h3>
                                <p class="text-xs text-[rgba(255,255,255,0.7)]"><?php echo esc_html($settings['main_image_subtitle']); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Small cards -->
                    <div class="flex gap-4 max-w-[450px] mx-auto lg:mx-0">
                        <div class="flex-1 bg-white rounded-2xl border border-[#f0f2f5] shadow-xl overflow-hidden">
                            <div class="relative h-[220px] overflow-hidden">
                                <img src="<?php echo esc_url($settings['secondary_image_1']['url']); ?>" alt="<?php echo esc_attr($settings['secondary_image_1_title']); ?>" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-b from-[rgba(13,20,33,0.6)] via-[rgba(13,20,33,0.15)] via-20% to-transparent"></div>
                                <div class="absolute bottom-3 left-3 right-3">
                                    <h4 class="font-['Merriweather',serif] text-white text-sm mb-0.5"><?php echo esc_html($settings['secondary_image_1_title']); ?></h4>
                                    <p class="text-[10px] text-[rgba(255,255,255,0.7)]"><?php echo esc_html($settings['secondary_image_1_subtitle']); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="flex-1 bg-white rounded-2xl border border-[#f0f2f5] shadow-xl overflow-hidden">
                            <div class="relative h-[220px] overflow-hidden">
                                <img src="<?php echo esc_url($settings['secondary_image_2']['url']); ?>" alt="<?php echo esc_attr($settings['secondary_image_2_title']); ?>" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-b from-[rgba(13,20,33,0.6)] via-[rgba(13,20,33,0.15)] via-20% to-transparent"></div>
                                <div class="absolute bottom-3 left-3 right-3">
                                    <h4 class="font-['Merriweather',serif] text-white text-sm mb-0.5"><?php echo esc_html($settings['secondary_image_2_title']); ?></h4>
                                    <p class="text-[10px] text-[rgba(255,255,255,0.7)]"><?php echo esc_html($settings['secondary_image_2_subtitle']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
