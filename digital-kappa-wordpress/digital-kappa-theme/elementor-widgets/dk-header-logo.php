<?php
/**
 * Elementor Widget: DK Header Logo
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Header_Logo_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_header_logo';
    }

    public function get_title() {
        return __('DK Header Logo', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-logo';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    public function get_keywords() {
        return ['logo', 'header', 'brand', 'digital kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Logo', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo_image',
            [
                'label' => __('Image du logo', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => DK_THEME_URI . '/assets/images/logo-digital-kappa.svg',
                ],
            ]
        );

        $this->add_control(
            'logo_text',
            [
                'label' => __('Texte du logo', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Digital Kappa',
            ]
        );

        $this->add_control(
            'logo_tagline',
            [
                'label' => __('Tagline', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'PRODUITS DIGITAUX PREMIUM',
            ]
        );

        $this->add_control(
            'logo_link',
            [
                'label' => __('URL du logo', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => home_url('/'),
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'logo_width',
            [
                'label' => __('Largeur du logo', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 30,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'size' => 48,
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo-container img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __('Couleur du texte', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1a1a1a',
                'selectors' => [
                    '{{WRAPPER}} .logo-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tagline_color',
            [
                'label' => __('Couleur de la tagline', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#d2a30b',
                'selectors' => [
                    '{{WRAPPER}} .logo-tagline' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $link_url = !empty($settings['logo_link']['url']) ? $settings['logo_link']['url'] : home_url('/');
        $link_target = $settings['logo_link']['is_external'] ? '_blank' : '_self';
        ?>
        <div class="logo-container flex items-center gap-3">
            <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="flex items-center gap-3">
                <?php if (!empty($settings['logo_image']['url'])) : ?>
                    <img src="<?php echo esc_url($settings['logo_image']['url']); ?>" alt="<?php echo esc_attr($settings['logo_text']); ?>" class="h-8 w-auto">
                <?php endif; ?>
                <div class="flex flex-col items-start">
                    <span class="logo-text font-['Montserrat',sans-serif] text-[#1a1a1a]"><?php echo esc_html($settings['logo_text']); ?></span>
                    <?php if (!empty($settings['logo_tagline'])) : ?>
                        <span class="logo-tagline text-[10px] font-['Montserrat',sans-serif] text-[#d2a30b] tracking-wide"><?php echo esc_html($settings['logo_tagline']); ?></span>
                    <?php endif; ?>
                </div>
            </a>
        </div>
        <?php
    }
}
