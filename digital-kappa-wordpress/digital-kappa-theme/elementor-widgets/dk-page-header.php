<?php
/**
 * Elementor Widget: DK Page Header
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Page_Header_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_page_header';
    }

    public function get_title() {
        return __('DK Page Header', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-header';
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
            'badge_text',
            [
                'label' => __('Badge', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Titre de la page',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Description de la page',
            ]
        );

        $this->add_control(
            'show_breadcrumb',
            [
                'label' => __('Afficher le fil d\'ariane', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_last_updated',
            [
                'label' => __('Afficher la date de mise à jour', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'last_updated_text',
            [
                'label' => __('Texte de mise à jour', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Dernière mise à jour : ',
                'condition' => [
                    'show_last_updated' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'alignment',
            [
                'label' => __('Alignement', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Gauche', 'digital-kappa'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Centre', 'digital-kappa'),
                        'icon' => 'eicon-text-align-center',
                    ],
                ],
                'default' => 'left',
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
                'default' => '#f9fafb',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $alignment_class = $settings['alignment'] === 'center' ? 'text-center' : '';
        $breadcrumb_class = $settings['alignment'] === 'center' ? 'justify-center' : '';
        ?>
        <section class="legal-page-header bg-gray-50 py-12 lg:py-16 px-4 lg:px-20" style="background-color: <?php echo esc_attr($settings['background_color']); ?>">
            <div class="container-dk max-w-7xl mx-auto <?php echo $alignment_class; ?>">
                <?php if ($settings['show_breadcrumb'] === 'yes') : ?>
                    <nav class="breadcrumb flex items-center gap-2 text-sm text-[#4a5565] mb-6 <?php echo $breadcrumb_class; ?>">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-[#d2a30b] transition-colors">Accueil</a>
                        <span>/</span>
                        <span class="text-[#1a1a1a]"><?php echo esc_html($settings['title']); ?></span>
                    </nav>
                <?php endif; ?>

                <?php if (!empty($settings['badge_text'])) : ?>
                    <div class="inline-flex items-center gap-2 bg-[rgba(210,163,11,0.1)] rounded-full px-6 py-2 mb-6 <?php echo $settings['alignment'] === 'center' ? 'mx-auto' : ''; ?>">
                        <p class="text-sm text-[#d2a30b] font-['Montserrat',sans-serif]"><?php echo esc_html($settings['badge_text']); ?></p>
                    </div>
                <?php endif; ?>

                <h1 class="text-[#1a1a1a] mb-4"><?php echo esc_html($settings['title']); ?></h1>

                <?php if (!empty($settings['description'])) : ?>
                    <p class="page-description text-[#4a5565] text-lg <?php echo $settings['alignment'] === 'center' ? 'max-w-3xl mx-auto' : 'max-w-3xl'; ?>">
                        <?php echo esc_html($settings['description']); ?>
                    </p>
                <?php endif; ?>

                <?php if ($settings['show_last_updated'] === 'yes') : ?>
                    <p class="last-updated text-sm text-[#4a5565] mt-4">
                        <?php echo esc_html($settings['last_updated_text']); ?><?php echo date_i18n(get_option('date_format')); ?>
                    </p>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}
