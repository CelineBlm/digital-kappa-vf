<?php
/**
 * Elementor Widget: DK About Section
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_About_Section_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_about_section';
    }

    public function get_title() {
        return __('DK About Section', 'digital-kappa');
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
                'label' => __('Contenu', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __('Titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Digital Kappa, votre partenaire digital',
            ]
        );

        $this->add_control(
            'description_1',
            [
                'label' => __('Description 1', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Chez Digital Kappa, nous créons et sélectionnons avec soin chaque produit digital pour répondre aux besoins des entrepreneurs, développeurs et créateurs modernes.',
            ]
        );

        $this->add_control(
            'description_2',
            [
                'label' => __('Description 2', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Notre mission est de vous faire gagner du temps en vous proposant des solutions prêtes à l\'emploi, testées et documentées.',
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Image', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=600',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $features = array(
            'Produits testés et validés',
            'Documentation complète incluse',
            'Mises à jour régulières',
            'Support communautaire actif',
        );
        ?>
        <section class="about-section-dk py-16 lg:py-24 px-4 lg:px-8 bg-[#f9fafb]">
            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Text Content -->
                    <div class="space-y-6">
                        <h2 class="text-[#1a1a1a] text-3xl lg:text-4xl"><?php echo esc_html($settings['section_title']); ?></h2>

                        <p class="text-[#4a5565] leading-relaxed"><?php echo esc_html($settings['description_1']); ?></p>

                        <p class="text-[#4a5565] leading-relaxed"><?php echo esc_html($settings['description_2']); ?></p>

                        <ul class="space-y-3 pt-4">
                            <?php foreach ($features as $feature) : ?>
                            <li class="flex items-center gap-3">
                                <div class="w-5 h-5 bg-[#d2a30b] rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-[#1a1a1a]"><?php echo esc_html($feature); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Image -->
                    <div class="relative">
                        <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-xl">
                            <img src="<?php echo esc_url($settings['image']['url']); ?>"
                                 alt="<?php echo esc_attr($settings['section_title']); ?>"
                                 class="w-full h-full object-cover">
                        </div>
                        <!-- Decorative element -->
                        <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-[#d2a30b]/10 rounded-2xl -z-10"></div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
