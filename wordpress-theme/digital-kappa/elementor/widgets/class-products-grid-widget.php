<?php
/**
 * Products Grid Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_Products_Grid_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_products_grid';
    }

    public function get_title() {
        return __('DK Grille de produits', 'digital-kappa');
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
                'label' => __('Contenu', 'digital-kappa'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => __('Titre de la section', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Nos produits populaires', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label'   => __('Description', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Découvrez nos meilleures ventes', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label'   => __('Nombre de produits', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 12,
                'default' => 6,
            ]
        );

        $this->add_control(
            'columns',
            [
                'label'   => __('Colonnes', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
            ]
        );

        $this->add_control(
            'category',
            [
                'label'   => __('Catégorie', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => $this->get_product_categories(),
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'   => __('Trier par', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date'     => __('Date', 'digital-kappa'),
                    'title'    => __('Titre', 'digital-kappa'),
                    'rand'     => __('Aléatoire', 'digital-kappa'),
                    'modified' => __('Dernière modification', 'digital-kappa'),
                ],
            ]
        );

        $this->add_control(
            'show_view_all_button',
            [
                'label'        => __('Afficher bouton "Voir tout"', 'digital-kappa'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __('Oui', 'digital-kappa'),
                'label_off'    => __('Non', 'digital-kappa'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'view_all_url',
            [
                'label'     => __('URL du bouton', 'digital-kappa'),
                'type'      => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'show_view_all_button' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function get_product_categories() {
        $categories = get_terms(array(
            'taxonomy'   => 'dk_product_category',
            'hide_empty' => false,
        ));

        $options = ['' => __('Toutes les catégories', 'digital-kappa')];

        if (!is_wp_error($categories)) {
            foreach ($categories as $category) {
                $options[$category->slug] = $category->name;
            }
        }

        return $options;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $args = array(
            'post_type'      => 'dk_product',
            'posts_per_page' => $settings['posts_per_page'],
            'orderby'        => $settings['orderby'],
            'order'          => 'DESC',
        );

        if (!empty($settings['category'])) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'dk_product_category',
                    'field'    => 'slug',
                    'terms'    => $settings['category'],
                ),
            );
        }

        $products = new WP_Query($args);
        ?>
        <section class="products-grid-section py-12 lg:py-20 px-4 lg:px-20">
            <div class="max-w-7xl mx-auto">
                <?php if (!empty($settings['section_title']) || !empty($settings['section_description'])) : ?>
                    <div class="text-center mb-12">
                        <?php if (!empty($settings['section_title'])) : ?>
                            <h2 class="text-dk-text-primary mb-4"><?php echo esc_html($settings['section_title']); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['section_description'])) : ?>
                            <p class="text-dk-text-muted max-w-2xl mx-auto"><?php echo esc_html($settings['section_description']); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-<?php echo esc_attr($settings['columns']); ?> gap-6">
                    <?php
                    if ($products->have_posts()) :
                        while ($products->have_posts()) : $products->the_post();
                            echo digital_kappa_product_card(get_the_ID());
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Demo products
                        $demo_products = [
                            [
                                'title'       => 'Guide du développeur moderne',
                                'description' => 'Ebook complet pour maîtriser les outils et pratiques du développement moderne.',
                                'price'       => '59 €',
                                'category'    => 'Ebook',
                                'icon'        => 'book-open',
                            ],
                            [
                                'title'       => 'Design System Pro',
                                'description' => 'Système de design complet avec composants React, Figma et documentation.',
                                'price'       => '149 €',
                                'category'    => 'Template',
                                'icon'        => 'layout-template',
                            ],
                            [
                                'title'       => 'Masterclass UI/UX Design',
                                'description' => 'Formation complète en design d\'interfaces et expérience utilisateur.',
                                'price'       => '79 €',
                                'category'    => 'Ebook',
                                'icon'        => 'palette',
                            ],
                            [
                                'title'       => 'Fitness Tracker Pro',
                                'description' => 'Application mobile complète de suivi fitness. Code source React Native.',
                                'price'       => '199 €',
                                'category'    => 'Application',
                                'icon'        => 'activity',
                            ],
                            [
                                'title'       => 'Landing Page SaaS',
                                'description' => 'Template de landing page moderne pour SaaS. Next.js 14, TypeScript.',
                                'price'       => '49 €',
                                'category'    => 'Template',
                                'icon'        => 'layout',
                            ],
                            [
                                'title'       => 'IA pour le Marketing Digital',
                                'description' => 'Guide pratique pour utiliser l\'IA dans vos campagnes marketing.',
                                'price'       => '39 €',
                                'category'    => 'Ebook',
                                'icon'        => 'brain',
                            ],
                        ];

                        $count = 0;
                        foreach ($demo_products as $product) :
                            if ($count >= $settings['posts_per_page']) break;
                            ?>
                            <article class="product-card">
                                <div class="product-card-image aspect-[4/3] bg-gradient-to-br from-dk-gold to-dk-gold-hover flex items-center justify-center">
                                    <i data-lucide="<?php echo esc_attr($product['icon']); ?>" class="w-12 h-12 text-white"></i>
                                </div>
                                <span class="product-card-badge"><?php echo esc_html($product['category']); ?></span>
                                <div class="product-card-content">
                                    <h3 class="product-card-title"><?php echo esc_html($product['title']); ?></h3>
                                    <p class="product-card-description"><?php echo esc_html($product['description']); ?></p>
                                    <div class="product-card-rating">
                                        <?php echo digital_kappa_get_rating_stars(4.8); ?>
                                        <span>(4.8)</span>
                                    </div>
                                    <div class="product-card-footer">
                                        <span class="product-card-price"><?php echo esc_html($product['price']); ?></span>
                                        <a href="#" class="product-card-button"><?php esc_html_e('Voir', 'digital-kappa'); ?></a>
                                    </div>
                                </div>
                            </article>
                            <?php
                            $count++;
                        endforeach;
                    endif;
                    ?>
                </div>

                <?php if ($settings['show_view_all_button'] === 'yes') : ?>
                    <div class="text-center mt-10">
                        <a href="<?php echo esc_url($settings['view_all_url']['url'] ?? home_url('/produits')); ?>" class="btn-dk-secondary">
                            <?php esc_html_e('Voir tous les produits', 'digital-kappa'); ?>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}
