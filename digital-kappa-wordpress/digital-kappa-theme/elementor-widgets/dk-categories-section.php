<?php
/**
 * Elementor Widget: DK Categories Section
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Categories_Section_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_categories_section';
    }

    public function get_title() {
        return __('DK Categories Section', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
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
                'default' => 'Catégories de produits',
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __('Description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Explorez notre sélection organisée de produits digitaux dans nos catégories principales',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $categories = array(
            array(
                'icon' => '<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><rect x="5" y="2" width="14" height="20" rx="2" stroke-width="2"/><path d="M12 18h.01" stroke-width="2" stroke-linecap="round"/></svg>',
                'title' => 'Applications mobiles',
                'description' => 'Apps prêtes à l\'emploi pour iOS et Android',
                'link' => home_url('/produits/?cat=applications'),
            ),
            array(
                'icon' => '<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                'title' => 'Ebooks',
                'description' => 'Guides et formations pour développer vos compétences',
                'link' => home_url('/produits/?cat=ebooks'),
            ),
            array(
                'icon' => '<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                'title' => 'Templates',
                'description' => 'Designs professionnels pour vos projets web',
                'link' => home_url('/produits/?cat=templates'),
            ),
        );
        ?>
        <section class="categories-section-dk py-16 lg:py-24 px-4 lg:px-8 bg-white">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-[#1a1a1a] text-3xl lg:text-4xl mb-4"><?php echo esc_html($settings['section_title']); ?></h2>
                    <p class="text-[#4a5565] max-w-2xl mx-auto"><?php echo esc_html($settings['section_description']); ?></p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <?php foreach ($categories as $category) : ?>
                    <div class="category-card text-center p-8 rounded-2xl border border-gray-100 hover:border-[#d2a30b] hover:shadow-lg transition-all duration-300 group">
                        <div class="w-16 h-16 mx-auto mb-6 bg-gray-50 rounded-2xl flex items-center justify-center text-[#4a5565] group-hover:bg-[#fffbf0] group-hover:text-[#d2a30b] transition-colors">
                            <?php echo $category['icon']; ?>
                        </div>
                        <h3 class="text-[#1a1a1a] text-xl mb-3"><?php echo esc_html($category['title']); ?></h3>
                        <p class="text-[#4a5565] text-sm mb-6"><?php echo esc_html($category['description']); ?></p>
                        <a href="<?php echo esc_url($category['link']); ?>" class="text-[#d2a30b] font-medium inline-flex items-center gap-2 hover:gap-3 transition-all">
                            Explorer
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
