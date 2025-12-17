<?php
/**
 * Stats Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_Stats_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_stats';
    }

    public function get_title() {
        return __('DK Statistiques', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Statistiques', 'digital-kappa'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'value',
            [
                'label'   => __('Valeur', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '100+',
            ]
        );

        $repeater->add_control(
            'label',
            [
                'label'   => __('Label', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Produits', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'stats',
            [
                'label'   => __('Statistiques', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'value' => '150+',
                        'label' => __('Produits disponibles', 'digital-kappa'),
                    ],
                    [
                        'value' => '5000+',
                        'label' => __('Clients satisfaits', 'digital-kappa'),
                    ],
                    [
                        'value' => '4.9/5',
                        'label' => __('Note moyenne', 'digital-kappa'),
                    ],
                    [
                        'value' => '24/7',
                        'label' => __('Support disponible', 'digital-kappa'),
                    ],
                ],
                'title_field' => '{{{ label }}}',
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
                    '{{WRAPPER}} .stats-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="stats-section py-12 lg:py-16 px-4 lg:px-20">
            <div class="max-w-7xl mx-auto">
                <div class="stats-grid">
                    <?php foreach ($settings['stats'] as $stat) : ?>
                        <div class="stat-item">
                            <div class="stat-value"><?php echo esc_html($stat['value']); ?></div>
                            <div class="stat-label"><?php echo esc_html($stat['label']); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
