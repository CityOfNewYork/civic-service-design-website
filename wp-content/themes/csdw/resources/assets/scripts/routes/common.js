import Icons from '@nycopportunity/patterns-framework/src/utilities/icons/icons';
export default {
  init() {
    jQuery(function ($) {

      new Icons(document.location.origin + '/wp-content/themes/csdw/resources/assets/images/svg/icons.svg');

      function loadMoreACF() {
        var button = $(this),
          buttonWrapper = button.closest('.load-more-wrapper'),
          container = buttonWrapper.prev('.loadMoreContainer'),
          data = {
            'action': 'pagination_items_acf',
            'next_page': Number(container.data('page') + 1),
            'post_type': container.data('post_type'),
            'post_id': container.data('id'),
          };

        $.ajax({
          type: 'POST',
          url: '/wp-admin/admin-ajax.php',
          data: data,
          dataType: 'json',
          beforeSend: function () {
            button.prop('disabled', true);
          },
          success: function (response) {
            if (response.success === true) {
              container.data('page', response.data.current_page).attr('data-page', response.data.current_page);
              container.append(response.data.html);
              button.prop('disabled', false);

              if (response.data.current_page >= response.data.total_pages) {
                buttonWrapper.remove();
              }
            } else {
              buttonWrapper.remove();
            }
          },
        });
      }

      $('.loadMoreBtnACF').on('click', loadMoreACF);

      function cleanInlineStylesOnDesktop() {
        if( window.innerWidth > 991 ) {
          var selectorsArray = [
            '.sub-menu',
          ];
          selectorsArray.forEach( function (item) {
            var elem = $( item );
            if( elem.length > 0 ) {
              elem.attr('style', '');
            }
          } );
        }
      }

      function chameleonicHeader() {
        var siteHeader = $( '#masthead' ),
            siteHeaderPosition = siteHeader.offset().top + siteHeader.outerHeight(),
            chameleonicSections = $( '.chameleonic' );
        chameleonicSections.each(function () {
          var start = $(this).offset().top,
              stop = start + $(this).outerHeight();
          if(siteHeaderPosition + 5 >= start && siteHeaderPosition - 5 < stop ) {
            if( $(this).css('backgroundColor') === 'rgba(0, 0, 0, 0)' || $(this).css('display') === 'none' ) {
              return;
            }
            console.log($(this));
            siteHeader.css('backgroundColor', $(this).css('backgroundColor'))
          }
        });
      }

      function changeImage() {
        var img = $('.resize-img');

        if ( window.innerWidth > 568 && !img.hasClass( 'desktopImg' ) ) {
          img.each( function(){
            $(this).attr( 'src', $(this).data( 'desktop' ) ).addClass( 'desktopImg' ).removeClass( 'mobileImg' );
          })
        } else if( window.innerWidth < 568 && !img.hasClass( 'mobileImg' ) ){
          img.each( function(){
            $(this).attr( 'src', $(this).data( 'mobile' ) ).addClass( 'mobileImg' ).removeClass( 'desktopImg' );
          });
        }
      }

      function changeImage768() {
        var img = $('.resize-img-768');

        if ( window.innerWidth > 768 && !img.hasClass( 'desktopImg' ) ) {
          img.each( function(){
            $(this).attr( 'src', $(this).data( 'desktop' ) ).addClass( 'desktopImg' ).removeClass( 'mobileImg' );
          })
        } else if( window.innerWidth < 768 && !img.hasClass( 'mobileImg' ) ){
          img.each( function(){
            $(this).attr( 'src', $(this).data( 'mobile' ) ).addClass( 'mobileImg' ).removeClass( 'desktopImg' );
          });
        }
      }

      function changeImage991() {
        var img = $('.resize-img-991');

        if ( window.innerWidth > 991 && !img.hasClass( 'desktopImg' ) ) {
          img.each( function(){
            $(this).attr( 'src', $(this).data( 'desktop' ) ).addClass( 'desktopImg' ).removeClass( 'mobileImg' );
          })
        } else if( window.innerWidth < 991 && !img.hasClass( 'mobileImg' ) ){
          img.each( function(){
            $(this).attr( 'src', $(this).data( 'mobile' ) ).addClass( 'mobileImg' ).removeClass( 'desktopImg' );
          });
        }
      }

      function scrollAnimate( dest ) {
        $( 'html,body' ).animate(
          {
            scrollTop: dest.offset().top - 50,
          }, {
            duration: 1000,
            step: function (now, fx)
            {
              var newOffset = dest.offset().top - 50;
              if (fx.end !== newOffset)
                fx.end = newOffset;
            },
          }
        );
      }

      function counterAnimation() {
        var y = $( document ).scrollTop() + $( window ).height();
        var counter = $( '.counter' );
        counter.each( function() {
          if ( y > $( this ).offset().top && !$( this ).hasClass( 'counted' ) ) {
            var $this = $( this );
            $this.addClass( 'counted' );
            $({ Counter: 0 }).animate({ Counter: $this.data('to') }, {
              duration: 3000,
              easing: 'swing',
              step: function (now) {
                $this.text( Math.ceil( now ) );
              },
            });
          }
        });
      }

      function changePhaseItemHeightOnTTSearch() {
        var phaseItem = $( '.search_wrapper .phase-item' );

        if( phaseItem.length > 0 ) {
          phaseItem.each(function() {
            $(this).css('height', $(this).outerWidth());
          });
        }
      }

      $('.toggleContent').on('click', function (e) {
        e.preventDefault();
        var person = $(this).closest( '.person' ),
            fullContent = person.find( '.person__description' );

        if( person.hasClass('open') ) {
            person.removeClass('open');
            fullContent.slideUp();
            $(this).find('span').text($(this).data('full'));
        } else {
            person.addClass('open');
            fullContent.slideDown();
            $(this).find('span').text($(this).data('less'));
        }

      });

      $( 'a[href^=#]' ).click( function(e) {
        e.preventDefault();
        var anchor =  $( this ).attr( 'href' ).replace('#', '');
        var dest = $( 'section[data-anchor="'+anchor+'"]' );
        if ( dest.length > 0) {
          scrollAnimate( dest );
        }
      });

      $( '.searchButton.open' ).on('click', function () {
        $('.search-form-header').addClass('active');
      });
      $( '.searchButton.close' ).on('click', function () {
        $('.search-form-header').removeClass('active');
      });

      $( '.menu-toggle' ).on( 'click', function(){
        var toggleMenu = $( '.site-header-nav' );
        $( this ).toggleClass('open');
        toggleMenu.slideToggle();
        if ($( this ).attr( 'aria-expanded') === 'true') {
          $(this).attr( 'aria-expanded', 'false');
          toggleMenu.attr( 'aria-expanded', 'false');
        } else {
          $(this).attr( 'aria-expanded', 'true');
          toggleMenu.attr( 'aria-expanded', 'true');
        }
      } );

      $( 'li.menu-item-has-children > .toogle-sub-menu' ).on( 'click', function() {
        var parrent = $( this ).closest( '.menu-item-has-children' );
        if( $( this ).closest( '.menu-item-has-children' ).hasClass( 'active' ) ) {
          parrent.find( '.sub-menu' ).slideUp( 'fast' );
          parrent.removeClass( 'active' ).find( '.menu-item-has-children' ).removeClass( 'active' );
        } else {
          $( this ).next( '.sub-menu' ).slideDown( 'fast' );
          parrent.addClass( 'active' );
        }
      });

      $( '.printBtn' ).on( 'click', function (e) {
        e.preventDefault();
        window.print();
      });

      $(document).mouseup(function (e) {
        var search = $('.search-form-header');
        if (!search.is(e.target)
          && search.has(e.target).length === 0) {
          search.removeClass('active');
        }
      });

      /* Load More*/
      $('.btnLoadmore').click(function(){
        var button = $(this),
          buttonWrapper = button.closest( '.btn-wrapper' ),
          data = {
            'action': 'loadmore',
            'query': loadmore_params.posts,
            'page' : loadmore_params.current_page,
          };
        $.ajax({
          url : loadmore_params.ajaxurl,
          data : data,
          type : 'POST',
          beforeSend : function () {
            button.prop( 'disabled', true );
          },
          success : function( response ){
            console.log(response);
            if( response.success ) {
              button.prop( 'disabled', false );
              buttonWrapper.prev().append(response.data.html);
              loadmore_params.current_page++;

              if ( loadmore_params.current_page == loadmore_params.max_page ) {
                buttonWrapper.hide();
              } else {
                buttonWrapper.show();
              }
            } else {
              buttonWrapper.hide();
            }
          },
        });
      });
      /*End Load More*/

      /* News Filter */
      $('#filter').on('change', function (e) {
        e.preventDefault();
        var form   = $( this ),
          buttons = form.find('label'),
          wrapper = $('.postsWrapper'),
          loadMoreButton = wrapper.next('.btn-loadmore'),
          fields = form.serializeArray(),
          data = {};

        $(fields).each(function( i, field ) {
          data[field.name] =  field.value;
        });

        data.action = 'category_filter';
        data.query = loadmore_params.posts;

        $.ajax({
          url : loadmore_params.ajaxurl,
          data : data,
          type : 'POST',
          beforeSend : function () {
            buttons.prop( 'disabled', true );
          },
          success : function( response ){
            if( response.success ) {
              buttons.prop( 'disabled', false );
              loadmore_params.current_page = 1;
              loadmore_params.posts = JSON.stringify(response.data.loadmore_params_posts);
              loadmore_params.max_page = response.data.max_num_pages;
              wrapper.html(response.data.html);
              $(window).resize();
              if(loadmore_params.max_page > 1) {
                loadMoreButton.show();
              } else {
                loadMoreButton.hide();
              }
            } else {
              console.log(response.data);
            }
          },
          complete : function () {
            buttons.prop( 'disabled', false );
          },
        });
      })
      /* End News Filter*/

      /* AJAX Search */
      $( '#ajaxSearchTT' ).on( 'submit', function (e) {
          e.preventDefault();

          var form = $( this ),
              hideOnSearch = ['.search-section', '.main_wrapper', '.page-header'],
              searchHeader = $( '.search-header' ),
              searchWrapper = $( '.search_wrapper' ),
              errorsBlock = form.next( '.errors' ),
              search = form.find('input[name="s"]').val(),
              data = {};

          data.search = search;
          data.nonce_wp = form.find('input[name="nonce_field"]').val();
          data.action = 'search_t_t'

          $.ajax({
            url : loadmore_params.ajaxurl,
            data : data,
            type : 'POST',
            beforeSend : function () {

            },
            success : function( response ){
              if( response.success ) {
                errorsBlock.stop().slideUp().html('');
                $.each(hideOnSearch, function( index, value ) {
                  $(value).hide();
                });
                searchHeader
                  .show()
                  .find('.search-header__title--search_query').text('‘' + search + '’');
                searchWrapper
                  .show()
                  .find( '.row' ).html(response.data.html);
                $(window).resize();
              } else {
                $.each(hideOnSearch, function( index, value ) {
                  $(value).show();
                });
                searchHeader.hide();
                searchWrapper.hide();
                console.log(response.data.length);
                if(response.data.length > 0)  {
                  var html = '<ul>';
                  $.each(response.data, function ( index, value ) {
                    html += '<li>' + value + '</li>';
                  });
                  html += '</ul>'
                  errorsBlock
                    .stop().slideDown()
                    .html(html);
                  setTimeout(function () {
                    errorsBlock.stop().slideUp();
                  }, 2000);
                }
                console.log(response.data);
              }
            },
            error : function () {
              $.each(hideOnSearch, function( index, value ) {
                $(value).show();
              });
              searchWrapper.hide();
            },
          });

      } )
      /* End AJAX Search */

      $(window).resize(function () {
        cleanInlineStylesOnDesktop();
        changeImage();
        changeImage768();
        changeImage991();
        changePhaseItemHeightOnTTSearch();
      });

      $(window).scroll(function () {
        chameleonicHeader();
        counterAnimation();
      });

      $(window).on('load', function () {
        chameleonicHeader();
        changeImage();
        changeImage768();
        changeImage991();
        counterAnimation();
        changePhaseItemHeightOnTTSearch();
      })

    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
