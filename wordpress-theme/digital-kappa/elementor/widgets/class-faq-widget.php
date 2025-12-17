<?php
/**
 * FAQ Widget for Elementor
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class Digital_Kappa_FAQ_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_faq';
    }

    public function get_title() {
        return __('DK FAQ', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-help-o';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('FAQ', 'digital-kappa'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'   => __('Titre', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Questions fréquentes', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label'   => __('Description', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Trouvez rapidement les réponses à vos questions', 'digital-kappa'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'question',
            [
                'label'   => __('Question', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('Question fréquente ?', 'digital-kappa'),
            ]
        );

        $repeater->add_control(
            'answer',
            [
                'label'   => __('Réponse', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Réponse à la question.', 'digital-kappa'),
            ]
        );

        $this->add_control(
            'faqs',
            [
                'label'   => __('Questions', 'digital-kappa'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'question' => 'Qu\'est-ce que Digital Kappa ?',
                        'answer'   => 'Digital Kappa est une marketplace de produits digitaux proposant des applications mobiles, des ebooks et des templates. Notre mission est de vous fournir des ressources numériques de qualité.',
                    ],
                    [
                        'question' => 'Comment fonctionne le téléchargement ?',
                        'answer'   => 'Une fois votre achat effectué, vous recevez immédiatement un email avec un lien de téléchargement sécurisé. Les téléchargements sont illimités et sans date d\'expiration.',
                    ],
                    [
                        'question' => 'Quels moyens de paiement acceptez-vous ?',
                        'answer'   => 'Nous acceptons les cartes bancaires (Visa, Mastercard, American Express), PayPal, et les virements bancaires. Tous les paiements sont sécurisés.',
                    ],
                    [
                        'question' => 'Proposez-vous des mises à jour ?',
                        'answer'   => 'Oui, tous nos produits bénéficient de mises à jour gratuites. Vous recevez automatiquement un email lorsqu\'une nouvelle version est disponible.',
                    ],
                    [
                        'question' => 'Quelle est votre politique de remboursement ?',
                        'answer'   => 'Nous offrons une garantie satisfait ou remboursé de 14 jours sur tous nos produits. Si vous n\'êtes pas satisfait, contactez-nous pour un remboursement intégral.',
                    ],
                ],
                'title_field' => '{{{ question }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="faq-section py-12 lg:py-20 px-4 lg:px-20">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <?php if (!empty($settings['section_title'])) : ?>
                        <h2 class="text-dk-text-primary mb-4"><?php echo esc_html($settings['section_title']); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($settings['section_description'])) : ?>
                        <p class="text-dk-text-muted"><?php echo esc_html($settings['section_description']); ?></p>
                    <?php endif; ?>
                </div>

                <div class="space-y-4">
                    <?php foreach ($settings['faqs'] as $index => $faq) : ?>
                        <div class="faq-accordion" data-faq-index="<?php echo esc_attr($index); ?>">
                            <button class="faq-accordion-header" onclick="this.parentElement.classList.toggle('active')">
                                <span class="question"><?php echo esc_html($faq['question']); ?></span>
                                <i data-lucide="chevron-down" class="icon w-5 h-5"></i>
                            </button>
                            <div class="faq-accordion-content">
                                <p><?php echo esc_html($faq['answer']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
