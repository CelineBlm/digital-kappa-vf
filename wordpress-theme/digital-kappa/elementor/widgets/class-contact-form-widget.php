<?php
/**
 * Contact Form Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_Contact_Form_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_contact_form';
    }

    public function get_title() {
        return __('DK Formulaire de contact', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
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
                'label'   => __('Titre', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contactez-nous', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label'   => __('Description', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Une question ? Notre équipe est là pour vous aider.', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'email',
            [
                'label'   => __('Email de réception', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'contact@digitalkappa.com',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'   => __('Texte du bouton', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Envoyer le message', 'digital-kappa'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="contact-section py-12 lg:py-20 px-4 lg:px-20">
            <div class="max-w-4xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Contact Info -->
                    <div>
                        <?php if (!empty($settings['section_title'])) : ?>
                            <h2 class="text-dk-text-primary mb-4"><?php echo esc_html($settings['section_title']); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['section_description'])) : ?>
                            <p class="text-dk-text-muted mb-8"><?php echo esc_html($settings['section_description']); ?></p>
                        <?php endif; ?>

                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-dk-gold/10 rounded-xl flex items-center justify-center text-dk-gold">
                                    <i data-lucide="mail" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-heading text-dk-text-primary mb-1"><?php esc_html_e('Email', 'digital-kappa'); ?></h4>
                                    <p class="text-dk-text-muted"><?php echo esc_html($settings['email']); ?></p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-dk-gold/10 rounded-xl flex items-center justify-center text-dk-gold">
                                    <i data-lucide="clock" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-heading text-dk-text-primary mb-1"><?php esc_html_e('Temps de réponse', 'digital-kappa'); ?></h4>
                                    <p class="text-dk-text-muted"><?php esc_html_e('Sous 24h en jours ouvrés', 'digital-kappa'); ?></p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-dk-gold/10 rounded-xl flex items-center justify-center text-dk-gold">
                                    <i data-lucide="message-circle" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h4 class="font-heading text-dk-text-primary mb-1"><?php esc_html_e('Support', 'digital-kappa'); ?></h4>
                                    <p class="text-dk-text-muted"><?php esc_html_e('Chat en direct disponible', 'digital-kappa'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm">
                        <form class="contact-form" method="post" action="">
                            <?php wp_nonce_field('dk_contact_form', 'dk_contact_nonce'); ?>
                            <input type="hidden" name="dk_contact_email" value="<?php echo esc_attr($settings['email']); ?>">

                            <div class="form-row mb-6">
                                <div class="form-group">
                                    <label for="dk_name"><?php esc_html_e('Nom', 'digital-kappa'); ?></label>
                                    <input type="text" id="dk_name" name="dk_name" class="input-dk" required>
                                </div>
                                <div class="form-group">
                                    <label for="dk_email"><?php esc_html_e('Email', 'digital-kappa'); ?></label>
                                    <input type="email" id="dk_email" name="dk_email" class="input-dk" required>
                                </div>
                            </div>

                            <div class="form-group mb-6">
                                <label for="dk_subject"><?php esc_html_e('Sujet', 'digital-kappa'); ?></label>
                                <select id="dk_subject" name="dk_subject" class="input-dk">
                                    <option value=""><?php esc_html_e('Sélectionnez un sujet', 'digital-kappa'); ?></option>
                                    <option value="general"><?php esc_html_e('Question générale', 'digital-kappa'); ?></option>
                                    <option value="support"><?php esc_html_e('Support technique', 'digital-kappa'); ?></option>
                                    <option value="refund"><?php esc_html_e('Demande de remboursement', 'digital-kappa'); ?></option>
                                    <option value="partnership"><?php esc_html_e('Partenariat', 'digital-kappa'); ?></option>
                                    <option value="other"><?php esc_html_e('Autre', 'digital-kappa'); ?></option>
                                </select>
                            </div>

                            <div class="form-group mb-6">
                                <label for="dk_message"><?php esc_html_e('Message', 'digital-kappa'); ?></label>
                                <textarea id="dk_message" name="dk_message" class="textarea-dk" rows="5" required></textarea>
                            </div>

                            <button type="submit" class="btn-dk-primary w-full">
                                <i data-lucide="send" class="w-4 h-4"></i>
                                <?php echo esc_html($settings['button_text']); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
