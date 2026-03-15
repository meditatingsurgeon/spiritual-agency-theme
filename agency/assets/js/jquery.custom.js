(function ($) {
  'use strict'

  function removeNoJsClass () {
    $('html:first').removeClass('no-js')
  }

  /* Sidr Menu --------------------- */
  function sidrMenu () {
    $('#menu-toggle').sidr({
      name: 'side-menu',
      side: 'right', // By default
      source: '#navigation-mobile'
    })
    $(window).bind('resize', function () {
      if ($('body').hasClass('sidr-open')) {
        $.sidr('close', 'side-menu')
        $('.icon-menu-close').hide()
        $('.icon-menu-open').show()
      }
    })
  }

  /* Submenu Offset Fix --------------------- */
  function menuOffset () {
    var mainWindowWidth = $(window).width() + 120

    $('ul.menu li.menu-item-has-children').mouseover(function () {
      // Checks if third level menu exist
      var subMenuExist = $(this).find('.sub-menu').length
      if (subMenuExist > 0) {
        var subMenuWidth = $(this).find('.sub-menu').width()
        var subMenuOffset = $(this).find('.sub-menu').parent().offset().left + subMenuWidth

        // If sub menu is off screen, give new position
        if ((subMenuOffset + subMenuWidth) > mainWindowWidth) {
          var newSubMenuPosition = subMenuWidth
          $(this).find('.sub-menu').css({
            left: 'auto',
            right: '0'
          })
          $(this).find('.sub-menu .sub-menu').css({
            left: -newSubMenuPosition,
            right: '0'
          })
        }
      }
    })
  }

  /* Mobile Submenus --------------------- */
  function subMenuSetup () {
    if ($(window).width() <= 1025) {
      if ($('ul.sidr-class-sub-menu').css('display') === 'none') {
        // Toggle submenus
        var subMenuToggle = $('li.sidr-class-menu-item-has-children > a').unbind()
        subMenuToggle.on('click', function (e) {
          e.preventDefault()
          var submenu = $(this).parent().children('ul.sidr-class-sub-menu')
          if ($(submenu).is(':hidden')) {
            $(submenu).slideDown(200)
          } else {
            $(submenu).slideUp(200)
          }
        })
      }
    }
  }

  function headerSetup () {
    if ($('.wp-custom-header').hasClass('organic-agency-bg-dark')) {
      $('#custom-header').addClass('organic-agency-bg-dark')
      $('#nav-bar').addClass('organic-agency-bg-dark')
    } else {
      $('#nav-bar').bgBrightness()
    }
    if ($('.banner-img').hasClass('organic-agency-bg-dark')) {
      $('#nav-bar').addClass('organic-agency-bg-dark')
    }
  }

  function brightnessSetup () {
    if ($('.banner-img').length) {
      $('.banner-img').bgBrightness()
    }
    if ($('.wp-custom-header').length) {
      $('.wp-custom-header').bgBrightness()
    }
    if ($('.woocommerce-category-header').length) {
      $('.woocommerce-category-header').bgBrightness()
    }
    if ($('.wp-block-cover').length) {
      $('.wp-block-cover').bgBrightness()
    }
    if ($('.site-main .content').length) {
      $('.site-main .content').bgBrightness()
    }
    if ($('.footer').length) {
      $('.footer').bgBrightness()
    }
  }

  function modifyPosts () {
    /* Toggle Mobile Menu Icon --------------------- */
    $('.menu-toggle').on('click touchstart', function () {
      $('.icon-menu-open').toggle()
      $('.icon-menu-close').toggle()
    })

    // Properly update the ARIA states on focus (keyboard) and mouse over events
    $('[role="menubar"]').on('focus.aria  mouseenter.aria', '[aria-haspopup="true"]', function (ev) {
      $(ev.currentTarget).attr('aria-expanded', true)
    })

    // Properly update the ARIA states on blur (keyboard) and mouse out events
    $('[role="menubar"]').on('blur.aria  mouseleave.aria', '[aria-haspopup="true"]', function (ev) {
      $(ev.currentTarget).attr('aria-expanded', false)
    })

    /* Animate Page Scroll --------------------- */
    $('.scroll').click(function (event) {
      event.preventDefault()
      $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 500)
    })

    /* Fit Vids --------------------- */
    $('.organic-ocw-container').fitVids()
  }

  $(document)
    .ready(removeNoJsClass)
    .ready(sidrMenu)
    .ready(menuOffset)
    .ready(brightnessSetup)
    .ready(modifyPosts)
    .on('post-load', modifyPosts)

  $(window)
    .on('load', function () {
      setTimeout(headerSetup, 250)
    })
    .on('load', subMenuSetup)
})(jQuery)
