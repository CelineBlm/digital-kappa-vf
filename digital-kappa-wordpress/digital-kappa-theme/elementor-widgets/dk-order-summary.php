<?php
/**
 * Elementor Widget: DK Order Summary
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Order_Summary_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_order_summary';
    }

    public function get_title() {
        return __('DK Order Summary', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-cart';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Résumé', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Votre commande',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Texte du bouton', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Confirmer et payer',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if (!function_exists('WC') || !WC()->cart) {
            echo '<p>Panier non disponible</p>';
            return;
        }

        $cart = WC()->cart;
        ?>
        <div class="checkout-summary lg:col-span-1">
            <div class="order-summary-card bg-white rounded-xl p-6 shadow-sm sticky top-24">
                <h2 class="text-2xl mb-6 pb-4 border-b border-gray-200"><?php echo esc_html($settings['title']); ?></h2>

                <?php foreach ($cart->get_cart() as $cart_item_key => $cart_item) : ?>
                    <?php
                    $product = $cart_item['data'];
                    $image_url = get_the_post_thumbnail_url($product->get_id(), 'thumbnail');
                    ?>
                    <div class="order-product flex gap-4 pb-6 border-b border-gray-200">
                        <div class="order-product-image w-20 h-20 rounded-lg overflow-hidden bg-gray-100">
                            <?php if ($image_url) : ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" class="w-full h-full object-cover">
                            <?php endif; ?>
                        </div>
                        <div class="order-product-info flex-1">
                            <p class="order-product-title font-medium text-[#1a1a1a] mb-1"><?php echo esc_html($product->get_name()); ?></p>
                            <p class="order-product-category text-sm text-[#4a5565]"><?php echo wc_get_product_category_list($product->get_id()); ?></p>
                        </div>
                        <p class="order-product-price font-['Merriweather',serif] text-xl text-[#d2a30b] font-medium">
                            <?php echo wc_price($cart_item['line_total']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>

                <div class="order-summary-details space-y-4 py-6 border-b border-gray-200">
                    <div class="order-summary-row flex items-center justify-between">
                        <span class="order-summary-label text-[#4a5565]"><?php _e('Sous-total', 'digital-kappa'); ?></span>
                        <span class="order-summary-value text-[#1a1a1a] font-medium"><?php echo wc_price($cart->get_subtotal()); ?></span>
                    </div>
                    <?php if ($cart->get_total_tax() > 0) : ?>
                        <div class="order-summary-row flex items-center justify-between">
                            <span class="order-summary-label text-[#4a5565]"><?php _e('TVA', 'digital-kappa'); ?></span>
                            <span class="order-summary-value text-[#1a1a1a] font-medium"><?php echo wc_price($cart->get_total_tax()); ?></span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="order-summary-total flex items-center justify-between pt-6 text-xl font-medium">
                    <span><?php _e('Total', 'digital-kappa'); ?></span>
                    <span class="total-amount font-['Merriweather',serif] text-3xl text-[#d2a30b]"><?php echo wc_price($cart->get_total('edit')); ?></span>
                </div>

                <div class="order-benefits space-y-3 mt-6 py-6 border-t border-gray-200">
                    <div class="order-benefit flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#d2a30b] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        <span class="text-sm text-[#4a5565]"><?php _e('Téléchargement instantané après paiement', 'digital-kappa'); ?></span>
                    </div>
                    <div class="order-benefit flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#d2a30b] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        <span class="text-sm text-[#4a5565]"><?php _e('Garantie satisfait ou remboursé 30 jours', 'digital-kappa'); ?></span>
                    </div>
                    <div class="order-benefit flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#d2a30b] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        <span class="text-sm text-[#4a5565]"><?php _e('Mises à jour gratuites à vie', 'digital-kappa'); ?></span>
                    </div>
                </div>

                <button type="submit" class="checkout-submit-button w-full bg-[#d2a30b] text-white px-6 py-4 rounded-lg hover:bg-[#b8900a] transition-colors font-medium text-lg flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <?php echo esc_html($settings['button_text']); ?>
                </button>

                <p class="checkout-security-note text-center text-sm text-[#4a5565] mt-4">
                    <svg class="inline w-4 h-4 text-[#10b981]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <?php _e('Vos informations sont protégées par un cryptage SSL', 'digital-kappa'); ?>
                </p>
            </div>
        </div>
        <?php
    }
}
