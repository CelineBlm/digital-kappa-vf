<?php
/**
 * Elementor Widget: DK CTA Section
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_CTA_Section_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_cta_section';
    }

    public function get_title() {
        return __('DK CTA Section', 'digital-kappa');
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
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Prêt à découvrir nos produits digitaux ?',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Rejoignez des centaines de développeurs et créateurs qui utilisent nos produits pour accélérer leurs projets',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Texte du bouton', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Explorer le catalogue',
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Lien du bouton', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '/boutique/',
                ],
            ]
        );

        $this->add_control(
            'show_features',
            [
                'label' => __('Afficher les garanties', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => __('Garanties', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'icon',
                        'label' => __('Icône', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'shield',
                        'options' => [
                            'shield' => __('Sécurité', 'digital-kappa'),
                            'download' => __('Téléchargement', 'digital-kappa'),
                            'support' => __('Support', 'digital-kappa'),
                        ],
                    ],
                    [
                        'name' => 'text',
                        'label' => __('Texte', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Garantie',
                    ],
                ],
                'default' => [
                    [
                        'icon' => 'shield',
                        'text' => 'Paiement sécurisé',
                    ],
                    [
                        'icon' => 'download',
                        'text' => 'Téléchargement instantané',
                    ],
                    [
                        'icon' => 'support',
                        'text' => 'Support 24/7',
                    ],
                ],
                'condition' => [
                    'show_features' => 'yes',
                ],
                'title_field' => '{{{ text }}}',
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
            'background_color',
            [
                'label' => __('Couleur de fond', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2b2d31',
                'selectors' => [
                    '{{WRAPPER}} .cta-section-dk' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function get_icon_svg($icon_type) {
        $icons = [
            'shield' => '<svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
            'download' => '<svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>',
            'support' => '<svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>',
        ];

        return isset($icons[$icon_type]) ? $icons[$icon_type] : $icons['shield'];
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $button_link = !empty($settings['button_link']['url']) ? $settings['button_link']['url'] : '/boutique/';
        ?>
        <section class="cta-section-dk py-16 lg:py-24 px-4 lg:px-20 bg-[#2b2d31]">
            <div class="container-dk max-w-4xl mx-auto text-center space-y-6">
                <h2 class="text-white"><?php echo esc_html($settings['title']); ?></h2>

                <p class="text-gray-300 max-w-2xl mx-auto"><?php echo esc_html($settings['description']); ?></p>

                <div class="flex flex-col gap-6 justify-center items-center">
                    <a href="<?php echo esc_url($button_link); ?>" class="cta-button bg-[#d2a30b] text-white px-8 py-3 rounded-lg hover:bg-[#b8900a] transition-colors w-full sm:w-auto inline-block">
                        <?php echo esc_html($settings['button_text']); ?>
                    </a>

                    <?php if ($settings['show_features'] === 'yes' && !empty($settings['features'])) : ?>
                        <div class="cta-features flex flex-col sm:flex-row gap-6 text-sm text-gray-400 w-full sm:w-auto justify-center">
                            <?php foreach ($settings['features'] as $feature) : ?>
                                <div class="cta-feature flex items-center gap-2 justify-center">
                                    <?php echo $this->get_icon_svg($feature['icon']); ?>
                                    <span><?php echo esc_html($feature['text']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
