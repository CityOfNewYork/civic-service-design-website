export default {
  init() {
    jQuery(function ($) {

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

      $('.loadMoreBtnACF').on('click', loadMoreACF)

    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
