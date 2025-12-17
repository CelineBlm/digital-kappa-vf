<?php
/**
 * Elementor Widget: DK Product Filters
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Product_Filters_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_product_filters';
    }

    public function get_title() {
        return __('DK Product Filters', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-filter';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Filtres', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_categories',
            [
                'label' => __('Afficher les catégories', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_price_filter',
            [
                'label' => __('Afficher le filtre de prix', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_rating_filter',
            [
                'label' => __('Afficher le filtre de note', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_reset_button',
            [
                'label' => __('Afficher le bouton réinitialiser', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Get product categories
        $categories = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
        ));
        ?>
        <aside class="products-sidebar lg:col-span-1 space-y-6">
            <?php if ($settings['show_categories'] === 'yes' && !empty($categories) && !is_wp_error($categories)) : ?>
                <div class="filter-section bg-white rounded-xl border border-gray-100 p-6">
                    <h3 class="text-lg font-medium mb-4 text-[#1a1a1a]"><?php _e('Catégories', 'digital-kappa'); ?></h3>
                    <div class="filter-options space-y-3">
                        <?php foreach ($categories as $category) : ?>
                            <label class="filter-option flex items-center gap-3">
                                <input type="checkbox" class="filter-category w-4 h-4 text-[#d2a30b] border-gray-300 rounded focus:ring-[#d2a30b] focus:ring-2" value="<?php echo esc_attr($category->slug); ?>">
                                <span class="text-[#4a5565] cursor-pointer flex-1"><?php echo esc_html($category->name); ?></span>
                                <span class="count text-sm text-[#9ca3af]">(<?php echo $category->count; ?>)</span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_price_filter'] === 'yes') : ?>
                <div class="filter-section bg-white rounded-xl border border-gray-100 p-6">
                    <h3 class="text-lg font-medium mb-4 text-[#1a1a1a]"><?php _e('Prix', 'digital-kappa'); ?></h3>
                    <div class="price-filter-inputs grid grid-cols-2 gap-3">
                        <input type="number" id="min-price" placeholder="<?php _e('Min', 'digital-kappa'); ?>" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#d2a30b]">
                        <input type="number" id="max-price" placeholder="<?php _e('Max', 'digital-kappa'); ?>" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#d2a30b]">
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_rating_filter'] === 'yes') : ?>
                <div class="filter-section bg-white rounded-xl border border-gray-100 p-6">
                    <h3 class="text-lg font-medium mb-4 text-[#1a1a1a]"><?php _e('Note minimum', 'digital-kappa'); ?></h3>
                    <div class="filter-options space-y-3">
                        <?php for ($i = 4; $i >= 1; $i--) : ?>
                            <label class="rating-filter-option flex items-center gap-2">
                                <input type="radio" name="rating_filter" class="filter-rating w-4 h-4 text-[#d2a30b] border-gray-300 focus:ring-[#d2a30b]" value="<?php echo $i; ?>">
                                <div class="stars flex gap-0.5">
                                    <?php for ($j = 1; $j <= 5; $j++) : ?>
                                        <svg class="w-4 h-4 <?php echo $j <= $i ? 'text-[#d2a30b]' : 'text-gray-300'; ?>" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    <?php endfor; ?>
                                </div>
                                <span class="text-sm text-[#4a5565]"><?php echo sprintf(__('%d+ étoiles', 'digital-kappa'), $i); ?></span>
                            </label>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_reset_button'] === 'yes') : ?>
                <button class="filter-reset-button w-full px-4 py-2 border border-[#d2a30b] text-[#d2a30b] rounded-lg hover:bg-[#fffbf0] transition-colors font-medium">
                    <?php _e('Réinitialiser les filtres', 'digital-kappa'); ?>
                </button>
            <?php endif; ?>
        </aside>
        <?php
    }
}
