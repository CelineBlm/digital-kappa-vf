<?php
/**
 * Testimonials Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_Testimonials_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_testimonials';
    }

    public function get_title() {
        return __('DK Témoignages', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Témoignages', 'digital-kappa'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => __('Titre', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Ce que nos clients disent', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label'   => __('Description', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Découvrez les avis de nos clients satisfaits', 'digital-kappa'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'content',
            [
                'label'   => __('Témoignage', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Excellent produit, je recommande !', 'digital-kappa'),
            ]
        );

        $repeater->add_control(
            'author_name',
            [
                'label'   => __('Nom', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Jean Dupont', 'digital-kappa'),
            ]
        );

        $repeater->add_control(
            'author_role',
            [
                'label'   => __('Rôle', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Développeur', 'digital-kappa'),
            ]
        );

        $repeater->add_control(
            'rating',
            [
                'label'   => __('Note (1-5)', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 5,
                'default' => 5,
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label'   => __('Témoignages', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'content'     => 'Le Guide du développeur moderne est incroyablement complet. J\'ai appris énormément de choses et je le recommande à tous les développeurs.',
                        'author_name' => 'Thomas Martin',
                        'author_role' => 'Développeur Full Stack',
                        'rating'      => 5,
                    ],
                    [
                        'content'     => 'Le Design System Pro m\'a fait gagner des semaines de travail. Les composants sont bien pensés et la documentation est parfaite.',
                        'author_name' => 'Marie Durand',
                        'author_role' => 'UX Designer',
                        'rating'      => 5,
                    ],
                    [
                        'content'     => 'Service client au top et produits de qualité. Je reviendrai certainement pour mes prochains projets.',
                        'author_name' => 'Pierre Lefebvre',
                        'author_role' => 'Entrepreneur',
                        'rating'      => 5,
                    ],
                ],
                'title_field' => '{{{ author_name }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="testimonials-section py-12 lg:py-20 px-4 lg:px-20">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <?php if (!empty($settings['section_title'])) : ?>
                        <h2 class="text-dk-text-primary mb-4"><?php echo esc_html($settings['section_title']); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($settings['section_description'])) : ?>
                        <p class="text-dk-text-muted max-w-2xl mx-auto"><?php echo esc_html($settings['section_description']); ?></p>
                    <?php endif; ?>
                </div>

                <div class="testimonials-grid">
                    <?php foreach ($settings['testimonials'] as $testimonial) : ?>
                        <div class="testimonial-card">
                            <div class="stars">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <i data-lucide="star" class="w-4 h-4 <?php echo $i <= $testimonial['rating'] ? 'fill-current' : ''; ?>"></i>
                                <?php endfor; ?>
                            </div>
                            <p class="content">"<?php echo esc_html($testimonial['content']); ?>"</p>
                            <div class="author">
                                <div class="author-avatar">
                                    <?php echo esc_html(substr($testimonial['author_name'], 0, 1)); ?>
                                </div>
                                <div class="author-info">
                                    <div class="name"><?php echo esc_html($testimonial['author_name']); ?></div>
                                    <div class="role"><?php echo esc_html($testimonial['author_role']); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
