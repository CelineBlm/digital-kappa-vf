<?php
/**
 * CTA Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_CTA_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_cta';
    }

    public function get_title() {
        return __('DK Call to Action', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Contenu', 'digital-kappa'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Titre', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Prêt à découvrir nos produits digitaux ?', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => __('Description', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Rejoignez des centaines de développeurs et créateurs qui utilisent nos produits pour accélérer leurs projets.', 'digital-kappa'),
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
                'default' => __('Contactez-nous', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'secondary_button_url',
            [
                'label' => __('URL du bouton secondaire', 'digital-kappa'),
                'type'  => \Elementor\Controls_Manager::URL,
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
                'default'   => '#2b2d31',
                'selectors' => [
                    '{{WRAPPER}} .cta-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="cta-section py-16 lg:py-24 px-4 lg:px-20">
            <div class="max-w-4xl mx-auto text-center">
                <?php if (!empty($settings['title'])) : ?>
                    <h2 class="text-white mb-4"><?php echo esc_html($settings['title']); ?></h2>
                <?php endif; ?>

                <?php if (!empty($settings['description'])) : ?>
                    <p class="text-gray-300 mb-8"><?php echo esc_html($settings['description']); ?></p>
                <?php endif; ?>

                <div class="cta-buttons flex flex-col sm:flex-row gap-4 justify-center">
                    <?php if (!empty($settings['primary_button_text'])) : ?>
                        <a href="<?php echo esc_url($settings['primary_button_url']['url'] ?? '#'); ?>" class="btn-dk-primary">
                            <?php echo esc_html($settings['primary_button_text']); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($settings['secondary_button_text'])) : ?>
                        <a href="<?php echo esc_url($settings['secondary_button_url']['url'] ?? '#'); ?>" class="bg-white text-dk-bg-dark px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors font-medium">
                            <?php echo esc_html($settings['secondary_button_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
