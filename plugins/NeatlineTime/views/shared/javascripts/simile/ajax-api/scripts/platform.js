SimileAjax.version="pre 2.3.0";SimileAjax.jQuery=jQuery.noConflict(!0);if(typeof window.$=="undefined")window.$=SimileAjax.jQuery;SimileAjax.Platform.os={isMac:!1,isWin:!1,isWin32:!1,isUnix:!1};SimileAjax.Platform.browser={isIE:!1,isNetscape:!1,isMozilla:!1,isFirefox:!1,isOpera:!1,isSafari:!1,majorVersion:0,minorVersion:0};
(function(){var c=navigator.appName.toLowerCase(),a=navigator.userAgent.toLowerCase();SimileAjax.Platform.os.isMac=a.indexOf("mac")!=-1;SimileAjax.Platform.os.isWin=a.indexOf("win")!=-1;SimileAjax.Platform.os.isWin32=SimileAjax.Platform.isWin&&(a.indexOf("95")!=-1||a.indexOf("98")!=-1||a.indexOf("nt")!=-1||a.indexOf("win32")!=-1||a.indexOf("32bit")!=-1);SimileAjax.Platform.os.isUnix=a.indexOf("x11")!=-1;SimileAjax.Platform.browser.isIE=c.indexOf("microsoft")!=-1;SimileAjax.Platform.browser.isNetscape=
c.indexOf("netscape")!=-1;SimileAjax.Platform.browser.isMozilla=a.indexOf("mozilla")!=-1;SimileAjax.Platform.browser.isFirefox=a.indexOf("firefox")!=-1;SimileAjax.Platform.browser.isOpera=c.indexOf("opera")!=-1;SimileAjax.Platform.browser.isSafari=c.indexOf("safari")!=-1;var c=function(a){a=a.split(".");SimileAjax.Platform.browser.majorVersion=parseInt(a[0]);SimileAjax.Platform.browser.minorVersion=parseInt(a[1])},d=function(a,b,c){b=a.indexOf(b,c);return b>=0?b:a.length};if(SimileAjax.Platform.browser.isMozilla){var b=
a.indexOf("mozilla/");b>=0&&c(a.substring(b+8,d(a," ",b)))}SimileAjax.Platform.browser.isIE&&(b=a.indexOf("msie "),b>=0&&c(a.substring(b+5,d(a,";",b))));SimileAjax.Platform.browser.isNetscape&&(b=a.indexOf("rv:"),b>=0&&c(a.substring(b+3,d(a,")",b))));SimileAjax.Platform.browser.isFirefox&&(b=a.indexOf("firefox/"),b>=0&&c(a.substring(b+8,d(a," ",b))));if(!("localeCompare"in String.prototype))String.prototype.localeCompare=function(a){return this<a?-1:this>a?1:0}})();
SimileAjax.Platform.getDefaultLocale=function(){return SimileAjax.Platform.clientLocale};