<?php
/**
 * About Section Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_About_Section_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_about_section';
    }

    public function get_title() {
        return __('DK Section À propos', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-info-circle';
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
            'badge_text',
            [
                'label'   => __('Badge', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('À propos de nous', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Titre', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Digital Kappa, votre partenaire digital', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => __('Description', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('Nous proposons des ressources numériques simples, efficaces et de qualité pour aider les créateurs, entrepreneurs et passionnés à accomplir plus en moins de temps.', 'digital-kappa'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'value',
            [
                'label'   => __('Valeur', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '2026',
            ]
        );

        $repeater->add_control(
            'label',
            [
                'label'   => __('Label', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Année de lancement', 'digital-kappa'),
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
                        'value' => '2026',
                        'label' => __('Année de lancement', 'digital-kappa'),
                    ],
                    [
                        'value' => '100%',
                        'label' => __('Engagement qualité', 'digital-kappa'),
                    ],
                    [
                        'value' => '14 jours',
                        'label' => __('Garantie satisfait ou remboursé', 'digital-kappa'),
                    ],
                    [
                        'value' => '24h',
                        'label' => __('Support réactif', 'digital-kappa'),
                    ],
                ],
                'title_field' => '{{{ label }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="about-section py-12 lg:py-20 px-4 lg:px-20">
            <div class="max-w-4xl mx-auto text-center">
                <?php if (!empty($settings['badge_text'])) : ?>
                    <span class="inline-block bg-dk-gold/10 px-6 py-2 rounded-full mb-6 text-dk-gold font-body text-sm">
                        <?php echo esc_html($settings['badge_text']); ?>
                    </span>
                <?php endif; ?>

                <?php if (!empty($settings['title'])) : ?>
                    <h1 class="text-dk-text-primary mb-6"><?php echo esc_html($settings['title']); ?></h1>
                <?php endif; ?>

                <?php if (!empty($settings['description'])) : ?>
                    <div class="text-dk-text-secondary text-lg mb-12">
                        <?php echo wp_kses_post($settings['description']); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($settings['stats'])) : ?>
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8">
                        <?php foreach ($settings['stats'] as $stat) : ?>
                            <div class="text-center">
                                <p class="text-dk-gold text-2xl lg:text-4xl font-body mb-2"><?php echo esc_html($stat['value']); ?></p>
                                <p class="text-dk-text-secondary text-sm lg:text-base"><?php echo esc_html($stat['label']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}
