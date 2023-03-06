/*!
	Colorbox 1.6.4
	license: MIT
	http://www.jacklmoore.com/colorbox
*/
(function($,document,window){var defaults={html:false,photo:false,iframe:false,inline:false,transition:"elastic",speed:300,fadeOut:300,width:false,initialWidth:"600",innerWidth:false,maxWidth:false,height:false,initialHeight:"450",innerHeight:false,maxHeight:false,scalePhotos:true,scrolling:true,opacity:.9,preloading:true,className:false,overlayClose:true,escKey:true,arrowKey:true,top:false,bottom:false,left:false,right:false,fixed:false,data:undefined,closeButton:true,fastIframe:true,open:false,reposition:true,loop:true,slideshow:false,slideshowAuto:true,slideshowSpeed:2500,slideshowStart:"start slideshow",slideshowStop:"stop slideshow",photoRegex:/\.(gif|png|jp(e|g|eg)|bmp|ico|webp|jxr|svg)((#|\?).*)?$/i,retinaImage:false,retinaUrl:false,retinaSuffix:"@2x.$1",current:"image {current} of {total}",previous:"previous",next:"next",close:"close",xhrError:"This content failed to load.",imgError:"This image failed to load.",returnFocus:true,trapFocus:true,onOpen:false,onLoad:false,onComplete:false,onCleanup:false,onClosed:false,rel:function(){return this.rel},href:function(){return $(this).attr("href")},title:function(){return this.title},createImg:function(){var img=new Image;var attrs=$(this).data("cbox-img-attrs");if(typeof attrs==="object"){$.each(attrs,function(key,val){img[key]=val})}return img},createIframe:function(){var iframe=document.createElement("iframe");var attrs=$(this).data("cbox-iframe-attrs");if(typeof attrs==="object"){$.each(attrs,function(key,val){iframe[key]=val})}if("frameBorder"in iframe){iframe.frameBorder=0}if("allowTransparency"in iframe){iframe.allowTransparency="true"}iframe.name=(new Date).getTime();iframe.allowFullscreen=true;return iframe}},colorbox="colorbox",prefix="cbox",boxElement=prefix+"Element",event_open=prefix+"_open",event_load=prefix+"_load",event_complete=prefix+"_complete",event_cleanup=prefix+"_cleanup",event_closed=prefix+"_closed",event_purge=prefix+"_purge",$overlay,$box,$wrap,$content,$topBorder,$leftBorder,$rightBorder,$bottomBorder,$related,$window,$loaded,$loadingBay,$loadingOverlay,$title,$current,$slideshow,$next,$prev,$close,$groupControls,$events=$("<a/>"),settings,interfaceHeight,interfaceWidth,loadedHeight,loadedWidth,index,photo,open,active,closing,loadingTimer,publicMethod,div="div",requests=0,previousCSS={},init;function $tag(tag,id,css){var element=document.createElement(tag);if(id){element.id=prefix+id}if(css){element.style.cssText=css}return $(element)}function winheight(){return window.innerHeight?window.innerHeight:$(window).height()}function focusableEls($e){return $e.find('a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), [tabindex="0"]')}function firstFocusableEl($e){return focusableEls($e).first()}function lastFocusableEl($e){return focusableEls($e).last()}function Settings(element,options){if(options!==Object(options)){options={}}this.cache={};this.el=element;this.value=function(key){var dataAttr;if(this.cache[key]===undefined){dataAttr=$(this.el).attr("data-cbox-"+key);if(dataAttr!==undefined){this.cache[key]=dataAttr}else if(options[key]!==undefined){this.cache[key]=options[key]}else if(defaults[key]!==undefined){this.cache[key]=defaults[key]}}return this.cache[key]};this.get=function(key){var value=this.value(key);return $.isFunction(value)?value.call(this.el,this):value}}function getIndex(increment){var max=$related.length,newIndex=(index+increment)%max;return newIndex<0?max+newIndex:newIndex}function setSize(size,dimension){return Math.round((/%/.test(size)?(dimension==="x"?$window.width():winheight())/100:1)*parseInt(size,10))}function isImage(settings,url){return settings.get("photo")||settings.get("photoRegex").test(url)}function retinaUrl(settings,url){return settings.get("retinaUrl")&&window.devicePixelRatio>1?url.replace(settings.get("photoRegex"),settings.get("retinaSuffix")):url}function setClass(str){if(setClass.str!==str){$box.add($overlay).removeClass(setClass.str).addClass(str);setClass.str=str}}function getRelated(rel){index=0;if(rel&&rel!==false&&rel!=="nofollow"){$related=$("."+boxElement).filter(function(){var options=$.data(this,colorbox);var settings=new Settings(this,options);return settings.get("rel")===rel});index=$related.index(settings.el);if(index===-1){$related=$related.add(settings.el);index=$related.length-1}}else{$related=$(settings.el)}}function trigger(event){$(document).trigger(event);$events.triggerHandler(event)}var slideshow=function(){var active,className=prefix+"Slideshow_",click="click."+prefix,timeOut;function clear(){clearTimeout(timeOut)}function set(){if(settings.get("loop")||$related[index+1]){clear();timeOut=setTimeout(publicMethod.next,settings.get("slideshowSpeed"))}}function start(){$slideshow.html(settings.get("slideshowStop")).attr("aria-lable",settings.get("slideshowStop")).unbind(click).one(click,stop);$events.bind(event_complete,set).bind(event_load,clear);$box.removeClass(className+"off").addClass(className+"on")}function stop(){clear();$events.unbind(event_complete,set).unbind(event_load,clear);$slideshow.html(settings.get("slideshowStart")).attr("aria-lable",settings.get("slideshowStart")).unbind(click).one(click,function(){publicMethod.next();start()});$box.removeClass(className+"on").addClass(className+"off")}function reset(){active=false;$slideshow.attr("aria-hidden","true").hide();clear();$events.unbind(event_complete,set).unbind(event_load,clear);$box.removeClass(className+"off "+className+"on")}return function(){if(active){if(!settings.get("slideshow")){$events.unbind(event_cleanup,reset);reset()}}else{if(settings.get("slideshow")&&$related[1]){active=true;$events.one(event_cleanup,reset);if(settings.get("slideshowAuto")){start()}else{stop()}$slideshow.attr("aria-hidden","false").show()}}}}();function launch(element){var options;if(!closing){options=$(element).data(colorbox);settings=new Settings(element,options);getRelated(settings.get("rel"));if(!open){open=active=true;setClass(settings.get("className"));$box.css({visibility:"hidden",display:"block",opacity:""}).attr("aria-hidden","true");$loaded=$tag(div,"LoadedContent","width:0; height:0; overflow:hidden; visibility:hidden");$content.css({width:"",height:""}).append($loaded);interfaceHeight=$topBorder.height()+$bottomBorder.height()+$content.outerHeight(true)-$content.height();interfaceWidth=$leftBorder.width()+$rightBorder.width()+$content.outerWidth(true)-$content.width();loadedHeight=$loaded.outerHeight(true);loadedWidth=$loaded.outerWidth(true);var initialWidth=setSize(settings.get("initialWidth"),"x");var initialHeight=setSize(settings.get("initialHeight"),"y");var maxWidth=settings.get("maxWidth");var maxHeight=settings.get("maxHeight");settings.w=Math.max((maxWidth!==false?Math.min(initialWidth,setSize(maxWidth,"x")):initialWidth)-loadedWidth-interfaceWidth,0);settings.h=Math.max((maxHeight!==false?Math.min(initialHeight,setSize(maxHeight,"y")):initialHeight)-loadedHeight-interfaceHeight,0);$loaded.css({width:"",height:settings.h});publicMethod.position();trigger(event_open);settings.get("onOpen");$groupControls.add($title).hide();$box.attr("aria-hidden","false");if(settings.get("returnFocus")){$events.one(event_closed,function(){$(settings.el).focus()})}}var opacity=parseFloat(settings.get("opacity"));$overlay.css({opacity:opacity===opacity?opacity:"",cursor:settings.get("overlayClose")?"pointer":"",visibility:"visible"}).show();if(settings.get("closeButton")){$close.html(settings.get("close")).attr("aria-hidden","false").appendTo($content)}else{$close.appendTo("<div/>")}load()}}function appendHTML(){if(!$box){init=false;$window=$(window);$box=$tag(div).attr({id:colorbox,"class":$.support.opacity===false?prefix+"IE":"",role:"dialog","aria-hidden":"true","aria-labelledby":"cboxTitle","aria-describedby":"cboxCurrent"}).hide();$overlay=$tag(div,"Overlay").hide();$loadingOverlay=$([$tag(div,"LoadingOverlay")[0],$tag(div,"LoadingGraphic")[0]]);$wrap=$tag(div,"Wrapper");$content=$tag(div,"Content").append($title=$tag(div,"Title").attr("aria-live","polite"),$current=$tag(div,"Current"),$prev=$('<button type="button">previous</button>').attr({id:prefix+"Previous","aria-hidden":"true"}),$next=$('<button type="button">next</button>').attr({id:prefix+"Next","aria-hidden":"true"}),$slideshow=$('<button type="button">start slideshow</button>').attr({id:prefix+"Slideshow","aria-hidden":"true"}),$loadingOverlay);$close=$('<button type="button">close</button>').attr({id:prefix+"Close","aria-hidden":"true"});$wrap.append($tag(div).append($tag(div,"TopLeft"),$topBorder=$tag(div,"TopCenter"),$tag(div,"TopRight")),$tag(div,false,"clear:left").append($leftBorder=$tag(div,"MiddleLeft"),$content,$rightBorder=$tag(div,"MiddleRight")),$tag(div,false,"clear:left").append($tag(div,"BottomLeft"),$bottomBorder=$tag(div,"BottomCenter"),$tag(div,"BottomRight"))).find("div div").css({"float":"left"});$loadingBay=$tag(div,false,"position:absolute; width:9999px; visibility:hidden; display:none; max-width:none;");$groupControls=$next.add($prev).add($current).add($slideshow)}if(document.body&&!$box.parent().length){$(document.body).append($overlay,$box.append($wrap,$loadingBay))}}function addBindings(){function clickHandler(e){if(!(e.which>1||e.shiftKey||e.altKey||e.metaKey||e.ctrlKey)){e.preventDefault();launch(this)}}if($box){if(!init){init=true;$next.click(function(){publicMethod.next()});$prev.click(function(){publicMethod.prev()});$close.click(function(){publicMethod.close()});$overlay.click(function(){if(settings.get("overlayClose")){publicMethod.close()}});$(document).bind("keydown."+prefix,function(e){var key=e.keyCode;if(open&&settings.get("escKey")&&key===27){e.preventDefault();publicMethod.close()}if(open&&settings.get("arrowKey")&&$related[1]&&!e.altKey){if(key===37){e.preventDefault();$prev.click()}else if(key===39){e.preventDefault();$next.click()}}if(open&&settings.get("trapFocus")&&key===9){if(focusableEls($box).length===1){e.preventDefault()}else{if(e.shiftKey){if(document.activeElement===firstFocusableEl($box)[0]){e.preventDefault();lastFocusableEl($box).focus()}}else{if(document.activeElement===lastFocusableEl($box)[0]){e.preventDefault();firstFocusableEl($box).focus()}}}}});if($.isFunction($.fn.on)){$(document).on("click."+prefix,"."+boxElement,clickHandler)}else{$("."+boxElement).live("click."+prefix,clickHandler)}}return true}return false}if($[colorbox]){return}$(appendHTML);publicMethod=$.fn[colorbox]=$[colorbox]=function(options,callback){var settings;var $obj=this;options=options||{};if($.isFunction($obj)){$obj=$("<a/>");options.open=true}if(!$obj[0]){return $obj}appendHTML();if(addBindings()){if(callback){options.onComplete=callback}$obj.each(function(){var old=$.data(this,colorbox)||{};$.data(this,colorbox,$.extend(old,options))}).addClass(boxElement);settings=new Settings($obj[0],options);if(settings.get("open")){launch($obj[0])}}return $obj};publicMethod.position=function(speed,loadedCallback){var css,top=0,left=0,offset=$box.offset(),scrollTop,scrollLeft;$window.unbind("resize."+prefix);$box.css({top:-9e4,left:-9e4});scrollTop=$window.scrollTop();scrollLeft=$window.scrollLeft();if(settings.get("fixed")){offset.top-=scrollTop;offset.left-=scrollLeft;$box.css({position:"fixed"})}else{top=scrollTop;left=scrollLeft;$box.css({position:"absolute"})}if(settings.get("right")!==false){left+=Math.max($window.width()-settings.w-loadedWidth-interfaceWidth-setSize(settings.get("right"),"x"),0)}else if(settings.get("left")!==false){left+=setSize(settings.get("left"),"x")}else{left+=Math.round(Math.max($window.width()-settings.w-loadedWidth-interfaceWidth,0)/2)}if(settings.get("bottom")!==false){top+=Math.max(winheight()-settings.h-loadedHeight-interfaceHeight-setSize(settings.get("bottom"),"y"),0)}else if(settings.get("top")!==false){top+=setSize(settings.get("top"),"y")}else{top+=Math.round(Math.max(winheight()-settings.h-loadedHeight-interfaceHeight,0)/2)}$box.css({top:offset.top,left:offset.left,visibility:"visible"}).attr("aria-hidden","false");$wrap[0].style.width=$wrap[0].style.height="9999px";function modalDimensions(){$topBorder[0].style.width=$bottomBorder[0].style.width=$content[0].style.width=parseInt($box[0].style.width,10)-interfaceWidth+"px";$content[0].style.height=$leftBorder[0].style.height=$rightBorder[0].style.height=parseInt($box[0].style.height,10)-interfaceHeight+"px"}css={width:settings.w+loadedWidth+interfaceWidth,height:settings.h+loadedHeight+interfaceHeight,top:top,left:left};if(speed){var tempSpeed=0;$.each(css,function(i){if(css[i]!==previousCSS[i]){tempSpeed=speed;return}});speed=tempSpeed}previousCSS=css;if(!speed){$box.css(css)}$box.dequeue().animate(css,{duration:speed||0,complete:function(){modalDimensions();active=false;$wrap[0].style.width=settings.w+loadedWidth+interfaceWidth+"px";$wrap[0].style.height=settings.h+loadedHeight+interfaceHeight+"px";if(settings.get("reposition")){setTimeout(function(){$window.bind("resize."+prefix,publicMethod.position)},1)}if($.isFunction(loadedCallback)){loadedCallback()}},step:modalDimensions})};publicMethod.resize=function(options){var scrolltop;if(open){options=options||{};if(options.width){settings.w=setSize(options.width,"x")-loadedWidth-interfaceWidth}if(options.innerWidth){settings.w=setSize(options.innerWidth,"x")}$loaded.css({width:settings.w});if(options.height){settings.h=setSize(options.height,"y")-loadedHeight-interfaceHeight}if(options.innerHeight){settings.h=setSize(options.innerHeight,"y")}if(!options.innerHeight&&!options.height){scrolltop=$loaded.scrollTop();$loaded.css({height:"auto"});settings.h=$loaded.height()}$loaded.css({height:settings.h});if(scrolltop){$loaded.scrollTop(scrolltop)}publicMethod.position(settings.get("transition")==="none"?0:settings.get("speed"))}};publicMethod.prep=function(object){if(!open){return}var callback,speed=settings.get("transition")==="none"?0:settings.get("speed");$loaded.remove();$loaded=$tag(div,"LoadedContent").append(object);function getWidth(){settings.w=settings.w||$loaded.width();settings.w=settings.mw&&settings.mw<settings.w?settings.mw:settings.w;return settings.w}function getHeight(){settings.h=settings.h||$loaded.height();settings.h=settings.mh&&settings.mh<settings.h?settings.mh:settings.h;return settings.h}$loaded.hide().appendTo($loadingBay.show()).css({width:getWidth(),overflow:settings.get("scrolling")?"auto":"hidden"}).css({height:getHeight()}).prependTo($content);$loadingBay.hide();$(photo).css({"float":"none"});setClass(settings.get("className"));callback=function(){var total=$related.length,iframe,complete;if(!open){return}function removeFilter(){if($.support.opacity===false){$box[0].style.removeAttribute("filter")}}complete=function(){clearTimeout(loadingTimer);$loadingOverlay.hide();trigger(event_complete);settings.get("onComplete")};$title.html(settings.get("title")).show();$loaded.show();if(total>1){if(typeof settings.get("current")==="string"){$current.html(settings.get("current").replace("{current}",index+1).replace("{total}",total)).attr("aria-live","polite").show()}$showNext=settings.get("loop")||index<total-1;$next[$showNext?"show":"hide"]().html(settings.get("next")).attr("aria-hidden",$showNext?"false":"true");$showPrev=settings.get("loop")||index;$prev[$showPrev?"show":"hide"]().html(settings.get("previous")).attr("aria-hidden",$showPrev?"false":"true");if(!($prev.is(":focus")||$next.is(":focus")||$close.is(":focus"))){if($showPrev){$prev.focus()}else if($showNext){$next.focus()}else{$close.focus()}}slideshow();if(settings.get("preloading")){$.each([getIndex(-1),getIndex(1)],function(){var img,i=$related[this],settings=new Settings(i,$.data(i,colorbox)),src=settings.get("href");if(src&&isImage(settings,src)){src=retinaUrl(settings,src);img=document.createElement("img");img.src=src}})}}else{$groupControls.hide()}if(settings.get("iframe")){iframe=settings.get("createIframe");if(!settings.get("scrolling")){iframe.scrolling="no"}$(iframe).attr({src:settings.get("href"),"class":prefix+"Iframe"}).one("load",complete).appendTo($loaded);$events.one(event_purge,function(){iframe.src="//about:blank"});if(settings.get("fastIframe")){$(iframe).trigger("load")}}else{complete()}if(settings.get("transition")==="fade"){$box.fadeTo(speed,1,removeFilter)}else{removeFilter()}};if(settings.get("transition")==="fade"){$box.fadeTo(speed,0,function(){publicMethod.position(0,callback)})}else{publicMethod.position(speed,callback)}};function load(){var href,setResize,prep=publicMethod.prep,$inline,request=++requests;active=true;photo=false;trigger(event_purge);trigger(event_load);settings.get("onLoad");settings.h=settings.get("height")?setSize(settings.get("height"),"y")-loadedHeight-interfaceHeight:settings.get("innerHeight")&&setSize(settings.get("innerHeight"),"y");settings.w=settings.get("width")?setSize(settings.get("width"),"x")-loadedWidth-interfaceWidth:settings.get("innerWidth")&&setSize(settings.get("innerWidth"),"x");settings.mw=settings.w;settings.mh=settings.h;if(settings.get("maxWidth")){settings.mw=setSize(settings.get("maxWidth"),"x")-loadedWidth-interfaceWidth;settings.mw=settings.w&&settings.w<settings.mw?settings.w:settings.mw}if(settings.get("maxHeight")){settings.mh=setSize(settings.get("maxHeight"),"y")-loadedHeight-interfaceHeight;settings.mh=settings.h&&settings.h<settings.mh?settings.h:settings.mh}href=settings.get("href");loadingTimer=setTimeout(function(){$loadingOverlay.show()},100);if(settings.get("inline")){var $target=$(href).eq(0);$inline=$("<div>").hide().insertBefore($target);$events.one(event_purge,function(){$inline.replaceWith($target)});prep($target)}else if(settings.get("iframe")){prep(" ")}else if(settings.get("html")){prep(settings.get("html"))}else if(isImage(settings,href)){href=retinaUrl(settings,href);photo=settings.get("createImg");$(photo).addClass(prefix+"Photo").bind("error."+prefix,function(){prep($tag(div,"Error").html(settings.get("imgError")))}).one("load",function(){if(request!==requests){return}setTimeout(function(){var percent;if(settings.get("retinaImage")&&window.devicePixelRatio>1){photo.height=photo.height/window.devicePixelRatio;photo.width=photo.width/window.devicePixelRatio}if(settings.get("scalePhotos")){setResize=function(){photo.height-=photo.height*percent;photo.width-=photo.width*percent};if(settings.mw&&photo.width>settings.mw){percent=(photo.width-settings.mw)/photo.width;setResize()}if(settings.mh&&photo.height>settings.mh){percent=(photo.height-settings.mh)/photo.height;setResize()}}if(settings.h){photo.style.marginTop=Math.max(settings.mh-photo.height,0)/2+"px"}if($related[1]&&(settings.get("loop")||$related[index+1])){photo.style.cursor="pointer";$(photo).bind("click."+prefix,function(){publicMethod.next()})}photo.style.width=photo.width+"px";photo.style.height=photo.height+"px";prep(photo)},1)});photo.src=href}else if(href){$loadingBay.load(href,settings.get("data"),function(data,status){if(request===requests){prep(status==="error"?$tag(div,"Error").html(settings.get("xhrError")):$(this).contents())}})}}publicMethod.next=function(){if(!active&&$related[1]&&(settings.get("loop")||$related[index+1])){index=getIndex(1);launch($related[index])}};publicMethod.prev=function(){if(!active&&$related[1]&&(settings.get("loop")||index)){index=getIndex(-1);launch($related[index])}};publicMethod.close=function(){if(open&&!closing){closing=true;open=false;trigger(event_cleanup);settings.get("onCleanup");$window.unbind("."+prefix);$overlay.fadeTo(settings.get("fadeOut")||0,0);$box.stop().fadeTo(settings.get("fadeOut")||0,0,function(){$box.hide().attr("aria-hidden","true");$overlay.hide();trigger(event_purge);$loaded.remove();setTimeout(function(){closing=false;trigger(event_closed);settings.get("onClosed")},1)})}};publicMethod.remove=function(){if(!$box){return}$box.stop();$[colorbox].close();$box.stop(false,true).remove();$overlay.remove();closing=false;$box=null;$("."+boxElement).removeData(colorbox).removeClass(boxElement);$(document).unbind("click."+prefix).unbind("keydown."+prefix)};publicMethod.element=function(){return $(settings.el)};publicMethod.settings=defaults})(jQuery,document,window);;
/**
 * @file
 * Colorbox module init js.
 */

(function ($) {

Drupal.behaviors.initColorbox = {
  attach: function (context, settings) {
    if (!$.isFunction($('a, area, input', context).colorbox) || typeof settings.colorbox === 'undefined') {
      return;
    }

    if (settings.colorbox.mobiledetect && window.matchMedia) {
      // Disable Colorbox for small screens.
      var mq = window.matchMedia("(max-device-width: " + settings.colorbox.mobiledevicewidth + ")");
      if (mq.matches) {
        return;
      }
    }

    // Use "data-colorbox-gallery" if set otherwise use "rel".
    settings.colorbox.rel = function () {
      if ($(this).data('colorbox-gallery')) {
        return $(this).data('colorbox-gallery');
      }
      else {
        return $(this).attr('rel');
      }
    };

    $('.colorbox', context)
      .once('init-colorbox').each(function(){
        $(this).colorbox(settings.colorbox);
      });

    $(context).bind('cbox_complete', function () {
      Drupal.attachBehaviors('#cboxLoadedContent');
    });
  }
};

})(jQuery);
;
/**
 * @file
 * Colorbox module style js.
 */

(function ($) {

Drupal.behaviors.initColorboxDefaultStyle = {
  attach: function (context, settings) {
    $(context).bind('cbox_complete', function () {
      // Only run if there is a title.
      if ($('#cboxTitle:empty', context).length == false) {
        $('#cboxLoadedContent img', context).bind('mouseover', function () {
          $('#cboxTitle', context).slideDown();
        });
        $('#cboxOverlay', context).bind('mouseover', function () {
          $('#cboxTitle', context).slideUp();
        });
      }
      else {
        $('#cboxTitle', context).hide();
      }
    });
  }
};

})(jQuery);
;
/**
 * @file
 * Some basic behaviors and utility functions for Views.
 */
(function ($) {

  Drupal.Views = {};

  /**
   * JQuery UI tabs, Views integration component.
   */
  Drupal.behaviors.viewsTabs = {
    attach: function (context) {
      if ($.viewsUi && $.viewsUi.tabs) {
        $('#views-tabset').once('views-processed').viewsTabs({
          selectedClass: 'active'
        });
      }

      $('a.views-remove-link').once('views-processed').click(function(event) {
        var id = $(this).attr('id').replace('views-remove-link-', '');
        $('#views-row-' + id).hide();
        $('#views-removed-' + id).attr('checked', true);
        event.preventDefault();
      });
      /**
    * Here is to handle display deletion
    * (checking in the hidden checkbox and hiding out the row).
    */
      $('a.display-remove-link')
        .addClass('display-processed')
        .click(function() {
          var id = $(this).attr('id').replace('display-remove-link-', '');
          $('#display-row-' + id).hide();
          $('#display-removed-' + id).attr('checked', true);
          return false;
        });
    }
  };

  /**
 * Helper function to parse a querystring.
 */
  Drupal.Views.parseQueryString = function (query) {
    var args = {};
    var pos = query.indexOf('?');
    if (pos != -1) {
      query = query.substring(pos + 1);
    }
    var pairs = query.split('&');
    for (var i in pairs) {
      if (typeof(pairs[i]) == 'string') {
        var pair = pairs[i].split('=');
        // Ignore the 'q' path argument, if present.
        if (pair[0] != 'q' && pair[1]) {
          args[decodeURIComponent(pair[0].replace(/\+/g, ' '))] = decodeURIComponent(pair[1].replace(/\+/g, ' '));
        }
      }
    }
    return args;
  };

  /**
 * Helper function to return a view's arguments based on a path.
 */
  Drupal.Views.parseViewArgs = function (href, viewPath) {

    // Provide language prefix.
    if (Drupal.settings.pathPrefix) {
      var viewPath = Drupal.settings.pathPrefix + viewPath;
    }
    var returnObj = {};
    var path = Drupal.Views.getPath(href);
    // Ensure we have a correct path.
    if (viewPath && path.substring(0, viewPath.length + 1) == viewPath + '/') {
      var args = decodeURIComponent(path.substring(viewPath.length + 1, path.length));
      returnObj.view_args = args;
      returnObj.view_path = path;
    }
    return returnObj;
  };

  /**
 * Strip off the protocol plus domain from an href.
 */
  Drupal.Views.pathPortion = function (href) {
    // Remove e.g. http://example.com if present.
    var protocol = window.location.protocol;
    if (href.substring(0, protocol.length) == protocol) {
      // 2 is the length of the '//' that normally follows the protocol.
      href = href.substring(href.indexOf('https://uwaterloo.ca/', protocol.length + 2));
    }
    return href;
  };

  /**
 * Return the Drupal path portion of an href.
 */
  Drupal.Views.getPath = function (href) {
    href = Drupal.Views.pathPortion(href);
    href = href.substring(Drupal.settings.basePath.length, href.length);
    // 3 is the length of the '?q=' added to the url without clean urls.
    if (href.substring(0, 3) == '?q=') {
      href = href.substring(3, href.length);
    }
    var chars = ['#', '?', '&'];
    for (var i in chars) {
      if (href.indexOf(chars[i]) > -1) {
        href = href.substr(0, href.indexOf(chars[i]));
      }
    }
    return href;
  };

})(jQuery);
;
(function ($) {

/**
 * A progressbar object. Initialized with the given id. Must be inserted into
 * the DOM afterwards through progressBar.element.
 *
 * method is the function which will perform the HTTP request to get the
 * progress bar state. Either "GET" or "POST".
 *
 * e.g. pb = new progressBar('myProgressBar');
 *      some_element.appendChild(pb.element);
 */
Drupal.progressBar = function (id, updateCallback, method, errorCallback) {
  var pb = this;
  this.id = id;
  this.method = method || 'GET';
  this.updateCallback = updateCallback;
  this.errorCallback = errorCallback;

  // The WAI-ARIA setting aria-live="polite" will announce changes after users
  // have completed their current activity and not interrupt the screen reader.
  this.element = $('<div class="progress" aria-live="polite"></div>').attr('id', id);
  this.element.html('<div class="bar"><div class="filled"></div></div>' +
                    '<div class="percentage"></div>' +
                    '<div class="message">&nbsp;</div>');
};

/**
 * Set the percentage and status message for the progressbar.
 */
Drupal.progressBar.prototype.setProgress = function (percentage, message) {
  if (percentage >= 0 && percentage <= 100) {
    $('div.filled', this.element).css('width', percentage + '%');
    $('div.percentage', this.element).html(percentage + '%');
  }
  $('div.message', this.element).html(message);
  if (this.updateCallback) {
    this.updateCallback(percentage, message, this);
  }
};

/**
 * Start monitoring progress via Ajax.
 */
Drupal.progressBar.prototype.startMonitoring = function (uri, delay) {
  this.delay = delay;
  this.uri = uri;
  this.sendPing();
};

/**
 * Stop monitoring progress via Ajax.
 */
Drupal.progressBar.prototype.stopMonitoring = function () {
  clearTimeout(this.timer);
  // This allows monitoring to be stopped from within the callback.
  this.uri = null;
};

/**
 * Request progress data from server.
 */
Drupal.progressBar.prototype.sendPing = function () {
  if (this.timer) {
    clearTimeout(this.timer);
  }
  if (this.uri) {
    var pb = this;
    // When doing a post request, you need non-null data. Otherwise a
    // HTTP 411 or HTTP 406 (with Apache mod_security) error may result.
    $.ajax({
      type: this.method,
      url: this.uri,
      data: '',
      dataType: 'json',
      success: function (progress) {
        // Display errors.
        if (progress.status == 0) {
          pb.displayError(progress.data);
          return;
        }
        // Update display.
        pb.setProgress(progress.percentage, progress.message);
        // Schedule next timer.
        pb.timer = setTimeout(function () { pb.sendPing(); }, pb.delay);
      },
      error: function (xmlhttp) {
        pb.displayError(Drupal.ajaxError(xmlhttp, pb.uri));
      }
    });
  }
};

/**
 * Display errors on the page.
 */
Drupal.progressBar.prototype.displayError = function (string) {
  var error = $('<div class="messages error"></div>').html(string);
  $(this.element).before(error).hide();

  if (this.errorCallback) {
    this.errorCallback(this);
  }
};

})(jQuery);
;
/**
 * @file views_load_more.js
 *
 * Handles the AJAX pager for the view_load_more plugin.
 */
(function ($) {

  /**
   * Provide a series of commands that the server can request the client perform.
   */
  Drupal.ajax.prototype.commands.viewsLoadMoreAppend = function (ajax, response, status) {
    // Get information from the response. If it is not there, default to
    // our presets.
    var wrapper = response.selector ? $(response.selector) : $(ajax.wrapper);
    var method = response.method || ajax.method;
    var targetList = response.targetList || '';
    var effect = ajax.getEffect(response);
    var pager_selector = response.options.pager_selector ? response.options.pager_selector : '.pager-load-more';

    // We don't know what response.data contains: it might be a string of text
    // without HTML, so don't rely on jQuery correctly iterpreting
    // $(response.data) as new HTML rather than a CSS selector. Also, if
    // response.data contains top-level text nodes, they get lost with either
    // $(response.data) or $('<div></div>').replaceWith(response.data).
    var new_content_wrapped = $('<div></div>').html(response.data);
    var new_content = new_content_wrapped.contents();

    // For legacy reasons, the effects processing code assumes that new_content
    // consists of a single top-level element. Also, it has not been
    // sufficiently tested whether attachBehaviors() can be successfully called
    // with a context object that includes top-level text nodes. However, to
    // give developers full control of the HTML appearing in the page, and to
    // enable Ajax content to be inserted in places where DIV elements are not
    // allowed (e.g., within TABLE, TR, and SPAN parents), we check if the new
    // content satisfies the requirement of a single top-level element, and
    // only use the container DIV created above when it doesn't. For more
    // information, please see http://drupal.org/node/736066.
    if (new_content.length != 1 || new_content.get(0).nodeType != 1) {
      new_content = new_content_wrapped;
    }
    // If removing content from the wrapper, detach behaviors first.
    var settings = response.settings || ajax.settings || Drupal.settings;
    Drupal.detachBehaviors(wrapper, settings);
    if ($.waypoints != undefined) {
      $.waypoints('refresh');
    }

    // Set up our default query options. This is for advance users that might
    // change there views layout classes. This allows them to write there own
    // jquery selector to replace the content with.
    // Provide sensible defaults for unordered list, ordered list and table
    // view styles.
    var content_query = targetList && !response.options.content ? '> .view-content ' + targetList : response.options.content || '> .view-content';

    // If we're using any effects. Hide the new content before adding it to the DOM.
    if (effect.showEffect != 'show') {
      new_content.find(content_query).children().hide();
    }

    // Update the pager
    // Find both for the wrapper as the newly loaded content the direct child
    // .item-list in case of nested pagers
    wrapper.find(pager_selector).replaceWith(new_content.find(pager_selector));

    // Add the new content to the page.
    wrapper.find(content_query)[method](new_content.find(content_query).children());

    // Re-class the loaded content.
    // @todo this is faulty in many ways.  first of which is that user may have configured view to not have these classes at all.
    wrapper.find(content_query).children()
      .removeClass('views-row-first views-row-last views-row-odd views-row-even')
      .filter(':first')
        .addClass('views-row-first')
        .end()
      .filter(':last')
        .addClass('views-row-last')
        .end()
      .filter(':even')
        .addClass('views-row-odd')
        .end()
      .filter(':odd')
        .addClass('views-row-even')
        .end();

    if (effect.showEffect != 'show') {
      wrapper.find(content_query).children(':not(:visible)')[effect.showEffect](effect.showSpeed);
    }

    // Additional processing over new content
    wrapper.trigger('views_load_more.new_content', new_content.clone());

    // Attach all JavaScript behaviors to the new content
    // Remove the Jquery once Class, TODO: There needs to be a better
    // way of doing this, look at .removeOnce() :-/
    var classes = wrapper.attr('class');
    var onceClass = classes.match(/jquery-once-[0-9]*-[a-z]*/);
    wrapper.removeClass(onceClass[0]);
    settings = response.settings || ajax.settings || Drupal.settings;
    Drupal.attachBehaviors(wrapper, settings);
  };

  /**
   * Attaches the AJAX behavior to Views Load More waypoint support.
   */
  Drupal.behaviors.ViewsLoadMore = {
    attach: function (context, settings) {
      var default_opts = {
          offset: '100%'
        };

      if (settings && settings.viewsLoadMore && settings.views && settings.views.ajaxViews) {
        $.each(settings.viewsLoadMore, function(i, setting) {
          var view = '.view-id-' + setting.view_name + '.view-display-id-' + setting.view_display_id + ' .pager-next a',
            opts = {};

          $.extend(opts, default_opts, settings.viewsLoadMore[i].opts);

          $(view).waypoint('destroy');
          $(view).waypoint(function(event, direction) {
            $(view).click();
          }, opts);
        });
      }
    },
    detach: function (context, settings, trigger) {
      if (settings && settings.viewsLoadMore && settings.views && settings.views.ajaxViews) {
        $.each(settings.viewsLoadMore, function(i, setting) {
          var view = '.view-id-' + setting.view_name + '.view-display-id-' + setting.view_display_id;
          if ($(context).is(view)) {
            $('.pager-next a', view).waypoint('destroy');
          }
          else {
            $(view, context).waypoint('destroy');
          }
        });
      }
    }
  };
})(jQuery);
;
/**
 * @file
 */

(function ($, Drupal) {

  'use strict';
  // In order to varnish proof the random promo items, we need to load them in via js.
  // Here we will load them in on ready and the will not be behind varnish.
  Drupal.behaviors.promoItemsVarnishProofRandom = {
    attach: function (context) {
      // Check if there is a sticky promo item, hide it, then varnish-proof it.
      $('.view-display-id-promotional_block_sticky').ready(function () {
        // Ensure that the promo items js only runs once.
        $('.view-display-id-promotional_block_sticky').parent().once(function () {
          // Hide the sticky promo item, so that we do not get a flash while it loads the varnish proof item.
          $('.view-display-id-promotional_block_sticky').hide();
          // Step through each of the ajax enable views with settings and find the promo sticky.
          $(Drupal.settings.views.ajaxViews).each(function () {
            // Step through each of the keys to check for promo item and sticky.
            for (var ajax_key in this) {
              // Check if we are on a view.
              if (ajax_key.indexOf('views_dom_id') >= 0) {
                // Ensure that we are on the promo item view and we are using sticky.
                if (this[ajax_key].view_name == 'manage_promotional_items' && this[ajax_key].view_display_id == 'promotional_block_sticky') {
                  // Variable to hold data from the view.
                  var data = {};
                  // Step through of the views that are ajax enabled and setup the data variable.
                  for (var views_key in Drupal.settings.views.ajaxViews[ajax_key]) {
                    data[views_key] = Drupal.settings.views.ajaxViews[ajax_key][views_key];
                  }
                  // If we are on a correct path, setup the path properly (security needed here).
                  if (location.hash) {
                    var q = decodeURIComponent(location.hash.substr(1));
                    var o = {'f':function (v) {return unescape(v).replace(/\+/g,' ');}};
                    $.each(q.match(/^\??(.*)$/)[1].split('&'), function (i,p) {
                      p = p.split('=');
                      p[1] = o.f(p[1]);
                      data[p[0]] = data[p[0]] ? ((data[p[0]] instanceof Array) ? (data[p[0]].push(p[1]),data[p[0]]) : [data[p[0]],p[1]]) : p[1];
                    });
                  }
                  // Get the data from the actual view to put in the dom.
                  $.ajax({
                    url: Drupal.settings.views.ajax_path,
                    type: 'GET',
                    data: data,
                    success: function (response) {
                      // If we have success, replace the html with the view output.
                      // Need a second ajax call here to filter the output provided by
                      // views API from above.
                      $('.view-display-id-promotional_block_sticky').parent().html(response[2].data);
                      // Attach all the javascript again so that embeds can be processed.
                      Drupal.attachBehaviors('.view-display-id-promotional_block_sticky');
                      // Now show the sticky promo item with the varnish proof item.
                      $('.view-display-id-promotional_block_sticky').show();
                    },
                    dataType: 'json'
                  });
                }
              }
            }
          });
        });
      });
      // Check if there is a sticky promo item, hide it, then varnish-proof it.
      $('.view-display-id-promotional_block').ready(function () {
        // Check if there is a non-sticky promo item, hide it, then varnish-proof it.
        $('.view-display-id-promotional_block').parent().once(function () {
          // Hide the non-sticky promo item, so that we do not get a flash while it loads the varnish proof item.
          $('.view-display-id-promotional_block_sticky').hide();

          // Step through each of the ajax enable views with settings and find the promo non-sticky.
          $(Drupal.settings.views.ajaxViews).each(function () {
            // Step through each of the keys to check for promo item and non-sticky.
            for (var ajax_key in this) {
              // Check if we are on a view.
              if (ajax_key.indexOf('views_dom_id') >= 0) {
                // Ensure that we are on the promo item view and we are using non-sticky.
                if (this[ajax_key].view_name == 'manage_promotional_items' && this[ajax_key].view_display_id == 'promotional_block') {
                  // Variable to hold data from the view.
                  var data = {};
                  // Step through of the views that are ajax enabled and setup the data variable.
                  for (var views_key in Drupal.settings.views.ajaxViews[ajax_key]) {
                    data[views_key] = Drupal.settings.views.ajaxViews[ajax_key][views_key];
                  }
                  // If we are on a correct path, setup the path properly (security needed here).
                  if (location.hash) {
                    var q = decodeURIComponent(location.hash.substr(1));
                    var o = {'f':function (v) {return unescape(v).replace(/\+/g,' ');}};
                    $.each(q.match(/^\??(.*)$/)[1].split('&'), function (i,p) {
                      p = p.split('=');
                      p[1] = o.f(p[1]);
                      data[p[0]] = data[p[0]] ? ((data[p[0]] instanceof Array) ? (data[p[0]].push(p[1]),data[p[0]]) : [data[p[0]],p[1]]) : p[1];
                    });
                  }
                  // Get the data from the actual view to put in the dom.
                  $.ajax({
                    url: Drupal.settings.views.ajax_path,
                    type: 'GET',
                    data: data,
                    success: function (response) {
                      // If we have success, replace the html with the view output.
                      $('.view-display-id-promotional_block').parent().html(response[2].data);
                      // Attach all the javascript again so that embeds can be processed.
                      Drupal.attachBehaviors('.view-display-id-promotional_block');
                      // Now show the sticky promo item with the varnish proof item.
                      $('.view-display-id-promotional_block').show();
                    },
                    dataType: 'json'
                  });
                }
              }
            }
          });
        });
      });
    }
  };
})(jQuery, Drupal);
;
/**
 * @file
 * Handles AJAX fetching of views, including filter submission and response.
 */
(function ($) {

  /**
   * Attaches the AJAX behavior to exposed filter forms and key views links.
   */
  Drupal.behaviors.ViewsAjaxView = {};
  Drupal.behaviors.ViewsAjaxView.attach = function() {
    if (Drupal.settings && Drupal.settings.views && Drupal.settings.views.ajaxViews) {
      $.each(Drupal.settings.views.ajaxViews, function(i, settings) {
        Drupal.views.instances[i] = new Drupal.views.ajaxView(settings);
      });
    }
  };

  Drupal.views = {};
  Drupal.views.instances = {};

  /**
   * JavaScript object for a certain view.
   */
  Drupal.views.ajaxView = function(settings) {
    var selector = '.view-dom-id-' + settings.view_dom_id;
    this.$view = $(selector);

    // Retrieve the path to use for views' ajax.
    var ajax_path = Drupal.settings.views.ajax_path;

    // If there are multiple views this might've ended up showing up multiple
    // times.
    if (ajax_path.constructor.toString().indexOf("Array") != -1) {
      ajax_path = ajax_path[0];
    }

    // Check if there are any GET parameters to send to views.
    var queryString = window.location.search || '';
    if (queryString !== '') {
      // Remove the question mark and Drupal path component if any.
      var queryString = queryString.slice(1).replace(/q=[^&]+&?|&?render=[^&]+/, '');
      if (queryString !== '') {
        // If there is a '?' in ajax_path, clean url are on and & should be
        // used to add parameters.
        queryString = ((/\?/.test(ajax_path)) ? '&' : '?') + queryString;
      }
    }

    this.element_settings = {
      url: ajax_path + queryString,
      submit: settings,
      setClick: true,
      event: 'click',
      selector: selector,
      progress: {
        type: 'throbber'
      }
    };

    this.settings = settings;

    // Add the ajax to exposed forms.
    this.$exposed_form = $('#views-exposed-form-' + settings.view_name.replace(/_/g, '-') + '-' + settings.view_display_id.replace(/_/g, '-'));
    this.$exposed_form.once(jQuery.proxy(this.attachExposedFormAjax, this));

    // Store Drupal.ajax objects here for all pager links.
    this.links = [];

    // Add the ajax to pagers.
    this.$view
      .once(jQuery.proxy(this.attachPagerAjax, this));

    // Add a trigger to update this view specifically. In order to trigger a
    // refresh use the following code.
    //
    // @code
    // jQuery('.view-name').trigger('RefreshView');
    // @endcode
    // Add a trigger to update this view specifically.
    var self_settings = this.element_settings;
    self_settings.event = 'RefreshView';
    var self = this;
    this.$view.once('refresh', function () {
      self.refreshViewAjax = new Drupal.ajax(self.selector, self.$view, self_settings);
    });
  };

  Drupal.views.ajaxView.prototype.attachExposedFormAjax = function() {
    var button = $('input[type=submit], button[type=submit], input[type=image]', this.$exposed_form);
    button = button[0];

    // Call the autocomplete submit before doing AJAX.
    $(button).click(function () {
      if (Drupal.autocompleteSubmit) {
        Drupal.autocompleteSubmit();
      }
    });

    this.exposedFormAjax = new Drupal.ajax($(button).attr('id'), button, this.element_settings);
  };

  /**
   * Attach the ajax behavior to each link.
   */
  Drupal.views.ajaxView.prototype.attachPagerAjax = function() {
    this.$view.find('ul.pager > li > a, ol.pager > li > a, th.views-field a, .attachment .views-summary a')
      .each(jQuery.proxy(this.attachPagerLinkAjax, this));
  };

  /**
   * Attach the ajax behavior to a single link.
   */
  Drupal.views.ajaxView.prototype.attachPagerLinkAjax = function(id, link) {
    var $link = $(link);
    var viewData = {};
    var href = $link.attr('href');
    // Don't attach to pagers inside nested views.
    if ($link.closest('.view')[0] !== this.$view[0] &&
      $link.closest('.view').parent().hasClass('attachment') === false) {
      return;
    }

    // Provide a default page if none has been set. This must be done
    // prior to merging with settings to avoid accidentally using the
    // page landed on instead of page 1.
    if (typeof(viewData.page) === 'undefined') {
      viewData.page = 0;
    }

    // Construct an object using the settings defaults and then overriding
    // with data specific to the link.
    $.extend(
      viewData,
      this.settings,
      Drupal.Views.parseQueryString(href),
      // Extract argument data from the URL.
      Drupal.Views.parseViewArgs(href, this.settings.view_base_path)
    );

    // For anchor tags, these will go to the target of the anchor rather
    // than the usual location.
    $.extend(viewData, Drupal.Views.parseViewArgs(href, this.settings.view_base_path));

    this.element_settings.submit = viewData;
    this.pagerAjax = new Drupal.ajax(false, $link, this.element_settings);
    this.links.push(this.pagerAjax);
  };

  Drupal.ajax.prototype.commands.viewsScrollTop = function (ajax, response, status) {
    // Scroll to the top of the view. This will allow users
    // to browse newly loaded content after e.g. clicking a pager
    // link.
    var offset = $(response.selector).offset();
    // We can't guarantee that the scrollable object should be
    // the body, as the view could be embedded in something
    // more complex such as a modal popup. Recurse up the DOM
    // and scroll the first element that has a non-zero top.
    var scrollTarget = response.selector;
    while ($(scrollTarget).scrollTop() == 0 && $(scrollTarget).parent()) {
      scrollTarget = $(scrollTarget).parent();
    }
    // Only scroll upward.
    if (offset.top - 10 < $(scrollTarget).scrollTop()) {
      $(scrollTarget).animate({scrollTop: (offset.top - 10)}, 500);
    }
  };

})(jQuery);
;
/**
 * @file
 */

(function ($, Drupal) {
  'use strict';
  // In order to display twitter in the promo items, we need to load twitter widget in via js.
  Drupal.behaviors.uw_ct_promo_itemloadtwitter = {
    attach: function (context) {
      $(window).bind('load', function () {
        if (typeof twttr !== "undefined") {
          twttr.widgets.load();
        }
      });
    }
  };
})(jQuery, Drupal);
;
/**
 * @file
 *
 * Implement a modal form.
 *
 * @see modal.inc for documentation.
 *
 * This javascript relies on the CTools ajax responder.
 */

(function ($) {
  // Make sure our objects are defined.
  Drupal.CTools = Drupal.CTools || {};
  Drupal.CTools.Modal = Drupal.CTools.Modal || {};

  /**
   * Display the modal
   *
   * @todo -- document the settings.
   */
  Drupal.CTools.Modal.show = function(choice) {
    var opts = {};

    if (choice && typeof choice == 'string' && Drupal.settings[choice]) {
      // This notation guarantees we are actually copying it.
      $.extend(true, opts, Drupal.settings[choice]);
    }
    else if (choice) {
      $.extend(true, opts, choice);
    }

    var defaults = {
      modalTheme: 'CToolsModalDialog',
      throbberTheme: 'CToolsModalThrobber',
      animation: 'show',
      animationSpeed: 'fast',
      modalSize: {
        type: 'scale',
        width: .8,
        height: .8,
        addWidth: 0,
        addHeight: 0,
        // How much to remove from the inner content to make space for the
        // theming.
        contentRight: 25,
        contentBottom: 45
      },
      modalOptions: {
        opacity: .55,
        background: '#fff'
      },
      modalClass: 'default'
    };

    var settings = {};
    $.extend(true, settings, defaults, Drupal.settings.CToolsModal, opts);

    if (Drupal.CTools.Modal.currentSettings && Drupal.CTools.Modal.currentSettings != settings) {
      Drupal.CTools.Modal.modal.remove();
      Drupal.CTools.Modal.modal = null;
    }

    Drupal.CTools.Modal.currentSettings = settings;

    var resize = function(e) {
      // When creating the modal, it actually exists only in a theoretical
      // place that is not in the DOM. But once the modal exists, it is in the
      // DOM so the context must be set appropriately.
      var context = e ? document : Drupal.CTools.Modal.modal;

      if (Drupal.CTools.Modal.currentSettings.modalSize.type == 'scale') {
        var width = $(window).width() * Drupal.CTools.Modal.currentSettings.modalSize.width;
        var height = $(window).height() * Drupal.CTools.Modal.currentSettings.modalSize.height;
      }
      else {
        var width = Drupal.CTools.Modal.currentSettings.modalSize.width;
        var height = Drupal.CTools.Modal.currentSettings.modalSize.height;
      }

      // Use the additionol pixels for creating the width and height.
      $('div.ctools-modal-content', context).css({
        'width': width + Drupal.CTools.Modal.currentSettings.modalSize.addWidth + 'px',
        'height': height + Drupal.CTools.Modal.currentSettings.modalSize.addHeight + 'px'
      });
      $('div.ctools-modal-content .modal-content', context).css({
        'width': (width - Drupal.CTools.Modal.currentSettings.modalSize.contentRight) + 'px',
        'height': (height - Drupal.CTools.Modal.currentSettings.modalSize.contentBottom) + 'px'
      });
    }

    if (!Drupal.CTools.Modal.modal) {
      Drupal.CTools.Modal.modal = $(Drupal.theme(settings.modalTheme));
      if (settings.modalSize.type == 'scale') {
        $(window).bind('resize', resize);
      }
    }

    resize();

    $('span.modal-title', Drupal.CTools.Modal.modal).html(Drupal.CTools.Modal.currentSettings.loadingText);
    Drupal.CTools.Modal.modalContent(Drupal.CTools.Modal.modal, settings.modalOptions, settings.animation, settings.animationSpeed, settings.modalClass);
    $('#modalContent .modal-content').html(Drupal.theme(settings.throbberTheme)).addClass('ctools-modal-loading');

    // Position autocomplete results based on the scroll position of the modal.
    $('#modalContent .modal-content').delegate('input.form-autocomplete', 'keyup', function() {
      $('#autocomplete').css('top', $(this).position().top + $(this).outerHeight() + $(this).offsetParent().filter('#modal-content').scrollTop());
    });
  };

  /**
   * Hide the modal
   */
  Drupal.CTools.Modal.dismiss = function() {
    if (Drupal.CTools.Modal.modal) {
      Drupal.CTools.Modal.unmodalContent(Drupal.CTools.Modal.modal);
    }
  };

  /**
   * Provide the HTML to create the modal dialog.
   */
  Drupal.theme.prototype.CToolsModalDialog = function () {
    var html = ''
    html += '<div id="ctools-modal">'
    html += '  <div class="ctools-modal-content">' // panels-modal-content
    html += '    <div class="modal-header">';
    html += '      <a class="close" href="#">';
    html +=          Drupal.CTools.Modal.currentSettings.closeText + Drupal.CTools.Modal.currentSettings.closeImage;
    html += '      </a>';
    html += '      <span id="modal-title" class="modal-title">&nbsp;</span>';
    html += '    </div>';
    html += '    <div id="modal-content" class="modal-content">';
    html += '    </div>';
    html += '  </div>';
    html += '</div>';

    return html;
  }

  /**
   * Provide the HTML to create the throbber.
   */
  Drupal.theme.prototype.CToolsModalThrobber = function () {
    var html = '';
    html += '<div id="modal-throbber">';
    html += '  <div class="modal-throbber-wrapper">';
    html +=      Drupal.CTools.Modal.currentSettings.throbber;
    html += '  </div>';
    html += '</div>';

    return html;
  };

  /**
   * Figure out what settings string to use to display a modal.
   */
  Drupal.CTools.Modal.getSettings = function (object) {
    var match = $(object).attr('class').match(/ctools-modal-(\S+)/);
    if (match) {
      return match[1];
    }
  }

  /**
   * Click function for modals that can be cached.
   */
  Drupal.CTools.Modal.clickAjaxCacheLink = function () {
    Drupal.CTools.Modal.show(Drupal.CTools.Modal.getSettings(this));
    return Drupal.CTools.AJAX.clickAJAXCacheLink.apply(this);
  };

  /**
   * Handler to prepare the modal for the response
   */
  Drupal.CTools.Modal.clickAjaxLink = function () {
    Drupal.CTools.Modal.show(Drupal.CTools.Modal.getSettings(this));
    return false;
  };

  /**
   * Submit responder to do an AJAX submit on all modal forms.
   */
  Drupal.CTools.Modal.submitAjaxForm = function(e) {
    var $form = $(this);
    var url = $form.attr('action');

    setTimeout(function() { Drupal.CTools.AJAX.ajaxSubmit($form, url); }, 1);
    return false;
  }

  /**
   * Bind links that will open modals to the appropriate function.
   */
  Drupal.behaviors.ZZCToolsModal = {
    attach: function(context) {
      // Bind links
      // Note that doing so in this order means that the two classes can be
      // used together safely.
      /*
       * @todo remimplement the warm caching feature
       $('a.ctools-use-modal-cache', context).once('ctools-use-modal', function() {
         $(this).click(Drupal.CTools.Modal.clickAjaxCacheLink);
         Drupal.CTools.AJAX.warmCache.apply(this);
       });
        */

      $('area.ctools-use-modal, a.ctools-use-modal', context).once('ctools-use-modal', function() {
        var $this = $(this);
        $this.click(Drupal.CTools.Modal.clickAjaxLink);
        // Create a drupal ajax object
        var element_settings = {};
        if ($this.attr('href')) {
          element_settings.url = $this.attr('href');
          element_settings.event = 'click';
          element_settings.progress = { type: 'throbber' };
        }
        var base = $this.attr('href');
        Drupal.ajax[base] = new Drupal.ajax(base, this, element_settings);
      });

      // Bind buttons
      $('input.ctools-use-modal, button.ctools-use-modal', context).once('ctools-use-modal', function() {
        var $this = $(this);
        $this.click(Drupal.CTools.Modal.clickAjaxLink);
        var button = this;
        var element_settings = {};

        // AJAX submits specified in this manner automatically submit to the
        // normal form action.
        element_settings.url = Drupal.CTools.Modal.findURL(this);
        if (element_settings.url == '') {
          element_settings.url = $(this).closest('form').attr('action');
        }
        element_settings.event = 'click';
        element_settings.setClick = true;

        var base = $this.attr('id');
        Drupal.ajax[base] = new Drupal.ajax(base, this, element_settings);

        // Make sure changes to settings are reflected in the URL.
        $('.' + $(button).attr('id') + '-url').change(function() {
          Drupal.ajax[base].options.url = Drupal.CTools.Modal.findURL(button);
        });
      });

      // Bind our custom event to the form submit
      $('#modal-content form', context).once('ctools-use-modal', function() {
        var $this = $(this);
        var element_settings = {};

        element_settings.url = $this.attr('action');
        element_settings.event = 'submit';
        element_settings.progress = { 'type': 'throbber' }
        var base = $this.attr('id');

        Drupal.ajax[base] = new Drupal.ajax(base, this, element_settings);
        Drupal.ajax[base].form = $this;

        $('input[type=submit], button', this).click(function(event) {
          Drupal.ajax[base].element = this;
          this.form.clk = this;
          // Stop autocomplete from submitting.
          if (Drupal.autocompleteSubmit && !Drupal.autocompleteSubmit()) {
            return false;
          }
          // An empty event means we were triggered via .click() and
          // in jquery 1.4 this won't trigger a submit.
          // We also have to check jQuery version to prevent
          // IE8 + jQuery 1.4.4 to break on other events
          // bound to the submit button.
          if (jQuery.fn.jquery.substr(0, 3) === '1.4' && typeof event.bubbles === "undefined") {
            $(this.form).trigger('submit');
            return false;
          }
        });
      });

      // Bind a click handler to allow elements with the 'ctools-close-modal'
      // class to close the modal.
      $('.ctools-close-modal', context).once('ctools-close-modal')
        .click(function() {
          Drupal.CTools.Modal.dismiss();
          return false;
        });
    }
  };

  // The following are implementations of AJAX responder commands.

  /**
   * AJAX responder command to place HTML within the modal.
   */
  Drupal.CTools.Modal.modal_display = function(ajax, response, status) {
    if ($('#modalContent').length == 0) {
      Drupal.CTools.Modal.show(Drupal.CTools.Modal.getSettings(ajax.element));
    }
    $('#modal-title').html(response.title);
    // Simulate an actual page load by scrolling to the top after adding the
    // content. This is helpful for allowing users to see error messages at the
    // top of a form, etc.
    $('#modal-content').html(response.output).scrollTop(0);
    $(document).trigger('CToolsAttachBehaviors', $('#modalContent'));

    // Attach behaviors within a modal dialog.
    var settings = response.settings || ajax.settings || Drupal.settings;
    Drupal.attachBehaviors($('#modalContent'), settings);

    if ($('#modal-content').hasClass('ctools-modal-loading')) {
      $('#modal-content').removeClass('ctools-modal-loading');
    }
    else {
      // If the modal was already shown, and we are simply replacing its
      // content, then focus on the first focusable element in the modal.
      // (When first showing the modal, focus will be placed on the close
      // button by the show() function called above.)
      $('#modal-content :focusable:first').focus();
    }
  }

  /**
   * AJAX responder command to dismiss the modal.
   */
  Drupal.CTools.Modal.modal_dismiss = function(command) {
    Drupal.CTools.Modal.dismiss();
    $('link.ctools-temporary-css').remove();
  }

  /**
   * Display loading
   */
  //Drupal.CTools.AJAX.commands.modal_loading = function(command) {
  Drupal.CTools.Modal.modal_loading = function(command) {
    Drupal.CTools.Modal.modal_display({
      output: Drupal.theme(Drupal.CTools.Modal.currentSettings.throbberTheme),
      title: Drupal.CTools.Modal.currentSettings.loadingText
    });
  }

  /**
   * Find a URL for an AJAX button.
   *
   * The URL for this gadget will be composed of the values of items by
   * taking the ID of this item and adding -url and looking for that
   * class. They need to be in the form in order since we will
   * concat them all together using '/'.
   */
  Drupal.CTools.Modal.findURL = function(item) {
    var url = '';
    var url_class = '.' + $(item).attr('id') + '-url';
    $(url_class).each(
      function() {
        var $this = $(this);
        if (url && $this.val()) {
          url += 'https://uwaterloo.ca/';
        }
        url += $this.val();
      });
    return url;
  };


  /**
   * modalContent
   * @param content string to display in the content box
   * @param css obj of css attributes
   * @param animation (fadeIn, slideDown, show)
   * @param speed (valid animation speeds slow, medium, fast or # in ms)
   * @param modalClass class added to div#modalContent
   */
  Drupal.CTools.Modal.modalContent = function(content, css, animation, speed, modalClass) {
    // If our animation isn't set, make it just show/pop
    if (!animation) {
      animation = 'show';
    }
    else {
      // If our animation isn't "fadeIn" or "slideDown" then it always is show
      if (animation != 'fadeIn' && animation != 'slideDown') {
        animation = 'show';
      }
    }

    if (!speed && 0 !== speed) {
      speed = 'fast';
    }

    // Build our base attributes and allow them to be overriden
    css = jQuery.extend({
      position: 'absolute',
      left: '0px',
      margin: '0px',
      background: '#000',
      opacity: '.55'
    }, css);

    // Add opacity handling for IE.
    css.filter = 'alpha(opacity=' + (100 * css.opacity) + ')';
    content.hide();

    // If we already have modalContent, remove it.
    if ($('#modalBackdrop').length) $('#modalBackdrop').remove();
    if ($('#modalContent').length) $('#modalContent').remove();

    // position code lifted from http://www.quirksmode.org/viewport/compatibility.html
    if (self.pageYOffset) { // all except Explorer
    var wt = self.pageYOffset;
    } else if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict
      var wt = document.documentElement.scrollTop;
    } else if (document.body) { // all other Explorers
      var wt = document.body.scrollTop;
    }

    // Get our dimensions

    // Get the docHeight and (ugly hack) add 50 pixels to make sure we dont have a *visible* border below our div
    var docHeight = $(document).height() + 50;
    var docWidth = $(document).width();
    var winHeight = $(window).height();
    var winWidth = $(window).width();
    if( docHeight < winHeight ) docHeight = winHeight;

    // Create our divs
    $('body').append('<div id="modalBackdrop" class="backdrop-' + modalClass + '" style="z-index: 1000; display: none;"></div><div id="modalContent" class="modal-' + modalClass + '" style="z-index: 1001; position: absolute;">' + $(content).html() + '</div>');

    // Get a list of the tabbable elements in the modal content.
    var getTabbableElements = function () {
      var tabbableElements = $('#modalContent :tabbable'),
          radioButtons = tabbableElements.filter('input[type="radio"]');

      // The list of tabbable elements from jQuery is *almost* right. The
      // exception is with groups of radio buttons. The list from jQuery will
      // include all radio buttons, when in fact, only the selected radio button
      // is tabbable, and if no radio buttons in a group are selected, then only
      // the first is tabbable.
      if (radioButtons.length > 0) {
        // First, build up an index of which groups have an item selected or not.
        var anySelected = {};
        radioButtons.each(function () {
          var name = this.name;

          if (typeof anySelected[name] === 'undefined') {
            anySelected[name] = radioButtons.filter('input[name="' + name + '"]:checked').length !== 0;
          }
        });

        // Next filter out the radio buttons that aren't really tabbable.
        var found = {};
        tabbableElements = tabbableElements.filter(function () {
          var keep = true;

          if (this.type == 'radio') {
            if (anySelected[this.name]) {
              // Only keep the selected one.
              keep = this.checked;
            }
            else {
              // Only keep the first one.
              if (found[this.name]) {
                keep = false;
              }
              found[this.name] = true;
            }
          }

          return keep;
        });
      }

      return tabbableElements.get();
    };

    // Keyboard and focus event handler ensures only modal elements gain focus.
    modalEventHandler = function( event ) {
      target = null;
      if ( event ) { //Mozilla
        target = event.target;
      } else { //IE
        event = window.event;
        target = event.srcElement;
      }

      var parents = $(target).parents().get();
      for (var i = 0; i < parents.length; ++i) {
        var position = $(parents[i]).css('position');
        if (position == 'absolute' || position == 'fixed') {
          return true;
        }
      }

      if ($(target).is('#modalContent, body') || $(target).filter('*:visible').parents('#modalContent').length) {
        // Allow the event only if target is a visible child node
        // of #modalContent.
        return true;
      }
      else {
        getTabbableElements()[0].focus();
      }

      event.preventDefault();
    };
    $('body').bind( 'focus', modalEventHandler );
    $('body').bind( 'keypress', modalEventHandler );

    // Keypress handler Ensures you can only TAB to elements within the modal.
    // Based on the psuedo-code from WAI-ARIA 1.0 Authoring Practices section
    // 3.3.1 "Trapping Focus".
    modalTabTrapHandler = function (evt) {
      // We only care about the TAB key.
      if (evt.which != 9) {
        return true;
      }

      var tabbableElements = getTabbableElements(),
          firstTabbableElement = tabbableElements[0],
          lastTabbableElement = tabbableElements[tabbableElements.length - 1],
          singleTabbableElement = firstTabbableElement == lastTabbableElement,
          node = evt.target;

      // If this is the first element and the user wants to go backwards, then
      // jump to the last element.
      if (node == firstTabbableElement && evt.shiftKey) {
        if (!singleTabbableElement) {
          lastTabbableElement.focus();
        }
        return false;
      }
      // If this is the last element and the user wants to go forwards, then
      // jump to the first element.
      else if (node == lastTabbableElement && !evt.shiftKey) {
        if (!singleTabbableElement) {
          firstTabbableElement.focus();
        }
        return false;
      }
      // If this element isn't in the dialog at all, then jump to the first
      // or last element to get the user into the game.
      else if ($.inArray(node, tabbableElements) == -1) {
        // Make sure the node isn't in another modal (ie. WYSIWYG modal).
        var parents = $(node).parents().get();
        for (var i = 0; i < parents.length; ++i) {
          var position = $(parents[i]).css('position');
          if (position == 'absolute' || position == 'fixed') {
            return true;
          }
        }

        if (evt.shiftKey) {
          lastTabbableElement.focus();
        }
        else {
          firstTabbableElement.focus();
        }
      }
    };
    $('body').bind('keydown', modalTabTrapHandler);

    // Create our content div, get the dimensions, and hide it
    var modalContent = $('#modalContent').css('top','-1000px');
    var $modalHeader = modalContent.find('.modal-header');
    var mdcTop = wt + Math.max((winHeight / 2) - (modalContent.outerHeight() / 2), 0);
    var mdcLeft = ( winWidth / 2 ) - ( modalContent.outerWidth() / 2);
    $('#modalBackdrop').css(css).css('top', 0).css('height', docHeight + 'px').css('width', docWidth + 'px').show();
    modalContent.css({top: mdcTop + 'px', left: mdcLeft + 'px'}).hide()[animation](speed);

    // Bind a click for closing the modalContent
    modalContentClose = function(){close(); return false;};
    $('.close', $modalHeader).bind('click', modalContentClose);

    // Bind a keypress on escape for closing the modalContent
    modalEventEscapeCloseHandler = function(event) {
      if (event.keyCode == 27) {
        close();
        return false;
      }
    };

    $(document).bind('keydown', modalEventEscapeCloseHandler);

    // Per WAI-ARIA 1.0 Authoring Practices, initial focus should be on the
    // close button, but we should save the original focus to restore it after
    // the dialog is closed.
    var oldFocus = document.activeElement;
    $('.close', $modalHeader).focus();

    // Close the open modal content and backdrop
    function close() {
      // Unbind the events
      $(window).unbind('resize',  modalContentResize);
      $('body').unbind( 'focus', modalEventHandler);
      $('body').unbind( 'keypress', modalEventHandler );
      $('body').unbind( 'keydown', modalTabTrapHandler );
      $('.close', $modalHeader).unbind('click', modalContentClose);
      $(document).unbind('keydown', modalEventEscapeCloseHandler);
      $(document).trigger('CToolsDetachBehaviors', $('#modalContent'));

      // Closing animation.
      switch (animation) {
        case 'fadeIn':
          modalContent.fadeOut(speed, modalContentRemove);
          break;

        case 'slideDown':
          modalContent.slideUp(speed, modalContentRemove);
          break;

        case 'show':
          modalContent.hide(speed, modalContentRemove);
          break;
      }
    }

    // Remove the content.
    modalContentRemove = function () {
      $('#modalContent').remove();
      $('#modalBackdrop').remove();

      // Restore focus to where it was before opening the dialog.
      $(oldFocus).focus();
    };

    // Move and resize the modalBackdrop and modalContent on window resize.
    modalContentResize = function () {
      // Reset the backdrop height/width to get accurate document size.
      $('#modalBackdrop').css('height', '').css('width', '');

      // Position code lifted from:
      // http://www.quirksmode.org/viewport/compatibility.html
      if (self.pageYOffset) { // all except Explorer
        var wt = self.pageYOffset;
      } else if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict
        var wt = document.documentElement.scrollTop;
      } else if (document.body) { // all other Explorers
        var wt = document.body.scrollTop;
      }

      // Get our heights
      var docHeight = $(document).height();
      var docWidth = $(document).width();
      var winHeight = $(window).height();
      var winWidth = $(window).width();
      if( docHeight < winHeight ) docHeight = winHeight;

      // Get where we should move content to
      var modalContent = $('#modalContent');
      var mdcTop = wt + Math.max((winHeight / 2) - (modalContent.outerHeight() / 2), 0);
      var mdcLeft = ( winWidth / 2 ) - ( modalContent.outerWidth() / 2);

      // Apply the changes
      $('#modalBackdrop').css('height', docHeight + 'px').css('width', docWidth + 'px').show();
      modalContent.css('top', mdcTop + 'px').css('left', mdcLeft + 'px').show();
    };
    $(window).bind('resize', modalContentResize);
  };

  /**
   * unmodalContent
   * @param content (The jQuery object to remove)
   * @param animation (fadeOut, slideUp, show)
   * @param speed (valid animation speeds slow, medium, fast or # in ms)
   */
  Drupal.CTools.Modal.unmodalContent = function(content, animation, speed)
  {
    // If our animation isn't set, make it just show/pop
    if (!animation) { var animation = 'show'; } else {
      // If our animation isn't "fade" then it always is show
      if (( animation != 'fadeOut' ) && ( animation != 'slideUp')) animation = 'show';
    }
    // Set a speed if we dont have one
    if ( !speed ) var speed = 'fast';

    // Unbind the events we bound
    $(window).unbind('resize', modalContentResize);
    $('body').unbind('focus', modalEventHandler);
    $('body').unbind('keypress', modalEventHandler);
    $('body').unbind( 'keydown', modalTabTrapHandler );
    var $modalContent = $('#modalContent');
    var $modalHeader = $modalContent.find('.modal-header');
    $('.close', $modalHeader).unbind('click', modalContentClose);
    $('body').unbind('keypress', modalEventEscapeCloseHandler);
    $(document).trigger('CToolsDetachBehaviors', $modalContent);

    // jQuery magic loop through the instances and run the animations or removal.
    content.each(function(){
      if ( animation == 'fade' ) {
        $('#modalContent').fadeOut(speed, function() {
          $('#modalBackdrop').fadeOut(speed, function() {
            $(this).remove();
          });
          $(this).remove();
        });
      } else {
        if ( animation == 'slide' ) {
          $('#modalContent').slideUp(speed,function() {
            $('#modalBackdrop').slideUp(speed, function() {
              $(this).remove();
            });
            $(this).remove();
          });
        } else {
          $('#modalContent').remove();
          $('#modalBackdrop').remove();
        }
      }
    });
  };

$(function() {
  Drupal.ajax.prototype.commands.modal_display = Drupal.CTools.Modal.modal_display;
  Drupal.ajax.prototype.commands.modal_dismiss = Drupal.CTools.Modal.modal_dismiss;
});

})(jQuery);
;
