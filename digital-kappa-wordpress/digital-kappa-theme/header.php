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
    <?php
    // Let Elementor handle header if using Theme Builder
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('header')) :
    ?>
    <header id="masthead" class="header-dk">
        <div class="container-dk">
            <div class="logo-container">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <span class="logo-title"><?php bloginfo('name'); ?></span>
                </a>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'fallback_cb' => false,
                ));
                ?>
            </nav>
        </div>
    </header>
    <?php endif; ?>

    <div id="content" class="site-content">
