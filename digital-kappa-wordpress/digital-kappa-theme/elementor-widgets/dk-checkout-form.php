<?php
/**
 * Elementor Widget: DK Checkout Form
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Checkout_Form_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_checkout_form';
    }

    public function get_title() {
        return __('DK Checkout Form', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Formulaire', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'billing_title',
            [
                'label' => __('Titre facturation', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Informations de facturation',
            ]
        );

        $this->add_control(
            'payment_title',
            [
                'label' => __('Titre paiement', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Méthode de paiement',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if (!function_exists('WC')) {
            echo '<p>WooCommerce non installé</p>';
            return;
        }
        ?>
        <div class="checkout-form-section lg:col-span-2 space-y-8">
            <!-- Billing Section -->
            <div class="checkout-section bg-white rounded-xl p-6 lg:p-8 shadow-sm">
                <h2 class="text-2xl mb-6 pb-4 border-b border-gray-200"><?php echo esc_html($settings['billing_title']); ?></h2>

                <div class="checkout-form-grid grid md:grid-cols-2 gap-6">
                    <div class="checkout-form-field space-y-2">
                        <label class="block text-[#1a1a1a] font-medium"><?php _e('Prénom', 'digital-kappa'); ?> *</label>
                        <input type="text" name="billing_first_name" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#d2a30b] focus:border-transparent" required>
                    </div>

                    <div class="checkout-form-field space-y-2">
                        <label class="block text-[#1a1a1a] font-medium"><?php _e('Nom', 'digital-kappa'); ?> *</label>
                        <input type="text" name="billing_last_name" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#d2a30b] focus:border-transparent" required>
                    </div>

                    <div class="checkout-form-field space-y-2 full-width md:col-span-2">
                        <label class="block text-[#1a1a1a] font-medium"><?php _e('Email', 'digital-kappa'); ?> *</label>
                        <input type="email" name="billing_email" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#d2a30b] focus:border-transparent" required>
                        <p class="helper-text text-sm text-[#4a5565]"><?php _e('Votre produit sera envoyé à cette adresse', 'digital-kappa'); ?></p>
                    </div>

                    <div class="checkout-form-field space-y-2">
                        <label class="block text-[#1a1a1a] font-medium"><?php _e('Téléphone', 'digital-kappa'); ?></label>
                        <input type="tel" name="billing_phone" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#d2a30b] focus:border-transparent">
                    </div>

                    <div class="checkout-form-field space-y-2">
                        <label class="block text-[#1a1a1a] font-medium"><?php _e('Pays', 'digital-kappa'); ?> *</label>
                        <select name="billing_country" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#d2a30b] focus:border-transparent" required>
                            <option value="FR">France</option>
                            <option value="BE">Belgique</option>
                            <option value="CH">Suisse</option>
                            <option value="CA">Canada</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="checkout-section bg-white rounded-xl p-6 lg:p-8 shadow-sm">
                <h2 class="text-2xl mb-6 pb-4 border-b border-gray-200"><?php echo esc_html($settings['payment_title']); ?></h2>

                <div class="payment-methods space-y-4">
                    <label class="payment-method flex items-center gap-4 p-4 border-2 border-[#d2a30b] bg-[#fffbf0] rounded-lg cursor-pointer selected">
                        <input type="radio" name="payment_method" value="stripe" class="w-5 h-5 text-[#d2a30b] border-gray-300 focus:ring-[#d2a30b]" checked>
                        <div class="payment-method-info flex-1">
                            <p class="payment-method-title font-medium text-[#1a1a1a]"><?php _e('Carte bancaire', 'digital-kappa'); ?></p>
                            <p class="payment-method-description text-sm text-[#4a5565]"><?php _e('Visa, Mastercard, American Express', 'digital-kappa'); ?></p>
                        </div>
                        <div class="payment-method-logos flex gap-2">
                            <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded">VISA</span>
                            <span class="bg-red-500 text-white text-xs px-2 py-1 rounded">MC</span>
                        </div>
                    </label>

                    <label class="payment-method flex items-center gap-4 p-4 border-2 border-gray-200 rounded-lg cursor-pointer">
                        <input type="radio" name="payment_method" value="paypal" class="w-5 h-5 text-[#d2a30b] border-gray-300 focus:ring-[#d2a30b]">
                        <div class="payment-method-info flex-1">
                            <p class="payment-method-title font-medium text-[#1a1a1a]">PayPal</p>
                            <p class="payment-method-description text-sm text-[#4a5565]"><?php _e('Paiement sécurisé via PayPal', 'digital-kappa'); ?></p>
                        </div>
                        <span class="bg-blue-700 text-white text-xs px-2 py-1 rounded">PayPal</span>
                    </label>
                </div>

                <div class="payment-badges flex flex-wrap gap-3 mt-4">
                    <div class="payment-badge flex items-center gap-2 px-3 py-2 bg-gray-50 rounded-lg text-sm">
                        <svg class="w-4 h-4 text-[#10b981]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <span><?php _e('Paiement sécurisé', 'digital-kappa'); ?></span>
                    </div>
                    <div class="payment-badge flex items-center gap-2 px-3 py-2 bg-gray-50 rounded-lg text-sm">
                        <svg class="w-4 h-4 text-[#10b981]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        <span><?php _e('Garantie 30 jours', 'digital-kappa'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
