<?php
/**
 * Elementor Widget: DK Product Related
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Product_Related_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_product_related';
    }

    public function get_title() {
        return __('DK Product Related', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-products-related';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Produits associés', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Produits similaires',
            ]
        );

        $this->add_control(
            'products_count',
            [
                'label' => __('Nombre de produits', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
                'min' => 1,
                'max' => 8,
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => __('Colonnes', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        global $product;
        if (!$product) {
            return;
        }

        $related_products = wc_get_related_products($product->get_id(), $settings['products_count']);

        if (empty($related_products)) {
            return;
        }
        ?>
        <section class="related-products-section py-12 px-4 lg:px-20 bg-white">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-center mb-8"><?php echo esc_html($settings['title']); ?></h2>

                <div class="related-products-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-<?php echo $settings['columns']; ?> gap-6">
                    <?php foreach ($related_products as $related_id) : ?>
                        <?php
                        $related = wc_get_product($related_id);
                        if (!$related) continue;
                        $image_url = get_the_post_thumbnail_url($related_id, 'dk-product-card');
                        ?>
                        <div class="card-dk-product bg-white rounded-2xl border border-[#f0f2f5] shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                            <a href="<?php echo get_permalink($related_id); ?>" class="block">
                                <div class="product-image-container relative aspect-[4/3] overflow-hidden">
                                    <?php if ($image_url) : ?>
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($related->get_name()); ?>" class="w-full h-full object-cover">
                                    <?php else : ?>
                                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                            <span class="text-gray-400">Image</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="p-5 space-y-3">
                                    <h3 class="font-['Merriweather',serif] text-[#1a1a1a] text-lg line-clamp-2"><?php echo esc_html($related->get_name()); ?></h3>
                                    <div class="flex items-center justify-between">
                                        <span class="product-price font-['Merriweather',serif] text-xl text-[#d2a30b] font-medium"><?php echo $related->get_price_html(); ?></span>
                                        <span class="text-[#d2a30b] text-sm flex items-center gap-1">
                                            Voir
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
