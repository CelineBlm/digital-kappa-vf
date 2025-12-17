<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Aller au contenu', 'digital-kappa'); ?></a>

    <header id="masthead" class="site-header bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="header-container px-4 lg:px-28 py-4 relative flex items-center justify-between">
            <!-- Logo -->
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3">
                        <div class="logo-icon flex h-8 w-8 items-center justify-center rounded-lg bg-dk-gold">
                            <span class="text-lg font-bold text-white">DK</span>
                        </div>
                        <div class="flex flex-col items-start">
                            <span class="font-body text-dk-text-primary"><?php bloginfo('name'); ?></span>
                            <span class="text-xs font-body text-dk-gold tracking-wide">PRODUITS DIGITAUX PREMIUM</span>
                        </div>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Desktop Search -->
            <div class="hidden lg:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-[600px]">
                <div class="relative w-full">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input
                            type="search"
                            name="s"
                            placeholder="<?php esc_attr_e('Rechercher un produit, ebook, template...', 'digital-kappa'); ?>"
                            value="<?php echo get_search_query(); ?>"
                            class="w-full bg-gray-50 border border-gray-200 rounded-lg px-11 py-2.5 text-sm"
                        >
                        <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                    </form>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-toggle" class="lg:hidden p-2" aria-label="<?php esc_attr_e('Menu', 'digital-kappa'); ?>">
                <i data-lucide="menu" class="menu-icon w-6 h-6"></i>
                <i data-lucide="x" class="close-icon w-6 h-6 hidden"></i>
            </button>
        </div>

        <!-- Mobile Search -->
        <div class="lg:hidden px-4 pb-3 relative">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input
                    type="search"
                    name="s"
                    placeholder="<?php esc_attr_e('Rechercher un produit...', 'digital-kappa'); ?>"
                    value="<?php echo get_search_query(); ?>"
                    class="w-full bg-gray-50 border border-gray-200 rounded-lg px-10 py-2.5 text-sm"
                >
                <i data-lucide="search" class="absolute left-7 top-1/2 -translate-y-1/2 text-gray-400 w-4 h-4"></i>
            </form>
        </div>

        <!-- Mobile Navigation -->
        <nav id="mobile-navigation" class="hidden lg:hidden absolute top-full left-0 right-0 bg-white border-b border-gray-200 shadow-lg z-50">
            <div class="flex flex-col p-4 gap-3">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'mobile-menu',
                    'container'      => false,
                    'fallback_cb'    => 'digital_kappa_fallback_menu',
                    'link_before'    => '',
                    'link_after'     => '',
                    'items_wrap'     => '%3$s',
                    'walker'         => new Digital_Kappa_Mobile_Menu_Walker(),
                ));
                ?>
            </div>
        </nav>

        <!-- Desktop Navigation -->
        <nav id="site-navigation" class="hidden lg:flex border-t border-gray-100 px-28 gap-8">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'primary-menu flex gap-8',
                'container'      => false,
                'fallback_cb'    => 'digital_kappa_fallback_menu',
                'walker'         => new Digital_Kappa_Desktop_Menu_Walker(),
            ));
            ?>
        </nav>
    </header>

    <div id="content" class="site-content">
