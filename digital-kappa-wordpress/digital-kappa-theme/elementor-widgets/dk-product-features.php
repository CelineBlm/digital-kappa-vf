<?php
/**
 * Elementor Widget: DK Product Features
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Product_Features_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_product_features';
    }

    public function get_title() {
        return __('DK Product Features', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Fonctionnalités', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Fonctionnalités clés',
            ]
        );

        $this->add_control(
            'source',
            [
                'label' => __('Source', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'acf',
                'options' => [
                    'acf' => __('Champ ACF du produit', 'digital-kappa'),
                    'custom' => __('Liste personnalisée', 'digital-kappa'),
                ],
            ]
        );

        $this->add_control(
            'features_list',
            [
                'label' => __('Fonctionnalités', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Fonctionnalité 1\nFonctionnalité 2\nFonctionnalité 3",
                'description' => __('Une fonctionnalité par ligne', 'digital-kappa'),
                'condition' => [
                    'source' => 'custom',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ($settings['source'] === 'acf') {
            global $product;
            if (!$product) {
                return;
            }
            $features_raw = get_field('product_features', $product->get_id());
            $features = $features_raw ? explode('|', $features_raw) : array();
        } else {
            $features = array_filter(explode("\n", $settings['features_list']));
        }

        if (empty($features)) {
            return;
        }
        ?>
        <div class="product-features bg-gray-50 rounded-xl p-6 space-y-4">
            <h3 class="text-xl font-medium mb-4"><?php echo esc_html($settings['title']); ?></h3>
            <div class="product-features-list space-y-3">
                <?php foreach ($features as $feature) : ?>
                    <div class="product-feature-item flex items-start gap-3">
                        <svg class="w-5 h-5 text-[#10b981] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-[#4a5565]"><?php echo esc_html(trim($feature)); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
