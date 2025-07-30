jQuery(document).ready(function ($) {
    const $cookieNoticeContainer = $('gdpr-cookie-notice-container');
    $.ajax({
        url: cookie_notice_ajax.ajax_url,
        method: 'POST',
        data: {
            action: 'gcc_cookie_notice_tab',
        },
        success: function(response) {
            $('.gdpr_cookie_notice_wait_till_loader_container').css("display","none");
            if(window.gen && typeof window.gen.refreshCookieNoticeData === 'function') {
                window.gen.refreshCookieNoticeData(response.data.html);
            } else {
                console.error('Vue instance not found or refreshCookieNoticeData method missing.');
            }
            setTimeout(function(){window.integrate_cookie_notice_auth()}, 1000);
        },
        error: function () {
            $cookieNoticeContainer.html('<p>Error loading Cookie Notice data.</p>');
        }
    });
});