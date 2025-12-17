<?php
/**
 * Elementor Widget: DK Product Listing
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Product_Listing_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_product_listing';
    }

    public function get_title() {
        return __('DK Product Listing', 'digital-kappa');
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
                'label' => __('Produits', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'products_per_page',
            [
                'label' => __('Produits par page', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 9,
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => __('Colonnes', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
            ]
        );

        $this->add_control(
            'show_toolbar',
            [
                'label' => __('Afficher la barre d\'outils', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label' => __('Afficher la pagination', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => __('Catégorie (slug)', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => __('Laissez vide pour afficher tous les produits', 'digital-kappa'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $settings['products_per_page'],
            'post_status' => 'publish',
            'paged' => $paged,
        );

        if (!empty($settings['category'])) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $settings['category'],
                ),
            );
        }

        $products = new WP_Query($args);
        ?>
        <div class="products-content lg:col-span-3 space-y-6">
            <?php if ($settings['show_toolbar'] === 'yes') : ?>
                <div class="products-toolbar flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-6 border-b border-gray-200">
                    <p class="results-count text-[#4a5565]">
                        <?php echo sprintf(__('%d produits', 'digital-kappa'), $products->found_posts); ?>
                    </p>
                    <div class="toolbar-right flex items-center gap-4">
                        <select class="sort-select px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#d2a30b]">
                            <option value="date"><?php _e('Plus récents', 'digital-kappa'); ?></option>
                            <option value="price_low"><?php _e('Prix croissant', 'digital-kappa'); ?></option>
                            <option value="price_high"><?php _e('Prix décroissant', 'digital-kappa'); ?></option>
                            <option value="rating"><?php _e('Mieux notés', 'digital-kappa'); ?></option>
                        </select>
                        <div class="view-toggle flex gap-2">
                            <button class="view-button active p-2 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors" data-view="grid">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                            </button>
                            <button class="view-button p-2 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors" data-view="list">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="products-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-<?php echo $settings['columns']; ?> gap-6">
                <?php if ($products->have_posts()) : ?>
                    <?php while ($products->have_posts()) : $products->the_post(); ?>
                        <?php
                        $product = wc_get_product(get_the_ID());
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'dk-product-card');
                        $rating = 4.5;
                        if (function_exists('get_field')) {
                            $rating = (float) get_field('product_rating', get_the_ID()) ?: 4.5;
                        } elseif (get_post_meta(get_the_ID(), '_dk_rating', true)) {
                            $rating = (float) get_post_meta(get_the_ID(), '_dk_rating', true);
                        }
                        $categories = wc_get_product_category_list(get_the_ID());
                        ?>
                        <div class="card-dk-product bg-white rounded-2xl border border-[#f0f2f5] shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:scale-[1.02]">
                            <a href="<?php the_permalink(); ?>" class="block">
                                <div class="product-image-container relative aspect-[4/3] overflow-hidden">
                                    <?php if ($image_url) : ?>
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" class="product-image w-full h-full object-cover">
                                    <?php else : ?>
                                        <div class="product-image bg-gray-200 w-full h-full flex items-center justify-center">
                                            <span class="text-gray-400">Image</span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($product->is_featured()) : ?>
                                        <span class="product-badge absolute top-4 right-4 bg-[#d2a30b] text-white text-xs px-2.5 py-1 rounded-lg font-['Montserrat',sans-serif]">
                                            <?php _e('Populaire', 'digital-kappa'); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="product-content p-6 space-y-3">
                                    <?php if ($categories) : ?>
                                        <span class="product-category inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#fffbf0] text-[#d2a30b] text-sm font-['Montserrat',sans-serif]">
                                            <?php echo wp_strip_all_tags($categories); ?>
                                        </span>
                                    <?php endif; ?>

                                    <h3 class="product-title font-['Merriweather',serif] text-xl text-[#1a1a1a] font-medium line-clamp-2"><?php the_title(); ?></h3>

                                    <p class="product-description text-[#4a5565] text-sm line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>

                                    <div class="product-footer flex items-center justify-between border-t border-gray-100 pt-4">
                                        <span class="product-price font-['Merriweather',serif] text-2xl text-[#d2a30b] font-medium"><?php echo $product->get_price_html(); ?></span>
                                        <span class="product-cta bg-[#d2a30b] text-white px-4 py-2 rounded-lg hover:bg-[#b8900a] transition-colors duration-200 text-sm font-medium">
                                            <?php _e('Voir', 'digital-kappa'); ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <div class="products-empty-state col-span-full text-center py-16">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <h3 class="text-xl text-[#1a1a1a] mb-2"><?php _e('Aucun produit trouvé', 'digital-kappa'); ?></h3>
                        <p class="text-[#4a5565] mb-6"><?php _e('Essayez de modifier vos filtres', 'digital-kappa'); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($settings['show_pagination'] === 'yes' && $products->max_num_pages > 1) : ?>
                <div class="products-pagination flex items-center justify-center gap-2 mt-8">
                    <?php
                    echo paginate_links(array(
                        'total' => $products->max_num_pages,
                        'current' => $paged,
                        'format' => '?paged=%#%',
                        'prev_text' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>',
                        'next_text' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>',
                    ));
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}
