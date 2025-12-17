<?php
/**
 * Plugin Name: Digital Kappa Setup
 * Plugin URI: https://digital-kappa.com
 * Description: Plugin de configuration pour Digital Kappa - Création automatique des pages, import des produits et configuration du site
 * Version: 1.0.0
 * Author: Digital Kappa
 * Author URI: https://digital-kappa.com
 * Text Domain: digital-kappa-setup
 * Domain Path: /languages
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * License: GPL v2 or later
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('DK_SETUP_VERSION', '1.0.0');
define('DK_SETUP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('DK_SETUP_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Main plugin class
 */
class Digital_Kappa_Setup {

    /**
     * Instance
     */
    private static $instance = null;

    /**
     * Get instance
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor
     */
    private function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
        add_action('wp_ajax_dk_run_setup', array($this, 'ajax_run_setup'));
        add_action('wp_ajax_dk_import_products', array($this, 'ajax_import_products'));
        add_action('wp_ajax_dk_create_pages', array($this, 'ajax_create_pages'));
        add_action('wp_ajax_dk_create_menus', array($this, 'ajax_create_menus'));
        add_action('wp_ajax_dk_create_header_footer', array($this, 'ajax_create_header_footer'));

        // Include page creation functions
        $this->include_page_functions();
    }

    /**
     * Include page creation functions
     */
    private function include_page_functions() {
        $pages_dir = DK_SETUP_PLUGIN_DIR . 'inc/pages/';

        if (file_exists($pages_dir . 'create-home.php')) {
            require_once $pages_dir . 'create-home.php';
        }
        if (file_exists($pages_dir . 'create-products.php')) {
            require_once $pages_dir . 'create-products.php';
        }
        if (file_exists($pages_dir . 'create-product-detail.php')) {
            require_once $pages_dir . 'create-product-detail.php';
        }
        if (file_exists($pages_dir . 'create-checkout.php')) {
            require_once $pages_dir . 'create-checkout.php';
        }
        if (file_exists($pages_dir . 'create-confirmation.php')) {
            require_once $pages_dir . 'create-confirmation.php';
        }
        if (file_exists($pages_dir . 'create-how-it-works.php')) {
            require_once $pages_dir . 'create-how-it-works.php';
        }
        if (file_exists($pages_dir . 'create-faq.php')) {
            require_once $pages_dir . 'create-faq.php';
        }
        if (file_exists($pages_dir . 'create-about.php')) {
            require_once $pages_dir . 'create-about.php';
        }
        if (file_exists($pages_dir . 'create-cgv.php')) {
            require_once $pages_dir . 'create-cgv.php';
        }
        if (file_exists($pages_dir . 'create-privacy.php')) {
            require_once $pages_dir . 'create-privacy.php';
        }

        // Include other setup files
        if (file_exists(DK_SETUP_PLUGIN_DIR . 'inc/create-all-pages.php')) {
            require_once DK_SETUP_PLUGIN_DIR . 'inc/create-all-pages.php';
        }
        if (file_exists(DK_SETUP_PLUGIN_DIR . 'inc/create-menus.php')) {
            require_once DK_SETUP_PLUGIN_DIR . 'inc/create-menus.php';
        }
        if (file_exists(DK_SETUP_PLUGIN_DIR . 'inc/create-header.php')) {
            require_once DK_SETUP_PLUGIN_DIR . 'inc/create-header.php';
        }
        if (file_exists(DK_SETUP_PLUGIN_DIR . 'inc/create-footer.php')) {
            require_once DK_SETUP_PLUGIN_DIR . 'inc/create-footer.php';
        }
        if (file_exists(DK_SETUP_PLUGIN_DIR . 'inc/import-products.php')) {
            require_once DK_SETUP_PLUGIN_DIR . 'inc/import-products.php';
        }
    }

    /**
     * Add admin menu
     */
    public function add_admin_menu() {
        add_menu_page(
            __('Digital Kappa Setup', 'digital-kappa-setup'),
            __('DK Setup', 'digital-kappa-setup'),
            'manage_options',
            'digital-kappa-setup',
            array($this, 'render_admin_page'),
            'dashicons-layout',
            30
        );
    }

    /**
     * Enqueue admin scripts
     */
    public function enqueue_admin_scripts($hook) {
        if ('toplevel_page_digital-kappa-setup' !== $hook) {
            return;
        }

        wp_enqueue_style(
            'dk-setup-admin',
            DK_SETUP_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            DK_SETUP_VERSION
        );

        wp_enqueue_script(
            'dk-setup-admin',
            DK_SETUP_PLUGIN_URL . 'assets/js/admin.js',
            array('jquery'),
            DK_SETUP_VERSION,
            true
        );

        wp_localize_script('dk-setup-admin', 'dkSetup', array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('dk_setup_nonce'),
            'strings' => array(
                'running' => __('En cours...', 'digital-kappa-setup'),
                'success' => __('Terminé avec succès!', 'digital-kappa-setup'),
                'error' => __('Une erreur est survenue', 'digital-kappa-setup'),
            ),
        ));
    }

    /**
     * Render admin page
     */
    public function render_admin_page() {
        ?>
        <div class="wrap dk-setup-wrap">
            <h1>
                <span class="dashicons dashicons-layout"></span>
                <?php _e('Digital Kappa - Configuration du site', 'digital-kappa-setup'); ?>
            </h1>

            <div class="dk-setup-intro">
                <p><?php _e('Bienvenue dans l\'assistant de configuration de Digital Kappa. Utilisez les boutons ci-dessous pour configurer automatiquement votre site.', 'digital-kappa-setup'); ?></p>
            </div>

            <div class="dk-setup-cards">
                <!-- Full Setup -->
                <div class="dk-setup-card dk-setup-card-primary">
                    <div class="dk-card-header">
                        <span class="dashicons dashicons-admin-settings"></span>
                        <h2><?php _e('Configuration complète', 'digital-kappa-setup'); ?></h2>
                    </div>
                    <div class="dk-card-body">
                        <p><?php _e('Lance toutes les étapes de configuration : création des pages, import des produits, création des menus et du header/footer.', 'digital-kappa-setup'); ?></p>
                        <button class="button button-primary button-hero dk-setup-btn" data-action="dk_run_setup">
                            <span class="dashicons dashicons-admin-generic"></span>
                            <?php _e('Lancer la configuration complète', 'digital-kappa-setup'); ?>
                        </button>
                    </div>
                </div>

                <!-- Create Pages -->
                <div class="dk-setup-card">
                    <div class="dk-card-header">
                        <span class="dashicons dashicons-admin-page"></span>
                        <h2><?php _e('Créer les pages', 'digital-kappa-setup'); ?></h2>
                    </div>
                    <div class="dk-card-body">
                        <p><?php _e('Crée les 10 pages Elementor avec leur structure prédéfinie.', 'digital-kappa-setup'); ?></p>
                        <ul class="dk-page-list">
                            <li>Page d'accueil</li>
                            <li>Tous les produits</li>
                            <li>Détail produit (template)</li>
                            <li>Checkout</li>
                            <li>Confirmation</li>
                            <li>Comment ça marche</li>
                            <li>FAQ</li>
                            <li>À propos</li>
                            <li>CGV</li>
                            <li>Politique de confidentialité</li>
                        </ul>
                        <button class="button button-secondary dk-setup-btn" data-action="dk_create_pages">
                            <span class="dashicons dashicons-admin-page"></span>
                            <?php _e('Créer les pages', 'digital-kappa-setup'); ?>
                        </button>
                    </div>
                </div>

                <!-- Import Products -->
                <div class="dk-setup-card">
                    <div class="dk-card-header">
                        <span class="dashicons dashicons-products"></span>
                        <h2><?php _e('Importer les produits', 'digital-kappa-setup'); ?></h2>
                    </div>
                    <div class="dk-card-body">
                        <p><?php _e('Importe les 13 produits numériques depuis le fichier CSV.', 'digital-kappa-setup'); ?></p>
                        <button class="button button-secondary dk-setup-btn" data-action="dk_import_products">
                            <span class="dashicons dashicons-upload"></span>
                            <?php _e('Importer les produits', 'digital-kappa-setup'); ?>
                        </button>
                    </div>
                </div>

                <!-- Create Menus -->
                <div class="dk-setup-card">
                    <div class="dk-card-header">
                        <span class="dashicons dashicons-menu"></span>
                        <h2><?php _e('Créer les menus', 'digital-kappa-setup'); ?></h2>
                    </div>
                    <div class="dk-card-body">
                        <p><?php _e('Crée les 3 menus WordPress : Principal, Footer, Légal.', 'digital-kappa-setup'); ?></p>
                        <button class="button button-secondary dk-setup-btn" data-action="dk_create_menus">
                            <span class="dashicons dashicons-menu"></span>
                            <?php _e('Créer les menus', 'digital-kappa-setup'); ?>
                        </button>
                    </div>
                </div>

                <!-- Create Header/Footer -->
                <div class="dk-setup-card">
                    <div class="dk-card-header">
                        <span class="dashicons dashicons-align-center"></span>
                        <h2><?php _e('Créer Header/Footer', 'digital-kappa-setup'); ?></h2>
                    </div>
                    <div class="dk-card-body">
                        <p><?php _e('Crée les templates Elementor pour le Header et le Footer.', 'digital-kappa-setup'); ?></p>
                        <button class="button button-secondary dk-setup-btn" data-action="dk_create_header_footer">
                            <span class="dashicons dashicons-editor-insertmore"></span>
                            <?php _e('Créer Header/Footer', 'digital-kappa-setup'); ?>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Progress/Log -->
            <div class="dk-setup-log" id="dk-setup-log" style="display:none;">
                <h3><?php _e('Progression', 'digital-kappa-setup'); ?></h3>
                <div class="dk-log-content" id="dk-log-content"></div>
            </div>
        </div>
        <?php
    }

    /**
     * AJAX: Run full setup
     */
    public function ajax_run_setup() {
        check_ajax_referer('dk_setup_nonce', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error(array('message' => __('Permission refusée', 'digital-kappa-setup')));
        }

        $results = array();

        // 1. Create pages
        if (function_exists('dk_create_all_pages')) {
            $results['pages'] = dk_create_all_pages();
        }

        // 2. Import products
        if (function_exists('dk_import_products_from_csv')) {
            $results['products'] = dk_import_products_from_csv();
        }

        // 3. Create menus
        if (function_exists('dk_create_menus')) {
            $results['menus'] = dk_create_menus();
        }

        // 4. Create header/footer
        if (function_exists('dk_create_header_template')) {
            $results['header'] = dk_create_header_template();
        }
        if (function_exists('dk_create_footer_template')) {
            $results['footer'] = dk_create_footer_template();
        }

        wp_send_json_success(array(
            'message' => __('Configuration complète terminée!', 'digital-kappa-setup'),
            'results' => $results,
        ));
    }

    /**
     * AJAX: Import products
     */
    public function ajax_import_products() {
        check_ajax_referer('dk_setup_nonce', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error(array('message' => __('Permission refusée', 'digital-kappa-setup')));
        }

        if (function_exists('dk_import_products_from_csv')) {
            $result = dk_import_products_from_csv();
            wp_send_json_success(array(
                'message' => __('Import des produits terminé!', 'digital-kappa-setup'),
                'result' => $result,
            ));
        } else {
            wp_send_json_error(array('message' => __('Fonction d\'import non disponible', 'digital-kappa-setup')));
        }
    }

    /**
     * AJAX: Create pages
     */
    public function ajax_create_pages() {
        check_ajax_referer('dk_setup_nonce', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error(array('message' => __('Permission refusée', 'digital-kappa-setup')));
        }

        if (function_exists('dk_create_all_pages')) {
            $result = dk_create_all_pages();
            wp_send_json_success(array(
                'message' => __('Création des pages terminée!', 'digital-kappa-setup'),
                'result' => $result,
            ));
        } else {
            wp_send_json_error(array('message' => __('Fonction de création non disponible', 'digital-kappa-setup')));
        }
    }

    /**
     * AJAX: Create menus
     */
    public function ajax_create_menus() {
        check_ajax_referer('dk_setup_nonce', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error(array('message' => __('Permission refusée', 'digital-kappa-setup')));
        }

        if (function_exists('dk_create_menus')) {
            $result = dk_create_menus();
            wp_send_json_success(array(
                'message' => __('Création des menus terminée!', 'digital-kappa-setup'),
                'result' => $result,
            ));
        } else {
            wp_send_json_error(array('message' => __('Fonction de création non disponible', 'digital-kappa-setup')));
        }
    }

    /**
     * AJAX: Create header/footer
     */
    public function ajax_create_header_footer() {
        check_ajax_referer('dk_setup_nonce', 'nonce');

        if (!current_user_can('manage_options')) {
            wp_send_json_error(array('message' => __('Permission refusée', 'digital-kappa-setup')));
        }

        $results = array();

        if (function_exists('dk_create_header_template')) {
            $results['header'] = dk_create_header_template();
        }
        if (function_exists('dk_create_footer_template')) {
            $results['footer'] = dk_create_footer_template();
        }

        wp_send_json_success(array(
            'message' => __('Création du Header/Footer terminée!', 'digital-kappa-setup'),
            'results' => $results,
        ));
    }
}

// Initialize plugin
function digital_kappa_setup_init() {
    Digital_Kappa_Setup::get_instance();
}
add_action('plugins_loaded', 'digital_kappa_setup_init');

// Activation hook
register_activation_hook(__FILE__, 'dk_setup_activate');
function dk_setup_activate() {
    // Flush rewrite rules on activation
    flush_rewrite_rules();
}

// Deactivation hook
register_deactivation_hook(__FILE__, 'dk_setup_deactivate');
function dk_setup_deactivate() {
    flush_rewrite_rules();
}
