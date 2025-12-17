<?php
/**
 * Product Filters Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_Product_Filters_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_product_filters';
    }

    public function get_title() {
        return __('DK Filtres produits', 'digital-kappa');
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
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_categories',
            [
                'label'        => __('Afficher catégories', 'digital-kappa'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __('Oui', 'digital-kappa'),
                'label_off'    => __('Non', 'digital-kappa'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'show_price_filter',
            [
                'label'        => __('Afficher filtre prix', 'digital-kappa'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __('Oui', 'digital-kappa'),
                'label_off'    => __('Non', 'digital-kappa'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'show_rating_filter',
            [
                'label'        => __('Afficher filtre note', 'digital-kappa'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __('Oui', 'digital-kappa'),
                'label_off'    => __('Non', 'digital-kappa'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <aside class="product-filters">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-heading text-lg text-dk-text-primary"><?php esc_html_e('Filtres', 'digital-kappa'); ?></h3>
                <button class="text-sm text-dk-gold hover:text-dk-gold-hover"><?php esc_html_e('Réinitialiser', 'digital-kappa'); ?></button>
            </div>

            <?php if ($settings['show_categories'] === 'yes') : ?>
                <div class="filter-section">
                    <h4><?php esc_html_e('Catégorie', 'digital-kappa'); ?></h4>
                    <div class="space-y-2">
                        <label class="filter-option">
                            <input type="checkbox" name="category[]" value="all" checked>
                            <span><?php esc_html_e('Tous', 'digital-kappa'); ?></span>
                        </label>
                        <?php
                        $categories = get_terms(array(
                            'taxonomy'   => 'dk_product_category',
                            'hide_empty' => false,
                        ));

                        if (!is_wp_error($categories) && !empty($categories)) :
                            foreach ($categories as $category) :
                                ?>
                                <label class="filter-option">
                                    <input type="checkbox" name="category[]" value="<?php echo esc_attr($category->slug); ?>">
                                    <span><?php echo esc_html($category->name); ?></span>
                                </label>
                                <?php
                            endforeach;
                        else :
                            // Default categories
                            ?>
                            <label class="filter-option">
                                <input type="checkbox" name="category[]" value="ebook">
                                <span><?php esc_html_e('Ebooks', 'digital-kappa'); ?></span>
                            </label>
                            <label class="filter-option">
                                <input type="checkbox" name="category[]" value="application">
                                <span><?php esc_html_e('Applications', 'digital-kappa'); ?></span>
                            </label>
                            <label class="filter-option">
                                <input type="checkbox" name="category[]" value="template">
                                <span><?php esc_html_e('Templates', 'digital-kappa'); ?></span>
                            </label>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_price_filter'] === 'yes') : ?>
                <div class="filter-section">
                    <h4><?php esc_html_e('Prix', 'digital-kappa'); ?></h4>
                    <div class="space-y-2">
                        <label class="filter-option">
                            <input type="radio" name="price" value="all" checked>
                            <span><?php esc_html_e('Tous les prix', 'digital-kappa'); ?></span>
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="price" value="0-50">
                            <span><?php esc_html_e('Moins de 50 €', 'digital-kappa'); ?></span>
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="price" value="50-100">
                            <span><?php esc_html_e('50 € - 100 €', 'digital-kappa'); ?></span>
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="price" value="100-200">
                            <span><?php esc_html_e('100 € - 200 €', 'digital-kappa'); ?></span>
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="price" value="200+">
                            <span><?php esc_html_e('Plus de 200 €', 'digital-kappa'); ?></span>
                        </label>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_rating_filter'] === 'yes') : ?>
                <div class="filter-section">
                    <h4><?php esc_html_e('Note minimum', 'digital-kappa'); ?></h4>
                    <div class="space-y-2">
                        <label class="filter-option">
                            <input type="radio" name="rating" value="all" checked>
                            <span><?php esc_html_e('Toutes les notes', 'digital-kappa'); ?></span>
                        </label>
                        <?php for ($i = 4; $i >= 1; $i--) : ?>
                            <label class="filter-option">
                                <input type="radio" name="rating" value="<?php echo esc_attr($i); ?>">
                                <span class="flex items-center gap-1">
                                    <?php echo digital_kappa_get_rating_stars($i); ?>
                                    <span class="text-xs text-dk-text-muted"><?php esc_html_e('et plus', 'digital-kappa'); ?></span>
                                </span>
                            </label>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endif; ?>
        </aside>
        <?php
    }
}
