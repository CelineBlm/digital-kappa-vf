<?php
/**
 * Elementor Widget: DK Product Info
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Product_Info_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_product_info';
    }

    public function get_title() {
        return __('DK Product Info', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-product-info';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Information Produit', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_title',
            [
                'label' => __('Afficher le titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_rating',
            [
                'label' => __('Afficher la note', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_category',
            [
                'label' => __('Afficher la catégorie', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_price',
            [
                'label' => __('Afficher le prix', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_description',
            [
                'label' => __('Afficher la description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_add_to_cart',
            [
                'label' => __('Afficher le bouton d\'achat', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Texte du bouton', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Acheter maintenant',
                'condition' => [
                    'show_add_to_cart' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render_stars($rating) {
        $html = '<div class="stars flex gap-0.5">';
        for ($i = 1; $i <= 5; $i++) {
            $fill = $i <= $rating ? 'currentColor' : 'none';
            $html .= '<svg class="w-5 h-5 text-[#d2a30b]" fill="' . $fill . '" viewBox="0 0 20 20" stroke="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
        }
        $html .= '</div>';
        return $html;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        global $product;
        if (!$product) {
            echo '<p>Aucun produit trouvé</p>';
            return;
        }

        $rating = (float) get_field('product_rating', $product->get_id()) ?: 4.5;
        $review_count = (int) get_field('product_review_count', $product->get_id()) ?: 0;
        $categories = wc_get_product_category_list($product->get_id());
        ?>
        <div class="product-info space-y-6">
            <?php if ($settings['show_title'] === 'yes') : ?>
                <h1 class="text-[#1a1a1a]"><?php echo esc_html($product->get_name()); ?></h1>
            <?php endif; ?>

            <?php if ($settings['show_rating'] === 'yes' || $settings['show_category'] === 'yes') : ?>
                <div class="product-meta flex items-center gap-4 flex-wrap">
                    <?php if ($settings['show_rating'] === 'yes') : ?>
                        <div class="product-rating flex items-center gap-2">
                            <?php echo $this->render_stars($rating); ?>
                            <span class="rating-text text-[#4a5565]"><?php echo number_format($rating, 1); ?> (<?php echo $review_count; ?> avis)</span>
                        </div>
                    <?php endif; ?>

                    <?php if ($settings['show_category'] === 'yes' && $categories) : ?>
                        <span class="product-category-badge inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#fffbf0] text-[#d2a30b] text-sm">
                            <?php echo wp_strip_all_tags($categories); ?>
                        </span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_price'] === 'yes') : ?>
                <p class="product-price font-['Merriweather',serif] text-5xl text-[#d2a30b] font-medium">
                    <?php echo $product->get_price_html(); ?>
                </p>
            <?php endif; ?>

            <?php if ($settings['show_description'] === 'yes') : ?>
                <div class="product-description text-[#4a5565] leading-relaxed">
                    <?php echo wpautop($product->get_short_description()); ?>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_add_to_cart'] === 'yes') : ?>
                <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="product-cta-button block w-full bg-[#d2a30b] text-white px-8 py-4 rounded-lg hover:bg-[#b8900a] transition-colors font-medium text-lg text-center">
                    <?php echo esc_html($settings['button_text']); ?>
                </a>
            <?php endif; ?>

            <!-- Guarantees -->
            <div class="product-guarantees grid grid-cols-2 gap-4">
                <div class="product-guarantee flex items-center gap-3 p-4 bg-white border border-gray-100 rounded-lg">
                    <svg class="w-6 h-6 text-[#d2a30b] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    <span class="text-sm text-[#4a5565]"><?php _e('Téléchargement instantané', 'digital-kappa'); ?></span>
                </div>
                <div class="product-guarantee flex items-center gap-3 p-4 bg-white border border-gray-100 rounded-lg">
                    <svg class="w-6 h-6 text-[#d2a30b] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span class="text-sm text-[#4a5565]"><?php _e('Garantie 30 jours', 'digital-kappa'); ?></span>
                </div>
                <div class="product-guarantee flex items-center gap-3 p-4 bg-white border border-gray-100 rounded-lg">
                    <svg class="w-6 h-6 text-[#d2a30b] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    <span class="text-sm text-[#4a5565]"><?php _e('Mises à jour gratuites', 'digital-kappa'); ?></span>
                </div>
                <div class="product-guarantee flex items-center gap-3 p-4 bg-white border border-gray-100 rounded-lg">
                    <svg class="w-6 h-6 text-[#d2a30b] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span class="text-sm text-[#4a5565]"><?php _e('Support technique', 'digital-kappa'); ?></span>
                </div>
            </div>
        </div>
        <?php
    }
}
