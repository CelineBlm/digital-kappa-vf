/**
 * Digital Kappa Search Autocomplete
 *
 * @package Digital_Kappa
 */

(function($) {
    'use strict';

    var searchTimeout;
    var $searchInput = $('.dk-search-input');
    var $searchResults = $('.dk-search-results');

    /**
     * Initialize search autocomplete
     */
    function initSearchAutocomplete() {
        if (!$searchInput.length) {
            return;
        }

        // Create results container if not exists
        if (!$searchResults.length) {
            $searchResults = $('<div class="dk-search-results absolute top-full left-0 right-0 bg-white border border-gray-200 rounded-lg mt-1 shadow-lg z-50 hidden"></div>');
            $searchInput.parent().append($searchResults);
        }

        // Listen for input
        $searchInput.on('input', function() {
            var searchTerm = $(this).val().trim();

            // Clear previous timeout
            clearTimeout(searchTimeout);

            // Hide results if search term is too short
            if (searchTerm.length < 2) {
                $searchResults.addClass('hidden').empty();
                return;
            }

            // Debounce search
            searchTimeout = setTimeout(function() {
                performSearch(searchTerm);
            }, 300);
        });

        // Close results when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.dk-search-container').length) {
                $searchResults.addClass('hidden');
            }
        });

        // Show results on focus if there's content
        $searchInput.on('focus', function() {
            if ($searchResults.children().length) {
                $searchResults.removeClass('hidden');
            }
        });

        // Keyboard navigation
        $searchInput.on('keydown', function(e) {
            var $items = $searchResults.find('.search-result-item');
            var $active = $items.filter('.active');
            var index = $items.index($active);

            switch (e.keyCode) {
                case 40: // Down
                    e.preventDefault();
                    if (index < $items.length - 1) {
                        $items.removeClass('active');
                        $items.eq(index + 1).addClass('active');
                    }
                    break;
                case 38: // Up
                    e.preventDefault();
                    if (index > 0) {
                        $items.removeClass('active');
                        $items.eq(index - 1).addClass('active');
                    }
                    break;
                case 13: // Enter
                    if ($active.length) {
                        e.preventDefault();
                        window.location.href = $active.attr('href');
                    }
                    break;
                case 27: // Escape
                    $searchResults.addClass('hidden');
                    break;
            }
        });
    }

    /**
     * Perform AJAX search
     */
    function performSearch(searchTerm) {
        $.ajax({
            url: dk_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'dk_search_products',
                search: searchTerm,
                security: dk_ajax.nonce
            },
            beforeSend: function() {
                $searchResults.removeClass('hidden').html('<div class="p-4 text-center"><div class="dk-spinner"></div></div>');
            },
            success: function(response) {
                if (response.success) {
                    $searchResults.html(response.data);

                    // Add keyboard navigation support
                    $searchResults.find('.search-result-item:first').addClass('active');
                } else {
                    $searchResults.html('<p class="p-4 text-sm text-gray-500">Erreur de recherche</p>');
                }
            },
            error: function() {
                $searchResults.html('<p class="p-4 text-sm text-gray-500">Erreur de connexion</p>');
            }
        });
    }

    /**
     * Initialize on document ready
     */
    $(document).ready(function() {
        initSearchAutocomplete();
    });

})(jQuery);
