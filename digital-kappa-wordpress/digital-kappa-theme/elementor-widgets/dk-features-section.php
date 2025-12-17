<?php
/**
 * Elementor Widget: DK Features Section
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Features_Section_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_features_section';
    }

    public function get_title() {
        return __('DK Features Section', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-featured-image';
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
            'section_title',
            [
                'label' => __('Titre de la section', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Pourquoi choisir Digital Kappa',
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __('Description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Une plateforme conçue pour vous offrir la meilleure expérience d'achat de produits digitaux",
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => __('Fonctionnalités', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'icon',
                        'label' => __('Icône', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'simplicity',
                        'options' => [
                            'simplicity' => __('Simplicité', 'digital-kappa'),
                            'reliability' => __('Fiabilité', 'digital-kappa'),
                            'speed' => __('Rapidité', 'digital-kappa'),
                            'support' => __('Support', 'digital-kappa'),
                        ],
                    ],
                    [
                        'name' => 'title',
                        'label' => __('Titre', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Fonctionnalité',
                    ],
                    [
                        'name' => 'description',
                        'label' => __('Description', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => 'Description de la fonctionnalité',
                    ],
                ],
                'default' => [
                    [
                        'icon' => 'simplicity',
                        'title' => 'Simplicité',
                        'description' => 'Interface intuitive pour trouver rapidement ce dont vous avez besoin',
                    ],
                    [
                        'icon' => 'reliability',
                        'title' => 'Fiabilité',
                        'description' => 'Produits vérifiés et transactions sécurisées',
                    ],
                    [
                        'icon' => 'speed',
                        'title' => 'Rapidité',
                        'description' => 'Achat en un clic, téléchargement instantané',
                    ],
                    [
                        'icon' => 'support',
                        'title' => 'Support',
                        'description' => 'Assistance disponible pour tous vos achats',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function get_icon_svg($icon_type) {
        $icons = [
            'simplicity' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>',
            'reliability' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
            'speed' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
            'support' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>',
        ];

        return isset($icons[$icon_type]) ? $icons[$icon_type] : $icons['simplicity'];
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="features-section-dk bg-white py-12 lg:py-20 px-4 lg:px-20">
            <div class="max-w-7xl mx-auto">
                <div class="section-header text-center mb-10 lg:mb-12">
                    <h2 class="text-[#1a1a1a] mb-4"><?php echo esc_html($settings['section_title']); ?></h2>
                    <p class="text-[#4a5565] max-w-2xl mx-auto"><?php echo esc_html($settings['section_description']); ?></p>
                </div>

                <div class="features-grid grid sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                    <?php foreach ($settings['features'] as $feature) : ?>
                        <div class="feature-card text-center">
                            <div class="feature-icon w-12 h-12 bg-[rgba(210,163,11,0.1)] rounded-full flex items-center justify-center mx-auto mb-4 text-[#d2a30b]">
                                <?php echo $this->get_icon_svg($feature['icon']); ?>
                            </div>
                            <h3 class="feature-title text-[#1a1a1a] mb-2"><?php echo esc_html($feature['title']); ?></h3>
                            <p class="feature-description text-sm text-[#4a5565]"><?php echo esc_html($feature['description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
