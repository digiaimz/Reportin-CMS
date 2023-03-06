/**
 * @file
 */

(function ($) {

  Drupal.behaviors.ckeditor_socialmedia = {

     attach: function (context, settings) {

      // Live stream.
      if ($('div.cklivestream')) {
        $('div.cklivestream').hide().each(function () {
          lswidth = 500;
          lsheight = 307;
          lsfitwidth = $(this).parent().width();
          lsfitheight = Math.floor(lsfitwidth / lswidth * lsheight);
          lsurl = encodeURIComponent($(this).data('username'));
          // note: using HTTP for <a href> because Livestream has certificate problems.
          $(this).before('<iframe width="' + lsfitwidth + '" height="' + lsfitheight + '" src="//cdn.livestream.com/embed/' + lsurl + '?layout=4&width=' + lsfitwidth + '&height=' + lsfitheight + '&color=0x' + Drupal.settings.ckeditor_socialmedia.livestream_color + '&iconColor=0x' + Drupal.settings.ckeditor_socialmedia.livestream_icon_color + '&iconColorOver=0x' + Drupal.settings.ckeditor_socialmedia.livestream_icon_color_over + '" style="border:0;outline:0" frameborder="0" scrolling="no"></iframe><div class="uw_video-embed-link"><a href="http://www.livestream.com/' + lsurl + '">Watch video on Livestream</a></div>');
        });
      }
      // Facebook.
      if ($('div.ckfacebook')) {
          $('div.ckfacebook').each(function () {
              fbwidth = $(this).parent().width();
              // Set sidebar width as a facebook widget width in order to display facebook in promo-items.
              if (fbwidth == 0 && $(this).parents('#site-sidebar').length) {
                // RT#926529
                // This is the default width for the sidebar, setting it
                // to ensure that an JS run after does not have a width of 0.
                fbwidth = 239;
              }
              if ($(this).data('type') == 'singlepost') {
                  fburl = $(this).data('fburl');
                  fullpost = $(this).data('fullpost');
                  $(this).before('<div class="fb-post" data-href="' + fburl + '" data-width="' + fbwidth + '" data-show-text="' + fullpost + '"></div>');
                  $(this).remove();

                  // Facebook javascript SDK.
                  $('div.ckfacebook a').hide().attr('width', $('div.ckfacebook').parent().width());
                  !function (d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) {
                          return;
                      }
                      js = d.createElement(s); js.id = id;
                      js.src = '../../../connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
                      fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk');
              }
              else {
                  // Anything that isn't a single post is assumed to be a timeline.
                  // This allows widgets created before we supported anything else to work.
                  fburl = encodeURIComponent('/' + $(this).data('username'));
                  $(this).before('<iframe src="https://www.facebook.com/plugins/likebox.php?href=' + fburl + '&amp;width=' + fbwidth + '&amp;height=350&amp;colorscheme=' + Drupal.settings.ckeditor_socialmedia.facebook_colorscheme + '&amp;show_faces=false&amp;border_color&amp;stream=true&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; max-width: 500px; width:' + fbwidth + 'px; height:350px;" allowTransparency="true"></iframe>');
                  $(this).remove();
              }
          });
      }

      // New Twitter.
      $('blockquote.twitter-tweet').hide();
      $('div.cktwitter a').hide().attr('width', $('div.cktwitter').parent().width());
      !function (d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (!d.getElementById(id)) {
             // js = d.createElement(s);
             // js.id = id;
            //  js.src = "../../../platform.twitter.com/widgets.js";
           //   fjs.parentNode.insertBefore(js, fjs);
          }
          // Code from Twitter to activate widgets.
      }(document, "script", "twitter-wjs");
      // If a new Twitter widget failed to load after 2 seconds, show the link (if Twitter does eventually load, it will hide the link itself).
      setTimeout(function () {
          // Standard Twitter widgets.
          $.each($('div.cktwitter'), function () {
              $iframe = $('iframe', this);
              if (!$iframe.length || $iframe.contents().find('body').html() == '') {
                  $(this).closest('div').find('a').show();
              }
          });
          // Embedded Tweets (Twitter removes the blockquote if it succeeds).
          $('blockquote.twitter-tweet').show();
          }, 2000);
     }
  };
})(jQuery);
;
/*!
* MediaElement.js
* HTML5 <video> and <audio> shim and player
* http://mediaelementjs.com/
*
* Creates a JavaScript object that mimics HTML5 MediaElement API
* for browsers that don't understand HTML5 or can't play the provided codec
* Can play MP4 (H.264), Ogg, WebM, FLV, WMV, WMA, ACC, and MP3
*
* Copyright 2010-2012, John Dyer (http://j.hn)
* Dual licensed under the MIT or GPL Version 2 licenses.
*
*/var mejs=mejs||{};mejs.version="2.9.5";mejs.meIndex=0;
mejs.plugins={silverlight:[{version:[3,0],types:["video/mp4","video/m4v","video/mov","video/wmv","audio/wma","audio/m4a","audio/mp3","audio/wav","audio/mpeg"]}],flash:[{version:[9,0,124],types:["video/mp4","video/m4v","video/mov","video/flv","video/rtmp","video/x-flv","audio/flv","audio/x-flv","audio/mp3","audio/m4a","audio/mpeg","video/youtube","video/x-youtube"]}],youtube:[{version:null,types:["video/youtube","video/x-youtube"]}],vimeo:[{version:null,types:["video/vimeo"]}]};
mejs.Utility={encodeUrl:function(a){return encodeURIComponent(a)},escapeHTML:function(a){return a.toString().split("&").join("&amp;").split("<").join("&lt;").split('"').join("&quot;")},absolutizeUrl:function(a){var b=document.createElement("div");b.innerHTML='<a href="'+this.escapeHTML(a)+'">x</a>';return b.firstChild.href},getScriptPath:function(a){for(var b=0,c,d="",e="",g,f=document.getElementsByTagName("script"),j=f.length,h=a.length;b<j;b++){g=f[b].src;for(c=0;c<h;c++){e=a[c];if(g.indexOf(e)>
-1){d=g.substring(0,g.indexOf(e));break}}if(d!=="")break}return d},secondsToTimeCode:function(a,b,c,d){if(typeof c=="undefined")c=false;else if(typeof d=="undefined")d=25;var e=Math.floor(a/3600)%24,g=Math.floor(a/60)%60,f=Math.floor(a%60);a=Math.floor((a%1*d).toFixed(3));return(b||e>0?(e<10?"0"+e:e)+":":"")+(g<10?"0"+g:g)+":"+(f<10?"0"+f:f)+(c?":"+(a<10?"0"+a:a):"")},timeCodeToSeconds:function(a,b,c,d){if(typeof c=="undefined")c=false;else if(typeof d=="undefined")d=25;a=a.split(":");b=parseInt(a[0],
10);var e=parseInt(a[1],10),g=parseInt(a[2],10),f=0,j=0;if(c)f=parseInt(a[3])/d;return j=b*3600+e*60+g+f},convertSMPTEtoSeconds:function(a){if(typeof a!="string")return false;a=a.replace(",",".");var b=0,c=a.indexOf(".")!=-1?a.split(".")[1].length:0,d=1;a=a.split(":").reverse();for(var e=0;e<a.length;e++){d=1;if(e>0)d=Math.pow(60,e);b+=Number(a[e])*d}return Number(b.toFixed(c))},removeSwf:function(a){var b=document.getElementById(a);if(b&&b.nodeName=="OBJECT")if(mejs.MediaFeatures.isIE){b.style.display=
"none";(function(){b.readyState==4?mejs.Utility.removeObjectInIE(a):setTimeout(arguments.callee,10)})()}else b.parentNode.removeChild(b)},removeObjectInIE:function(a){if(a=document.getElementById(a)){for(var b in a)if(typeof a[b]=="function")a[b]=null;a.parentNode.removeChild(a)}}};
mejs.PluginDetector={hasPluginVersion:function(a,b){var c=this.plugins[a];b[1]=b[1]||0;b[2]=b[2]||0;return c[0]>b[0]||c[0]==b[0]&&c[1]>b[1]||c[0]==b[0]&&c[1]==b[1]&&c[2]>=b[2]?true:false},nav:window.navigator,ua:window.navigator.userAgent.toLowerCase(),plugins:[],addPlugin:function(a,b,c,d,e){this.plugins[a]=this.detectPlugin(b,c,d,e)},detectPlugin:function(a,b,c,d){var e=[0,0,0],g;if(typeof this.nav.plugins!="undefined"&&typeof this.nav.plugins[a]=="object"){if((c=this.nav.plugins[a].description)&&
!(typeof this.nav.mimeTypes!="undefined"&&this.nav.mimeTypes[b]&&!this.nav.mimeTypes[b].enabledPlugin)){e=c.replace(a,"").replace(/^\s+/,"").replace(/\sr/gi,".").split(".");for(a=0;a<e.length;a++)e[a]=parseInt(e[a].match(/\d+/),10)}}else if(typeof window.ActiveXObject!="undefined")try{if(g=new ActiveXObject(c))e=d(g)}catch(f){}return e}};
mejs.PluginDetector.addPlugin("flash","Shockwave Flash","application/x-shockwave-flash","ShockwaveFlash.ShockwaveFlash",function(a){var b=[];if(a=a.GetVariable("$version")){a=a.split(" ")[1].split(",");b=[parseInt(a[0],10),parseInt(a[1],10),parseInt(a[2],10)]}return b});
mejs.PluginDetector.addPlugin("silverlight","Silverlight Plug-In","application/x-silverlight-2","AgControl.AgControl",function(a){var b=[0,0,0,0],c=function(d,e,g,f){for(;d.isVersionSupported(e[0]+"."+e[1]+"."+e[2]+"."+e[3]);)e[g]+=f;e[g]-=f};c(a,b,0,1);c(a,b,1,1);c(a,b,2,1E4);c(a,b,2,1E3);c(a,b,2,100);c(a,b,2,10);c(a,b,2,1);c(a,b,3,1);return b});
mejs.MediaFeatures={init:function(){var a=this,b=document,c=mejs.PluginDetector.nav,d=mejs.PluginDetector.ua.toLowerCase(),e,g=["source","track","audio","video"];a.isiPad=d.match(/ipad/i)!==null;a.isiPhone=d.match(/iphone/i)!==null;a.isiOS=a.isiPhone||a.isiPad;a.isAndroid=d.match(/android/i)!==null;a.isBustedAndroid=d.match(/android 2\.[12]/)!==null;a.isIE=c.appName.toLowerCase().indexOf("microsoft")!=-1;a.isChrome=d.match(/chrome/gi)!==null;a.isFirefox=d.match(/firefox/gi)!==null;a.isWebkit=d.match(/webkit/gi)!==
null;a.isGecko=d.match(/gecko/gi)!==null&&!a.isWebkit;a.isOpera=d.match(/opera/gi)!==null;a.hasTouch="ontouchstart"in window;for(c=0;c<g.length;c++)e=document.createElement(g[c]);a.supportsMediaTag=typeof e.canPlayType!=="undefined"||a.isBustedAndroid;a.hasSemiNativeFullScreen=typeof e.webkitEnterFullscreen!=="undefined";a.hasWebkitNativeFullScreen=typeof e.webkitRequestFullScreen!=="undefined";a.hasMozNativeFullScreen=typeof e.mozRequestFullScreen!=="undefined";a.hasTrueNativeFullScreen=a.hasWebkitNativeFullScreen||
a.hasMozNativeFullScreen;a.nativeFullScreenEnabled=a.hasTrueNativeFullScreen;if(a.hasMozNativeFullScreen)a.nativeFullScreenEnabled=e.mozFullScreenEnabled;if(this.isChrome)a.hasSemiNativeFullScreen=false;if(a.hasTrueNativeFullScreen){a.fullScreenEventName=a.hasWebkitNativeFullScreen?"webkitfullscreenchange":"mozfullscreenchange";a.isFullScreen=function(){if(e.mozRequestFullScreen)return b.mozFullScreen;else if(e.webkitRequestFullScreen)return b.webkitIsFullScreen};a.requestFullScreen=function(f){if(a.hasWebkitNativeFullScreen)f.webkitRequestFullScreen();
else a.hasMozNativeFullScreen&&f.mozRequestFullScreen()};a.cancelFullScreen=function(){if(a.hasWebkitNativeFullScreen)document.webkitCancelFullScreen();else a.hasMozNativeFullScreen&&document.mozCancelFullScreen()}}if(a.hasSemiNativeFullScreen&&d.match(/mac os x 10_5/i)){a.hasNativeFullScreen=false;a.hasSemiNativeFullScreen=false}}};mejs.MediaFeatures.init();
mejs.HtmlMediaElement={pluginType:"native",isFullScreen:false,setCurrentTime:function(a){this.currentTime=a},setMuted:function(a){this.muted=a},setVolume:function(a){this.volume=a},stop:function(){this.pause()},setSrc:function(a){for(var b=this.getElementsByTagName("source");b.length>0;)this.removeChild(b[0]);if(typeof a=="string")this.src=a;else{var c;for(b=0;b<a.length;b++){c=a[b];if(this.canPlayType(c.type))this.src=c.src}}},setVideoSize:function(a,b){this.width=a;this.height=b}};
mejs.PluginMediaElement=function(a,b,c){this.id=a;this.pluginType=b;this.src=c;this.events={}};
mejs.PluginMediaElement.prototype={pluginElement:null,pluginType:"",isFullScreen:false,playbackRate:-1,defaultPlaybackRate:-1,seekable:[],played:[],paused:true,ended:false,seeking:false,duration:0,error:null,tagName:"",muted:false,volume:1,currentTime:0,play:function(){if(this.pluginApi!=null){this.pluginType=="youtube"?this.pluginApi.playVideo():this.pluginApi.playMedia();this.paused=false}},load:function(){if(this.pluginApi!=null){this.pluginType!="youtube"&&this.pluginApi.loadMedia();this.paused=
false}},pause:function(){if(this.pluginApi!=null){this.pluginType=="youtube"?this.pluginApi.pauseVideo():this.pluginApi.pauseMedia();this.paused=true}},stop:function(){if(this.pluginApi!=null){this.pluginType=="youtube"?this.pluginApi.stopVideo():this.pluginApi.stopMedia();this.paused=true}},canPlayType:function(a){var b,c,d,e=mejs.plugins[this.pluginType];for(b=0;b<e.length;b++){d=e[b];if(mejs.PluginDetector.hasPluginVersion(this.pluginType,d.version))for(c=0;c<d.types.length;c++)if(a==d.types[c])return true}return false},
positionFullscreenButton:function(a,b,c){this.pluginApi!=null&&this.pluginApi.positionFullscreenButton&&this.pluginApi.positionFullscreenButton(a,b,c)},hideFullscreenButton:function(){this.pluginApi!=null&&this.pluginApi.hideFullscreenButton&&this.pluginApi.hideFullscreenButton()},setSrc:function(a){if(typeof a=="string"){this.pluginApi.setSrc(mejs.Utility.absolutizeUrl(a));this.src=mejs.Utility.absolutizeUrl(a)}else{var b,c;for(b=0;b<a.length;b++){c=a[b];if(this.canPlayType(c.type)){this.pluginApi.setSrc(mejs.Utility.absolutizeUrl(c.src));
this.src=mejs.Utility.absolutizeUrl(a)}}}},setCurrentTime:function(a){if(this.pluginApi!=null){this.pluginType=="youtube"?this.pluginApi.seekTo(a):this.pluginApi.setCurrentTime(a);this.currentTime=a}},setVolume:function(a){if(this.pluginApi!=null){this.pluginType=="youtube"?this.pluginApi.setVolume(a*100):this.pluginApi.setVolume(a);this.volume=a}},setMuted:function(a){if(this.pluginApi!=null){if(this.pluginType=="youtube"){a?this.pluginApi.mute():this.pluginApi.unMute();this.muted=a;this.dispatchEvent("volumechange")}else this.pluginApi.setMuted(a);
this.muted=a}},setVideoSize:function(a,b){if(this.pluginElement.style){this.pluginElement.style.width=a+"px";this.pluginElement.style.height=b+"px"}this.pluginApi!=null&&this.pluginApi.setVideoSize&&this.pluginApi.setVideoSize(a,b)},setFullscreen:function(a){this.pluginApi!=null&&this.pluginApi.setFullscreen&&this.pluginApi.setFullscreen(a)},enterFullScreen:function(){this.pluginApi!=null&&this.pluginApi.setFullscreen&&this.setFullscreen(true)},exitFullScreen:function(){this.pluginApi!=null&&this.pluginApi.setFullscreen&&
this.setFullscreen(false)},addEventListener:function(a,b){this.events[a]=this.events[a]||[];this.events[a].push(b)},removeEventListener:function(a,b){if(!a){this.events={};return true}var c=this.events[a];if(!c)return true;if(!b){this.events[a]=[];return true}for(i=0;i<c.length;i++)if(c[i]===b){this.events[a].splice(i,1);return true}return false},dispatchEvent:function(a){var b,c,d=this.events[a];if(d){c=Array.prototype.slice.call(arguments,1);for(b=0;b<d.length;b++)d[b].apply(null,c)}},attributes:{},
hasAttribute:function(a){return a in this.attributes},removeAttribute:function(a){delete this.attributes[a]},getAttribute:function(a){if(this.hasAttribute(a))return this.attributes[a];return""},setAttribute:function(a,b){this.attributes[a]=b},remove:function(){mejs.Utility.removeSwf(this.pluginElement.id)}};
mejs.MediaPluginBridge={pluginMediaElements:{},htmlMediaElements:{},registerPluginElement:function(a,b,c){this.pluginMediaElements[a]=b;this.htmlMediaElements[a]=c},initPlugin:function(a){var b=this.pluginMediaElements[a],c=this.htmlMediaElements[a];if(b){switch(b.pluginType){case "flash":b.pluginElement=b.pluginApi=document.getElementById(a);break;case "silverlight":b.pluginElement=document.getElementById(b.id);b.pluginApi=b.pluginElement.Content.MediaElementJS}b.pluginApi!=null&&b.success&&b.success(b,
c)}},fireEvent:function(a,b,c){var d,e;a=this.pluginMediaElements[a];a.ended=false;a.paused=true;b={type:b,target:a};for(d in c){a[d]=c[d];b[d]=c[d]}e=c.bufferedTime||0;b.target.buffered=b.buffered={start:function(){return 0},end:function(){return e},length:1};a.dispatchEvent(b.type,b)}};
mejs.MediaElementDefaults={mode:"auto",plugins:["flash","silverlight","youtube","vimeo"],enablePluginDebug:false,type:"",pluginPath:mejs.Utility.getScriptPath(["mediaelement.js","mediaelement.min.html","mediaelement-and-player.html","mediaelement-and-player.min.js"]),flashName:"flashmediaelement.swf",flashStreamer:"",enablePluginSmoothing:false,silverlightName:"silverlightmediaelement.xap",defaultVideoWidth:480,defaultVideoHeight:270,pluginWidth:-1,pluginHeight:-1,pluginVars:[],timerRate:250,startVolume:0.8,
success:function(){},error:function(){}};mejs.MediaElement=function(a,b){return mejs.HtmlMediaElementShim.create(a,b)};
mejs.HtmlMediaElementShim={create:function(a,b){var c=mejs.MediaElementDefaults,d=typeof a=="string"?document.getElementById(a):a,e=d.tagName.toLowerCase(),g=e==="audio"||e==="video",f=g?d.getAttribute("src"):d.getAttribute("href");e=d.getAttribute("poster");var j=d.getAttribute("autoplay"),h=d.getAttribute("preload"),l=d.getAttribute("controls"),k;for(k in b)c[k]=b[k];f=typeof f=="undefined"||f===null||f==""?null:f;e=typeof e=="undefined"||e===null?"":e;h=typeof h=="undefined"||h===null||h==="false"?
"none":h;j=!(typeof j=="undefined"||j===null||j==="false");l=!(typeof l=="undefined"||l===null||l==="false");k=this.determinePlayback(d,c,mejs.MediaFeatures.supportsMediaTag,g,f);k.url=k.url!==null?mejs.Utility.absolutizeUrl(k.url):"";if(k.method=="native"){if(mejs.MediaFeatures.isBustedAndroid){d.src=k.url;d.addEventListener("click",function(){d.play()},false)}return this.updateNative(k,c,j,h)}else if(k.method!=="")return this.createPlugin(k,c,e,j,h,l);else{this.createErrorMessage(k,c,e);return this}},
determinePlayback:function(a,b,c,d,e){var g=[],f,j,h={method:"",url:"",htmlMediaElement:a,isVideo:a.tagName.toLowerCase()!="audio"},l,k;if(typeof b.type!="undefined"&&b.type!=="")if(typeof b.type=="string")g.push({type:b.type,url:e});else for(f=0;f<b.type.length;f++)g.push({type:b.type[f],url:e});else if(e!==null){j=this.formatType(e,a.getAttribute("type"));g.push({type:j,url:e})}else for(f=0;f<a.childNodes.length;f++){j=a.childNodes[f];if(j.nodeType==1&&j.tagName.toLowerCase()=="source"){e=j.getAttribute("src");
j=this.formatType(e,j.getAttribute("type"));g.push({type:j,url:e})}}if(!d&&g.length>0&&g[0].url!==null&&this.getTypeFromFile(g[0].url).indexOf("audio")>-1)h.isVideo=false;if(mejs.MediaFeatures.isBustedAndroid)a.canPlayType=function(m){return m.match(/video\/(mp4|m4v)/gi)!==null?"maybe":""};if(c&&(b.mode==="auto"||b.mode==="auto_plugin"||b.mode==="native")){if(!d){f=document.createElement(h.isVideo?"video":"audio");a.parentNode.insertBefore(f,a);a.style.display="none";h.htmlMediaElement=a=f}for(f=
0;f<g.length;f++)if(a.canPlayType(g[f].type).replace(/no/,"")!==""||a.canPlayType(g[f].type.replace(/mp3/,"mpeg")).replace(/no/,"")!==""){h.method="native";h.url=g[f].url;break}if(h.method==="native"){if(h.url!==null)a.src=h.url;if(b.mode!=="auto_plugin")return h}}if(b.mode==="auto"||b.mode==="auto_plugin"||b.mode==="shim")for(f=0;f<g.length;f++){j=g[f].type;for(a=0;a<b.plugins.length;a++){e=b.plugins[a];l=mejs.plugins[e];for(c=0;c<l.length;c++){k=l[c];if(k.version==null||mejs.PluginDetector.hasPluginVersion(e,
k.version))for(d=0;d<k.types.length;d++)if(j==k.types[d]){h.method=e;h.url=g[f].url;return h}}}}if(b.mode==="auto_plugin"&&h.method==="native")return h;if(h.method===""&&g.length>0)h.url=g[0].url;return h},formatType:function(a,b){return a&&!b?this.getTypeFromFile(a):b&&~b.indexOf(";")?b.substr(0,b.indexOf(";")):b},getTypeFromFile:function(a){a=a.substring(a.lastIndexOf(".")+1);return(/(mp4|m4v|ogg|ogv|webm|webmv|flv|wmv|mpeg|mov)/gi.test(a)?"video":"audio")+"/"+this.getTypeFromExtension(a)},getTypeFromExtension:function(a){switch(a){case "mp4":case "m4v":return"mp4";
case "webm":case "webma":case "webmv":return"webm";case "ogg":case "oga":case "ogv":return"ogg";default:return a}},createErrorMessage:function(a,b,c){var d=a.htmlMediaElement,e=document.createElement("div");e.className="me-cannotplay";try{e.style.width=d.width+"px";e.style.height=d.height+"px"}catch(g){}e.innerHTML=c!==""?'<a href="'+a.url+'"><img src="'+c+'" width="100%" height="100%" /></a>':'<a href="'+a.url+'"><span>Download File</span></a>';d.parentNode.insertBefore(e,d);d.style.display="none";
b.error(d)},createPlugin:function(a,b,c,d,e,g){c=a.htmlMediaElement;var f=1,j=1,h="me_"+a.method+"_"+mejs.meIndex++,l=new mejs.PluginMediaElement(h,a.method,a.url),k=document.createElement("div"),m;l.tagName=c.tagName;for(m=0;m<c.attributes.length;m++){var n=c.attributes[m];n.specified==true&&l.setAttribute(n.name,n.value)}for(m=c.parentNode;m!==null&&m.tagName.toLowerCase()!="body";){if(m.parentNode.tagName.toLowerCase()=="p"){m.parentNode.parentNode.insertBefore(m,m.parentNode);break}m=m.parentNode}if(a.isVideo){f=
b.videoWidth>0?b.videoWidth:c.getAttribute("width")!==null?c.getAttribute("width"):b.defaultVideoWidth;j=b.videoHeight>0?b.videoHeight:c.getAttribute("height")!==null?c.getAttribute("height"):b.defaultVideoHeight;f=mejs.Utility.encodeUrl(f);j=mejs.Utility.encodeUrl(j)}else if(b.enablePluginDebug){f=320;j=240}l.success=b.success;mejs.MediaPluginBridge.registerPluginElement(h,l,c);k.className="me-plugin";k.id=h+"_container";a.isVideo?c.parentNode.insertBefore(k,c):document.body.insertBefore(k,document.body.childNodes[0]);
d=["id="+h,"isvideo="+(a.isVideo?"true":"false"),"autoplay="+(d?"true":"false"),"preload="+e,"width="+f,"startvolume="+b.startVolume,"timerrate="+b.timerRate,"flashstreamer="+b.flashStreamer,"height="+j];if(a.url!==null)a.method=="flash"?d.push("file="+mejs.Utility.encodeUrl(a.url)):d.push("file="+a.url);b.enablePluginDebug&&d.push("debug=true");b.enablePluginSmoothing&&d.push("smoothing=true");g&&d.push("controls=true");if(b.pluginVars)d=d.concat(b.pluginVars);switch(a.method){case "silverlight":k.innerHTML=
'<object data="data:application/x-silverlight-2," type="application/x-silverlight-2" id="'+h+'" name="'+h+'" width="'+f+'" height="'+j+'"><param name="initParams" value="'+d.join(",")+'" /><param name="windowless" value="true" /><param name="background" value="black" /><param name="minRuntimeVersion" value="3.0.0.0" /><param name="autoUpgrade" value="true" /><param name="source" value="'+b.pluginPath+b.silverlightName+'" /></object>';break;case "flash":if(mejs.MediaFeatures.isIE){a=document.createElement("div");
k.appendChild(a);a.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab" id="'+h+'" width="'+f+'" height="'+j+'"><param name="movie" value="'+b.pluginPath+b.flashName+"?x="+new Date+'" /><param name="flashvars" value="'+d.join("&amp;")+'" /><param name="quality" value="high" /><param name="bgcolor" value="#000000" /><param name="wmode" value="transparent" /><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="true" /></object>'}else k.innerHTML=
'<embed id="'+h+'" name="'+h+'" play="true" loop="false" quality="high" bgcolor="#000000" wmode="transparent" allowScriptAccess="always" allowFullScreen="true" type="application/x-shockwave-flash" pluginspage="//www.macromedia.com/go/getflashplayer" src="'+b.pluginPath+b.flashName+'" flashvars="'+d.join("&")+'" width="'+f+'" height="'+j+'"></embed>';break;case "youtube":b=a.url.substr(a.url.lastIndexOf("=")+1);youtubeSettings={container:k,containerId:k.id,pluginMediaElement:l,pluginId:h,videoId:b,
height:j,width:f};mejs.PluginDetector.hasPluginVersion("flash",[10,0,0])?mejs.YouTubeApi.createFlash(youtubeSettings):mejs.YouTubeApi.enqueueIframe(youtubeSettings);break;case "vimeo":l.vimeoid=a.url.substr(a.url.lastIndexOf("https://uwaterloo.ca/")+1);k.innerHTML='<object width="'+f+'" height="'+j+'"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="flashvars" value="api=1" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='+l.vimeoid+'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="//vimeo.com/moogaloop.swf?api=1&amp;clip_id='+
l.vimeoid+'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="'+f+'" height="'+j+'"></embed></object>'}c.style.display="none";return l},updateNative:function(a,b){var c=a.htmlMediaElement,d;for(d in mejs.HtmlMediaElement)c[d]=mejs.HtmlMediaElement[d];b.success(c,c);return c}};
mejs.YouTubeApi={isIframeStarted:false,isIframeLoaded:false,loadIframeApi:function(){if(!this.isIframeStarted){var a=document.createElement("script");a.src="http://www.youtube.com/player_api";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);this.isIframeStarted=true}},iframeQueue:[],enqueueIframe:function(a){if(this.isLoaded)this.createIframe(a);else{this.loadIframeApi();this.iframeQueue.push(a)}},createIframe:function(a){var b=a.pluginMediaElement,c=new YT.Player(a.containerId,
{height:a.height,width:a.width,videoId:a.videoId,playerVars:{controls:0},events:{onReady:function(){a.pluginMediaElement.pluginApi=c;mejs.MediaPluginBridge.initPlugin(a.pluginId);setInterval(function(){mejs.YouTubeApi.createEvent(c,b,"timeupdate")},250)},onStateChange:function(d){mejs.YouTubeApi.handleStateChange(d.data,c,b)}}})},createEvent:function(a,b,c){c={type:c,target:b};if(a&&a.getDuration){b.currentTime=c.currentTime=a.getCurrentTime();b.duration=c.duration=a.getDuration();c.paused=b.paused;
c.ended=b.ended;c.muted=a.isMuted();c.volume=a.getVolume()/100;c.bytesTotal=a.getVideoBytesTotal();c.bufferedBytes=a.getVideoBytesLoaded();var d=c.bufferedBytes/c.bytesTotal*c.duration;c.target.buffered=c.buffered={start:function(){return 0},end:function(){return d},length:1}}b.dispatchEvent(c.type,c)},iFrameReady:function(){for(this.isIframeLoaded=this.isLoaded=true;this.iframeQueue.length>0;)this.createIframe(this.iframeQueue.pop())},flashPlayers:{},createFlash:function(a){this.flashPlayers[a.pluginId]=
a;var b,c="http://www.youtube.com/apiplayer?enablejsapi=1&amp;playerapiid="+a.pluginId+"&amp;version=3&amp;autoplay=0&amp;controls=0&amp;modestbranding=1&loop=0";if(mejs.MediaFeatures.isIE){b=document.createElement("div");a.container.appendChild(b);b.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="//download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab" id="'+a.pluginId+'" width="'+a.width+'" height="'+a.height+'"><param name="movie" value="'+c+'" /><param name="wmode" value="transparent" /><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="true" /></object>'}else a.container.innerHTML=
'<object type="application/x-shockwave-flash" id="'+a.pluginId+'" data="'+c+'" width="'+a.width+'" height="'+a.height+'" style="visibility: visible; "><param name="allowScriptAccess" value="always"><param name="wmode" value="transparent"></object>'},flashReady:function(a){var b=this.flashPlayers[a],c=document.getElementById(a),d=b.pluginMediaElement;d.pluginApi=d.pluginElement=c;mejs.MediaPluginBridge.initPlugin(a);c.cueVideoById(b.videoId);a=b.containerId+"_callback";window[a]=function(e){mejs.YouTubeApi.handleStateChange(e,
c,d)};c.addEventListener("onStateChange",a);setInterval(function(){mejs.YouTubeApi.createEvent(c,d,"timeupdate")},250)},handleStateChange:function(a,b,c){switch(a){case -1:c.paused=true;c.ended=true;mejs.YouTubeApi.createEvent(b,c,"loadedmetadata");break;case 0:c.paused=false;c.ended=true;mejs.YouTubeApi.createEvent(b,c,"ended");break;case 1:c.paused=false;c.ended=false;mejs.YouTubeApi.createEvent(b,c,"play");mejs.YouTubeApi.createEvent(b,c,"playing");break;case 2:c.paused=true;c.ended=false;mejs.YouTubeApi.createEvent(b,
c,"pause");break;case 3:mejs.YouTubeApi.createEvent(b,c,"progress")}}};function onYouTubePlayerAPIReady(){mejs.YouTubeApi.iFrameReady()}function onYouTubePlayerReady(a){mejs.YouTubeApi.flashReady(a)}window.mejs=mejs;window.MediaElement=mejs.MediaElement;

/*!
 * MediaElementPlayer
 * http://mediaelementjs.com/
 *
 * Creates a controller bar for HTML5 <video> add <audio> tags
 * using jQuery and MediaElement.js (HTML5 Flash/Silverlight wrapper)
 *
 * Copyright 2010-2012, John Dyer (http://j.hn/)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 */if(typeof jQuery!="undefined")mejs.$=jQuery;else if(typeof ender!="undefined")mejs.$=ender;
(function(f){mejs.MepDefaults={poster:"",defaultVideoWidth:480,defaultVideoHeight:270,videoWidth:-1,videoHeight:-1,defaultAudioWidth:400,defaultAudioHeight:30,defaultSeekBackwardInterval:function(a){return a.duration*0.05},defaultSeekForwardInterval:function(a){return a.duration*0.05},audioWidth:-1,audioHeight:-1,startVolume:0.8,loop:false,enableAutosize:true,alwaysShowHours:false,showTimecodeFrameCount:false,framesPerSecond:25,autosizeProgress:true,alwaysShowControls:false,iPadUseNativeControls:false,
iPhoneUseNativeControls:false,AndroidUseNativeControls:false,features:["playpause","current","progress","duration","tracks","volume","fullscreen"],isVideo:true,enableKeyboard:true,pauseOtherPlayers:true,keyActions:[{keys:[32,179],action:function(a,b){b.paused||b.ended?b.play():b.pause()}},{keys:[38],action:function(a,b){b.setVolume(Math.min(b.volume+0.1,1))}},{keys:[40],action:function(a,b){b.setVolume(Math.max(b.volume-0.1,0))}},{keys:[37,227],action:function(a,b){if(!isNaN(b.duration)&&b.duration>
0){if(a.isVideo){a.showControls();a.startControlsTimer()}var c=Math.max(b.currentTime-a.options.defaultSeekBackwardInterval(b),0);b.setCurrentTime(c)}}},{keys:[39,228],action:function(a,b){if(!isNaN(b.duration)&&b.duration>0){if(a.isVideo){a.showControls();a.startControlsTimer()}var c=Math.min(b.currentTime+a.options.defaultSeekForwardInterval(b),b.duration);b.setCurrentTime(c)}}},{keys:[70],action:function(a){if(typeof a.enterFullScreen!="undefined")a.isFullScreen?a.exitFullScreen():a.enterFullScreen()}}]};
mejs.mepIndex=0;mejs.players=[];mejs.MediaElementPlayer=function(a,b){if(!(this instanceof mejs.MediaElementPlayer))return new mejs.MediaElementPlayer(a,b);this.$media=this.$node=f(a);this.node=this.media=this.$media[0];if(typeof this.node.player!="undefined")return this.node.player;else this.node.player=this;if(typeof b=="undefined")b=this.$node.data("mejsoptions");this.options=f.extend({},mejs.MepDefaults,b);mejs.players.push(this);this.init();return this};mejs.MediaElementPlayer.prototype={hasFocus:false,
controlsAreVisible:true,init:function(){var a=this,b=mejs.MediaFeatures,c=f.extend(true,{},a.options,{success:function(d,g){a.meReady(d,g)},error:function(d){a.handleError(d)}}),e=a.media.tagName.toLowerCase();a.isDynamic=e!=="audio"&&e!=="video";a.isVideo=a.isDynamic?a.options.isVideo:e!=="audio"&&a.options.isVideo;if(b.isiPad&&a.options.iPadUseNativeControls||b.isiPhone&&a.options.iPhoneUseNativeControls){a.$media.attr("controls","controls");if(b.isiPad&&a.media.getAttribute("autoplay")!==null){a.media.load();
a.media.play()}}else if(!(b.isAndroid&&a.AndroidUseNativeControls)){a.$media.removeAttr("controls");a.id="mep_"+mejs.mepIndex++;a.container=f('<div id="'+a.id+'" class="mejs-container"><div class="mejs-inner"><div class="mejs-mediaelement"></div><div class="mejs-layers"></div><div class="mejs-controls"></div><div class="mejs-clear"></div></div></div>').addClass(a.$media[0].className).insertBefore(a.$media);a.container.addClass((b.isAndroid?"mejs-android ":"")+(b.isiOS?"mejs-ios ":"")+(b.isiPad?"mejs-ipad ":
"")+(b.isiPhone?"mejs-iphone ":"")+(a.isVideo?"mejs-video ":"mejs-audio "));if(b.isiOS){b=a.$media.clone();a.container.find(".mejs-mediaelement").append(b);a.$media.remove();a.$node=a.$media=b;a.node=a.media=b[0]}else a.container.find(".mejs-mediaelement").append(a.$media);a.controls=a.container.find(".mejs-controls");a.layers=a.container.find(".mejs-layers");b=a.isVideo?"video":"audio";e=b.substring(0,1).toUpperCase()+b.substring(1);a.width=a.options[b+"Width"]>0||a.options[b+"Width"].toString().indexOf("%")>
-1?a.options[b+"Width"]:a.media.style.width!==""&&a.media.style.width!==null?a.media.style.width:a.media.getAttribute("width")!==null?a.$media.attr("width"):a.options["default"+e+"Width"];a.height=a.options[b+"Height"]>0||a.options[b+"Height"].toString().indexOf("%")>-1?a.options[b+"Height"]:a.media.style.height!==""&&a.media.style.height!==null?a.media.style.height:a.$media[0].getAttribute("height")!==null?a.$media.attr("height"):a.options["default"+e+"Height"];a.setPlayerSize(a.width,a.height);
c.pluginWidth=a.height;c.pluginHeight=a.width}mejs.MediaElement(a.$media[0],c)},showControls:function(a){var b=this;a=typeof a=="undefined"||a;if(!b.controlsAreVisible){if(a){b.controls.css("visibility","visible").stop(true,true).fadeIn(200,function(){b.controlsAreVisible=true});b.container.find(".mejs-control").css("visibility","visible").stop(true,true).fadeIn(200,function(){b.controlsAreVisible=true})}else{b.controls.css("visibility","visible").css("display","block");b.container.find(".mejs-control").css("visibility",
"visible").css("display","block");b.controlsAreVisible=true}b.setControlsSize()}},hideControls:function(a){var b=this;a=typeof a=="undefined"||a;if(b.controlsAreVisible)if(a){b.controls.stop(true,true).fadeOut(200,function(){f(this).css("visibility","hidden").css("display","block");b.controlsAreVisible=false});b.container.find(".mejs-control").stop(true,true).fadeOut(200,function(){f(this).css("visibility","hidden").css("display","block")})}else{b.controls.css("visibility","hidden").css("display",
"block");b.container.find(".mejs-control").css("visibility","hidden").css("display","block");b.controlsAreVisible=false}},controlsTimer:null,startControlsTimer:function(a){var b=this;a=typeof a!="undefined"?a:1500;b.killControlsTimer("start");b.controlsTimer=setTimeout(function(){b.hideControls();b.killControlsTimer("hide")},a)},killControlsTimer:function(){if(this.controlsTimer!==null){clearTimeout(this.controlsTimer);delete this.controlsTimer;this.controlsTimer=null}},controlsEnabled:true,disableControls:function(){this.killControlsTimer();
this.hideControls(false);this.controlsEnabled=false},enableControls:function(){this.showControls(false);this.controlsEnabled=true},meReady:function(a,b){var c=this,e=mejs.MediaFeatures,d=b.getAttribute("autoplay");d=!(typeof d=="undefined"||d===null||d==="false");var g;if(!c.created){c.created=true;c.media=a;c.domNode=b;if(!(e.isAndroid&&c.options.AndroidUseNativeControls)&&!(e.isiPad&&c.options.iPadUseNativeControls)&&!(e.isiPhone&&c.options.iPhoneUseNativeControls)){c.buildposter(c,c.controls,c.layers,
c.media);c.buildkeyboard(c,c.controls,c.layers,c.media);c.buildoverlays(c,c.controls,c.layers,c.media);c.findTracks();for(g in c.options.features){e=c.options.features[g];if(c["build"+e])try{c["build"+e](c,c.controls,c.layers,c.media)}catch(k){}}c.container.trigger("controlsready");c.setPlayerSize(c.width,c.height);c.setControlsSize();if(c.isVideo){if(mejs.MediaFeatures.hasTouch)c.$media.bind("touchstart",function(){if(c.controlsAreVisible)c.hideControls(false);else c.controlsEnabled&&c.showControls(false)});
else{(c.media.pluginType=="native"?c.$media:f(c.media.pluginElement)).click(function(){a.paused?a.play():a.pause()});c.container.bind("mouseenter mouseover",function(){if(c.controlsEnabled)if(!c.options.alwaysShowControls){c.killControlsTimer("enter");c.showControls();c.startControlsTimer(2500)}}).bind("mousemove",function(){if(c.controlsEnabled){c.controlsAreVisible||c.showControls();c.options.alwaysShowControls||c.startControlsTimer(2500)}}).bind("mouseleave",function(){c.controlsEnabled&&!c.media.paused&&
!c.options.alwaysShowControls&&c.startControlsTimer(1E3)})}d&&!c.options.alwaysShowControls&&c.hideControls();c.options.enableAutosize&&c.media.addEventListener("loadedmetadata",function(h){if(c.options.videoHeight<=0&&c.domNode.getAttribute("height")===null&&!isNaN(h.target.videoHeight)){c.setPlayerSize(h.target.videoWidth,h.target.videoHeight);c.setControlsSize();c.media.setVideoSize(h.target.videoWidth,h.target.videoHeight)}},false)}a.addEventListener("play",function(){for(var h=0,o=mejs.players.length;h<
o;h++){var n=mejs.players[h];n.id!=c.id&&c.options.pauseOtherPlayers&&!n.paused&&!n.ended&&n.pause();n.hasFocus=false}c.hasFocus=true},false);c.media.addEventListener("ended",function(){try{c.media.setCurrentTime(0)}catch(h){}c.media.pause();c.setProgressRail&&c.setProgressRail();c.setCurrentRail&&c.setCurrentRail();if(c.options.loop)c.media.play();else!c.options.alwaysShowControls&&c.controlsEnabled&&c.showControls()},false);c.media.addEventListener("loadedmetadata",function(){c.updateDuration&&
c.updateDuration();c.updateCurrent&&c.updateCurrent();if(!c.isFullScreen){c.setPlayerSize(c.width,c.height);c.setControlsSize()}},false);setTimeout(function(){c.setPlayerSize(c.width,c.height);c.setControlsSize()},50);f(window).resize(function(){c.isFullScreen||mejs.MediaFeatures.hasTrueNativeFullScreen&&document.webkitIsFullScreen||c.setPlayerSize(c.width,c.height);c.setControlsSize()});c.media.pluginType=="youtube"&&c.container.find(".mejs-overlay-play").hide()}if(d&&a.pluginType=="native"){a.load();
a.play()}if(c.options.success)typeof c.options.success=="string"?window[c.options.success](c.media,c.domNode,c):c.options.success(c.media,c.domNode,c)}},handleError:function(a){this.controls.hide();this.options.error&&this.options.error(a)},setPlayerSize:function(a,b){if(typeof a!="undefined")this.width=a;if(typeof b!="undefined")this.height=b;if(this.height.toString().indexOf("%")>0||this.$node.css("max-width")==="100%"){var c=this.media.videoWidth&&this.media.videoWidth>0?this.media.videoWidth:
this.options.defaultVideoWidth,e=this.media.videoHeight&&this.media.videoHeight>0?this.media.videoHeight:this.options.defaultVideoHeight,d=this.container.parent().width();c=parseInt(d*e/c,10);if(this.container.parent()[0].tagName.toLowerCase()==="body"){d=f(window).width();c=f(window).height()}if(c!=0){this.container.width(d).height(c);this.$media.width("100%").height("100%");this.container.find("object, embed, iframe").width("100%").height("100%");this.isVideo&&this.media.setVideoSize&&this.media.setVideoSize(d,
c);this.layers.children(".mejs-layer").width("100%").height("100%")}}else{this.container.width(this.width).height(this.height);this.layers.children(".mejs-layer").width(this.width).height(this.height)}},setControlsSize:function(){var a=0,b=0,c=this.controls.find(".mejs-time-rail"),e=this.controls.find(".mejs-time-total");this.controls.find(".mejs-time-current");this.controls.find(".mejs-time-loaded");var d=c.siblings();if(this.options&&!this.options.autosizeProgress)b=parseInt(c.css("width"));if(b===
0||!b){d.each(function(){if(f(this).css("position")!="absolute")a+=f(this).outerWidth(true)});b=this.controls.width()-a-(c.outerWidth(true)-c.width())}c.width(b);e.width(b-(e.outerWidth(true)-e.width()));this.setProgressRail&&this.setProgressRail();this.setCurrentRail&&this.setCurrentRail()},buildposter:function(a,b,c,e){var d=f('<div class="mejs-poster mejs-layer"></div>').appendTo(c);b=a.$media.attr("poster");if(a.options.poster!=="")b=a.options.poster;b!==""&&b!=null?this.setPoster(b):d.hide();
e.addEventListener("play",function(){d.hide()},false)},setPoster:function(a){var b=this.container.find(".mejs-poster"),c=b.find("img");if(c.length==0)c=f('<img width="100%" height="100%" />').appendTo(b);c.attr("src",a)},buildoverlays:function(a,b,c,e){if(a.isVideo){var d=f('<div class="mejs-overlay mejs-layer"><div class="mejs-overlay-loading"><span></span></div></div>').hide().appendTo(c),g=f('<div class="mejs-overlay mejs-layer"><div class="mejs-overlay-error"></div></div>').hide().appendTo(c),
k=f('<div class="mejs-overlay mejs-layer mejs-overlay-play"><div class="mejs-overlay-button"></div></div>').appendTo(c).click(function(){e.paused?e.play():e.pause()});e.addEventListener("play",function(){k.hide();d.hide();b.find(".mejs-time-buffering").hide();g.hide()},false);e.addEventListener("playing",function(){k.hide();d.hide();b.find(".mejs-time-buffering").hide();g.hide()},false);e.addEventListener("seeking",function(){d.show();b.find(".mejs-time-buffering").show()},false);e.addEventListener("seeked",
function(){d.hide();b.find(".mejs-time-buffering").hide()},false);e.addEventListener("pause",function(){mejs.MediaFeatures.isiPhone||k.show()},false);e.addEventListener("waiting",function(){d.show();b.find(".mejs-time-buffering").show()},false);e.addEventListener("loadeddata",function(){d.show();b.find(".mejs-time-buffering").show()},false);e.addEventListener("canplay",function(){d.hide();b.find(".mejs-time-buffering").hide()},false);e.addEventListener("error",function(){d.hide();b.find(".mejs-time-buffering").hide();
g.show();g.find("mejs-overlay-error").html("Error loading this resource")},false)}},buildkeyboard:function(a,b,c,e){f(document).keydown(function(d){if(a.hasFocus&&a.options.enableKeyboard)for(var g=0,k=a.options.keyActions.length;g<k;g++)for(var h=a.options.keyActions[g],o=0,n=h.keys.length;o<n;o++)if(d.keyCode==h.keys[o]){d.preventDefault();h.action(a,e,d.keyCode);return false}return true});f(document).click(function(d){if(f(d.target).closest(".mejs-container").length==0)a.hasFocus=false})},findTracks:function(){var a=
this,b=a.$media.find("track");a.tracks=[];b.each(function(c,e){e=f(e);a.tracks.push({srclang:e.attr("srclang").toLowerCase(),src:e.attr("src"),kind:e.attr("kind"),label:e.attr("label")||"",entries:[],isLoaded:false})})},changeSkin:function(a){this.container[0].className="mejs-container "+a;this.setPlayerSize(this.width,this.height);this.setControlsSize()},play:function(){this.media.play()},pause:function(){this.media.pause()},load:function(){this.media.load()},setMuted:function(a){this.media.setMuted(a)},
setCurrentTime:function(a){this.media.setCurrentTime(a)},getCurrentTime:function(){return this.media.currentTime},setVolume:function(a){this.media.setVolume(a)},getVolume:function(){return this.media.volume},setSrc:function(a){this.media.setSrc(a)},remove:function(){if(this.media.pluginType==="flash")this.media.remove();else this.media.pluginType==="native"&&this.$media.prop("controls",true);this.isDynamic||this.$node.insertBefore(this.container);this.container.remove()}};if(typeof jQuery!="undefined")jQuery.fn.mediaelementplayer=
function(a){return this.each(function(){new mejs.MediaElementPlayer(this,a)})};f(document).ready(function(){f(".mejs-player").mediaelementplayer()});window.MediaElementPlayer=mejs.MediaElementPlayer})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{playpauseText:"Play/Pause"});f.extend(MediaElementPlayer.prototype,{buildplaypause:function(a,b,c,e){var d=f('<div class="mejs-button mejs-playpause-button mejs-play" ><button type="button" aria-controls="'+this.id+'" title="'+this.options.playpauseText+'"></button></div>').appendTo(b).click(function(g){g.preventDefault();e.paused?e.play():e.pause();return false});e.addEventListener("play",function(){d.removeClass("mejs-play").addClass("mejs-pause")},false);
e.addEventListener("playing",function(){d.removeClass("mejs-play").addClass("mejs-pause")},false);e.addEventListener("pause",function(){d.removeClass("mejs-pause").addClass("mejs-play")},false);e.addEventListener("paused",function(){d.removeClass("mejs-pause").addClass("mejs-play")},false)}})})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{stopText:"Stop"});f.extend(MediaElementPlayer.prototype,{buildstop:function(a,b,c,e){f('<div class="mejs-button mejs-stop-button mejs-stop"><button type="button" aria-controls="'+this.id+'" title="'+this.options.stopText+'"></button></div>').appendTo(b).click(function(){e.paused||e.pause();if(e.currentTime>0){e.setCurrentTime(0);b.find(".mejs-time-current").width("0px");b.find(".mejs-time-handle").css("left","0px");b.find(".mejs-time-float-current").html(mejs.Utility.secondsToTimeCode(0));
b.find(".mejs-currenttime").html(mejs.Utility.secondsToTimeCode(0));c.find(".mejs-poster").show()}})}})})(mejs.$);
(function(f){f.extend(MediaElementPlayer.prototype,{buildprogress:function(a,b,c,e){f('<div class="mejs-time-rail"><span class="mejs-time-total"><span class="mejs-time-buffering"></span><span class="mejs-time-loaded"></span><span class="mejs-time-current"></span><span class="mejs-time-handle"></span><span class="mejs-time-float"><span class="mejs-time-float-current">00:00</span><span class="mejs-time-float-corner"></span></span></span></div>').appendTo(b);b.find(".mejs-time-buffering").hide();var d=
b.find(".mejs-time-total");c=b.find(".mejs-time-loaded");var g=b.find(".mejs-time-current"),k=b.find(".mejs-time-handle"),h=b.find(".mejs-time-float"),o=b.find(".mejs-time-float-current"),n=function(l){l=l.pageX;var q=d.offset(),i=d.outerWidth(),j=0;j=0;var m=l-q.left;if(l>q.left&&l<=i+q.left&&e.duration){j=(l-q.left)/i;j=j<=0.02?0:j*e.duration;p&&e.setCurrentTime(j);if(!mejs.MediaFeatures.hasTouch){h.css("left",m);o.html(mejs.Utility.secondsToTimeCode(j));h.show()}}},p=false;d.bind("mousedown",function(l){if(l.which===
1){p=true;n(l);f(document).bind("mousemove.dur",function(q){n(q)}).bind("mouseup.dur",function(){p=false;h.hide();f(document).unbind(".dur")});return false}}).bind("mouseenter",function(){f(document).bind("mousemove.dur",function(l){n(l)});mejs.MediaFeatures.hasTouch||h.show()}).bind("mouseleave",function(){if(!p){f(document).unbind(".dur");h.hide()}});e.addEventListener("progress",function(l){a.setProgressRail(l);a.setCurrentRail(l)},false);e.addEventListener("timeupdate",function(l){a.setProgressRail(l);
a.setCurrentRail(l)},false);this.loaded=c;this.total=d;this.current=g;this.handle=k},setProgressRail:function(a){var b=a!=undefined?a.target:this.media,c=null;if(b&&b.buffered&&b.buffered.length>0&&b.buffered.end&&b.duration)c=b.buffered.end(0)/b.duration;else if(b&&b.bytesTotal!=undefined&&b.bytesTotal>0&&b.bufferedBytes!=undefined)c=b.bufferedBytes/b.bytesTotal;else if(a&&a.lengthComputable&&a.total!=0)c=a.loaded/a.total;if(c!==null){c=Math.min(1,Math.max(0,c));this.loaded&&this.total&&this.loaded.width(this.total.width()*
c)}},setCurrentRail:function(){if(this.media.currentTime!=undefined&&this.media.duration)if(this.total&&this.handle){var a=this.total.width()*this.media.currentTime/this.media.duration,b=a-this.handle.outerWidth(true)/2;this.current.width(a);this.handle.css("left",b)}}})})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{duration:-1,timeAndDurationSeparator:" <span> | </span> "});f.extend(MediaElementPlayer.prototype,{buildcurrent:function(a,b,c,e){f('<div class="mejs-time"><span class="mejs-currenttime">'+(a.options.alwaysShowHours?"00:":"")+(a.options.showTimecodeFrameCount?"00:00:00":"00:00")+"</span></div>").appendTo(b);this.currenttime=this.controls.find(".mejs-currenttime");e.addEventListener("timeupdate",function(){a.updateCurrent()},false)},buildduration:function(a,
b,c,e){if(b.children().last().find(".mejs-currenttime").length>0)f(this.options.timeAndDurationSeparator+'<span class="mejs-duration">'+(this.options.duration>0?mejs.Utility.secondsToTimeCode(this.options.duration,this.options.alwaysShowHours||this.media.duration>3600,this.options.showTimecodeFrameCount,this.options.framesPerSecond||25):(a.options.alwaysShowHours?"00:":"")+(a.options.showTimecodeFrameCount?"00:00:00":"00:00"))+"</span>").appendTo(b.find(".mejs-time"));else{b.find(".mejs-currenttime").parent().addClass("mejs-currenttime-container");
f('<div class="mejs-time mejs-duration-container"><span class="mejs-duration">'+(this.options.duration>0?mejs.Utility.secondsToTimeCode(this.options.duration,this.options.alwaysShowHours||this.media.duration>3600,this.options.showTimecodeFrameCount,this.options.framesPerSecond||25):(a.options.alwaysShowHours?"00:":"")+(a.options.showTimecodeFrameCount?"00:00:00":"00:00"))+"</span></div>").appendTo(b)}this.durationD=this.controls.find(".mejs-duration");e.addEventListener("timeupdate",function(){a.updateDuration()},
false)},updateCurrent:function(){if(this.currenttime)this.currenttime.html(mejs.Utility.secondsToTimeCode(this.media.currentTime,this.options.alwaysShowHours||this.media.duration>3600,this.options.showTimecodeFrameCount,this.options.framesPerSecond||25))},updateDuration:function(){if(this.media.duration&&this.durationD)this.durationD.html(mejs.Utility.secondsToTimeCode(this.media.duration,this.options.alwaysShowHours,this.options.showTimecodeFrameCount,this.options.framesPerSecond||25))}})})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{muteText:"Mute Toggle",hideVolumeOnTouchDevices:true,audioVolume:"horizontal",videoVolume:"vertical"});f.extend(MediaElementPlayer.prototype,{buildvolume:function(a,b,c,e){if(!(mejs.MediaFeatures.hasTouch&&this.options.hideVolumeOnTouchDevices)){var d=this.isVideo?this.options.videoVolume:this.options.audioVolume,g=d=="horizontal"?f('<div class="mejs-button mejs-volume-button mejs-mute"><button type="button" aria-controls="'+this.id+'" title="'+this.options.muteText+
'"></button></div><div class="mejs-horizontal-volume-slider"><div class="mejs-horizontal-volume-total"></div><div class="mejs-horizontal-volume-current"></div><div class="mejs-horizontal-volume-handle"></div></div>').appendTo(b):f('<div class="mejs-button mejs-volume-button mejs-mute"><button type="button" aria-controls="'+this.id+'" title="'+this.options.muteText+'"></button><div class="mejs-volume-slider"><div class="mejs-volume-total"></div><div class="mejs-volume-current"></div><div class="mejs-volume-handle"></div></div></div>').appendTo(b),
k=this.container.find(".mejs-volume-slider, .mejs-horizontal-volume-slider"),h=this.container.find(".mejs-volume-total, .mejs-horizontal-volume-total"),o=this.container.find(".mejs-volume-current, .mejs-horizontal-volume-current"),n=this.container.find(".mejs-volume-handle, .mejs-horizontal-volume-handle"),p=function(j,m){if(!k.is(":visible")&&typeof m!="undefined"){k.show();p(j,true);k.hide()}else{j=Math.max(0,j);j=Math.min(j,1);j==0?g.removeClass("mejs-mute").addClass("mejs-unmute"):g.removeClass("mejs-unmute").addClass("mejs-mute");
if(d=="vertical"){var r=h.height(),s=h.position(),t=r-r*j;n.css("top",s.top+t-n.height()/2);o.height(r-t);o.css("top",s.top+t)}else{r=h.width();s=h.position();r=r*j;n.css("left",s.left+r-n.width()/2);o.width(r)}}},l=function(j){var m=null,r=h.offset();if(d=="vertical"){m=h.height();parseInt(h.css("top").replace(/px/,""),10);m=(m-(j.pageY-r.top))/m;if(r.top==0||r.left==0)return}else{m=h.width();m=(j.pageX-r.left)/m}m=Math.max(0,m);m=Math.min(m,1);p(m);m==0?e.setMuted(true):e.setMuted(false);e.setVolume(m)},
q=false,i=false;g.hover(function(){k.show();i=true},function(){i=false;!q&&d=="vertical"&&k.hide()});k.bind("mouseover",function(){i=true}).bind("mousedown",function(j){l(j);f(document).bind("mousemove.vol",function(m){l(m)}).bind("mouseup.vol",function(){q=false;f(document).unbind(".vol");!i&&d=="vertical"&&k.hide()});q=true;return false});g.find("button").click(function(){e.setMuted(!e.muted)});e.addEventListener("volumechange",function(){if(!q)if(e.muted){p(0);g.removeClass("mejs-mute").addClass("mejs-unmute")}else{p(e.volume);
g.removeClass("mejs-unmute").addClass("mejs-mute")}},false);if(this.container.is(":visible")){p(a.options.startVolume);e.pluginType==="native"&&e.setVolume(a.options.startVolume)}}}})})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{usePluginFullScreen:true,newWindowCallback:function(){return""},fullscreenText:"Fullscreen"});f.extend(MediaElementPlayer.prototype,{isFullScreen:false,isNativeFullScreen:false,docStyleOverflow:null,isInIframe:false,buildfullscreen:function(a,b,c,e){if(a.isVideo){a.isInIframe=window.location!=window.parent.location;if(mejs.MediaFeatures.hasTrueNativeFullScreen){c=null;c=mejs.MediaFeatures.hasMozNativeFullScreen?f(document):a.container;c.bind(mejs.MediaFeatures.fullScreenEventName,
function(){if(mejs.MediaFeatures.isFullScreen()){a.isNativeFullScreen=true;a.setControlsSize()}else{a.isNativeFullScreen=false;a.exitFullScreen()}})}var d=this,g=f('<div class="mejs-button mejs-fullscreen-button"><button type="button" aria-controls="'+d.id+'" title="'+d.options.fullscreenText+'"></button></div>').appendTo(b);if(d.media.pluginType==="native"||!d.options.usePluginFullScreen&&!mejs.MediaFeatures.isFirefox)g.click(function(){mejs.MediaFeatures.hasTrueNativeFullScreen&&mejs.MediaFeatures.isFullScreen()||
a.isFullScreen?a.exitFullScreen():a.enterFullScreen()});else{var k=null;if(function(){var i=document.createElement("x"),j=document.documentElement,m=window.getComputedStyle;if(!("pointerEvents"in i.style))return false;i.style.pointerEvents="auto";i.style.pointerEvents="x";j.appendChild(i);m=m&&m(i,"").pointerEvents==="auto";j.removeChild(i);return!!m}()&&!mejs.MediaFeatures.isOpera){var h=false,o=function(){if(h){n.hide();p.hide();l.hide();g.css("pointer-events","");d.controls.css("pointer-events",
"");h=false}},n=f('<div class="mejs-fullscreen-hover" />').appendTo(d.container).mouseover(o),p=f('<div class="mejs-fullscreen-hover"  />').appendTo(d.container).mouseover(o),l=f('<div class="mejs-fullscreen-hover"  />').appendTo(d.container).mouseover(o),q=function(){var i={position:"absolute",top:0,left:0};n.css(i);p.css(i);l.css(i);n.width(d.container.width()).height(d.container.height()-d.controls.height());i=g.offset().left-d.container.offset().left;fullScreenBtnWidth=g.outerWidth(true);p.width(i).height(d.controls.height()).css({top:d.container.height()-
d.controls.height()});l.width(d.container.width()-i-fullScreenBtnWidth).height(d.controls.height()).css({top:d.container.height()-d.controls.height(),left:i+fullScreenBtnWidth})};f(document).resize(function(){q()});g.mouseover(function(){if(!d.isFullScreen){var i=g.offset(),j=a.container.offset();e.positionFullscreenButton(i.left-j.left,i.top-j.top,false);g.css("pointer-events","none");d.controls.css("pointer-events","none");n.show();l.show();p.show();q();h=true}});e.addEventListener("fullscreenchange",
function(){o()})}else g.mouseover(function(){if(k!==null){clearTimeout(k);delete k}var i=g.offset(),j=a.container.offset();e.positionFullscreenButton(i.left-j.left,i.top-j.top,true)}).mouseout(function(){if(k!==null){clearTimeout(k);delete k}k=setTimeout(function(){e.hideFullscreenButton()},1500)})}a.fullscreenBtn=g;f(document).bind("keydown",function(i){if((mejs.MediaFeatures.hasTrueNativeFullScreen&&mejs.MediaFeatures.isFullScreen()||d.isFullScreen)&&i.keyCode==27)a.exitFullScreen()})}},enterFullScreen:function(){var a=
this;if(!(a.media.pluginType!=="native"&&(mejs.MediaFeatures.isFirefox||a.options.usePluginFullScreen))){docStyleOverflow=document.documentElement.style.overflow;document.documentElement.style.overflow="hidden";normalHeight=a.container.height();normalWidth=a.container.width();if(a.media.pluginType==="native")if(mejs.MediaFeatures.hasTrueNativeFullScreen){mejs.MediaFeatures.requestFullScreen(a.container[0]);a.isInIframe&&setTimeout(function c(){if(a.isNativeFullScreen)f(window).width()!==screen.width?
a.exitFullScreen():setTimeout(c,500)},500)}else if(mejs.MediaFeatures.hasSemiNativeFullScreen){a.media.webkitEnterFullscreen();return}if(a.isInIframe){var b=a.options.newWindowCallback(this);if(b!=="")if(mejs.MediaFeatures.hasTrueNativeFullScreen)setTimeout(function(){if(!a.isNativeFullScreen){a.pause();window.open(b,a.id,"top=0,left=0,width="+screen.availWidth+",height="+screen.availHeight+",resizable=yes,scrollbars=no,status=no,toolbar=no")}},250);else{a.pause();window.open(b,a.id,"top=0,left=0,width="+
screen.availWidth+",height="+screen.availHeight+",resizable=yes,scrollbars=no,status=no,toolbar=no");return}}a.container.addClass("mejs-container-fullscreen").width("100%").height("100%");setTimeout(function(){a.container.css({width:"100%",height:"100%"});a.setControlsSize()},500);if(a.pluginType==="native")a.$media.width("100%").height("100%");else{a.container.find("object, embed, iframe").width("100%").height("100%");a.media.setVideoSize(f(window).width(),f(window).height())}a.layers.children("div").width("100%").height("100%");
a.fullscreenBtn&&a.fullscreenBtn.removeClass("mejs-fullscreen").addClass("mejs-unfullscreen");a.setControlsSize();a.isFullScreen=true}},exitFullScreen:function(){if(this.media.pluginType!=="native"&&mejs.MediaFeatures.isFirefox)this.media.setFullscreen(false);else{if(mejs.MediaFeatures.hasTrueNativeFullScreen&&(mejs.MediaFeatures.isFullScreen()||this.isFullScreen))mejs.MediaFeatures.cancelFullScreen();document.documentElement.style.overflow=docStyleOverflow;this.container.removeClass("mejs-container-fullscreen").width(normalWidth).height(normalHeight);
if(this.pluginType==="native")this.$media.width(normalWidth).height(normalHeight);else{this.container.find("object embed").width(normalWidth).height(normalHeight);this.media.setVideoSize(normalWidth,normalHeight)}this.layers.children("div").width(normalWidth).height(normalHeight);this.fullscreenBtn.removeClass("mejs-unfullscreen").addClass("mejs-fullscreen");this.setControlsSize();this.isFullScreen=false}}})})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{startLanguage:"",tracksText:"Captions/Subtitles"});f.extend(MediaElementPlayer.prototype,{hasChapters:false,buildtracks:function(a,b,c,e){if(a.isVideo)if(a.tracks.length!=0){var d;a.chapters=f('<div class="mejs-chapters mejs-layer"></div>').prependTo(c).hide();a.captions=f('<div class="mejs-captions-layer mejs-layer"><div class="mejs-captions-position"><span class="mejs-captions-text"></span></div></div>').prependTo(c).hide();a.captionsText=a.captions.find(".mejs-captions-text");
a.captionsButton=f('<div class="mejs-button mejs-captions-button"><button type="button" aria-controls="'+this.id+'" title="'+this.options.tracksText+'"></button><div class="mejs-captions-selector"><ul><li><input type="radio" name="'+a.id+'_captions" id="'+a.id+'_captions_none" value="none" checked="checked" /><label for="'+a.id+'_captions_none">None</label></li></ul></div></div>').appendTo(b).hover(function(){f(this).find(".mejs-captions-selector").css("visibility","visible")},function(){f(this).find(".mejs-captions-selector").css("visibility",
"hidden")}).delegate("input[type=radio]","click",function(){lang=this.value;if(lang=="none")a.selectedTrack=null;else for(d=0;d<a.tracks.length;d++)if(a.tracks[d].srclang==lang){a.selectedTrack=a.tracks[d];a.captions.attr("lang",a.selectedTrack.srclang);a.displayCaptions();break}});a.options.alwaysShowControls?a.container.find(".mejs-captions-position").addClass("mejs-captions-position-hover"):a.container.bind("mouseenter",function(){a.container.find(".mejs-captions-position").addClass("mejs-captions-position-hover")}).bind("mouseleave",
function(){e.paused||a.container.find(".mejs-captions-position").removeClass("mejs-captions-position-hover")});a.trackToLoad=-1;a.selectedTrack=null;a.isLoadingTrack=false;for(d=0;d<a.tracks.length;d++)a.tracks[d].kind=="subtitles"&&a.addTrackButton(a.tracks[d].srclang,a.tracks[d].label);a.loadNextTrack();e.addEventListener("timeupdate",function(){a.displayCaptions()},false);e.addEventListener("loadedmetadata",function(){a.displayChapters()},false);a.container.hover(function(){if(a.hasChapters){a.chapters.css("visibility",
"visible");a.chapters.fadeIn(200).height(a.chapters.find(".mejs-chapter").outerHeight())}},function(){a.hasChapters&&!e.paused&&a.chapters.fadeOut(200,function(){f(this).css("visibility","hidden");f(this).css("display","block")})});a.node.getAttribute("autoplay")!==null&&a.chapters.css("visibility","hidden")}},loadNextTrack:function(){this.trackToLoad++;if(this.trackToLoad<this.tracks.length){this.isLoadingTrack=true;this.loadTrack(this.trackToLoad)}else this.isLoadingTrack=false},loadTrack:function(a){var b=
this,c=b.tracks[a];f.ajax({url:c.src,dataType:"text",success:function(e){c.entries=typeof e=="string"&&/<tt\s+xml/ig.exec(e)?mejs.TrackFormatParser.dfxp.parse(e):mejs.TrackFormatParser.webvvt.parse(e);c.isLoaded=true;b.enableTrackButton(c.srclang,c.label);b.loadNextTrack();c.kind=="chapters"&&b.media.duration>0&&b.drawChapters(c)},error:function(){b.loadNextTrack()}})},enableTrackButton:function(a,b){if(b==="")b=mejs.language.codes[a]||a;this.captionsButton.find("input[value="+a+"]").prop("disabled",
false).siblings("label").html(b);this.options.startLanguage==a&&f("#"+this.id+"_captions_"+a).click();this.adjustLanguageBox()},addTrackButton:function(a,b){if(b==="")b=mejs.language.codes[a]||a;this.captionsButton.find("ul").append(f('<li><input type="radio" name="'+this.id+'_captions" id="'+this.id+"_captions_"+a+'" value="'+a+'" disabled="disabled" /><label for="'+this.id+"_captions_"+a+'">'+b+" (loading)</label></li>"));this.adjustLanguageBox();this.container.find(".mejs-captions-translations option[value="+
a+"]").remove()},adjustLanguageBox:function(){this.captionsButton.find(".mejs-captions-selector").height(this.captionsButton.find(".mejs-captions-selector ul").outerHeight(true)+this.captionsButton.find(".mejs-captions-translations").outerHeight(true))},displayCaptions:function(){if(typeof this.tracks!="undefined"){var a,b=this.selectedTrack;if(b!=null&&b.isLoaded)for(a=0;a<b.entries.times.length;a++)if(this.media.currentTime>=b.entries.times[a].start&&this.media.currentTime<=b.entries.times[a].stop){this.captionsText.html(b.entries.text[a]);
this.captions.show().height(0);return}this.captions.hide()}},displayChapters:function(){var a;for(a=0;a<this.tracks.length;a++)if(this.tracks[a].kind=="chapters"&&this.tracks[a].isLoaded){this.drawChapters(this.tracks[a]);this.hasChapters=true;break}},drawChapters:function(a){var b=this,c,e,d=e=0;b.chapters.empty();for(c=0;c<a.entries.times.length;c++){e=a.entries.times[c].stop-a.entries.times[c].start;e=Math.floor(e/b.media.duration*100);if(e+d>100||c==a.entries.times.length-1&&e+d<100)e=100-d;b.chapters.append(f('<div class="mejs-chapter" rel="'+
a.entries.times[c].start+'" style="left: '+d.toString()+"%;width: "+e.toString()+'%;"><div class="mejs-chapter-block'+(c==a.entries.times.length-1?" mejs-chapter-block-last":"")+'"><span class="ch-title">'+a.entries.text[c]+'</span><span class="ch-time">'+mejs.Utility.secondsToTimeCode(a.entries.times[c].start)+"&ndash;"+mejs.Utility.secondsToTimeCode(a.entries.times[c].stop)+"</span></div></div>"));d+=e}b.chapters.find("div.mejs-chapter").click(function(){b.media.setCurrentTime(parseFloat(f(this).attr("rel")));
b.media.paused&&b.media.play()});b.chapters.show()}});mejs.language={codes:{af:"Afrikaans",sq:"Albanian",ar:"Arabic",be:"Belarusian",bg:"Bulgarian",ca:"Catalan",zh:"Chinese","zh-cn":"Chinese Simplified","zh-tw":"Chinese Traditional",hr:"Croatian",cs:"Czech",da:"Danish",nl:"Dutch",en:"English",et:"Estonian",tl:"Filipino",fi:"Finnish",fr:"French",gl:"Galician",de:"German",el:"Greek",ht:"Haitian Creole",iw:"Hebrew",hi:"Hindi",hu:"Hungarian",is:"Icelandic",id:"Indonesian",ga:"Irish",it:"Italian",ja:"Japanese",
ko:"Korean",lv:"Latvian",lt:"Lithuanian",mk:"Macedonian",ms:"Malay",mt:"Maltese",no:"Norwegian",fa:"Persian",pl:"Polish",pt:"Portuguese",ro:"Romanian",ru:"Russian",sr:"Serbian",sk:"Slovak",sl:"Slovenian",es:"Spanish",sw:"Swahili",sv:"Swedish",tl:"Tagalog",th:"Thai",tr:"Turkish",uk:"Ukrainian",vi:"Vietnamese",cy:"Welsh",yi:"Yiddish"}};mejs.TrackFormatParser={webvvt:{pattern_identifier:/^([a-zA-z]+-)?[0-9]+$/,pattern_timecode:/^([0-9]{2}:[0-9]{2}:[0-9]{2}([,.][0-9]{1,3})?) --\> ([0-9]{2}:[0-9]{2}:[0-9]{2}([,.][0-9]{3})?)(.*)$/,
parse:function(a){var b=0;a=mejs.TrackFormatParser.split2(a,/\r?\n/);for(var c={text:[],times:[]},e,d;b<a.length;b++)if(this.pattern_identifier.exec(a[b])){b++;if((e=this.pattern_timecode.exec(a[b]))&&b<a.length){b++;d=a[b];for(b++;a[b]!==""&&b<a.length;){d=d+"\n"+a[b];b++}d=f.trim(d).replace(/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig,"<a href='$1' target='_blank'>$1</a>");c.text.push(d);c.times.push({start:mejs.Utility.convertSMPTEtoSeconds(e[1])==0?0.2:mejs.Utility.convertSMPTEtoSeconds(e[1]),
stop:mejs.Utility.convertSMPTEtoSeconds(e[3]),settings:e[5]})}}return c}},dfxp:{parse:function(a){a=f(a).filter("tt");var b=0;b=a.children("div").eq(0);var c=b.find("p");b=a.find("#"+b.attr("style"));var e,d;a={text:[],times:[]};if(b.length){d=b.removeAttr("id").get(0).attributes;if(d.length){e={};for(b=0;b<d.length;b++)e[d[b].name.split(":")[1]]=d[b].value}}for(b=0;b<c.length;b++){var g;d={start:null,stop:null,style:null};if(c.eq(b).attr("begin"))d.start=mejs.Utility.convertSMPTEtoSeconds(c.eq(b).attr("begin"));
if(!d.start&&c.eq(b-1).attr("end"))d.start=mejs.Utility.convertSMPTEtoSeconds(c.eq(b-1).attr("end"));if(c.eq(b).attr("end"))d.stop=mejs.Utility.convertSMPTEtoSeconds(c.eq(b).attr("end"));if(!d.stop&&c.eq(b+1).attr("begin"))d.stop=mejs.Utility.convertSMPTEtoSeconds(c.eq(b+1).attr("begin"));if(e){g="";for(var k in e)g+=k+":"+e[k]+";"}if(g)d.style=g;if(d.start==0)d.start=0.2;a.times.push(d);d=f.trim(c.eq(b).html()).replace(/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig,
"<a href='$1' target='_blank'>$1</a>");a.text.push(d);if(a.times.start==0)a.times.start=2}return a}},split2:function(a,b){return a.split(b)}};if("x\n\ny".split(/\n/gi).length!=3)mejs.TrackFormatParser.split2=function(a,b){var c=[],e="",d;for(d=0;d<a.length;d++){e+=a.substring(d,d+1);if(b.test(e)){c.push(e.replace(b,""));e=""}}c.push(e);return c}})(mejs.$);
(function(f){f.extend(mejs.MepDefaults,{contextMenuItems:[{render:function(a){if(typeof a.enterFullScreen=="undefined")return null;return a.isFullScreen?"Turn off Fullscreen":"Go Fullscreen"},click:function(a){a.isFullScreen?a.exitFullScreen():a.enterFullScreen()}},{render:function(a){return a.media.muted?"Unmute":"Mute"},click:function(a){a.media.muted?a.setMuted(false):a.setMuted(true)}},{isSeparator:true},{render:function(){return"Download Video"},click:function(a){window.location.href=a.media.currentSrc}}]});
f.extend(MediaElementPlayer.prototype,{buildcontextmenu:function(a){a.contextMenu=f('<div class="mejs-contextmenu"></div>').appendTo(f("body")).hide();a.container.bind("contextmenu",function(b){if(a.isContextMenuEnabled){b.preventDefault();a.renderContextMenu(b.clientX-1,b.clientY-1);return false}});a.container.bind("click",function(){a.contextMenu.hide()});a.contextMenu.bind("mouseleave",function(){a.startContextMenuTimer()})},isContextMenuEnabled:true,enableContextMenu:function(){this.isContextMenuEnabled=
true},disableContextMenu:function(){this.isContextMenuEnabled=false},contextMenuTimeout:null,startContextMenuTimer:function(){var a=this;a.killContextMenuTimer();a.contextMenuTimer=setTimeout(function(){a.hideContextMenu();a.killContextMenuTimer()},750)},killContextMenuTimer:function(){var a=this.contextMenuTimer;if(a!=null){clearTimeout(a);delete a}},hideContextMenu:function(){this.contextMenu.hide()},renderContextMenu:function(a,b){for(var c=this,e="",d=c.options.contextMenuItems,g=0,k=d.length;g<
k;g++)if(d[g].isSeparator)e+='<div class="mejs-contextmenu-separator"></div>';else{var h=d[g].render(c);if(h!=null)e+='<div class="mejs-contextmenu-item" data-itemindex="'+g+'" id="element-'+Math.random()*1E6+'">'+h+"</div>"}c.contextMenu.empty().append(f(e)).css({top:b,left:a}).show();c.contextMenu.find(".mejs-contextmenu-item").each(function(){var o=f(this),n=parseInt(o.data("itemindex"),10),p=c.options.contextMenuItems[n];typeof p.show!="undefined"&&p.show(o,c);o.click(function(){typeof p.click!=
"undefined"&&p.click(c);c.contextMenu.hide()})});setTimeout(function(){c.killControlsTimer("rev3")},100)}})})(mejs.$);

;
/**
 * @file
 */

(function ($) {
  $(function () {
    $('audio.mediaelement').mediaelementplayer({audioWidth: $('.mediaelement').closest('.field').width()});
  });
})(jQuery);
;
/**
 * @file
 * Adds JavaScript for "friendlier" behaviours when JS is available.
 */

(function ($) {
  "use strict";
  Drupal.behaviors.responsiveMenuCombined = {
    attach: function (context, settings) {
      var rmc = $('.rmc-nav');

      // Return early if there is no responsive menu combined on the page.
      if (!rmc.length) {
        return;
      }

      var responsive_nav_check = rmc.find('#rmc-nav__checkbox');
      var responsive_nav_check_label = responsive_nav_check.siblings('label');
      responsive_nav_check_label.unwrap();
      responsive_nav_check.remove();

      // Convert 'label' to 'button'.
      responsive_nav_check = responsive_nav_check_label.wrapInner('<button class="rmc-nav__navigation-button navigation-button"/>').children(0).unwrap();
      responsive_nav_check.attr('aria-expanded', 'false');

      responsive_nav_check.click(function () {
        var shown = $(this).attr('aria-expanded') === 'true';

        // Set the ul class
        // $(this).parent().find('ul.menu').toggleClass('menu-open-view');

        // Set aria-expanded attribute to match state of checkbox.
        $(this).attr('aria-expanded', shown ? 'false' : 'true');

        // Set min-height attribute on menus.
        var min_height;
        if (!shown) {
          min_height = $('.uw-site--inner').innerHeight();
        }
        else {
          min_height = 'unset';
        }
        $(this).siblings('[role=tablist]').css('min-height', min_height);
      });

      // Remove attribute only valid for no-JS version.
      responsive_nav_check.siblings('[role=tablist]').removeAttr('aria-owns');

      // On focus, set @aria-selected FALSE for all, then TRUE for this one.
      var switch_tabs = function () {
        tabs.each(function () {
          $(this).attr('aria-selected', 'false');
          $(this).attr('tabindex', -1);
        });
        $(this).attr('aria-selected', 'true');
        $(this).attr('tabindex', 0);
      };
      // For tabs, remove 'input' elements, make focussable. Set @aria-selected.
      var tabs = rmc.find('.responsive-nav-menu > [role=tab]');
      tabs.each(function (index) {
        $(this).find('input').remove();

        // Convert 'label' to 'div'.
        var label = $(this).find('label');
        label.wrapInner('<div id="' + label.attr('id') + '" class="tab-label"/>').children(0).unwrap();

        $(this).focus(switch_tabs);
        $(this).data('index', index);
        $(this).keydown(function (event) {
          switch (event.keyCode) {
            // Left.
            case 37:
            // Right.
            case 39:
              var index = $(this).data('index');
              // Distinguish left and right arrow.
              if (event.keyCode === 37) {
                index--;
              }
              else {
                index++;
              }
              // Loop around from the ends.
              if (index >= tabs.length) {
                index = 0;
              }
              if (index < 0) {
                index = tabs.length - 1;
              }
              // Focus the next tab.
              tabs.eq(index).focus();
              break;
          }
        });
      });
      tabs.first().each(switch_tabs);

      // Keep tabbing inside the menu when it is open. When the user tabs off
      // the end of the menu, put focus back around to the start of the menu.
      // When menu is closed #tabloop does not appear so it never gets focus.
      var tabloop = $('<div id="tabloop"/>');
      rmc.find('.responsive-nav-menu').append(tabloop);
      // Make it focussable.
      tabloop.attr('tabindex', 0);
      // When it gets focus, put focus on responsive_nav_check.
      tabloop.focus(function () {
        responsive_nav_check.focus();
      });

      // Add toggle buttons for each sub-menu.
      var subnav = rmc.find('.responsive-nav-menu ul.sub-nav');
      if (subnav) {
        var toggles = $('<button aria-expanded="false" aria-label="Sub-menu" class="toggle-sub nested-arrow"></button>').insertBefore(subnav);
        toggles
          .attr('aria-controls', subnav.attr('id'));

        // Make toggle buttons show and hide the sub-menus.
        toggles.click(function () {
          // Store current state of this button.
          var expanded = $(this).attr('aria-expanded') == 'true';

          // Hide all menus that are not ancestors of this one.
          // toggles.not($(this).parents().siblings('button')).attr('aria-expanded', false);

          // Toggle this button's property.
          $(this).attr('aria-expanded', !expanded);

          // Set the tree structure of classes.

          // Swap menu class if at top level.
          var $twoParents = $(this).parents().eq(1);
          if ($twoParents.hasClass("menu")) {
            $twoParents.toggleClass("top-level-expanded");
          }
          if ($twoParents.hasClass("sub-nav-view") || $twoParents.hasClass("sub-nav-view-open")) {
            $twoParents.toggleClass("sub-nav-view-open sub-nav-view");
          }

          var $threeParents = $(this).parents().eq(2);
          if ($threeParents.hasClass("sub-nav-parent-view") || $threeParents.hasClass("sub-nav-parent")) {
            $threeParents.toggleClass("sub-nav-parent-view sub-nav-parent");
          }

          $(this).parent().toggleClass("sub-nav-parent-view");
          $(this).next().toggleClass("sub-nav-view-open");

          // Look for button parent tab.
          var activeTab = $(this).parents('.tab');
          // Check if tab is selected.
          if (activeTab.attr('aria-selected')) {
            // Get all menus inside the active tab.
            var childMenu = activeTab.children().children($('ul.menu'));
            // Set selfMenu, button is in this menu.
            var selfMenu = $(this).parents('ul');
            // Get button top position.
            var _top = $(this).offset().top;
            // Get scroll container.
            var scrollContainer = $('.rmc-nav__content-wrapper');
            // Get scroll container top position.
            var scrollContainerOffset = scrollContainer.offset().top;
            // Get window height without scroll bar.
            var $w = $(window).innerHeight();
            // When button opens sub menu hide all other menus in active tab
            // and make self display block.
            if (childMenu.hasClass('top-level-expanded')) {
              childMenu.css('display', 'none');
              selfMenu.css('display', 'block');
            } else {
              childMenu.css('display', 'block');
            }
            // When button toggles sub menu to closed state
            // scroll to button top position  - offset top of scroll container.
            if (expanded) {
              // set _top
              _top = $(this).offset().top;
              // Button top position- offset top of scroll container
              var _scrollToMe = _top - scrollContainerOffset;
              scrollContainer.animate({
                scrollTop: _scrollToMe
              }, 300);
            }
          }

          return false;

        });
      }
    }
  };
}(jQuery));
;
/**
 * @file
 */

(function ($) {

  Drupal.behaviors.uw_ct_embedded_facts_and_figures = {

    attach: function (context, settings) {

      $(window).ready(function () {

        // Check if we have FF in a promo item, if so process them.
        $('.node-uw-promotional-item div[class*="highlighted-fact-wrapper"]').each(function (index, value) {

          // If we have a carousel in the FF, add the Owl Carousel.
          if ($(this).attr("data-use-carousel") == "Yes") {

            // Add the Owl Carousel on the FF in the promo item.
            ($(this)).owlCarousel({
              items: 1,
              singleItem: true,
              navigation: true,
              navigationText: ["&lsaquo;&nbsp;prev", "next&nbsp;&rsaquo;"]
            });
          }
        });

        // Check if we have FF in a promo item, if so process them.
        $('.uw-site-sidebar--wrapper div[class*="highlighted-fact-wrapper"]').each(function (index, value) {

          // If we have a carousel in the FF, add the Owl Carousel.
          if ($(this).attr("data-use-carousel") == "Yes") {

            // Add the Owl Carousel on the FF in the sidebar.
            ($(this)).owlCarousel({
              items: 1,
              singleItem: true,
              navigation: true,
              navigationText: ["&lsaquo;&nbsp;prev", "next&nbsp;&rsaquo;"]
            });
          }
        });


        // Check if we have any other FF, if so process them.
        // Owl 1.x documentation: http://web.archive.org/web/20160306020452/http://www.owlgraphic.com/owlcarousel/
        $('div[class*="highlighted-fact-wrapper"]').each(function (index, value) {
          ($(this)).owlCarousel({
            items: $(this).attr("data-num-per"),
            itemsDesktop: [1024, $(this).attr("data-num-per")],
            itemsTablet: [768, 2],
            itemsMobile: [480, 1],
            navigation: true,
            addClassActive: true,
            navigationText: ["&lsaquo;&nbsp;prev", "next&nbsp;&rsaquo;"]
            // afterAction: runAnimation($(this).find('.active'))
          });
        });

        // For circle infographics, first check to make sure library is loaded
        if($.fn.circliful) {
          // Set default options for circle infographics
          $circliful_options = {
            animation: 1,
            animationStep: 3,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            backgroundColor: '#a2a2a2',
            animateInView: 'true',
            fontColor: '#4e4e4e',
            percentageTextSize: '35',
          };

          // Create circle infographic
          $('.infographic-circle').each(function() {
            $(this).circliful($circliful_options);
          });

          // Create half circle
          $('.infographic-half_circle').each(function() {
            $(this).circliful(
              $.extend($circliful_options, {halfCircle: 'true'})
            );
          });
        }

        $('.infographic-horizontal, .infographic-vertical', context).each(function() {
          $(this).append('<div class="graph-wrapper"><span class="graph"></span></div><span class="timer">' + $(this).data('percent') + '</span>');
        });

        // Check if the element is is in view
        function isElementInViewport(elem) {
          var $elem = $(elem);

          // Get the scroll position of the page.
          var viewportTop = $('html').scrollTop();
          var viewportBottom = viewportTop + $(window).height();

          // Get the position of the element on the page.
          // Adds a little padding so it triggers when the element is closer to the middle of the page
          var elemTop = Math.round( $elem.offset().top );
          var elemBottom = elemTop + $elem.height();
          return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
        }

        // Run the animation if the element is in view
        function checkAnimation() {
           $('.infographic-horizontal, .infographic-vertical, .infographic-number').each(function() {
            // Check to see if the animation has already been run
            if ($(this).hasClass('animated')) return;
            if (isElementInViewport($(this))) {
              runAnimation($(this));
            }
          });
        }

        // Check when the page loads
        checkAnimation();

        // Capture scroll events
        $(window).scroll(function(){
            checkAnimation();
        });

        // Isolating this to try to run it when the slider changes
        function runAnimation(el) {
            var type = el.data('infographic-type');
            var percent = el.data("percent");
            // Animate the graph
            if (type == 'horizontal') {
              el.find('.graph-wrapper .graph').animate({'width' : percent + '%'}, 2000);
            }
            else if (type == 'vertical') {
              el.find('.graph-wrapper .graph').animate({'height' : percent + '%'}, 2000);
            }
            animateNumber(el.find('.timer'), percent);
            el.addClass('animated');
        }

        // Animate the number.
        function animateNumber(el, percent) {
          // Find out if the number has a thousands marker (comma).
          if (percent.toString().indexOf(',') >= 0) {
            var has_comma = true;
            // If so, remove it for now so the animation will work.
            percent = percent.replace(/,/g, '');
          } else {
            has_comma = false;
          }

          $({counter: 0}).animate({counter: percent}, {
              duration: 2000,
              step: function() {
                var num = Math.ceil(this.counter).toString();
                if (has_comma) {
                  // Add back the comma.
                  while (/(\d+)(\d{3})/.test(num)) {
                    num = num.replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
                  }
                }
                $(el).text(num);
              },
              // Ensure the correct value is shown when animation is complete
              // fixes issue with incomplete counters for large numbers
              // see: https://stackoverflow.com/questions/50331552/jquery-counter-fails-to-show-the-correct-value-after-animation
              complete : function(){
                if (has_comma) {
                  // Add back the comma.
                  percent = num.replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
                }
                $(el).text(percent);
              }
          });

        }

     });
    }


  };
})(jQuery);
;
/**
 * @file
 */
(function ($) {
  Drupal.behaviors.uw_ct_embedded_timeline = {
    attach: function (context, settings) {

      $(window).load(function() {

        // Step through each next and move to the left
        // to account for the scroll bar.
        $('.vco-feature .nav-next').each(function (index, value) {
          if ($('body.wide').length == 0) {
            $(this).css('left', '374px');
          }
          else {
            $(this).css('left', '625px');
          }
        });

        // Step through each previous and move to the right
        // to match the move of the next.
        $('.vco-feature .nav-previous').each(function (index, value) {
          if ($('body.wide').length == 0) {
            $(this).css('left', '22px');
          }
          else {
            $(this).css('left', '45px');
          }
        });

      });
    }
  };
})(jQuery);;
/**
 * @file
 * Owl 1.x documentation: http://web.archive.org/web/20160306020452/http://www.owlgraphic.com/owlcarousel/
 */

(function ($) {

  Drupal.behaviors.uw_ct_image_gallery = {

    attach: function (context, settings) {

      if ($('[id*="image-gallery-carousel"]').length) {

        $('[id*="image-gallery-carousel"]').each(function (index) {

          $('.content').addClass('uw-image-gallery');

          // Set variable current_ig to the id of the current image gallery that is in the loop.
          var current_ig = '#' + $(this).attr('id');
          var nid = current_ig.replace('#image-gallery-carousel', '');

          // Select all of the images in the gallery.
          $(current_ig).find('img').each(function (index2) {
            $(this).parent().parent().attr('data-ig-index', index2);
            $(this).parent().parent().attr('data-ig-type', 'carousel');
            $(this).parent().parent().attr('data-nid', nid);
          });

          $(current_ig).find('.image-caption-wrapper').each(function (index3) {
            $(this).attr('data-ig-index', index3);
          });

          $carousel_items = parseInt($(this).attr('data-carousel-items'));

          // get options and convert to a JS object
          $carousel_options = $(this).attr('data-carousel-options');
          $custom_options = $.parseJSON($carousel_options);
          // If there is more than 1 slide displayed, add responsive options
          if ($carousel_items > 1) {
            $carousel_items > 3 ? $desktop_items = $carousel_items -1 : $desktop_items = $carousel_items;
            $responsive_options = {
              itemsDesktop: [2000, $carousel_items],
              itemsDesktopSmall: [1200, $desktop_items],
              itemsTablet: [1000,2],
              itemsMobile: [600, 1]
            }
            $.extend($custom_options, $responsive_options);
            $(this).addClass('multiple-items');
          }

          // Set the default options
          $options = {
            slideSpeed: 300,
            items: $carousel_items,
            itemsScaleUp: true,
            lazyLoad: true,
            autoHeight: false,
            autoWidth: true,
            rewindSpeed: 10
          };

          // Merge the custom options into the default options
          $.extend($options, $custom_options);

          // Create the carousel
          $(this).owlCarousel($options);
        });
      }

      // Setup embedded image gallery when using thumbnails.
      if ($('[id*="image-gallery-thumbnail"]').length) {

        $('[id*="image-gallery-thumbnail"]').each(function (index) {

          // Add the class to distinguish between other embeds.
          $('.content_node').addClass('uw-image-gallery');

          // Set variable current_ig to the id of the current image gallery that is in the loop.
          var current_ig = '#' + $(this).attr('id');
          var nid = current_ig.replace('#image-gallery-thumbnail', '');

          // Select all of the images in the gallery.
          $(current_ig).find('img').each(function (index2) {
            $(this).parent().attr('data-ig-index', index2);
            $(this).parent().attr('data-ig-type', 'thumbnail');
            $(this).parent().attr('data-nid', nid);
          });

          // Add extra div for the image without caption.
          $(current_ig).find('.item').each(function () {
            if ($(this).find('.image-caption-wrapper.element-invisible').length == 0) {
              var image_caption = '<div class="image-caption-wrapper element-invisible"></div>';
                $(this).append(image_caption);
              }
          });

          $(current_ig).find('.image-caption-wrapper').each(function (index3) {
            $(this).attr('data-ig-index', index3);
          });

        });
      }

      // This is the onComplete function for colorbox.
      // Adding the caption to the colorbox.
      $(context).bind('cbox_complete', function () {
        // Get the current class of image gallery from the a tag data elements.
        var ig_index = $.colorbox.element().attr('data-ig-index');
        var ig_type = $.colorbox.element().attr('data-ig-type');
        var nid = $.colorbox.element().attr('data-nid');

        // Find the current index of the image by using the cboxCurrent of colorbox.
        // cboxCurrent will have 1 of 6, 2 of 6, etc ..
        current_index = $(this).find('#cboxCurrent').html();
        current_index = current_index.substr(0,current_index.indexOf(' ')) - 1;
        current_title = $(this).find('#cboxTitle');

        // Setup the image gallery id.
        if (ig_type == "carousel") {
          var ig_caption_id = '#image-gallery-carousel' + nid;
        }
        if (ig_type == "thumbnail") {
          var ig_caption_id = '#image-gallery-thumbnail' + nid;
        }

        // Get the current caption based on the nid.
        current_caption = $(ig_caption_id).find(".image-caption-wrapper[data-ig-index='" + current_index + "']").find('p');

        // Set the current caption to the title of the colourbox.
        $(current_title).html(current_caption.html());

        // Ensure that if there is a caption to show it.
        if ($(current_title).html() !== "") {
          $(current_title).show();
        }

      });

    }
  };
})(jQuery);
;
/**
 * @file
 * JavaScript file for the MathJax module.
 */

/**
 * Typeset MathJax if ajax executes.
 */
Drupal.behaviors.mathjaxBehavior = {
  attach: function (context, settings) {
    jQuery(document).ajaxComplete(function() {
      MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
    });
  }
};
;
