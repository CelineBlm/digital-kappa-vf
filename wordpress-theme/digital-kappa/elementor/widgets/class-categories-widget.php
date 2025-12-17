<?php
/**
 * Categories Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_Categories_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_categories';
    }

    public function get_title() {
        return __('DK Catégories', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-folder';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Catégories', 'digital-kappa'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => __('Titre', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explorez nos catégories', 'digital-kappa'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label'   => __('Icône (nom Lucide)', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'folder',
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'   => __('Titre', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Catégorie', 'digital-kappa'),
            ]
        );

        $repeater->add_control(
            'count',
            [
                'label'   => __('Nombre de produits', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '12 produits',
            ]
        );

        $repeater->add_control(
            'url',
            [
                'label' => __('URL', 'digital-kappa'),
                'type'  => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'categories',
            [
                'label'   => __('Catégories', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'icon'  => 'book-open',
                        'title' => __('Ebooks', 'digital-kappa'),
                        'count' => '25 produits',
                    ],
                    [
                        'icon'  => 'smartphone',
                        'title' => __('Applications', 'digital-kappa'),
                        'count' => '18 produits',
                    ],
                    [
                        'icon'  => 'layout-template',
                        'title' => __('Templates', 'digital-kappa'),
                        'count' => '32 produits',
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
        <section class="categories-section py-12 lg:py-20 px-4 lg:px-20 bg-dk-light">
            <div class="max-w-7xl mx-auto">
                <?php if (!empty($settings['section_title'])) : ?>
                    <h2 class="text-center text-dk-text-primary mb-12"><?php echo esc_html($settings['section_title']); ?></h2>
                <?php endif; ?>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($settings['categories'] as $category) : ?>
                        <a href="<?php echo esc_url($category['url']['url'] ?? '#'); ?>" class="group">
                            <div class="bg-white border border-gray-100 rounded-2xl p-8 text-center transition-all hover:shadow-lg hover:border-dk-gold/20 hover:-translate-y-1">
                                <div class="w-16 h-16 bg-dk-gold/10 rounded-2xl flex items-center justify-center mx-auto mb-6 text-dk-gold group-hover:bg-dk-gold group-hover:text-white transition-colors">
                                    <i data-lucide="<?php echo esc_attr($category['icon']); ?>" class="w-8 h-8"></i>
                                </div>
                                <h3 class="font-heading text-xl text-dk-text-primary mb-2"><?php echo esc_html($category['title']); ?></h3>
                                <p class="text-dk-text-muted text-sm"><?php echo esc_html($category['count']); ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
