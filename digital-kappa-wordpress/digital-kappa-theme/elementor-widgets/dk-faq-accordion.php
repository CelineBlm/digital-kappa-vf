<?php
/**
 * Elementor Widget: DK FAQ Accordion
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_FAQ_Accordion_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_faq_accordion';
    }

    public function get_title() {
        return __('DK FAQ Accordion', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-accordion';
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
            'show_header',
            [
                'label' => __("Afficher l'en-tête", 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __('Titre', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Questions fréquentes',
                'condition' => [
                    'show_header' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __('Description', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Tout ce que vous devez savoir sur Digital Kappa',
                'condition' => [
                    'show_header' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'faq_items',
            [
                'label' => __('Questions', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'question',
                        'label' => __('Question', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Question fréquente ?',
                    ],
                    [
                        'name' => 'answer',
                        'label' => __('Réponse', 'digital-kappa'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => 'Réponse à la question.',
                    ],
                ],
                'default' => [
                    [
                        'question' => 'Comment acheter un produit ?',
                        'answer' => 'Parcourez notre catalogue, sélectionnez le produit qui vous intéresse et cliquez sur "Acheter". Vous serez guidé à travers un processus de paiement sécurisé.',
                    ],
                    [
                        'question' => 'Puis-je obtenir un remboursement ?',
                        'answer' => 'Oui, nous offrons une garantie satisfait ou remboursé de 30 jours sur tous nos produits.',
                    ],
                    [
                        'question' => 'Les produits sont-ils régulièrement mis à jour ?',
                        'answer' => 'Absolument ! Tous nos produits reçoivent des mises à jour régulières gratuites.',
                    ],
                ],
                'title_field' => '{{{ question }}}',
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'accordion_style',
            [
                'label' => __('Style', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'bordered',
                'options' => [
                    'bordered' => __('Bordure', 'digital-kappa'),
                    'filled' => __('Rempli', 'digital-kappa'),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $style = $settings['accordion_style'];
        ?>
        <section class="faq-section-dk py-12 lg:py-20 px-4 lg:px-20 bg-white">
            <div class="max-w-3xl mx-auto">
                <?php if ($settings['show_header'] === 'yes') : ?>
                    <div class="section-header text-center mb-10 lg:mb-12">
                        <h2 class="text-[#1a1a1a] mb-4"><?php echo esc_html($settings['section_title']); ?></h2>
                        <p class="text-[#4a5565]"><?php echo esc_html($settings['section_description']); ?></p>
                    </div>
                <?php endif; ?>

                <div class="faq-accordion faq-container space-y-4">
                    <?php foreach ($settings['faq_items'] as $index => $item) : ?>
                        <div class="faq-accordion-item faq-item <?php echo $style === 'filled' ? 'bg-gray-50' : 'bg-white border border-gray-200'; ?> rounded-xl overflow-hidden">
                            <button class="faq-question-button w-full flex items-center justify-between p-6 text-left font-medium text-[#1a1a1a] hover:bg-gray-50 transition-colors" data-faq-index="<?php echo $index; ?>">
                                <span class="faq-question-text flex-1 pr-4"><?php echo esc_html($item['question']); ?></span>
                                <span class="faq-toggle-icon w-6 h-6 text-[#d2a30b] flex-shrink-0 transition-transform">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>
                            <div class="faq-answer px-6 pb-6 text-[#4a5565] hidden">
                                <?php echo wp_kses_post($item['answer']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
