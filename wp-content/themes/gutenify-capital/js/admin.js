"use strict";

var _wp = wp,
    apiFetch = _wp.apiFetch;
jQuery(function ($) {
  var gutenify_capitalRedirectToKitPage = function gutenify_capitalRedirectToKitPage(res) {
    // if( res?.status && 'active' === res.status ) {
    window.location = "".concat(window.gutenify_capital.gutenify_kit_gallery); // }
  }; // Activate Gutenify.


  $(document).on('click', '.gutenify-capital-activate-gutenify', function () {
    $(this).html('<span class="dashicons dashicons-update"></span> Loading...').addClass('gutenify-capital-importing-gutenify');
    apiFetch({
      path: '/wp/v2/plugins/gutenify/gutenify',
      method: 'POST',
      data: {
        "status": "active"
      }
    }).then(function (res) {
      gutenify_capitalRedirectToKitPage(res);
    })["catch"](function () {
      gutenify_capitalRedirectToKitPage({});
    });
  });
  $(document).on('click', '.gutenify-capital-install-gutenify', function () {
    $(this).html('<span class="dashicons dashicons-update"></span> Loading...').addClass('gutenify-capital-importing-gutenify');
    apiFetch({
      path: '/wp/v2/plugins',
      method: 'POST',
      data: {
        "slug": "gutenify",
        "status": "active"
      }
    }).then(function (res) {
      gutenify_capitalRedirectToKitPage(res);
    })["catch"](function () {
      gutenify_capitalRedirectToKitPage({});
    });
  });
  $(document).on('click', '.gutenify-capital-admin-notice .notice-dismiss', function () {
    console.log(ajaxurl + "?action=gutenify_capital_hide_theme_info_noticebar");
    apiFetch({
      url: ajaxurl + "?action=gutenify_capital_hide_theme_info_noticebar&gutenify_capital-nonce-name=".concat(window.gutenify_capital.gutenify_capital_nonce),
      method: 'POST'
    }).then(function (res) {
      console.log(res);
    })["catch"](function (res) {
      console.log(res);
    });
  });
});