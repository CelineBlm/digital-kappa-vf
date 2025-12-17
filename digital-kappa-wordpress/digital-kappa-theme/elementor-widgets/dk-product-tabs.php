<?php
/**
 * Elementor Widget: DK Product Tabs
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Product_Tabs_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_product_tabs';
    }

    public function get_title() {
        return __('DK Product Tabs', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Onglets', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_description',
            [
                'label' => __('Afficher Description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_included',
            [
                'label' => __('Afficher Ce qui est inclus', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_requirements',
            [
                'label' => __('Afficher Prérequis', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_reviews',
            [
                'label' => __('Afficher Avis', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
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

        $tabs = array();

        if ($settings['show_description'] === 'yes') {
            $tabs['description'] = array(
                'title' => __('Description', 'digital-kappa'),
                'content' => $product->get_description(),
            );
        }

        if ($settings['show_included'] === 'yes') {
            $included = '';
            if (function_exists('get_field')) {
                $included = get_field('product_included', $product->get_id());
            } else {
                $included = get_post_meta($product->get_id(), '_dk_included', true);
            }
            if ($included) {
                $tabs['included'] = array(
                    'title' => __('Ce qui est inclus', 'digital-kappa'),
                    'items' => explode('|', $included),
                    'icon' => 'check',
                );
            }
        }

        if ($settings['show_requirements'] === 'yes') {
            $requirements = '';
            if (function_exists('get_field')) {
                $requirements = get_field('product_requirements', $product->get_id());
            } else {
                $requirements = get_post_meta($product->get_id(), '_dk_requirements', true);
            }
            if ($requirements) {
                $tabs['requirements'] = array(
                    'title' => __('Prérequis', 'digital-kappa'),
                    'items' => explode('|', $requirements),
                    'icon' => 'info',
                );
            }
        }

        if ($settings['show_reviews'] === 'yes') {
            $tabs['reviews'] = array(
                'title' => __('Avis', 'digital-kappa'),
                'type' => 'reviews',
            );
        }

        if (empty($tabs)) {
            return;
        }
        ?>
        <section class="product-tabs-section py-12 px-4 lg:px-20 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="product-tabs border-b border-gray-200 mb-8">
                    <div class="product-tabs-list flex flex-wrap gap-8">
                        <?php $first = true; foreach ($tabs as $key => $tab) : ?>
                            <button class="product-tab-button pb-4 px-2 text-[#4a5565] font-medium hover:text-[#d2a30b] transition-colors border-b-2 <?php echo $first ? 'border-[#d2a30b] text-[#d2a30b] active' : 'border-transparent'; ?>" data-tab="tab-<?php echo $key; ?>">
                                <?php echo esc_html($tab['title']); ?>
                            </button>
                        <?php $first = false; endforeach; ?>
                    </div>
                </div>

                <?php $first = true; foreach ($tabs as $key => $tab) : ?>
                    <div id="tab-<?php echo $key; ?>" class="product-tab-content space-y-6" <?php echo !$first ? 'style="display:none;"' : ''; ?>>
                        <?php if (isset($tab['content'])) : ?>
                            <div class="prose max-w-none text-[#4a5565]">
                                <?php echo wp_kses_post($tab['content']); ?>
                            </div>
                        <?php elseif (isset($tab['items'])) : ?>
                            <ul class="space-y-3">
                                <?php foreach ($tab['items'] as $item) : ?>
                                    <li class="flex items-start gap-3 <?php echo $tab['icon'] === 'check' ? 'included' : 'requirement'; ?>">
                                        <?php if ($tab['icon'] === 'check') : ?>
                                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-[#10b981]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <?php else : ?>
                                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-[#3b82f6]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <?php endif; ?>
                                        <span class="text-[#4a5565]"><?php echo esc_html(trim($item)); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php elseif (isset($tab['type']) && $tab['type'] === 'reviews') : ?>
                            <?php comments_template(); ?>
                        <?php endif; ?>
                    </div>
                <?php $first = false; endforeach; ?>
            </div>
        </section>
        <?php
    }
}
