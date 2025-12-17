/**
 * Digital Kappa Custom Scripts
 *
 * @package Digital_Kappa
 */

(function($) {
    'use strict';

    /**
     * FAQ Accordion
     */
    function initFAQAccordion() {
        $('.faq-accordion-item').each(function() {
            var $item = $(this);
            var $question = $item.find('.faq-question-button');
            var $answer = $item.find('.faq-answer');

            $question.on('click', function(e) {
                e.preventDefault();

                var isOpen = $item.hasClass('open');

                // Close all other items
                $('.faq-accordion-item').removeClass('open');
                $('.faq-accordion-item .faq-answer').slideUp(300);

                // Toggle current item
                if (!isOpen) {
                    $item.addClass('open');
                    $answer.slideDown(300);
                }
            });
        });
    }

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        var $menuToggle = $('.mobile-menu-toggle');
        var $mobileMenu = $('.mobile-menu');
        var $body = $('body');

        $menuToggle.on('click', function(e) {
            e.preventDefault();
            $mobileMenu.toggleClass('active');
            $body.toggleClass('menu-open');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.mobile-menu, .mobile-menu-toggle').length) {
                $mobileMenu.removeClass('active');
                $body.removeClass('menu-open');
            }
        });
    }

    /**
     * Smooth Scroll
     */
    function initSmoothScroll() {
        $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on('click', function(e) {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                var $target = $(this.hash);
                $target = $target.length ? $target : $('[name=' + this.hash.slice(1) + ']');

                if ($target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: $target.offset().top - 100
                    }, 800);
                }
            }
        });
    }

    /**
     * Product Gallery
     */
    function initProductGallery() {
        var $mainImage = $('.product-gallery-main img');
        var $thumbnails = $('.product-thumbnail');

        $thumbnails.on('click', function() {
            var $this = $(this);
            var newSrc = $this.find('img').attr('src');

            $thumbnails.removeClass('active');
            $this.addClass('active');

            $mainImage.fadeOut(200, function() {
                $(this).attr('src', newSrc).fadeIn(200);
            });
        });
    }

    /**
     * Product Tabs
     */
    function initProductTabs() {
        var $tabButtons = $('.product-tab-button');
        var $tabContents = $('.product-tab-content');

        $tabButtons.on('click', function(e) {
            e.preventDefault();
            var tabId = $(this).data('tab');

            $tabButtons.removeClass('active');
            $(this).addClass('active');

            $tabContents.hide();
            $('#' + tabId).fadeIn(300);
        });
    }

    /**
     * Price Range Slider
     */
    function initPriceRangeSlider() {
        var $minPrice = $('#min-price');
        var $maxPrice = $('#max-price');

        if ($minPrice.length && $maxPrice.length) {
            $minPrice.add($maxPrice).on('change', function() {
                var min = parseInt($minPrice.val()) || 0;
                var max = parseInt($maxPrice.val()) || 999;

                // Trigger filter update
                $(document).trigger('dk_price_filter', [min, max]);
            });
        }
    }

    /**
     * Filter Products
     */
    function initProductFilters() {
        var $filterCheckboxes = $('.filter-option input[type="checkbox"]');
        var $sortSelect = $('.products-toolbar .sort-select');

        $filterCheckboxes.on('change', function() {
            updateProductFilters();
        });

        $sortSelect.on('change', function() {
            updateProductFilters();
        });
    }

    function updateProductFilters() {
        var filters = {
            categories: [],
            ratings: [],
            priceMin: parseInt($('#min-price').val()) || 0,
            priceMax: parseInt($('#max-price').val()) || 999,
            sort: $('.sort-select').val()
        };

        // Collect selected categories
        $('.filter-category:checked').each(function() {
            filters.categories.push($(this).val());
        });

        // Collect selected ratings
        $('.filter-rating:checked').each(function() {
            filters.ratings.push($(this).val());
        });

        // AJAX request to filter products
        $.ajax({
            url: dk_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'dk_filter_products',
                filters: filters,
                nonce: dk_ajax.nonce
            },
            beforeSend: function() {
                $('.products-grid').addClass('loading');
            },
            success: function(response) {
                if (response.success) {
                    $('.products-grid').html(response.data.html);
                    $('.results-count').text(response.data.count + ' produits');
                }
            },
            complete: function() {
                $('.products-grid').removeClass('loading');
            }
        });
    }

    /**
     * Scroll to Top
     */
    function initScrollToTop() {
        var $scrollBtn = $('<button class="scroll-to-top" aria-label="Retour en haut"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg></button>');

        $('body').append($scrollBtn);

        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 500) {
                $scrollBtn.addClass('visible');
            } else {
                $scrollBtn.removeClass('visible');
            }
        });

        $scrollBtn.on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
        });
    }

    /**
     * Lazy Load Images
     */
    function initLazyLoad() {
        if ('IntersectionObserver' in window) {
            var lazyImages = document.querySelectorAll('img[data-src]');
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var image = entry.target;
                        image.src = image.dataset.src;
                        image.classList.remove('lazy');
                        imageObserver.unobserve(image);
                    }
                });
            });

            lazyImages.forEach(function(image) {
                imageObserver.observe(image);
            });
        }
    }

    /**
     * View Toggle (Grid/List)
     */
    function initViewToggle() {
        var $viewButtons = $('.view-button');
        var $productsGrid = $('.products-grid');

        $viewButtons.on('click', function() {
            var viewType = $(this).data('view');

            $viewButtons.removeClass('active');
            $(this).addClass('active');

            $productsGrid.removeClass('grid-view list-view').addClass(viewType + '-view');
        });
    }

    /**
     * Initialize all scripts
     */
    $(document).ready(function() {
        initFAQAccordion();
        initMobileMenu();
        initSmoothScroll();
        initProductGallery();
        initProductTabs();
        initPriceRangeSlider();
        initProductFilters();
        initScrollToTop();
        initLazyLoad();
        initViewToggle();
    });

})(jQuery);
