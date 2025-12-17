<?php
/**
 * Elementor Widget: DK Stats Section
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Stats_Section_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_stats_section';
    }

    public function get_title() {
        return __('DK Stats Section', 'digital-kappa');
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
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'stats',
            [
                'label' => __('Statistiques', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'number',
                        'label' => __('Nombre', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '100+',
                    ],
                    [
                        'name' => 'label',
                        'label' => __('Label', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Produits',
                    ],
                ],
                'default' => [
                    [
                        'number' => '50+',
                        'label' => 'Produits digitaux',
                    ],
                    [
                        'number' => '1000+',
                        'label' => 'Clients satisfaits',
                    ],
                    [
                        'number' => '4.8/5',
                        'label' => 'Note moyenne',
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
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => __('Couleur des nombres', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#d2a30b',
                'selectors' => [
                    '{{WRAPPER}} .stat-number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => __('Couleur des labels', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a5565',
                'selectors' => [
                    '{{WRAPPER}} .stat-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="stats-section-dk py-12 lg:py-16 px-4 lg:px-20 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="stats-grid grid grid-cols-1 md:grid-cols-<?php echo count($settings['stats']); ?> gap-8 text-center">
                    <?php foreach ($settings['stats'] as $stat) : ?>
                        <div class="stat-item">
                            <p class="stat-number font-['Merriweather',serif] text-5xl text-[#d2a30b] font-medium mb-2"><?php echo esc_html($stat['number']); ?></p>
                            <p class="stat-label text-[#4a5565] text-lg"><?php echo esc_html($stat['label']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
