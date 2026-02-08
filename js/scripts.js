/**
 * Wonkodev Theme Scripts
 * 
 * @package Wonkodev
 * @version 1.0.0
 */

(function($) {
    'use strict';

    /**
     * Mobile Menu Toggle
     */
    $('.menu-toggle').on('click', function() {
        var $menu = $('#primary-menu');
        $menu.toggleClass('active');
        
        var expanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !expanded);
    });

    /**
     * Smooth Scroll for Anchor Links
     */
    $('a[href*="#"]:not([href="#"])').on('click', function(e) {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
            location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800);
                return false;
            }
        }
    });

    /**
     * Add animation class when element is in viewport
     */
    function isInViewport(element) {
        var elementTop = $(element).offset().top;
        var elementBottom = elementTop + $(element).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    function checkAnimation() {
        $('.plugin-card, .feature-card, .post-card').each(function() {
            if (isInViewport(this)) {
                $(this).addClass('animate-in');
            }
        });
    }

    $(window).on('scroll resize', checkAnimation);
    checkAnimation(); // Check on load

    /**
     * Copy Code Blocks
     */
    $('pre code').each(function() {
        var $this = $(this);
        var $pre = $this.parent();
        
        // Create copy button
        var $copyBtn = $('<button class="copy-code-btn">Copy</button>');
        $pre.css('position', 'relative');
        $pre.append($copyBtn);
        
        $copyBtn.on('click', function() {
            var code = $this.text();
            
            // Create temporary textarea
            var $temp = $('<textarea>');
            $('body').append($temp);
            $temp.val(code).select();
            document.execCommand('copy');
            $temp.remove();
            
            // Show feedback
            $copyBtn.text('Copied!');
            setTimeout(function() {
                $copyBtn.text('Copy');
            }, 2000);
        });
    });

    /**
     * Terminal Cursor Effect
     */
    function blinkCursor() {
        $('.cursor').fadeOut(500).fadeIn(500);
    }
    if ($('.cursor').length) {
        setInterval(blinkCursor, 1000);
    }

    /**
     * Add syntax highlighting to code blocks (optional)
     * This is a simple implementation - you can integrate Prism.js or highlight.js for better results
     */
    $('pre code').each(function() {
        var $this = $(this);
        var code = $this.html();
        
        // Simple highlighting for common patterns
        code = code.replace(/(&lt;\?php|\?&gt;)/g, '<span class="code-php">$1</span>');
        code = code.replace(/(function |class |public |private |protected |static |return )/g, '<span class="code-keyword">$1</span>');
        code = code.replace(/('.*?'|".*?")/g, '<span class="code-string">$1</span>');
        code = code.replace(/(\/\/.*)/g, '<span class="code-comment">$1</span>');
        
        $this.html(code);
    });

    /**
     * Search Form Enhancement
     */
    $('.search-form input[type="search"]').on('focus', function() {
        $(this).parent().addClass('focused');
    }).on('blur', function() {
        $(this).parent().removeClass('focused');
    });

    /**
     * Form Validation Enhancement
     */
    $('form').on('submit', function(e) {
        var isValid = true;
        
        $(this).find('input[required], textarea[required]').each(function() {
            if (!$(this).val()) {
                $(this).addClass('error');
                isValid = false;
            } else {
                $(this).removeClass('error');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });

    /**
     * Back to Top Button (optional)
     */
    var $backToTop = $('<button class="back-to-top" title="Back to Top">↑</button>');
    $('body').append($backToTop);
    
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
            $backToTop.addClass('visible');
        } else {
            $backToTop.removeClass('visible');
        }
    });
    
    $backToTop.on('click', function() {
        $('html, body').animate({scrollTop: 0}, 800);
    });

})(jQuery);

/**
 * Add CSS for animations and interactive elements
 */
document.addEventListener('DOMContentLoaded', function() {
    // Add CSS for animations
    var style = document.createElement('style');
    style.innerHTML = `
        .plugin-card, .feature-card, .post-card {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .plugin-card.animate-in, .feature-card.animate-in, .post-card.animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .copy-code-btn {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            padding: 0.3rem 0.8rem;
            font-family: var(--font-primary);
            font-size: 0.8rem;
            background: var(--color-primary);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        pre:hover .copy-code-btn {
            opacity: 1;
        }
        
        .copy-code-btn:hover {
            background: var(--color-secondary);
        }
        
        .code-php { color: #8B5CF6; }
        .code-keyword { color: #06B6D4; font-weight: 600; }
        .code-string { color: #10B981; }
        .code-comment { color: #9CA3AF; font-style: italic; }
        
        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--color-primary);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }
        
        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background: var(--color-secondary);
            transform: translateY(-3px);
        }
        
        input.error, textarea.error {
            border-color: #EF4444 !important;
        }
        
        .search-form.focused {
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        }
    `;
    document.head.appendChild(style);
});
