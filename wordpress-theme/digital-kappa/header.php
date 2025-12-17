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
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3">
                    <div class="h-8 w-12 relative overflow-hidden">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-digital-kappa.svg'); ?>"
                            alt="<?php bloginfo('name'); ?>"
                            class="h-8 w-auto"
                        >
                    </div>
                    <div class="flex flex-col items-start">
                        <span class="font-['Montserrat',sans-serif] text-[#1a1a1a] font-medium">Digital Kappa</span>
                        <span class="text-[10px] font-['Montserrat',sans-serif] text-[#d2a30b] tracking-wide uppercase">Produits digitaux premium</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Search -->
            <div class="hidden lg:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-[600px]">
                <div class="relative w-full">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input
                            type="search"
                            name="s"
                            placeholder="Rechercher un produit, ebook, template..."
                            value="<?php echo get_search_query(); ?>"
                            class="w-full bg-gray-50 border border-gray-200 rounded-lg px-11 py-2.5 text-sm font-['Montserrat',sans-serif]"
                        >
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-[18px] h-[18px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </form>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-toggle" class="lg:hidden p-2" aria-label="Menu">
                <svg class="menu-icon w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" x2="20" y1="12" y2="12"></line>
                    <line x1="4" x2="20" y1="6" y2="6"></line>
                    <line x1="4" x2="20" y1="18" y2="18"></line>
                </svg>
                <svg class="close-icon w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Search -->
        <div class="lg:hidden px-4 pb-3 relative">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input
                    type="search"
                    name="s"
                    placeholder="Rechercher un produit..."
                    value="<?php echo get_search_query(); ?>"
                    class="w-full bg-gray-50 border border-gray-200 rounded-lg px-10 py-2.5 text-sm font-['Montserrat',sans-serif]"
                >
                <svg class="absolute left-7 top-1/2 -translate-y-1/2 text-gray-400 w-[18px] h-[18px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
            </form>
        </div>

        <!-- Mobile Navigation -->
        <nav id="mobile-navigation" class="hidden lg:hidden absolute top-full left-0 right-0 bg-white border-b border-gray-200 shadow-lg z-50">
            <div class="flex flex-col p-4 gap-3">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="py-2 text-[#364153] hover:text-[#d2a30b] text-left font-['Montserrat',sans-serif]">
                    Accueil
                </a>
                <a href="<?php echo esc_url(home_url('/produits')); ?>" class="py-2 text-[#364153] hover:text-[#d2a30b] text-left font-['Montserrat',sans-serif]">
                    Tous nos produits
                </a>
                <a href="<?php echo esc_url(home_url('/categorie-produit/ebook')); ?>" class="py-2 text-[#364153] hover:text-[#d2a30b] text-left font-['Montserrat',sans-serif]">
                    Ebooks
                </a>
                <a href="<?php echo esc_url(home_url('/categorie-produit/application')); ?>" class="py-2 text-[#364153] hover:text-[#d2a30b] text-left font-['Montserrat',sans-serif]">
                    Applications
                </a>
                <a href="<?php echo esc_url(home_url('/categorie-produit/template')); ?>" class="py-2 text-[#364153] hover:text-[#d2a30b] text-left font-['Montserrat',sans-serif]">
                    Templates
                </a>
                <a href="<?php echo esc_url(home_url('/faq')); ?>" class="py-2 text-[#364153] hover:text-[#d2a30b] text-left font-['Montserrat',sans-serif]">
                    FAQ
                </a>
                <a href="<?php echo esc_url(home_url('/comment-ca-marche')); ?>" class="py-2 text-[#364153] hover:text-[#d2a30b] text-left font-['Montserrat',sans-serif]">
                    Comment ça marche
                </a>
            </div>
        </nav>

        <!-- Desktop Navigation -->
        <nav id="site-navigation" class="hidden lg:flex border-t border-gray-100 px-28 gap-8">
            <?php
            // Get current page slug for active state
            global $post;
            $current_slug = isset($post->post_name) ? $post->post_name : '';
            $is_home = is_front_page() || is_home();
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="py-3 text-sm text-[#364153] hover:text-[#d2a30b] font-['Montserrat',sans-serif] <?php echo $is_home ? 'border-b-2 border-[#d2a30b] text-[#d2a30b]' : ''; ?>">
                Accueil
            </a>
            <a href="<?php echo esc_url(home_url('/produits')); ?>" class="py-3 text-sm text-[#364153] hover:text-[#d2a30b] font-['Montserrat',sans-serif] <?php echo $current_slug === 'produits' ? 'border-b-2 border-[#d2a30b] text-[#d2a30b]' : ''; ?>">
                Tous nos produits
            </a>
            <a href="<?php echo esc_url(home_url('/categorie-produit/ebook')); ?>" class="py-3 text-sm text-[#364153] hover:text-[#d2a30b] font-['Montserrat',sans-serif]">
                Ebooks
            </a>
            <a href="<?php echo esc_url(home_url('/categorie-produit/application')); ?>" class="py-3 text-sm text-[#364153] hover:text-[#d2a30b] font-['Montserrat',sans-serif]">
                Applications
            </a>
            <a href="<?php echo esc_url(home_url('/categorie-produit/template')); ?>" class="py-3 text-sm text-[#364153] hover:text-[#d2a30b] font-['Montserrat',sans-serif]">
                Templates
            </a>
            <a href="<?php echo esc_url(home_url('/faq')); ?>" class="py-3 text-sm text-[#364153] hover:text-[#d2a30b] font-['Montserrat',sans-serif] <?php echo $current_slug === 'faq' ? 'border-b-2 border-[#d2a30b] text-[#d2a30b]' : ''; ?>">
                FAQ
            </a>
            <a href="<?php echo esc_url(home_url('/comment-ca-marche')); ?>" class="py-3 text-sm text-[#364153] hover:text-[#d2a30b] font-['Montserrat',sans-serif] <?php echo $current_slug === 'comment-ca-marche' ? 'border-b-2 border-[#d2a30b] text-[#d2a30b]' : ''; ?>">
                Comment ça marche
            </a>
        </nav>
    </header>

    <div id="content" class="site-content">
