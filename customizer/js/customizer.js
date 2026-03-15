( function( $ ) {

  "use strict";

  /**
   * Real-time preview of the site title and description text.
   */
  wp.customize( 'blogname', function( value ) {
    value.bind( function( to ) {
      $( '.site-title a' ).html( to );
    } );
  } );
  wp.customize( 'blogdescription', function( value ) {
    value.bind( function( to ) {
      $( '.site-description' ).html( to );
    } );
  } );

  /**
   * Real-time preview of the footer site information text.
   */
  wp.customize( 'organic_agency_footer_text', function( value ) {
    value.bind( function( to ) {
      $( '.footer-credit' ).html( to );
    } );
  } );

  /**
   * Real-time preview of the site title.
   */
  wp.customize( 'organic_agency_site_title', function( value ) {
    value.bind( function( to ) {
      if ( '1' != to ) {
        $( '.site-title' ).css( {
          'padding' : '0',
          'text-indent' : '-9999px',
          'position': 'absolute'
        } );
      } else {
        $( '.site-title' ).css( {
          'padding' : '24px 18px',
          'text-indent' : '0',
          'position': 'relative'
        } );
      }
    } );
  } );

  /**
   * Real-time preview of the site tagline.
   */
  wp.customize( 'organic_agency_site_tagline', function( value ) {
    value.bind( function( to ) {
      if ( '1' != to ) {
        $( '.site-description' ).css( {
          'padding' : '0',
          'left' : '-9999px',
          'position': 'absolute'
        } );
      } else {
        $( '.site-description' ).css( {
          'padding' : '12px',
          'left' : '0',
          'position': 'relative'
        } );
      }
    } );
  } );

  /**
   * Real-time preview of the content background color.
   */
  wp.customize( 'organic_agency_colors_content', function( value ) {
    value.bind( function( to ) {
      $('.site-main, .site-main .content, .banner:before, .banner:after, #custom-header:before, #custom-header:after').css('background-color', to );
      $('.site-main .content').bgBrightness();
    } );
  } );

  /**
   * Real-time preview of the navigation menu background color.
   */
  wp.customize( 'organic_agency_colors_nav', function( value ) {
    value.bind( function( to ) {
      $('#nav-bar, .menu ul.sub-menu, .menu ul.children').css('background-color', to );
      $('#nav-bar').bgBrightness();
    } );
  } );

  /**
   * Real-time preview of the footer background color.
   */
  wp.customize( 'organic_agency_colors_footer', function( value ) {
    value.bind( function( to ) {
      $('.footer, .footer:before, .footer:after').css('background-color', to );
      $('.footer').bgBrightness();
    } );
  } );

  /**
   * Real-time preview of the link color.
   */
  wp.customize( 'organic_agency_colors_links', function( value ) {
    value.bind( function( to ) {
      $('.container p a, .container li a, .container table a').css('color', to );
    } );
  } );

  /**
   * Real-time preview of the heading link color.
   */
  wp.customize( 'organic_agency_colors_heading_links', function( value ) {
    value.bind( function( to ) {
      $('.container h1 a, .container h2 a, .container h3 a, .container h4 a, .container h5 a, .container h6 a').css('color', to );
    } );
  } );

  /**
   * Real-time preview of the button background color.
   */
  wp.customize( 'organic_agency_colors_button', function( value ) {
    value.bind( function( to ) {
      $('.container button, .button, .wp-block-button a, a.more-link, .reply a, #searchsubmit, #prevLink a, #nextLink a, input#submit').css('background-color', to );
    } );
  } );

})( jQuery );
