<?php
/**
 * Elementor Widget: DK Product Grid
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Product_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_product_grid';
    }

    public function get_title() {
        return __('DK Product Grid', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Contenu', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __('Titre de la section', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Découvrez nos produits',
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __('Description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Une sélection de produits digitaux de haute qualité pour développeurs et créateurs',
            ]
        );

        $this->add_control(
            'products_count',
            [
                'label' => __('Nombre de produits', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 12,
                'default' => 3,
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
            'product_category',
            [
                'label' => __('Catégorie', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => __('Slug de la catégorie (optionnel)', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'featured_only',
            [
                'label' => __('Produits en vedette uniquement', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'show_button',
            [
                'label' => __('Afficher le bouton', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Texte du bouton', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Voir tous les produits',
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Lien du bouton', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '/boutique/',
                ],
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render_stars($rating) {
        $html = '<div class="product-stars flex items-center gap-0.5">';
        for ($i = 1; $i <= 5; $i++) {
            $fill = $i <= $rating ? 'currentColor' : 'none';
            $html .= '<svg class="w-4 h-4 text-[#d2a30b]" fill="' . $fill . '" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
        }
        $html .= '</div>';
        return $html;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $settings['products_count'],
            'post_status' => 'publish',
        );

        if ($settings['featured_only'] === 'yes') {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                ),
            );
        }

        if (!empty($settings['product_category'])) {
            $args['tax_query'][] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $settings['product_category'],
            );
        }

        $products = new WP_Query($args);

        $button_link = !empty($settings['button_link']['url']) ? $settings['button_link']['url'] : '/boutique/';
        ?>
        <section class="products-section-dk bg-gradient-to-b from-[#f9fafb] to-white py-12 lg:py-20 px-4 lg:px-20">
            <div class="max-w-7xl mx-auto">
                <div class="section-header text-center mb-10 lg:mb-12">
                    <h2 class="text-[#1a1a1a] mb-4"><?php echo esc_html($settings['section_title']); ?></h2>
                    <p class="text-[#4a5565] max-w-2xl mx-auto"><?php echo esc_html($settings['section_description']); ?></p>
                </div>

                <div class="products-grid grid sm:grid-cols-2 lg:grid-cols-<?php echo $settings['columns']; ?> gap-6 max-w-5xl mx-auto mb-8">
                    <?php if ($products->have_posts()) : ?>
                        <?php while ($products->have_posts()) : $products->the_post(); ?>
                            <?php
                            $product = wc_get_product(get_the_ID());
                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'dk-product-card');
                            // Get rating from ACF or post meta
                            $rating = 4.5;
                            if (function_exists('get_field')) {
                                $rating = (float) get_field('product_rating', get_the_ID()) ?: 4.5;
                            } elseif (get_post_meta(get_the_ID(), '_dk_rating', true)) {
                                $rating = (float) get_post_meta(get_the_ID(), '_dk_rating', true);
                            }
                            ?>
                            <div class="card-dk-product bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                                <a href="<?php the_permalink(); ?>" class="block">
                                    <div class="bg-gray-50 h-[220px] overflow-hidden">
                                        <?php if ($image_url) : ?>
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover">
                                        <?php else : ?>
                                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                                <span class="text-gray-400">Image</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="p-5 space-y-3">
                                        <h3 class="font-['Merriweather',serif] text-[#1a1a1a] min-h-[48px]"><?php the_title(); ?></h3>
                                        <p class="text-[#1a1a1a]"><?php echo $product->get_price_html(); ?></p>
                                        <span class="text-[#d2a30b] text-sm flex items-center gap-2 hover:gap-3 transition-all">
                                            Voir le produit
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p class="col-span-full text-center text-gray-500">Aucun produit trouvé.</p>
                    <?php endif; ?>
                </div>

                <?php if ($settings['show_button'] === 'yes') : ?>
                    <div class="text-center">
                        <a href="<?php echo esc_url($button_link); ?>" class="bg-[#d2a30b] text-white px-8 py-3 rounded-lg hover:bg-[#b8900a] transition-colors inline-flex items-center gap-2">
                            <?php echo esc_html($settings['button_text']); ?>
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}
