<?php
/**
 * Elementor Widget: DK Order Confirmation
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Order_Confirmation_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_order_confirmation';
    }

    public function get_title() {
        return __('DK Order Confirmation', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-check-circle';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Confirmation', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Merci pour votre achat !',
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __('Sous-titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Votre commande a bien été confirmée',
            ]
        );

        $this->add_control(
            'downloads_title',
            [
                'label' => __('Titre téléchargements', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Vos téléchargements',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Get order ID from URL or recent order
        $order_id = isset($_GET['order-received']) ? absint($_GET['order-received']) : 0;

        if (!$order_id) {
            // Show demo content in editor
            ?>
            <div class="order-confirmation-page min-h-screen bg-gray-50">
                <section class="confirmation-header bg-white py-12 px-4 lg:px-20 text-center border-b border-gray-200">
                    <div class="confirmation-icon w-20 h-20 mx-auto mb-6 text-[#10b981]">
                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h1 class="text-[#1a1a1a] mb-4"><?php echo esc_html($settings['title']); ?></h1>
                    <p class="confirmation-badge inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#fffbf0] text-[#d2a30b] font-medium">
                        <?php echo esc_html($settings['subtitle']); ?>
                    </p>
                </section>

                <section class="confirmation-main py-8 lg:py-12 px-4 lg:px-20">
                    <div class="container-dk max-w-5xl mx-auto">
                        <div class="confirmation-card bg-white rounded-xl p-6 lg:p-8 shadow-sm">
                            <h2 class="text-2xl mb-4 pb-4 border-b border-gray-200"><?php echo esc_html($settings['downloads_title']); ?></h2>
                            <p class="text-[#4a5565]"><?php _e('Les détails de la commande apparaîtront ici après l\'achat.', 'digital-kappa'); ?></p>
                        </div>
                    </div>
                </section>
            </div>
            <?php
            return;
        }

        $order = wc_get_order($order_id);
        if (!$order) {
            echo '<p>Commande non trouvée</p>';
            return;
        }
        ?>
        <div class="order-confirmation-page min-h-screen bg-gray-50">
            <section class="confirmation-header bg-white py-12 px-4 lg:px-20 text-center border-b border-gray-200">
                <div class="confirmation-icon w-20 h-20 mx-auto mb-6 text-[#10b981]">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h1 class="text-[#1a1a1a] mb-4"><?php echo esc_html($settings['title']); ?></h1>
                <p class="confirmation-badge inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#fffbf0] text-[#d2a30b] font-medium">
                    <?php echo esc_html($settings['subtitle']); ?> - #<?php echo $order->get_order_number(); ?>
                </p>
            </section>

            <section class="confirmation-main py-8 lg:py-12 px-4 lg:px-20">
                <div class="container-dk max-w-5xl mx-auto grid lg:grid-cols-3 gap-8">
                    <div class="confirmation-content lg:col-span-2 space-y-6">
                        <!-- Email Info -->
                        <div class="email-sent-info flex items-start gap-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <div class="email-sent-text flex-1">
                                <h3 class="font-medium text-[#1a1a1a] mb-1"><?php _e('Email de confirmation envoyé', 'digital-kappa'); ?></h3>
                                <p class="text-[#4a5565] text-sm">
                                    <?php _e('Un email contenant vos liens de téléchargement a été envoyé à', 'digital-kappa'); ?>
                                    <span class="email-address font-medium text-blue-600"><?php echo esc_html($order->get_billing_email()); ?></span>
                                </p>
                            </div>
                        </div>

                        <!-- Downloads -->
                        <div class="confirmation-card bg-white rounded-xl p-6 lg:p-8 shadow-sm">
                            <h2 class="text-2xl mb-4 pb-4 border-b border-gray-200"><?php echo esc_html($settings['downloads_title']); ?></h2>
                            <div class="order-products-list space-y-4">
                                <?php foreach ($order->get_items() as $item) : ?>
                                    <?php
                                    $product = $item->get_product();
                                    $image_url = get_the_post_thumbnail_url($product->get_id(), 'thumbnail');
                                    $downloads = $order->get_downloadable_items();
                                    ?>
                                    <div class="order-product-item flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                                        <div class="order-product-image w-20 h-20 rounded-lg overflow-hidden bg-white">
                                            <?php if ($image_url) : ?>
                                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" class="w-full h-full object-cover">
                                            <?php endif; ?>
                                        </div>
                                        <div class="order-product-details flex-1">
                                            <p class="order-product-title font-medium text-[#1a1a1a] mb-1"><?php echo esc_html($product->get_name()); ?></p>
                                            <p class="order-product-category text-sm text-[#4a5565]"><?php echo wc_get_product_category_list($product->get_id()); ?></p>
                                        </div>
                                        <?php
                                        foreach ($downloads as $download) {
                                            if ($download['product_id'] == $product->get_id()) {
                                                ?>
                                                <a href="<?php echo esc_url($download['download_url']); ?>" class="order-product-download bg-[#d2a30b] text-white px-4 py-2 rounded-lg hover:bg-[#b8900a] transition-colors font-medium text-sm flex items-center gap-2">
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                    <?php _e('Télécharger', 'digital-kappa'); ?>
                                                </a>
                                                <?php
                                                break;
                                            }
                                        }
                                        ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="confirmation-sidebar lg:col-span-1 space-y-6">
                        <div class="order-summary-recap bg-white rounded-xl p-6 shadow-sm">
                            <h3 class="text-xl font-medium mb-4 pb-4 border-b border-gray-200"><?php _e('Récapitulatif', 'digital-kappa'); ?></h3>
                            <div class="order-summary-rows space-y-3">
                                <div class="summary-row flex items-center justify-between">
                                    <span class="summary-label text-[#4a5565]"><?php _e('Sous-total', 'digital-kappa'); ?></span>
                                    <span class="summary-value text-[#1a1a1a] font-medium"><?php echo wc_price($order->get_subtotal()); ?></span>
                                </div>
                                <?php if ($order->get_total_tax() > 0) : ?>
                                    <div class="summary-row flex items-center justify-between">
                                        <span class="summary-label text-[#4a5565]"><?php _e('TVA', 'digital-kappa'); ?></span>
                                        <span class="summary-value text-[#1a1a1a] font-medium"><?php echo wc_price($order->get_total_tax()); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="summary-total flex items-center justify-between pt-4 border-t border-gray-200 text-lg font-medium">
                                <span><?php _e('Total', 'digital-kappa'); ?></span>
                                <span class="total-amount font-['Merriweather',serif] text-2xl text-[#d2a30b]"><?php echo wc_price($order->get_total()); ?></span>
                            </div>
                        </div>

                        <a href="<?php echo esc_url(home_url('/')); ?>" class="back-to-home-button w-full bg-white text-[#d2a30b] border-2 border-[#d2a30b] px-6 py-3 rounded-lg hover:bg-[#fffbf0] transition-colors font-medium flex items-center justify-center gap-2">
                            <?php _e('Retour à l\'accueil', 'digital-kappa'); ?>
                        </a>
                    </div>
                </div>
            </section>
        </div>
        <?php
    }
}
