<?php
/**
 * Elementor Widget: DK Header
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Header_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_header';
    }

    public function get_title() {
        return __('DK Header', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-header';
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
            'logo_text',
            [
                'label' => __('Texte du logo', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Digital Kappa',
            ]
        );

        $this->add_control(
            'show_search',
            [
                'label' => __('Afficher la recherche', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'search_placeholder',
            [
                'label' => __('Placeholder recherche', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Rechercher un produit, ebook, template...',
                'condition' => [
                    'show_search' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <header class="header-dk bg-white border-b border-gray-100 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="flex items-center justify-between h-16 lg:h-20">
                    <!-- Logo -->
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 flex-shrink-0">
                        <div class="w-8 h-8 bg-[#1a1a1a] rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">K</span>
                        </div>
                        <span class="font-['Merriweather',serif] font-bold text-[#1a1a1a] text-lg hidden sm:block"><?php echo esc_html($settings['logo_text']); ?></span>
                    </a>

                    <!-- Navigation Desktop -->
                    <nav class="hidden lg:flex items-center gap-1">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="px-4 py-2 text-[#d2a30b] font-medium border-b-2 border-[#d2a30b]">Accueil</a>
                        <a href="<?php echo esc_url(home_url('/produits/')); ?>" class="px-4 py-2 text-[#4a5565] hover:text-[#1a1a1a] transition-colors">Tous nos produits</a>
                        <a href="<?php echo esc_url(home_url('/produits/?cat=ebooks')); ?>" class="px-4 py-2 text-[#4a5565] hover:text-[#1a1a1a] transition-colors">Ebooks</a>
                        <a href="<?php echo esc_url(home_url('/produits/?cat=applications')); ?>" class="px-4 py-2 text-[#4a5565] hover:text-[#1a1a1a] transition-colors">Applications</a>
                        <a href="<?php echo esc_url(home_url('/produits/?cat=templates')); ?>" class="px-4 py-2 text-[#4a5565] hover:text-[#1a1a1a] transition-colors">Templates</a>
                        <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="px-4 py-2 text-[#4a5565] hover:text-[#1a1a1a] transition-colors">FAQ</a>
                        <a href="<?php echo esc_url(home_url('/comment-ca-marche/')); ?>" class="px-4 py-2 text-[#4a5565] hover:text-[#1a1a1a] transition-colors">Comment ça marche</a>
                    </nav>

                    <!-- Search Bar -->
                    <?php if ($settings['show_search'] === 'yes') : ?>
                    <div class="hidden md:flex items-center flex-1 max-w-md mx-8">
                        <div class="relative w-full">
                            <input type="text"
                                   placeholder="<?php echo esc_attr($settings['search_placeholder']); ?>"
                                   class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#d2a30b] focus:ring-2 focus:ring-[#d2a30b]/20 transition-all"
                                   id="dk-search-input">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <div id="dk-search-results" class="absolute top-full left-0 right-0 mt-2 bg-white rounded-lg shadow-xl border border-gray-100 hidden z-50"></div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Mobile Menu Button -->
                    <button class="lg:hidden p-2 text-gray-600 hover:text-gray-900" id="dk-mobile-menu-btn">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div class="lg:hidden hidden pb-4" id="dk-mobile-menu">
                    <nav class="flex flex-col gap-2">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="px-4 py-2 text-[#d2a30b] font-medium bg-[#fffbf0] rounded-lg">Accueil</a>
                        <a href="<?php echo esc_url(home_url('/produits/')); ?>" class="px-4 py-2 text-[#4a5565] hover:bg-gray-50 rounded-lg">Tous nos produits</a>
                        <a href="<?php echo esc_url(home_url('/produits/?cat=ebooks')); ?>" class="px-4 py-2 text-[#4a5565] hover:bg-gray-50 rounded-lg">Ebooks</a>
                        <a href="<?php echo esc_url(home_url('/produits/?cat=applications')); ?>" class="px-4 py-2 text-[#4a5565] hover:bg-gray-50 rounded-lg">Applications</a>
                        <a href="<?php echo esc_url(home_url('/produits/?cat=templates')); ?>" class="px-4 py-2 text-[#4a5565] hover:bg-gray-50 rounded-lg">Templates</a>
                        <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="px-4 py-2 text-[#4a5565] hover:bg-gray-50 rounded-lg">FAQ</a>
                        <a href="<?php echo esc_url(home_url('/comment-ca-marche/')); ?>" class="px-4 py-2 text-[#4a5565] hover:bg-gray-50 rounded-lg">Comment ça marche</a>
                    </nav>
                </div>
            </div>
        </header>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileBtn = document.getElementById('dk-mobile-menu-btn');
            const mobileMenu = document.getElementById('dk-mobile-menu');

            if (mobileBtn && mobileMenu) {
                mobileBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
        </script>
        <?php
    }
}
