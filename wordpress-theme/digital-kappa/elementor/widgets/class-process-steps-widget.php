<?php
/**
 * Process Steps Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_Process_Steps_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_process_steps';
    }

    public function get_title() {
        return __('DK Étapes du processus', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-navigation-horizontal';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Étapes', 'digital-kappa'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => __('Titre', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Comment ça marche ?', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label'   => __('Description', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Achetez et téléchargez vos produits digitaux en quelques clics', 'digital-kappa'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label'   => __('Icône (nom Lucide)', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'search',
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'   => __('Titre', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Étape', 'digital-kappa'),
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label'   => __('Description', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Description de l\'étape', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'steps',
            [
                'label'   => __('Étapes', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'icon'        => 'search',
                        'title'       => __('Parcourez', 'digital-kappa'),
                        'description' => __('Explorez notre catalogue de produits digitaux : applications, ebooks et templates. Utilisez les filtres pour trouver exactement ce dont vous avez besoin.', 'digital-kappa'),
                    ],
                    [
                        'icon'        => 'credit-card',
                        'title'       => __('Achetez en un clic', 'digital-kappa'),
                        'description' => __('Pas de compte requis. Cliquez sur "Acheter maintenant", renseignez votre email et réglez en toute sécurité via notre système de paiement sécurisé.', 'digital-kappa'),
                    ],
                    [
                        'icon'        => 'download',
                        'title'       => __('Téléchargez', 'digital-kappa'),
                        'description' => __('Accédez immédiatement à votre produit après le paiement. Recevez un email de confirmation avec un lien de téléchargement valable à vie.', 'digital-kappa'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="process-section py-12 lg:py-20 px-4 lg:px-20 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <?php if (!empty($settings['section_title'])) : ?>
                        <h2 class="text-dk-text-primary mb-4"><?php echo esc_html($settings['section_title']); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($settings['section_description'])) : ?>
                        <p class="text-dk-text-muted max-w-2xl mx-auto"><?php echo esc_html($settings['section_description']); ?></p>
                    <?php endif; ?>
                </div>

                <div class="process-steps">
                    <?php foreach ($settings['steps'] as $index => $step) : ?>
                        <div class="process-step">
                            <div class="step-icon">
                                <i data-lucide="<?php echo esc_attr($step['icon']); ?>" class="w-10 h-10 text-dk-gold"></i>
                            </div>
                            <div class="step-number"><?php echo esc_html($index + 1); ?></div>
                            <h3 class="font-heading"><?php echo esc_html($step['title']); ?></h3>
                            <p><?php echo esc_html($step['description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
