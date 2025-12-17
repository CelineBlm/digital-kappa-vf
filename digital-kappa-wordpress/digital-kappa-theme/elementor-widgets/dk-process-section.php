<?php
/**
 * Elementor Widget: DK Process Section
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Process_Section_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_process_section';
    }

    public function get_title() {
        return __('DK Process Section', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-flow';
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
                'label' => __('Titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Comment ça marche',
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __('Description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Un processus simple en 3 étapes',
            ]
        );

        $this->add_control(
            'steps',
            [
                'label' => __('Étapes', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'icon',
                        'label' => __('Icône', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'search',
                        'options' => [
                            'search' => __('Recherche', 'digital-kappa'),
                            'cart' => __('Panier', 'digital-kappa'),
                            'download' => __('Téléchargement', 'digital-kappa'),
                        ],
                    ],
                    [
                        'name' => 'title',
                        'label' => __('Titre', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Étape',
                    ],
                    [
                        'name' => 'description',
                        'label' => __('Description', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => 'Description de cette étape.',
                    ],
                ],
                'default' => [
                    [
                        'icon' => 'search',
                        'title' => 'Parcourez',
                        'description' => "Explorez notre catalogue de produits digitaux : applications, ebooks et templates. Utilisez les filtres pour trouver exactement ce dont vous avez besoin.",
                    ],
                    [
                        'icon' => 'cart',
                        'title' => 'Achetez en un clic',
                        'description' => 'Pas de compte requis. Cliquez sur "Acheter maintenant", renseignez votre email et réglez en toute sécurité.',
                    ],
                    [
                        'icon' => 'download',
                        'title' => 'Téléchargez',
                        'description' => "Accédez immédiatement à votre produit après le paiement. Recevez un email de confirmation avec un lien de téléchargement valable à vie.",
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function get_icon_svg($icon_type) {
        $icons = [
            'search' => '<svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="#D2A30B"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>',
            'cart' => '<svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="#D2A30B"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>',
            'download' => '<svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="#D2A30B"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>',
        ];

        return isset($icons[$icon_type]) ? $icons[$icon_type] : $icons['search'];
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="process-section-dk py-12 lg:py-20 px-4 lg:px-20 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="section-header text-center mb-12">
                    <h2 class="text-[#1a1a1a] mb-4"><?php echo esc_html($settings['section_title']); ?></h2>
                    <p class="text-[#4a5565] max-w-2xl mx-auto"><?php echo esc_html($settings['section_description']); ?></p>
                </div>

                <div class="process-steps grid md:grid-cols-3 gap-8 lg:gap-12 relative">
                    <?php foreach ($settings['steps'] as $index => $step) : ?>
                        <div class="process-step relative">
                            <?php if ($index < count($settings['steps']) - 1) : ?>
                                <div class="hidden md:block absolute top-10 left-full w-full h-0.5 bg-gradient-to-r from-[#d2a30b] to-transparent -translate-x-1/2 z-0"></div>
                            <?php endif; ?>

                            <div class="relative z-10 text-center">
                                <div class="bg-white border border-gray-100 rounded-2xl p-1.5 w-20 h-20 flex items-center justify-center mx-auto mb-6 shadow-sm">
                                    <?php echo $this->get_icon_svg($step['icon']); ?>
                                </div>

                                <div class="step-number bg-[#d2a30b] w-8 h-8 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <span class="text-white font-medium"><?php echo $index + 1; ?></span>
                                </div>

                                <h3 class="step-content font-['Merriweather',serif] text-[#0d1421] mb-4"><?php echo esc_html($step['title']); ?></h3>

                                <p class="text-[rgba(13,20,33,0.7)]"><?php echo esc_html($step['description']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
