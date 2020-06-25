export default {
  init() {

    function floatingBanner(banner) {
      let siteFooter = $('.site-footer');
      if( !banner.hasClass('dismissed') ) {
        if( ($(window).scrollTop() + $(window).height()) > siteFooter.offset().top ) {
          banner.css({'bottom': siteFooter.outerHeight(), 'position': 'absolute' });
        } else {
          banner.css({'bottom': 0, 'position': 'fixed' });
        }
      }
    }

    $( '.banner__dismiss' ).on( 'click', function () {
      let banner = $( this ).closest('.banner'),
          siteFooter = $('.site-footer');
      $( this ).hide();
      banner
        .addClass('dismissed')
        .css({'bottom': siteFooter.outerHeight(), 'position': 'absolute' });
    } )

    let banner = $('#banner');
    if (banner.length > 0) {

      floatingBanner(banner);

      $(window).resize(function () {
        floatingBanner(banner);
      });

      $(window).scroll(function () {
        floatingBanner(banner);
      });
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
