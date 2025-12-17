<?php
/**
 * Elementor Widget: DK Header Search
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

class DK_Header_Search_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'dk_header_search';
    }

    public function get_title() {
        return __('DK Header Search', 'digital-kappa');
    }

    public function get_icon() {
        return 'eicon-search';
    }

    public function get_categories() {
        return ['digital-kappa'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Recherche', 'digital-kappa'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'placeholder_text',
            [
                'label' => __('Placeholder', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Rechercher un produit, ebook, template...',
            ]
        );

        $this->add_control(
            'placeholder_mobile',
            [
                'label' => __('Placeholder Mobile', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Rechercher un produit...',
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
            'input_bg_color',
            [
                'label' => __('Couleur de fond', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f9fafb',
                'selectors' => [
                    '{{WRAPPER}} .search-container input' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __('Couleur de bordure', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#e5e7eb',
                'selectors' => [
                    '{{WRAPPER}} .search-container input' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'focus_border_color',
            [
                'label' => __('Couleur de bordure au focus', 'digital-kappa'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#d2a30b',
                'selectors' => [
                    '{{WRAPPER}} .search-container input:focus' => 'border-color: {{VALUE}}; ring-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="search-container dk-search-container relative w-full max-w-[600px]">
            <div class="relative">
                <input
                    type="text"
                    class="dk-search-input w-full bg-gray-50 border border-gray-200 rounded-lg px-11 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#d2a30b] focus:border-transparent"
                    placeholder="<?php echo esc_attr($settings['placeholder_text']); ?>"
                    data-placeholder-mobile="<?php echo esc_attr($settings['placeholder_mobile']); ?>"
                >
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-[18px] h-[18px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <div class="dk-search-results absolute top-full left-0 right-0 bg-white border border-gray-200 rounded-lg mt-1 shadow-lg z-50 hidden"></div>
        </div>
        <?php
    }
}
