<?php
/**
 * Value Propositions Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_Value_Propositions_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_value_propositions';
    }

    public function get_title() {
        return __('DK Propositions de valeur', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-info-box';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Propositions', 'digital-kappa'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label'   => __('Icône (nom Lucide)', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'check-circle',
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'   => __('Titre', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Fonctionnalité', 'digital-kappa'),
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label'   => __('Description', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Description de la fonctionnalité', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'propositions',
            [
                'label'   => __('Propositions', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'icon'        => 'download',
                        'title'       => __('Téléchargement instantané', 'digital-kappa'),
                        'description' => __('Accédez à vos produits immédiatement après l\'achat. Pas d\'attente, pas de délai de livraison.', 'digital-kappa'),
                    ],
                    [
                        'icon'        => 'shield-check',
                        'title'       => __('Paiement sécurisé', 'digital-kappa'),
                        'description' => __('Transactions 100% sécurisées via Stripe et PayPal. Vos données sont protégées.', 'digital-kappa'),
                    ],
                    [
                        'icon'        => 'refresh-cw',
                        'title'       => __('Satisfait ou remboursé', 'digital-kappa'),
                        'description' => __('14 jours pour changer d\'avis. Remboursement intégral sans conditions.', 'digital-kappa'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
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
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .value-propositions-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'columns',
            [
                'label'   => __('Colonnes', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $columns = $settings['columns'];
        ?>
        <section class="value-propositions-section py-12 lg:py-16 px-4 lg:px-20">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-<?php echo esc_attr($columns); ?> gap-8">
                    <?php foreach ($settings['propositions'] as $item) : ?>
                        <div class="feature-card text-center">
                            <div class="icon-wrapper mx-auto">
                                <i data-lucide="<?php echo esc_attr($item['icon']); ?>" class="w-6 h-6"></i>
                            </div>
                            <h3 class="font-heading"><?php echo esc_html($item['title']); ?></h3>
                            <p><?php echo esc_html($item['description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
