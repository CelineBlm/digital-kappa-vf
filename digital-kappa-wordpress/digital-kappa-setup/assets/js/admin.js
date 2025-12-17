/**
 * Digital Kappa Setup - Admin JavaScript
 */
(function($) {
    'use strict';

    var DKSetup = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            $('.dk-setup-btn').on('click', this.handleButtonClick.bind(this));
        },

        handleButtonClick: function(e) {
            e.preventDefault();

            var $btn = $(e.currentTarget);
            var action = $btn.data('action');

            if (!action || $btn.hasClass('loading')) {
                return;
            }

            this.showLog();
            this.runAction(action, $btn);
        },

        runAction: function(action, $btn) {
            var self = this;

            $btn.addClass('loading');
            this.log('info', 'Démarrage de l\'action: ' + action);

            $.ajax({
                url: dkSetup.ajaxUrl,
                type: 'POST',
                data: {
                    action: action,
                    nonce: dkSetup.nonce
                },
                success: function(response) {
                    if (response.success) {
                        self.log('success', response.data.message);
                        if (response.data.results) {
                            self.logResults(response.data.results);
                        }
                        if (response.data.result) {
                            self.logResult(response.data.result);
                        }
                    } else {
                        self.log('error', response.data.message || dkSetup.strings.error);
                    }
                },
                error: function(xhr, status, error) {
                    self.log('error', dkSetup.strings.error + ': ' + error);
                },
                complete: function() {
                    $btn.removeClass('loading');
                }
            });
        },

        showLog: function() {
            $('#dk-setup-log').slideDown();
        },

        log: function(type, message) {
            var $content = $('#dk-log-content');
            var timestamp = new Date().toLocaleTimeString();
            var $entry = $('<div class="dk-log-entry dk-log-' + type + '">')
                .text('[' + timestamp + '] ' + message);

            $content.append($entry);
            $content.scrollTop($content[0].scrollHeight);
        },

        logResults: function(results) {
            var self = this;

            $.each(results, function(key, value) {
                if (typeof value === 'object') {
                    self.logResult(value, key);
                } else {
                    self.log('info', key + ': ' + value);
                }
            });
        },

        logResult: function(result, prefix) {
            var self = this;
            prefix = prefix ? prefix + ' - ' : '';

            if (result.created) {
                $.each(result.created, function(index, item) {
                    self.log('success', prefix + '✓ Créé: ' + item);
                });
            }

            if (result.skipped) {
                $.each(result.skipped, function(index, item) {
                    self.log('warning', prefix + '⊘ Ignoré (existe déjà): ' + item);
                });
            }

            if (result.errors) {
                $.each(result.errors, function(index, item) {
                    self.log('error', prefix + '✗ Erreur: ' + item);
                });
            }

            if (result.count !== undefined) {
                self.log('info', prefix + 'Total: ' + result.count + ' éléments traités');
            }
        }
    };

    $(document).ready(function() {
        DKSetup.init();
    });

})(jQuery);
