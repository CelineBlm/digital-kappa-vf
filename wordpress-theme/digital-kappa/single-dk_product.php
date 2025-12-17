<?php
/**
 * Template for displaying single product
 *
 * @package Digital_Kappa
 */

get_header();

while (have_posts()) :
    the_post();

    $price = get_post_meta(get_the_ID(), '_dk_price', true);
    $rating = get_post_meta(get_the_ID(), '_dk_rating', true) ?: 4.5;
    $features = get_post_meta(get_the_ID(), '_dk_features', true);
    $includes = get_post_meta(get_the_ID(), '_dk_includes', true);

    $terms = get_the_terms(get_the_ID(), 'dk_product_category');
    $category = $terms ? $terms[0]->name : '';
    ?>

    <main id="primary" class="site-main">
        <!-- Breadcrumbs -->
        <div class="bg-white border-b border-gray-100 px-4 lg:px-20">
            <?php digital_kappa_breadcrumbs(); ?>
        </div>

        <!-- Product Details -->
        <section class="py-12 lg:py-16 px-4 lg:px-20">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-12">
                    <!-- Product Image -->
                    <div class="product-gallery">
                        <div class="rounded-2xl overflow-hidden border border-gray-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                            <?php else : ?>
                                <div class="aspect-[4/3] bg-gradient-to-br from-dk-gold to-dk-gold-hover flex items-center justify-center">
                                    <i data-lucide="package" class="w-24 h-24 text-white"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="product-info">
                        <?php if ($category) : ?>
                            <span class="badge-dk-light mb-4"><?php echo esc_html($category); ?></span>
                        <?php endif; ?>

                        <h1 class="text-dk-text-primary mb-4"><?php the_title(); ?></h1>

                        <div class="flex items-center gap-4 mb-6">
                            <?php echo digital_kappa_get_rating_stars($rating); ?>
                            <span class="text-dk-text-muted">(<?php echo esc_html($rating); ?>/5)</span>
                        </div>

                        <div class="text-dk-text-secondary mb-6">
                            <?php the_content(); ?>
                        </div>

                        <div class="flex items-center gap-6 mb-8">
                            <span class="text-4xl font-heading text-dk-gold"><?php echo esc_html($price); ?></span>
                            <span class="text-sm text-dk-text-muted"><?php esc_html_e('TTC', 'digital-kappa'); ?></span>
                        </div>

                        <a href="<?php echo esc_url(home_url('/checkout?product=' . get_the_ID())); ?>" class="btn-dk-primary w-full lg:w-auto text-center mb-6">
                            <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                            <?php esc_html_e('Acheter maintenant', 'digital-kappa'); ?>
                        </a>

                        <!-- Guarantees -->
                        <div class="grid grid-cols-2 gap-4 p-4 bg-dk-light rounded-xl">
                            <?php foreach (digital_kappa_get_guarantees() as $guarantee) : ?>
                                <div class="flex items-center gap-2 text-sm">
                                    <i data-lucide="<?php echo esc_attr($guarantee['icon']); ?>" class="w-4 h-4 text-green-600"></i>
                                    <span class="text-dk-text-muted"><?php echo esc_html($guarantee['title']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Features & Includes Tabs -->
                <?php if ($features || $includes) : ?>
                    <div class="mt-16">
                        <div class="border-b border-gray-200 mb-8">
                            <nav class="flex gap-8">
                                <button class="tab-btn active pb-4 border-b-2 border-dk-gold text-dk-gold font-medium" data-tab="features">
                                    <?php esc_html_e('Fonctionnalités', 'digital-kappa'); ?>
                                </button>
                                <button class="tab-btn pb-4 border-b-2 border-transparent text-dk-text-muted hover:text-dk-gold" data-tab="includes">
                                    <?php esc_html_e('Ce qui est inclus', 'digital-kappa'); ?>
                                </button>
                            </nav>
                        </div>

                        <div class="tab-content" id="features">
                            <?php if ($features) : ?>
                                <ul class="grid md:grid-cols-2 gap-4">
                                    <?php foreach (explode("\n", $features) as $feature) : ?>
                                        <?php if (trim($feature)) : ?>
                                            <li class="flex items-start gap-3">
                                                <i data-lucide="check-circle" class="w-5 h-5 text-dk-gold flex-shrink-0 mt-0.5"></i>
                                                <span class="text-dk-text-secondary"><?php echo esc_html(trim($feature)); ?></span>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>

                        <div class="tab-content hidden" id="includes">
                            <?php if ($includes) : ?>
                                <ul class="grid md:grid-cols-2 gap-4">
                                    <?php foreach (explode("\n", $includes) as $item) : ?>
                                        <?php if (trim($item)) : ?>
                                            <li class="flex items-start gap-3">
                                                <i data-lucide="package" class="w-5 h-5 text-dk-gold flex-shrink-0 mt-0.5"></i>
                                                <span class="text-dk-text-secondary"><?php echo esc_html(trim($item)); ?></span>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Related Products -->
        <?php
        $related_products = new WP_Query(array(
            'post_type'      => 'dk_product',
            'posts_per_page' => 3,
            'post__not_in'   => array(get_the_ID()),
            'orderby'        => 'rand',
        ));

        if ($related_products->have_posts()) :
            ?>
            <section class="py-12 lg:py-16 px-4 lg:px-20 bg-dk-light">
                <div class="max-w-7xl mx-auto">
                    <h2 class="text-dk-text-primary text-center mb-12"><?php esc_html_e('Produits similaires', 'digital-kappa'); ?></h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        <?php
                        while ($related_products->have_posts()) :
                            $related_products->the_post();
                            echo digital_kappa_product_card(get_the_ID());
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>

    <script>
        // Tab switching
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('active', 'border-dk-gold', 'text-dk-gold');
                    b.classList.add('border-transparent', 'text-dk-text-muted');
                });
                this.classList.add('active', 'border-dk-gold', 'text-dk-gold');
                this.classList.remove('border-transparent', 'text-dk-text-muted');

                document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
                document.getElementById(this.dataset.tab).classList.remove('hidden');
            });
        });
    </script>

<?php
endwhile;

get_footer();
