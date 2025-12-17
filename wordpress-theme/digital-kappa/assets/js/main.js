/**
 * Digital Kappa Theme Main JavaScript
 *
 * @package Digital_Kappa
 */

(function($) {
    'use strict';

    // Initialize when DOM is ready
    $(document).ready(function() {
        initMobileMenu();
        initFAQAccordions();
        initSmoothScroll();
        initProductFilters();
        initLucideIcons();
    });

    /**
     * Initialize Lucide Icons
     */
    function initLucideIcons() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = $('#mobile-menu-toggle');
        const mobileNav = $('#mobile-navigation');

        menuToggle.on('click', function() {
            $(this).toggleClass('active');
            mobileNav.toggleClass('hidden');

            // Toggle icons
            $(this).find('.menu-icon').toggleClass('hidden');
            $(this).find('.close-icon').toggleClass('hidden');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#mobile-menu-toggle, #mobile-navigation').length) {
                menuToggle.removeClass('active');
                mobileNav.addClass('hidden');
                menuToggle.find('.menu-icon').removeClass('hidden');
                menuToggle.find('.close-icon').addClass('hidden');
            }
        });
    }

    /**
     * FAQ Accordions
     */
    function initFAQAccordions() {
        $('.faq-accordion-header').on('click', function() {
            const accordion = $(this).closest('.faq-accordion');
            const wasActive = accordion.hasClass('active');

            // Close all accordions
            $('.faq-accordion').removeClass('active');
            $('.faq-accordion-content').slideUp(200);

            // If this one wasn't active, open it
            if (!wasActive) {
                accordion.addClass('active');
                accordion.find('.faq-accordion-content').slideDown(200);
            }
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.hash);

            if (target.length) {
                e.preventDefault();

                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 500);
            }
        });
    }

    /**
     * Product Filters
     */
    function initProductFilters() {
        // Category filter
        $('input[name="category[]"]').on('change', function() {
            applyFilters();
        });

        // Price filter
        $('input[name="price"]').on('change', function() {
            applyFilters();
        });

        // Rating filter
        $('input[name="rating"]').on('change', function() {
            applyFilters();
        });

        // Reset filters
        $('.product-filters button').on('click', function() {
            $('input[name="category[]"]').prop('checked', false);
            $('input[name="category[]"][value="all"]').prop('checked', true);
            $('input[name="price"][value="all"]').prop('checked', true);
            $('input[name="rating"][value="all"]').prop('checked', true);
            applyFilters();
        });
    }

    /**
     * Apply Product Filters (AJAX)
     */
    function applyFilters() {
        const categories = [];
        $('input[name="category[]"]:checked').each(function() {
            categories.push($(this).val());
        });

        const price = $('input[name="price"]:checked').val();
        const rating = $('input[name="rating"]:checked').val();

        // You can implement AJAX filtering here
        console.log('Filters:', { categories, price, rating });

        // For now, just reload with query params
        // Implement AJAX filtering based on your needs
    }

    /**
     * Sticky Header
     */
    $(window).on('scroll', function() {
        const header = $('.site-header');
        if ($(window).scrollTop() > 100) {
            header.addClass('scrolled');
        } else {
            header.removeClass('scrolled');
        }
    });

    /**
     * Animation on scroll
     */
    function animateOnScroll() {
        const elements = document.querySelectorAll('.animate-on-scroll');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, {
            threshold: 0.1
        });

        elements.forEach(element => {
            observer.observe(element);
        });
    }

    // Initialize animation on scroll when page loads
    $(window).on('load', function() {
        animateOnScroll();
    });

})(jQuery);
