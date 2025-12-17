<?php
/**
 * Elementor Widget: DK Testimonials
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Testimonials_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_testimonials';
    }

    public function get_title() {
        return __('DK Testimonials', 'digital-kappa');
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
                'label' => __('Contenu', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __('Titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Ce que disent nos clients',
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __('Description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Des centaines de clients satisfaits nous font confiance',
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label' => __('Témoignages', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'avatar',
                        'label' => __('Avatar', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'name',
                        'label' => __('Nom', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Client',
                    ],
                    [
                        'name' => 'role',
                        'label' => __('Rôle', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Développeur',
                    ],
                    [
                        'name' => 'rating',
                        'label' => __('Note', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 5,
                        'default' => 5,
                    ],
                    [
                        'name' => 'text',
                        'label' => __('Témoignage', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => 'Un excellent produit qui a dépassé mes attentes.',
                    ],
                ],
                'default' => [
                    [
                        'name' => 'Sophie M.',
                        'role' => 'Développeuse freelance',
                        'rating' => 5,
                        'text' => "Les templates sont d'une qualité exceptionnelle. J'ai gagné un temps fou sur mon dernier projet client.",
                    ],
                    [
                        'name' => 'Thomas L.',
                        'role' => 'Entrepreneur',
                        'rating' => 5,
                        'text' => "L'ebook sur le marketing digital m'a permis de doubler mes conversions en un mois. Investissement rentabilisé !",
                    ],
                    [
                        'name' => 'Marie D.',
                        'role' => 'Designer UX',
                        'rating' => 5,
                        'text' => 'Le design system est parfaitement documenté. Je le recommande à tous les designers qui veulent gagner en efficacité.',
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render_stars($rating) {
        $html = '<div class="testimonial-rating flex gap-0.5 mb-4">';
        for ($i = 1; $i <= 5; $i++) {
            $fill = $i <= $rating ? 'currentColor' : 'none';
            $html .= '<svg class="w-5 h-5 text-[#d2a30b]" fill="' . $fill . '" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
        }
        $html .= '</div>';
        return $html;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="testimonials-section-dk py-12 lg:py-20 px-4 lg:px-20 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="section-header text-center mb-12">
                    <h2 class="text-[#1a1a1a] mb-4"><?php echo esc_html($settings['section_title']); ?></h2>
                    <p class="text-[#4a5565] max-w-2xl mx-auto"><?php echo esc_html($settings['section_description']); ?></p>
                </div>

                <div class="testimonials-grid grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php foreach ($settings['testimonials'] as $testimonial) : ?>
                        <div class="testimonial-card bg-white rounded-2xl p-8 shadow-lg">
                            <div class="testimonial-header flex items-center gap-4 mb-4">
                                <?php if (!empty($testimonial['avatar']['url'])) : ?>
                                    <img src="<?php echo esc_url($testimonial['avatar']['url']); ?>" alt="<?php echo esc_attr($testimonial['name']); ?>" class="testimonial-avatar w-12 h-12 rounded-full object-cover">
                                <?php else : ?>
                                    <div class="testimonial-avatar w-12 h-12 rounded-full bg-[#d2a30b] flex items-center justify-center text-white font-bold">
                                        <?php echo esc_html(substr($testimonial['name'], 0, 1)); ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <p class="testimonial-author font-medium text-[#1a1a1a]"><?php echo esc_html($testimonial['name']); ?></p>
                                    <p class="testimonial-role text-sm text-[#4a5565]"><?php echo esc_html($testimonial['role']); ?></p>
                                </div>
                            </div>

                            <?php echo $this->render_stars($testimonial['rating']); ?>

                            <p class="testimonial-text text-[#4a5565] italic">"<?php echo esc_html($testimonial['text']); ?>"</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
