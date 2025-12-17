<?php
/**
 * Elementor Widget: DK Product Gallery
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Product_Gallery_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_product_gallery';
    }

    public function get_title() {
        return __('DK Product Gallery', 'digital-kappa');
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
                'label' => __('Galerie', 'digital-kappa'),
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
                    'woocommerce' => __('Produit WooCommerce actuel', 'digital-kappa'),
                    'custom' => __('Images personnalisées', 'digital-kappa'),
                ],
            ]
        );

        $this->add_control(
            'images',
            [
                'label' => __('Images', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'condition' => [
                    'source' => 'custom',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ($settings['source'] === 'woocommerce') {
            global $product;
            if (!$product) {
                echo '<p>Aucun produit trouvé</p>';
                return;
            }

            $main_image = wp_get_attachment_image_url($product->get_image_id(), 'large');
            $gallery_ids = $product->get_gallery_image_ids();
            $gallery_images = array();

            if ($main_image) {
                $gallery_images[] = $main_image;
            }

            foreach ($gallery_ids as $id) {
                $gallery_images[] = wp_get_attachment_image_url($id, 'large');
            }
        } else {
            $gallery_images = array();
            foreach ($settings['images'] as $image) {
                $gallery_images[] = $image['url'];
            }
        }

        if (empty($gallery_images)) {
            $gallery_images[] = wc_placeholder_img_src('large');
        }
        ?>
        <div class="product-gallery space-y-4">
            <div class="product-gallery-main relative aspect-square rounded-2xl overflow-hidden bg-gray-100">
                <img src="<?php echo esc_url($gallery_images[0]); ?>" alt="Product image" class="w-full h-full object-cover" id="main-product-image">

                <?php if (count($gallery_images) > 1) : ?>
                    <div class="product-gallery-nav absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
                        <button class="gallery-prev p-2 bg-white/90 rounded-full shadow-lg hover:bg-white transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button class="gallery-next p-2 bg-white/90 rounded-full shadow-lg hover:bg-white transition-colors">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (count($gallery_images) > 1) : ?>
                <div class="product-gallery-thumbnails grid grid-cols-4 gap-4">
                    <?php foreach ($gallery_images as $index => $image) : ?>
                        <div class="product-thumbnail aspect-square rounded-lg overflow-hidden cursor-pointer border-2 <?php echo $index === 0 ? 'border-[#d2a30b] active' : 'border-transparent'; ?> hover:border-[#d2a30b] transition-all" data-image="<?php echo esc_url($image); ?>">
                            <img src="<?php echo esc_url($image); ?>" alt="Thumbnail <?php echo $index + 1; ?>" class="w-full h-full object-cover">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}
