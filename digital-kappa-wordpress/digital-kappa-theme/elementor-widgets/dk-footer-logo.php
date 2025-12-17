<?php
/**
 * Elementor Widget: DK Footer Logo
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Footer_Logo_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_footer_logo';
    }

    public function get_title() {
        return __('DK Footer Logo', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-logo';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Footer Logo', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo_style',
            [
                'label' => __('Style du logo', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon_text',
                'options' => [
                    'image' => __('Image', 'digital-kappa'),
                    'icon_text' => __('Icone + Texte', 'digital-kappa'),
                ],
            ]
        );

        $this->add_control(
            'logo_image',
            [
                'label' => __('Image du logo', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'logo_style' => 'image',
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
            'tagline',
            [
                'label' => __('Tagline', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Votre marketplace de produits digitaux premium',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="footer-logo footer-dk">
            <?php if ($settings['logo_style'] === 'icon_text') : ?>
                <div class="flex items-center gap-2 mb-4">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#d2a30b]">
                        <span class="text-lg font-bold text-white">DK</span>
                    </div>
                    <span class="text-xl font-bold text-white"><?php echo esc_html($settings['logo_text']); ?></span>
                </div>
            <?php else : ?>
                <?php if (!empty($settings['logo_image']['url'])) : ?>
                    <img
                        src="<?php echo esc_url($settings['logo_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['logo_text']); ?>"
                        class="h-8 w-auto mb-4"
                        style="filter: brightness(0) invert(1);"
                    >
                <?php endif; ?>
            <?php endif; ?>

            <?php if (!empty($settings['tagline'])) : ?>
                <p class="text-sm text-gray-400"><?php echo esc_html($settings['tagline']); ?></p>
            <?php endif; ?>
        </div>
        <?php
    }
}
