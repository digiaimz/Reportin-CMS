/**
 * @file
 */

(function ($) {
  Drupal.behaviors.jsSearch = {
    attach: function (context, settings) {
        $searchLabel = $('#uw-search-label').addClass('js');
        $searchInput = $('#uw-search-term');

        $searchLabel.click(function () {
            $searchInput.focus();
        });

        $searchInput.focus(function () {
            $searchLabel.addClass('element-invisible');
        });

        $searchInput.blur(function () {
          if (!$searchInput.val()) {
              $searchLabel.removeClass('element-invisible');
          }
        });
    }
  };
})(jQuery);
;
!function(i){"use strict";Drupal.behaviors.fdsuTheme={attach:function(t,e){i("button.rmc-nav__navigation-button").once("uw_home_theme-toggle-no-scroll").on("click",function(){i("html").toggleClass("no-scroll")})}}}(jQuery),function(t,e,i){"use strict";t(i).ready(function(){t(e).resize(function(i){var s;return function(){var t=this,e=arguments;clearTimeout(s),s=setTimeout(function(){i.apply(t,Array.prototype.slice.call(e))},200)}}(function(){767<t(e).width()&&t("html").hasClass("no-scroll")&&t("button.rmc-nav__navigation-button").click()}))})}(window.jQuery,window,window.document),function(e,i){"use strict";e(i).load(function(){e(i);var t=e(i).innerHeight()/2;e(".uw-site--main").css("min-height",t)})}(window.jQuery,window),function(t,e){"use strict";t(e).ready(function(){t("body").hasClass("front")&&t("#site-sidebar-wrapper").clone().appendTo("#block-system-main")})}(window.jQuery,(window,window.document)),function(t,s){"use strict";t(s).load(function(){var t=s.navigator.userAgent,e=t.indexOf("MSIE "),i=t.indexOf("Trident/index.html");if(-1<e||-1<i)return!0})}(window.jQuery,window),function(t,e){"use strict";t(e).load(function(){return"ontouchstart"in e||"onmsgesturechange"in e})}(window.jQuery,window),function(t,e){"use strict";t(e).ready(function(){t.browser.msie&&"10.0"==t.browser.version&&t("html").addClass("ie10");t.browser.msie&&"11.0"==t.browser.version&&t("html").addClass("ie11")})}(window.jQuery,(window,window.document)),function(e,i){"use strict";e(i).on({load:function(){e(i).width()<480&&e(".content img").each(function(t){(e(this).hasClass("image-left")||e(this).hasClass("image-right"))&&(e(this).width()>e(i).width()/2?e(this).hasClass("image-full")||e(this).addClass("image-full"):e(this).hasClass("image-full")&&e(this).removeClass("image-full"))})},resize:function(){e(i).width()<480?e(".content img").each(function(t){(e(this).hasClass("image-left")||e(this).hasClass("image-right"))&&e(this).width()>e(i).width()/2&&(e(this).hasClass("image-full")||e(this).addClass("image-full"))}):e(".content img").each(function(t){(e(this).hasClass("image-left")||e(this).hasClass("image-right"))&&e(this).hasClass("image-full")&&e(this).removeClass("image-full")})}})}(window.jQuery,window,window.document),function(n,l,t){"use strict";n(t).ready(function(){n("#site-sidebar div.rss_link").length&&(n("#content > div.controls").length||n("#content").prepend(n('<div class="controls"></div>')),n("#site-sidebar div.rss_link").prependTo("#content > div.controls"),n("#content > div.controls div.rss_link a").html("RSS"));n("#site-sidebar div.feed-icon").length&&(n("#content > div.controls").length||n("#content").prepend(n('<div class="controls"></div>')),n("#site-sidebar div.feed-icon").clone().prependTo("#content > div.controls"));var t=n("#block-views-5bbe76328202cacac13375a40dd59481,#block-uw-ct-news-item-news-by-audience, #block-uw-ct-news-item-news-by-date, #block-uw-ct-person-profile-profile-by-type, #block-uw-ct-project-project-by-status, #block-uw-ct-project-project-by-audience, #block-uw-ct-project-project-by-topic, #block-views-events-with-calendar-block-1, #block-uw-ct-event-events-by-audience, #block-views-event-type-block-events-by-type, #block-views-uw-blog-recent-block-1, #block-uw-ct-blog-blog-by-audience, #block-uw-ct-blog-blog-by-date, #block-views-uw-blog-topics-block-1");{var e;0<t.length&&(0<t.find(".item-list ul").length||0<t.find(".item-list ol").length?(n("#content .controls").addClass("has-filter"),n("#content > div.controls").length||n("#content").prepend(n('<div class="controls"></div>')),n("#content > div.controls").prepend(n('<div id="ct-filters"><button class="ct-filters--filter">Filter</button><div class="uw-site--modal__filter"><div class="uw-site--modal-wrap"><button class="ct-filters--close"><span class="element-invisible">CT filters close</span></button></div></div></div>')),(e=t.clone()).each(function(){var t=n(this).attr("id");n(this).attr("id",""),n(this).addClass(t)}),n(".uw-site--modal-wrap").append(e)):n("#content .controls").addClass("no-filter"))}var i=n("#block-uw-ct-contact-contacts-by-group");{var s;0<i.length&&(0<i.find(".item-list ul").length||0<i.find(".item-list ol").length?(n(".toggle-contacts .expand-all").addClass("has-filter"),n(".toggle-contacts .collapse-all").addClass("has-filter"),n("#content > div.toggle-contacts").prepend(n('<div id="ct-filters"><button class="ct-filters--filter">Filter</button><div class="uw-site--modal__filter"><div class="uw-site--modal-wrap"><button class="ct-filters--close"><span class="element-invisible">CT filters close</span></button></div></div></div>')),(s=i.clone()).each(function(){var t=n(this).attr("id");n(this).attr("id",""),n(this).addClass(t)}),n(".uw-site--modal-wrap").append(s)):n.trim(n("#block-system-main .content").html())?(n(".toggle-contacts .expand-all").addClass("no-filter"),n(".toggle-contacts .collapse-all").addClass("no-filter")):n(".toggle-contacts").addClass("no-content"))}n("#ct-filters button").on("click",function(){n("#ct-filters > div").toggle()});var o=l.setTimeout(function(){},0);n(l).on("resize",function(){l.clearTimeout(o),o=l.setTimeout(function(){},500)})})}(window.jQuery,window,window.document),function(s,t){"use strict";s(t).ready(function(){var t=s("h2.tab-link");{var e,i;1<t.length?(s(".front #block-system-main").after('<div class="uw-site-homepage-tabs"></div>'),e=t.clone(),i=s(".uw-site-homepage-tabs"),e.each(function(){s(this).addClass("hp-tabs")}),i.append(e),s("h2.tab-link:first").addClass("block_current"),s(".block-list .item-class:first").addClass("block_current"),s(".uw-site-homepage-tabs h2").click(function(){var t=s(this).attr("data-block-tab");s(".uw-site-homepage-tabs h2").removeClass("block_current"),s(".item-class").removeClass("block_current"),s(this).addClass("block_current"),s("#"+t).addClass("block_current")})):(t.addClass("hp-tab"),s(".item-class").addClass("block_current-single"),s(".item-list ol li").addClass("block_current-single"))}})}(window.jQuery,(window,window.document)),function(n,l,t){"use strict";n(t).ready(function(){n(".tablike").parent();var t=n(".tablike"),e=n("#site-sidebar-wrapper"),i=n("#views-exposed-form-uw-services-search-services-search"),s=n(".view-display-id-services_search"),o=(n("#a-z-filter"),n(".services-tab-item"),n(".services-tab-item a"));n(".tablike .services-tab-item:last-child"),n(".view-display-id-service_all_attachment");{i.length&&t.length&&(t.after(i),l.setTimeout(function(){},"0"),l.setTimeout(function(){var t=n("#uw-site--services-tab");t.owlCarousel({items:4,itemsDesktop:[1e3,4],itemsDesktopSmall:[900,4],itemsTablet:[600,3],itemsMobile:[320,2],pagination:!1}),n(".service-next").click(function(){t.trigger("owl.next")}),n(".service-prev").click(function(){t.trigger("owl.prev")}),o.on("click",function(t){var e=n(this);e.hasClass("clicked")?e.removeClass("clicked"):e.addClass("clicked")})},"0"))}s.length&&i.show();i.length&&t.length&&e.length&&t.after(i)})}(window.jQuery,window,window.document),function(o){Drupal.behaviors.uw_ct_catalog={attach:function(t,e){var i=o(".catalog-tab-item").length,s=i;3<s&&(s=3),0<i&&o("#uw-site--catalog-tab").owlCarousel({items:i,itemsDesktop:[1e3,i],itemsDesktopSmall:[900,i],itemsTablet:[600,s],itemsMobile:[320,1],pagination:!1})}}}(jQuery),function(i,s,t){"use strict";i(t).ready(function(){var t=i(".tablike"),e=i("#views-exposed-form-uw-catalog-search-catalog-search");{e.length&&t.length&&(t.after(e),s.setTimeout(function(){},"0"),s.setTimeout(function(){var t=i("#uw-site--catalog-tab"),e=i(".catalog-tab-item").length;3<e?(t.owlCarousel({items:e,itemsDesktop:[1e3,e],itemsDesktopSmall:[900,e],itemsTablet:[600,1],itemsMobile:[320,1],pagination:!1}),i(".catalog-next").click(function(){t.trigger("owl.next")}),i(".catalog-prev").click(function(){t.trigger("owl.prev")})):(i(".catalog-prev").hide(),i(".catalog-next").hide(),1==e&&t.owlCarousel({items:e,itemsDesktop:[1e3,e],itemsDesktopSmall:[900,e],itemsTablet:[600,1],itemsMobile:[320,1],pagination:!1}),2==e&&t.owlCarousel({items:e,itemsDesktop:[1e3,e],itemsDesktopSmall:[900,e],itemsTablet:[600,2],itemsMobile:[320,1],pagination:!1}),3==e&&t.owlCarousel({items:e,itemsDesktop:[1e3,e],itemsDesktopSmall:[900,e],itemsTablet:[600,3],itemsMobile:[320,1],pagination:!1}))},"0"))}})}(window.jQuery,window,window.document),function(t,e){"use strict";t(e).ready(function(){t("uw-site-footer2").outerHeight(!0);t("#contact-toggle").click(function(){t(".uw-site-footer").toggleClass("site-footer-toggle open-site-footer")})})}(window.jQuery,(window,window.document)),function(t,e){"use strict";t(e).ready(function(){t(".uw-top-button").click(function(){return t("html, body").animate({scrollTop:0},300),!1})})}(window.jQuery,(window,window.document)),function(e,t){"use strict";e(t).ready(function(){var t=e("#block-uw-social-media-sharing-social-media-block");t.length&&t.prependTo(e(".uw-section-share"));e(".uw-footer-social-button").on("click",function(){return e(".uw-section-share").slideToggle("fast"),!1})})}(window.jQuery,(window,window.document)),function(i,s){"use strict";i(s).ready(function(){i('[for="CheckboxSwitchE1"]').on("keydown",function(t){var e=t.which;13!==e&&32!==e||(i(this).click(),s.getElementById("CheckboxSwitchE1L").focus())})})}(window.jQuery,(window,window.document));;
