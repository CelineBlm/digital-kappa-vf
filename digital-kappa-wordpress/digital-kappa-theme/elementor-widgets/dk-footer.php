<?php
/**
 * Elementor Widget: DK Footer
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Footer_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_footer';
    }

    public function get_title() {
        return __('DK Footer', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-footer';
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
            'tagline',
            [
                'label' => __('Tagline', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Votre marketplace de produits digitaux premium',
            ]
        );

        $this->add_control(
            'copyright_text',
            [
                'label' => __('Copyright', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '2024 Digital Kappa. Tous droits réservés.',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $pages_links = array(
            array('title' => 'Accueil', 'url' => home_url('/')),
            array('title' => 'Produits', 'url' => home_url('/produits/')),
            array('title' => 'Blog', 'url' => home_url('/blog/')),
            array('title' => 'Contact', 'url' => home_url('/contact/')),
        );

        $categories_links = array(
            array('title' => 'Applications', 'url' => home_url('/produits/?cat=applications')),
            array('title' => 'Ebooks', 'url' => home_url('/produits/?cat=ebooks')),
            array('title' => 'Templates', 'url' => home_url('/produits/?cat=templates')),
        );

        $legal_links = array(
            array('title' => 'Conditions générales', 'url' => home_url('/conditions-generales-de-vente/')),
            array('title' => 'Politique de confidentialité', 'url' => home_url('/politique-de-confidentialite/')),
            array('title' => 'Mentions légales', 'url' => home_url('/mentions-legales/')),
        );
        ?>
        <footer class="footer-dk bg-[#1a1a1a] text-white py-12 lg:py-16 px-4 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-12">
                    <!-- Logo & Tagline -->
                    <div class="space-y-4">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-[#d2a30b] rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-lg">K</span>
                            </div>
                            <span class="font-['Merriweather',serif] font-bold text-white text-lg"><?php echo esc_html($settings['logo_text']); ?></span>
                        </a>
                        <p class="text-gray-400 text-sm"><?php echo esc_html($settings['tagline']); ?></p>
                    </div>

                    <!-- Pages -->
                    <div>
                        <h4 class="font-['Merriweather',serif] font-medium text-white mb-4">Pages</h4>
                        <ul class="space-y-2">
                            <?php foreach ($pages_links as $link) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Catégories -->
                    <div>
                        <h4 class="font-['Merriweather',serif] font-medium text-white mb-4">Catégories</h4>
                        <ul class="space-y-2">
                            <?php foreach ($categories_links as $link) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Légal -->
                    <div>
                        <h4 class="font-['Merriweather',serif] font-medium text-white mb-4">Légal</h4>
                        <ul class="space-y-2">
                            <?php foreach ($legal_links as $link) : ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="pt-8 border-t border-gray-800 text-center">
                    <p class="text-gray-500 text-sm">&copy; <?php echo esc_html($settings['copyright_text']); ?></p>
                </div>
            </div>
        </footer>
        <?php
    }
}
