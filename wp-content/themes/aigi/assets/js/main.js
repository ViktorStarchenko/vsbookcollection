
jQuery( window ).on('load resize', function() {
    // Auto normalize header background for resources (link, file, tips, table)
    jQuery('.single-resource__container').not(".extended").each(function(i){
        let headerHeight = jQuery(this).find( '.single-resource__header' ).innerHeight();
        jQuery(this).find( '.single-resource__bg' ).innerHeight(headerHeight)
    })
})




// VIDEO PLAYER
jQuery(document).ready(function () {
    jQuery('.online__video-button').on('click', function () {


        var data = jQuery(this).attr('data-video');
        var video_button_wrap = jQuery(this).parent().get(0);
        var video_pause_wrap = jQuery(video_button_wrap).siblings("div.video-pause-wrap").get(0);


        var video = jQuery('.online-video');

        video.each(function (elem) {

            // console.log($(video[elem]).attr('data-issetSrc'))

            if (jQuery(video[elem]).attr('data-video') == data) {
                // console.log($(this).attr('data-issetSrc'))
                var issetSrc = jQuery(this).attr('data-issetSrc')
                if (issetSrc == 'false') {
                    // console.log(issetSrc)
                    var src = jQuery(this).attr('data-src');
                    jQuery(this).attr('src', src);
                    jQuery(this).attr('data-issetSrc', true)
                }

                jQuery('.video-poster[data-video=' + data + ']').hide()
                jQuery(this).removeClass('paused');
                jQuery(this).get(0).play();
                jQuery(this).prop("controls",true)
            }
            if (jQuery(video[elem]).attr('data-video')) {
                // $(this).removeClass('paused');
                // $(this).get(0).play();
            }

        })
        jQuery('.video-poster[data-video=' + data + ']').hide()
        jQuery(video_button_wrap).hide()

        jQuery(video_pause_wrap).addClass('visible')
        // $('.video-button-wrap').hide()
        // $('.video-pause-wrap').addClass('visible')
    })

    jQuery('.video-pause-wrap').on('click', function () {
        var data = jQuery(this).attr('data-video');
        // console.log(data)
        var video_button_wrap = jQuery(this).siblings("div.video-button-wrap").get(0);


        var video = jQuery('.online-video');

        video.each(function (elem) {
            if (jQuery(video[elem]).attr('data-video') == data) {
                jQuery(this).addClass('paused');
                jQuery(this).get(0).pause();
                jQuery(this).prop("controls",false)
            }

        })

        jQuery(video_button_wrap).show()
        jQuery(this).removeClass('visible')
    })

})

////////////////////////// ACCORDION
var acc = document.getElementsByClassName("accordion_btn");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.classList.remove('active');
            panel.style.maxHeight = null;
        } else {
            panel.classList.add('active');
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}


////////////////////////// SEARCH & FILTER ACCORDION
var sfbutton = jQuery('.searchandfilter ul li[data-sf-field-input-type="checkbox"] h4');
var i;

for (i = 0; i < sfbutton.length; i++) {
    sfbutton[i].addEventListener("click", function() {
        console.log('CLICKCKCK')
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.classList.remove('active');
            panel.style.maxHeight = null;
        } else {
            panel.classList.add('active');
            // panel.style.maxHeight = panel.scrollHeight + "px";
            panel.style.maxHeight = "300px";
        }
    });
}


// Check if element in view
function elementInViewport2(el) {
    var top = el.offsetTop;
    var left = el.offsetLeft;
    var width = el.offsetWidth;
    var height = el.offsetHeight;

    while(el.offsetParent) {
        el = el.offsetParent;
        top += el.offsetTop;
        left += el.offsetLeft;
    }

    return (
        top < (window.pageYOffset + window.innerHeight) &&
        left < (window.pageXOffset + window.innerWidth) &&
        (top + height) > window.pageYOffset &&
        (left + width) > window.pageXOffset
    );
}





// header - footer
jQuery(window).on("load resize", function() {

    if (jQuery(window).width() < 1200) {

        jQuery("#burger").click(function() {
            jQuery("#menu").toggleClass("menu_mobile_visible");
            jQuery(this).toggleClass("burger_opened");
            jQuery("body").toggleClass("fixed-position");
            jQuery("#header_bottom_buttons").toggleClass("show_submenu_mob");
        });

        jQuery(document).on('click', ".main_menu_item.has_sub.has_sub_mobile", function() {
            jQuery(this).children(".main_menu_submenu_overlay").show();
            jQuery(this).addClass("submenu_opened");
            jQuery(this).removeClass("has_sub_mobile");
        });

        jQuery(".submenu_opened, .main_menu_submenu_title").click(function(e) {
            e.stopPropagation();
            jQuery(this).parents(".submenu_opened").removeClass("submenu_opened").addClass("has_sub_mobile");
            jQuery(this).closest(".main_menu_submenu_overlay").hide();
        })

        // Login menu
        jQuery("#mobile_user_icon").click(function() {
            jQuery("#mobile_login-menu").toggleClass("menu_mobile_visible");
            jQuery(this).toggleClass("burger_opened");
            jQuery("body").toggleClass("fixed-position");
        });


    } else {

        // jQuery('.main-menu__link-arrow.hide').on('click', function () {
        //     jQuery(".main_menu_submenu_overlay").hide();
        //     if (jQuery(this).hasClass("open")) {
        //         console.log('hide')
        //         jQuery(this).siblings(".main_menu_submenu_overlay").hide();
        //         jQuery(this).removeClass("submenu_opened")
        //         jQuery(this).removeClass("open")
        //         jQuery(this).addClass("hide")
        //
        //     } else {
        //         console.log('show')
        //         jQuery(this).siblings(".main_menu_submenu_overlay").show();
        //         jQuery(this).addClass("submenu_opened")
        //         jQuery(this).addClass("open")
        //         jQuery(this).removeClass("hide")
        //     }
        //     return false;
        // });


        function showdr(data) {
            jQuery(data).children(".main_menu_submenu_overlay").show();
            jQuery(data).addClass("submenu_opened");
        }

        jQuery(".main_menu_item.has_sub").mouseenter(function() {
            console.log(this)
            let data = jQuery(this)

            timer = setTimeout(showdr,200, this);

        }).mouseleave(function() {
            console.log('mouseleave')
            jQuery(this).children(".main_menu_submenu_overlay").hide();
                // jQuery(this).children(".main_menu_submenu_overlay").fadeOut(1000);
            jQuery(this).removeClass("submenu_opened");
            clearTimeout(timer);
        });


        // jQuery(".main_menu_item.has_sub").hover(function() {
        //
        //     // jQuery(this).children(".main_menu_submenu_overlay").show(2000);
        //     jQuery(this).children(".main_menu_submenu_overlay").show();
        //     jQuery(this).addClass("submenu_opened");
        // }, function() {
        //     // jQuery(this).children(".main_menu_submenu_overlay").hide();
        //     // jQuery(this).children(".main_menu_submenu_overlay").fadeOut(1000);
        //     jQuery(this).removeClass("submenu_opened");
        // });

        jQuery('.account-dropdown__link').on('click', function() {
            jQuery(this).toggleClass('open');
            jQuery('.account-dropdown').toggleClass('open');
            return false;
        });
    }


    if (jQuery(window).width() < 1000) {

        jQuery(".footer_social_block").appendTo(".footer_location_block");
    } else {

        jQuery(".footer_social_block").insertAfter(".footer_location_block");
    }

});


// TABS
let tab = function () {
    let tabNav = document.querySelectorAll('.tabs-nav__item'),
        tabContent = document.querySelectorAll('.tab'),
        tabName;

    tabNav.forEach(item => {

        item.addEventListener('click', selectTabNav)
    });

    tabNav.forEach(item => {

        item.addEventListener('touchend', selectTabNav)
    });

    function selectTabNav() {

        tabNav.forEach(item => {
            item.classList.remove('is-active');
            item.classList.add('inactive');
        });
        this.classList.remove('inactive');
        this.classList.add('is-active');

        tabName = this.getAttribute('data-tab-name');

        selectTabContent(tabName);
    }

    function selectTabContent(tabName) {
        // console.log(tabName)

        tabContent.forEach(item => {
            item.classList.contains(tabName) ? item.classList.add('is-active') : item.classList.remove('is-active');
        })
    }

};

tab();

// GLOBAL SEARCH
// FaceWP post type switch


// FWP.auto_refresh = false;

jQuery('.global-search-tab-nav').on('click', function (){
    let post_type = jQuery(this).attr('data-post-type')

    url = new URL(window.location.href);

    if (!url.searchParams.get('_search_bar') && !url.searchParams.get('_content_tags') && !url.searchParams.get('_topics')) {
        resetFilter()
    } else if (url.searchParams.get('_search_bar') || url.searchParams.get('_content_tags') || url.searchParams.get('_topics')) {
        jQuery('.global-search-tab[data-post-type="'+post_type+'"] .facetwp-facet-post_type .facetwp-checkbox.checked').removeClass('checked')
    }

    setTimeout(checkPostType, 2200, post_type);
})
function checkPostType(post_type) {
    console.log(post_type)

    if (post_type == 'all') {
        let post_types_arr = new Array();
        let post_types = jQuery('.global-search-tab[data-post-type="'+post_type+'"] .facetwp-facet-post_type .facetwp-checkbox');
        jQuery('.global-search-tab[data-post-type="'+post_type+'"] .facetwp-facet-post_type .facetwp-checkbox').each(function(post_type_name){

            post_types_arr.push(jQuery(this).data('value'))
        })
        console.log(post_types_arr)

        // let url = new URL(window.location.href);
        // let post_types_names = url.searchParams.get('_post_type').split(',')
        document.addEventListener('facetwp-refresh', function() {
            FWP.facets['post_type'] = post_types_arr; // force a specific value
        });
        FWP.refresh()
        // jQuery('.global-search-tab[data-post-type="'+post_type+'"] .facetwp-facet-post_type .facetwp-checkbox').click();
    } else {
        document.addEventListener('facetwp-refresh', function() {
            FWP.facets['post_type'] = [post_type]; // force a specific value
        });
        FWP.refresh()
    }

    // let url = new URL(window.location.href);
    // let post_types_names = url.searchParams.get('_post_type').split(',')


    // jQuery('.global-search-tab[data-post-type="'+post_type+'"] .facetwp-facet-post_type .facetwp-checkbox[data-value="'+post_type+'"]').click();
}
function refreshSearchPageCounter() {

    let page = FWP.settings.pager.page;
    let total_rows = FWP.settings.pager.total_rows;

    let posts_per_page = jQuery('.search-page__results .post-tile__wrap').length
    let viewed_posts = parseInt(page) * parseInt(posts_per_page);
    if (posts_per_page < 10) {
        viewed_posts = total_rows;
    }
    // console.log('page ' + page)
    // console.log('posts_per_page ' + posts_per_page)
    // console.log('viewed_posts ' + viewed_posts)
    jQuery('.search-pagination__per-page').html(viewed_posts);
    jQuery('.search-pagination__total-rows').html(total_rows);

}
jQuery('body').on('click', function(e){
    if(e.target.classList.contains('facetwp-page') ) {
        top = jQuery('.search-page__results').offset().top;

        jQuery('body,html').animate({scrollTop: top-190}, 400);
    }
});
// Init speakers slider on faceWP load
(function(jQuery) {
    jQuery(document).on('facetwp-refresh', function() {
        jQuery("#aigi-search-preloader").show();

        if (jQuery('.landing__filter-block').data('event-group') == 'event') {
            console.log(FWP.facets)
            FWP.facets['events_group'] = ['event', 'masterclass']; // force a specific value
        }
    });

    document.addEventListener('facetwp-loaded', function() {
        jQuery("#aigi-search-preloader").hide();

        setTimeout(initSpeakersSlider, 2000);
        url = new URL(window.location.href);
        if (url.searchParams.get('_search_bar') || url.searchParams.get('_content_tags') || url.searchParams.get('_topics') || url.searchParams.get('_events_group')  || url.searchParams.get('_search_event_type') || url.searchParams.get('_resource_type')) {
            // console.log(FWP.settings.pager.total_rows);
            // Refresh post types count for search result
            jQuery('.global-search-tab-nav .posts-count').html(0);
            let posts = jQuery('.global-search-tab[data-post-type="all"] .facetwp-facet-post_type .facetwp-checkbox');
            let all_count = 0;
            posts.each(function(){
                // console.log(jQuery(this).attr('data-value'))
                let post_type = jQuery(this).attr('data-value');
                let posts_count = parseInt(jQuery(this).find('.facetwp-counter').html().slice(1).slice(0,-1));
                all_count+= posts_count;
                jQuery('.global-search-tab-nav[data-post-type="'+post_type+'"]').find('.posts-count').html(posts_count);
                jQuery('.global-search-tab-nav[data-post-type="all"]').find('.posts-count').html(all_count);
            })


        }

        // Show/hide sorting if it's search resault
        if (url.searchParams.get('_search_bar')) {
            jQuery('.search-page__sorting-container').hide()
        } else {
            jQuery('.search-page__sorting-container').show()
        }

        resetSearchTabCounts()
        refreshSearchPageCounter();
        refreshFilterNavArrows();

    });
})(jQuery);

function resetFilter(){
    console.log('reset filter')
    jQuery('.search-filter__reset').click();

}

jQuery('.search-filter__reset').on('click', function(){

    resetSearchTabCounts();

    // Clear adress bar
    clearAddressBar();
})


function clearAddressBar() {

    let page_url = window.location.pathname;
    setTimeout(function(){window.history.replaceState({}, '', page_url);}, 1000);
}

function refreshFilterNavArrows() {
    jQuery('.facetwp-page.next').html('▶')
    jQuery('.facetwp-page.prev').html('◀')
}

function resetSearchTabCounts() {
    console.log('resetSearchTabCounts')
    // Refresh post types count for search result
    jQuery('.global-search-tab-nav .posts-count').html(0);
    let posts = jQuery('.global-search-tab[data-post-type="all"] .facetwp-facet-post_type .facetwp-checkbox');

    let all_count = 0;
    posts.each(function(){
        // console.log(jQuery(this).attr('data-value'))
        let post_type = jQuery(this).attr('data-value');
        let posts_count = parseInt(jQuery(this).find('.facetwp-counter').html().slice(1).slice(0,-1));
        console.log(post_type)
        all_count+= posts_count;
        jQuery('.global-search-tab-nav[data-post-type="'+post_type+'"]').find('.posts-count').html(posts_count);
        jQuery('.global-search-tab-nav[data-post-type="all"]').find('.posts-count').html(all_count);
    })
}
jQuery().on()

jQuery('.facetwp-search').keypress(function(e) {

});

jQuery('body').keypress(function(event) {


    if (event.target.matches('.facetwp-search')) {
        console.log('You pressed enter!');
        // console.log(event.target);
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            jQuery( ".fwp-submit" ).trigger( "click" );
        }
    }
});


// =============================


/*
Reference: http://jsfiddle.net/BB3JK/47/
*/

function customizeSelect() {
    jQuery('select').each(function(){
        var $this = jQuery(this), numberOfOptions = jQuery(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = jQuery('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            jQuery('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
            //if ($this.children('option').eq(i).is(':selected')){
            //  $('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected')
            //}
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            jQuery('div.select-styled.active').not(this).each(function(){
                jQuery(this).removeClass('active').next('ul.select-options').hide();
            });
            jQuery(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text(jQuery(this).text()).removeClass('active');
            $this.val(jQuery(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });

        jQuery(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });
}
// jQuery('.dropbtn').on('click', function(){
//     console.log(jQuery(this).next('.dropdown-content').find('.dropdown-item'))
// })
jQuery('.dropdown-item').on('click', function(){
    let btn_text = jQuery(this).text();
    // console.log(jQuery(this).closest('.dropdown-content').siblings('.dropbtn'))
    jQuery(this).closest('.dropdown-content').siblings('.dropbtn').text(btn_text)
})



jQuery('select').each(function(){
    let options = jQuery(this).children('option')
    // console.log(options)
})


// setTimeout(customizeSelect, 1000)


// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {

    if (!event.target.matches('.dropbtn')) {

        var dropdowns = document.getElementsByClassName("dropdown-content");

        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
jQuery('.dropbtn').on('click', function(){
    let data_dropdown = jQuery(this).attr('data-dropdown')
    var dropdowns = document.querySelectorAll('.dropdown-content[data-dropdown="'+data_dropdown+'"]');
    jQuery('.dropdown-content').removeClass('show')
    jQuery(dropdowns).toggleClass('show')
})

// mobile filter
jQuery('.filter-button').on('click', function(){
    var panel = document.getElementById('global-search__filter');
    console.log(panel)
    if (panel.style.maxHeight) {
        jQuery(this).removeClass('active');
        panel.style.maxHeight = null;
        setTimeout(function(){panel.classList.remove('active')},200)

    } else {
        // panel.style.maxHeight = panel.scrollHeight + "px";
        jQuery(this).addClass('active');
        panel.classList.add('active');
        panel.style.height = "auto";
        panel.style.maxHeight = "2000px"
    }
})
///////////////////////////////////////// CLOSE MENU
jQuery('.navbar-toggler').on('click', function() {
    jQuery('body').addClass('hidden');
    jQuery('.shadow-screen').addClass('active');
})

function closeButton() {
    jQuery('.close_btn').on('click', function(){
        jQuery('.global-search__filter-mobile').removeClass('show');
        jQuery('.shadow-screen').removeClass('active');
        jQuery('body').removeClass('hidden');

    })
}

// // Speakers slider
// jQuery(document).ready(function(){
//     jQuery('.speakers-slider').slick({
//         arrows: true,
//         adaptiveHeight: true,
//         centerPadding: '10px',
//         responsive: [
//             {
//                 breakpoint: 992,
//                 settings: {
//                     dots: true,
//                     arrows: false,
//                 }
//             }
//             // You can unslick at a given breakpoint now by adding:
//             // settings: "unslick"
//             // instead of a settings object
//         ]
//         // appendArrows:'.speakers-slider__nav',
//         // prevArrow:'<span class="slider-arrow prev"></span>',
//         // nextArrow:'<span class="slider-arrow next"></span>'
//     });
// });


function initSpeakersSlider() {
    console.log('init speakers slider')
    jQuery('.speakers-slider').not('.slick-initialized').slick({
        arrows: true,
        adaptiveHeight: true,
        centerPadding: '10px',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    dots: true,
                    arrows: false,
                }
            }
        ]
    });

}
setTimeout(initSpeakersSlider, 1000);


// // Sticky to right sliders
//
// $('.rslider').slick({
//     // variableWidth: true,
//     slidesToShow: 3,
//     slidesToScroll: 1,
//     // autoplay: true,
//     autoplaySpeed: 2000,
//     centerMode: true,
//     // centerPadding: '16px',
//     adaptiveHeight: true,
//     arrows: true,
//     appendArrows:'.rslider_nav.slider-arrows',
//     prevArrow:'<span class="slider-arrow prev"></span>',
//     nextArrow:'<span class="slider-arrow next"></span>',
//     responsive: [
//         {
//             breakpoint: 992,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 1,
//                 centerMode: true,
//             }
//         },
//         {
//             breakpoint: 767,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 1,
//                 centerMode: false,
//                 centerPadding: false,
//             }
//         },
//         {
//             breakpoint: 580,
//             settings: {
//                 slidesToShow: 1,
//                 slidesToScroll: 1,
//                 centerMode: false,
//                 centerPadding: false,
//             }
//         }
//
//     ]
// });


//  Alignment heigh of similar blocks
function normalizeHeigh(data) {
    let data_height = jQuery('[data-height=' +  data + ']')

    let data_allHeight = [];
    data_height.each(function(elem){
        // console.log($(this).outerHeight())
        data_allHeight.push(parseInt(jQuery(this).outerHeight()));
    })
    slider1_maxHeight = Math.max.apply(Math, data_allHeight);
    jQuery('[data-height=' +  data + ']').css('min-height', slider1_maxHeight + 'px')
    // console.log(slider1_maxHeight);
}

jQuery(document).ready(function() {
    let data_arr = ['Hero2ColText', 'teamMemberName', 'teamMemberPosition', 'NewsrsliderTitle', 'NewsrsliderDesc', 'NewsrsliderTags','CaseStudiesrsliderTitle', 'CaseStudiesrsliderDesc', 'CaseStudiesrsliderTags','ConferencersliderTitle', 'ConferencersliderDesc', 'ConferencersliderTags','ResourcesrsliderTitle', 'ResourcesrsliderDesc', 'ResourcesrsliderTags','SpeakersrsliderTitle', 'SpeakersrsliderDesc', 'TestimonialsrsliderName','TestimonialsrsliderTitle', 'TestimonialsrsliderDesc'];

    for(i=0; i<=data_arr.length; i++) {
        normalizeHeigh(data_arr[i])
    }
})

jQuery( window ).on('load resize', function() {
    if (jQuery(window).width() > 768) {
        let data_arr = ['pageSidebarCol', 'multicolumnItem', 'partnersImage', 'partnersTitle', 'partnersDescription'];

        for(i=0; i<=data_arr.length; i++) {
            normalizeHeigh(data_arr[i])
        }
    } else {
        jQuery('[data-height=pageSidebarCol]').css('min-height', 'unset');
    }

})



// PRINT BUTTON

jQuery(document).ready(function(){
    jQuery('.print-button').on('click', function(){
        window.print();
    })
})

//////////////////////////////// Popup

jQuery('.popup_button').on('click', function () {
    jQuery(this).siblings(".popup-main-wrapper").addClass('popup_opened');
});

jQuery(document).on('click', '#popup_close_button, .popup_close_button', function () {
    jQuery(".popup-main-wrapper").removeClass('popup_opened');
});


///////////////// Preloader

jQuery(document).ready(function(){
    jQuery("#aigi-preloader").hide();
});

///////////////// Footnotes
function isValidHttpUrl(string) {
    let url;
    try {
        url = new URL(string);
    } catch (_) {
        return false;
    }
    return url.protocol === "http:" || url.protocol === "https:";
}

jQuery(document).ready(function(){
    let footnotes = jQuery('.modern-footnotes-footnote__note');

    footnotes.each(function(elem){

        let footnote = jQuery(this).get(0)

        let footnotes_text = '<div>Ref:  '+jQuery(this).html()+'</div>'
        let footnotes_number = '<span data-mfn="'+jQuery(this).attr('data-mfn')+'" class="footones_custom_prefix">['+jQuery(this).attr('data-mfn')+']</span>';

        // console.log(footnotes_text);
        // console.log(footnotes_number);
        jQuery('.footones_custom_wrapper').addClass('visible');
        jQuery('.footones_custom_list').append('<li>'+footnotes_number+''+footnotes_text+'</li>');
    })

    jQuery('.footones_custom_prefix').on('click', function(){
        let footnote_mfh = jQuery(this).attr('data-mfn');

        let footnote_top = jQuery('.modern-footnotes-footnote[data-mfn="'+footnote_mfh+'"]').offset().top;

        jQuery('body,html').animate({scrollTop: footnote_top-80}, 200);

    })
})



///////////////////// Toolkit Menu
jQuery('.toolkit-menu__link-arrow').on('click', function () {

    let toolkit_dropdown = jQuery(this).siblings(".toolkit-menu__submenu");
    if (toolkit_dropdown[0].style.maxHeight) {
        toolkit_dropdown[0].classList.remove('open');
        toolkit_dropdown[0].style.maxHeight = null;
        jQuery(this).removeClass('open');
    } else {
        toolkit_dropdown[0].classList.add('open');
        toolkit_dropdown[0].style.maxHeight = toolkit_dropdown[0].scrollHeight + "px";
        jQuery(this).addClass('open');
    }
    return false;
});


jQuery( window ).on('load resize', function() {
    if (jQuery(window).width() < 768) {

        jQuery('.toolkit-menu__mobile-button').on('click', function () {

            let toolkit_dropdown = jQuery(this).siblings(".toolkit-menu__list");
            if (toolkit_dropdown[0].style.maxHeight) {
                toolkit_dropdown[0].classList.remove('open');
                toolkit_dropdown[0].style.maxHeight = null;
                jQuery(this).removeClass('open');
            } else {
                toolkit_dropdown[0].classList.add('open');
                // toolkit_dropdown[0].style.maxHeight = toolkit_dropdown[0].scrollHeight + "px";
                toolkit_dropdown[0].style.maxHeight = "2000px";
                jQuery(this).addClass('open');
            }
        });

    }

})



// Breadcrumb
jQuery( window ).on('load resize', function() {
    if (jQuery(window).width() < 768) {

        let highlighted_img = jQuery('.highlighted-img');
        if (highlighted_img.length > 0) {
            let current_item = jQuery('.current-item').text();
            // console.log(current_item.length)
            if (current_item.length > 20) {
                var trimmedString = current_item.substring(0, 15);
                trimmedString+= '...';
            }

            jQuery('.current-item').text(trimmedString);
        }

    }

})


jQuery('.generate_pdf').on('click', function(){
    let $data = jQuery('body').html();
     $data = '';
    // console.log($data);

    $.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: "POST",
        // dataType: "JSON",
        data: {
            'action': 'aigi_create_pdf',
            // 'data': $data
        },
        cache: false,
        beforeSend: function(){

        },
        success: function(data) {
            console.log(data);

        },
        error:function (xhr, ajaxOptions, thrownError){
            console.log(xhr);
            console.log(ajaxOptions);
            console.log(thrownError);
        }
    });
})

// Add to list on Sare Download block
jQuery(document).ready(function(){

    if (jQuery('div.post-technical-block').length) {
        jQuery('body').on('click', '.post-technical-block .simplefavorite-button', function(){
            if(!jQuery(this).hasClass('active')){
                console.log('modal TWO')
                jQuery(".add-to-reading-list").fadeIn(1000);
                jQuery(".add-to-reading-list").delay(2500).fadeOut(1000);
                jQuery(".add-to-reading-list").find('div.resource-body').html(jQuery('.breadcrumbs .current-item').text());
            }
        })
        jQuery('.close-reading-add').on('click', function(){
            jQuery(".add-to-reading-list").fadeOut(1000);
        })
    } else {
        jQuery('body').on('click', '.simplefavorite-button', function(){
            if(!jQuery(this).hasClass('active')){
                console.log('modal ONE')
                jQuery(".add-to-reading-list").fadeIn(1000);
                jQuery(".add-to-reading-list").delay(2500).fadeOut(1000);
                jQuery(".add-to-reading-list").find('div.resource-body').html(jQuery(this).closest('.post-tile__content').find('.post-tile__title').text());
            }
        })
        jQuery('.close-reading-add').on('click', function(){
            jQuery(".add-to-reading-list").fadeOut(1000);
        })
    }


});


// Changing Page scale

$.fn.scale = function(x) {
    if(!jQuery(this).filter(':visible').length && x!=1)return jQuery(this);
    if(!jQuery(this).parent().hasClass('scaleContainer')){
        jQuery(this).wrap(jQuery('<div class="scaleContainer">').css('position','relative'));
        jQuery(this).data({
            'originalWidth':jQuery(this).width(),
            'originalHeight':jQuery(this).height()});
    }
    jQuery(this).css({
        'transform': 'scale('+x+')',
        '-ms-transform': 'scale('+x+')',
        '-moz-transform': 'scale('+x+')',
        '-webkit-transform': 'scale('+x+')',
        'transform-origin': 'right bottom',
        '-ms-transform-origin': 'right bottom',
        '-moz-transform-origin': 'right bottom',
        '-webkit-transform-origin': 'right bottom',
        'position': 'absolute',
        'bottom': '0',
        'right': '0',
    });
    if(x==1)
        jQuery(this).unwrap().css('position','static');else
        jQuery(this).parent()
            .width(jQuery(this).data('originalWidth')*x)
            .height(jQuery(this).data('originalHeight')*x);
    return jQuery(this);
};

jQuery(document).ready(function(){
    let zoom = 100;
    let currFFZoom = 1;
    jQuery('.page_scaling__btn_plus').on('click', function() {
        zoom = zoom+10;
        if (navigator.userAgent.indexOf('Firefox') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Firefox') + 8)) >= 3.6) { //Firefox)
            // document.body.style.MozTransform = "scale(1.1)";
            var step = 0.05;
            currFFZoom += step;
            jQuery('body').css('MozTransform', 'scale('+currFFZoom+')');
            jQuery('body').css('-moz-transform-origin', 'left top');

        } else {
            document.body.style.zoom = zoom+'%';
        }

    })
    jQuery('.page_scaling__btn_minus').on('click', function() {
        zoom = zoom-10;

        if (navigator.userAgent.indexOf('Firefox') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Firefox') + 8)) >= 3.6) { //Firefox)
            var step = 0.05;
            currFFZoom -= step;
            jQuery('body').css('MozTransform', 'scale('+currFFZoom+')');
            jQuery('body').css('-moz-transform-origin', 'left top');
        } else {
            document.body.style.zoom = zoom+'%';
        }
        // console.log(zoom)
    })
    jQuery('.page_scaling__btn_default').on('click', function() {
        zoom = 100;
        if (navigator.userAgent.indexOf('Firefox') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Firefox') + 8)) >= 3.6) { //Firefox)
            currFFZoom = 1
            document.body.style.MozTransform = "scale("+currFFZoom+")";
            jQuery('body').css('-moz-transform-origin', 'left top');
        } else {
            document.body.style.zoom = zoom+'%';
        }

        // console.log(zoom)
    })
})
