<?php
/**
 * Elementor Widget: DK Product Card
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Product_Card_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_product_card';
    }

    public function get_title() {
        return __('DK Product Card', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-products';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Produit', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'source',
            [
                'label' => __('Source', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'woocommerce',
                'options' => [
                    'woocommerce' => __('Produit WooCommerce', 'digital-kappa'),
                    'custom' => __('Personnalisé', 'digital-kappa'),
                ],
            ]
        );

        $this->add_control(
            'product_id',
            [
                'label' => __('ID du produit', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'source' => 'woocommerce',
                ],
            ]
        );

        $this->add_control(
            'custom_image',
            [
                'label' => __('Image', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'source' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'custom_title',
            [
                'label' => __('Titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Nom du produit',
                'condition' => [
                    'source' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'custom_category',
            [
                'label' => __('Catégorie', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Ebook',
                'condition' => [
                    'source' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'custom_description',
            [
                'label' => __('Description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Description du produit',
                'condition' => [
                    'source' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'custom_price',
            [
                'label' => __('Prix', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '49 €',
                'condition' => [
                    'source' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'custom_rating',
            [
                'label' => __('Note', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 5,
                'step' => 0.1,
                'default' => 4.5,
                'condition' => [
                    'source' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'custom_link',
            [
                'label' => __('Lien', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'source' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'show_badge',
            [
                'label' => __('Afficher le badge', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'badge_text',
            [
                'label' => __('Texte du badge', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Populaire',
                'condition' => [
                    'show_badge' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render_stars($rating) {
        $html = '<div class="product-stars flex items-center gap-0.5">';
        for ($i = 1; $i <= 5; $i++) {
            $fill = $i <= $rating ? 'currentColor' : 'none';
            $stroke = $i <= $rating ? 'none' : 'currentColor';
            $html .= '<svg class="w-4 h-4 text-[#d2a30b]" fill="' . $fill . '" viewBox="0 0 20 20" stroke="' . $stroke . '"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
        }
        $html .= '</div>';
        return $html;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ($settings['source'] === 'woocommerce' && !empty($settings['product_id'])) {
            $product = wc_get_product($settings['product_id']);
            if (!$product) {
                echo '<p>Produit non trouvé</p>';
                return;
            }

            $image_id = $product->get_image_id();
            $image_url = wp_get_attachment_image_url($image_id, 'dk-product-card');
            $title = $product->get_name();
            $description = $product->get_short_description();
            $price = $product->get_price_html();
            $link = get_permalink($product->get_id());
            $rating = (float) get_field('product_rating', $product->get_id()) ?: 4.5;
            $categories = wc_get_product_category_list($product->get_id(), ', ');
        } else {
            $image_url = $settings['custom_image']['url'] ?? '';
            $title = $settings['custom_title'];
            $description = $settings['custom_description'];
            $price = $settings['custom_price'];
            $link = $settings['custom_link']['url'] ?? '#';
            $rating = (float) $settings['custom_rating'];
            $categories = $settings['custom_category'];
        }
        ?>
        <div class="card-dk-product bg-white rounded-2xl border border-[#f0f2f5] shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:scale-[1.02] cursor-pointer">
            <a href="<?php echo esc_url($link); ?>" class="block">
                <!-- Image du produit -->
                <div class="product-image-container relative aspect-[4/3] overflow-hidden">
                    <?php if ($image_url) : ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="product-image w-full h-full object-cover">
                    <?php else : ?>
                        <div class="product-image bg-gray-200 w-full h-full flex items-center justify-center">
                            <span class="text-gray-400">Image</span>
                        </div>
                    <?php endif; ?>

                    <?php if ($settings['show_badge'] === 'yes') : ?>
                        <span class="product-badge absolute top-4 right-4 bg-[#d2a30b] text-white text-xs px-2.5 py-1 rounded-lg font-['Montserrat',sans-serif]">
                            <?php echo esc_html($settings['badge_text']); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Contenu du produit -->
                <div class="product-content p-6 space-y-3">
                    <?php if ($categories) : ?>
                        <span class="product-category inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#fffbf0] text-[#d2a30b] text-sm font-['Montserrat',sans-serif]">
                            <?php echo wp_strip_all_tags($categories); ?>
                        </span>
                    <?php endif; ?>

                    <h3 class="product-title font-['Merriweather',serif] text-xl text-[#1a1a1a] font-medium line-clamp-2"><?php echo esc_html($title); ?></h3>

                    <?php if ($description) : ?>
                        <p class="product-description text-[#4a5565] text-sm line-clamp-2"><?php echo esc_html(wp_strip_all_tags($description)); ?></p>
                    <?php endif; ?>

                    <!-- Rating -->
                    <div class="product-rating flex items-center gap-2">
                        <?php echo $this->render_stars($rating); ?>
                        <span class="product-rating-text text-[#4a5565] text-sm"><?php echo number_format($rating, 1); ?></span>
                    </div>

                    <!-- Prix et bouton -->
                    <div class="product-footer flex items-center justify-between border-t border-gray-100 pt-4">
                        <span class="product-price font-['Merriweather',serif] text-2xl text-[#d2a30b] font-medium"><?php echo $price; ?></span>
                        <span class="product-cta bg-[#d2a30b] text-white px-4 py-2 rounded-lg hover:bg-[#b8900a] transition-colors duration-200 text-sm font-medium">
                            Voir le produit
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
}
